# laravel-curl
a curl extension for laravel 5

#Install
add this to the composer.json file:

    {
        "require": {
            "xiaojiays/curl": "~0.3.0"
        }
    }

add this to the config/app.php file:

    'providers' => [
        Xiaojiays\Curl\CurlServiceProvider::class,
    ],

add this to the config/app.php file:

    'facades' => [
        'Curl' => Xiaojiays\Curl\Facades\Curl::class,
    ],

#Usage

    //send a get request
    \Curl::get('http://www.xx.com');

    //send a get request in 2 seconds
    \Curl::getInSeconds('http://www.xx.com', 2);

    //send a get request in 2 milliseconds
    \Curl::getInMilliseconds('http://www.xx.com?a=1', 2)

    //send a post request
    \Curl::post('http://www.xx.com', ['a' => 1, 'b' => 2]);

    //send a post request in 2 seconds
    \Curl::postInSeconds('http://www.xx.com', ['a' => 1, 'b' => 2], 2);

    //send a post request in 2 milliseconds
    \Curl::postInMillieconds('http://www.xx.com', ['a' => 1, 'b' => 2], 2);

    //download a file
    \Curl::download('http://www.xx.com', '1.html');

    //send multi get requests
    \Curl::multiGet(['http://www.xx.com', 'http://www.mm.com']);

#Notice
    I haven't test it!
