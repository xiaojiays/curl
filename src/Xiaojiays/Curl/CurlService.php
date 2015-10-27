<?php namespace Xiaojiays\Curl;

class CurlService extends Base
{
  
    public function get($url)
    {
        $curl = new Curl;
        $curl->setOption(CURLOPT_URL, $url);
        return $curl->send();
    }
}
