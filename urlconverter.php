<?php
class ShortUrl
{
    protected static $chars = "123456789bcdfghjkmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXYZ";


    public function urlToShortCode($url) {              
        return $shortCode = $this->createShortCode($url);

    }

    protected function createShortCode($url) {
        $shortCode = $this->convertIntToShortCode();
        return $shortCode;
    }

  

    protected function convertIntToShortCode($url) {
        $url = intval($url);

        $length = strlen(self::$chars);
        // make sure length of available characters is at
        // least a reasonable minimum - there should be at
        // least 10 characters
        if ($length < 10) {
            throw new Exception("Length of chars is too small");
        }

        $code = "";
        while ($url > $length - 1) {
            // determine the value of the next higher character
            // in the short code should be and prepend
            $code = self::$chars[fmod($url, $length)] .
                $code;
            // reset $url to remaining value to be converted
            $url = floor($url / $length);
        }

        // remaining value of $url is less than the length of
        // self::$chars
        $code = self::$chars[$url] . $code;

        return $code;
    }

        return true;
    