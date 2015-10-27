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

    public function getInSeconds($url, $seconds)
    {
        $curl = new Curl;
        $curl->setOption(CURLOPT_URL, $url);
        $curl->setOption(CURLOPT_TIMEOUT, $seconds);
        return $curl->send();
    }

    public function postInSeconds($url, $postData, $seconds)
    {
        $curl = new Curl;
        $curl->setOption(CURLOPT_URL, $url);
        $curl->setOption(CURLOPT_POST, 1);
        $curl->setOption(CURLOPT_POSTFIELDS, $postData);
        $curl->setOption(CURLOPT_TIMEOUT, $seconds);
        return $curl->send();
    }

    public function getInMilliseconds($url, $milliseconds)
    {
        $curl = new Curl;
        $curl->setOption(CURLOPT_URL, $url);
        $curl->setOption(CURLOPT_NOSIGNAL, true);
        $curl->setOption(CURLOPT_TIMEOUT_MS, $milliseconds);
        return $curl->send();
    }

    public function postInMilliseconds($url, $postData, $milliseconds)
    {
        $curl = new Curl;
        $curl->setOption(CURLOPT_URL, $url);
        $curl->setOption(CURLOPT_POST, 1);
        $curl->setOption(CURLOPT_POSTFIELDS, $postData);
        $curl->setOption(CURLOPT_NOSIGNAL, true);
        $curl->setOption(CURLOPT_TIMEOUT_MS, $milliseconds);
        return $curl->send();
    }

    public function download($url, $saveFile)
    {
        $curl = new Curl;
        $curl->setOption(CURLOPT_URL, $url);
        $response = $curl->send();
        $fp = fopen($saveFile, 'w');
        fwrite($fp, $response);
        fclose($fp);
        return true;
    }
}
