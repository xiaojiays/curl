<?php namespace Xiaojiays\Curl;

class CurlService
{
  
    public function get($url)
    {
        $curl = new Curl;
        $curl->setOption(CURLOPT_URL, $url);
        return $curl->send();
    }

    public function post($url, $postData)
    {
        $curl = new Curl;
        $curl->setOption(CURLOPT_URL, $url);
        $curl->setOption(CURLOPT_POST, 1);
        $curl->setOption(CURLOPT_POSTFIELDS, $postData);
        return $curl->send();
    }
}
