<?php namespace Xiaojiays\Curl;

class Curl
{

    private $options = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING       => '', 
        CURLOPT_USERAGENT      => '',
        CURLOPT_AUTOREFERER    => true,
        CURLOPT_CONNECTTIMEOUT => 30,
        CURLOPT_TIMEOUT        => 30,
        CURLOPT_MAXREDIRS      => 10,
        CURLOPT_POST           => 0,
        CURLOPT_URL            => '',
      ];

    private $urls = [];

    public function setOption($key, $val)
    {
        $this->options[$key] = $val;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function setUrls($urls = [])
    {
        $this->urls = $urls;
    }

    public function getUrls()
    {
        return $this->urls;
    }

    public function send()
    {
        $ch = curl_init();
        curl_setopt_array($ch, $this->getOptions());
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    }

    public function execute()
    {
        $mh = curl_multi_init();
        $conn = [];
        foreach ($this->getUrls() as $k => $url) {
            $this->setOption(CURLOPT_URL, $url);
            $ch = curl_init();
            curl_setopt_array($ch, $this->getOptions());
            $conn[$k] = $ch;
            curl_multi_add_handle($mh, $conn[$k]);
        }
        $active = false;
        do {
            $mrc=curl_multi_exec($mh,$active);
        } while ($mrc == CURLM_CALL_MULTI_PERFORM);

        while ($active && $mrc == CURLM_OK) {
            if (curl_multi_select($mh) != -1) {
                do {
                    $mrc=curl_multi_exec($mh,$active);
                } while ($mrc == CURLM_CALL_MULTI_PERFORM);
            }
        }

        $res = [];
        foreach ($this->getUrls() as $k => $url) {
            $res[$k] = curl_multi_getcontent($conn[$k]);
            curl_close($conn[$k]);
            curl_multi_remove_handle($mh,$conn[$k]);
        }
        curl_multi_close($mh);
        return $res;
    }
}
