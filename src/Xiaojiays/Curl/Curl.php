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

    public function setOption($key, $val)
    {
        $this->options[$key] = $val;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function send()
    {
        $ch = curl_init();
        curl_setopt_array($ch, $this->getOptions());
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    }
}
