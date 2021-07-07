<?php

if (!function_exists('format_price')) {


    function format_price($number)
    {
        return  number_format (  $number ,  0 ,  '.' , '' );
    }
}
if (!function_exists('get_http_response_code')) {

    function get_http_response_code($url) {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }
}

if (!function_exists('tab2space')) {
    function tab2space($line, $tab = 4, $nbsp = FALSE) {
        while (($t = mb_strpos($line,"\t")) !== FALSE) {
            $preTab = $t?mb_substr($line, 0, $t):'';
            $line = $preTab . str_repeat($nbsp?chr(7):' ', $tab-(mb_strlen($preTab)%$tab)) . mb_substr($line, $t+1);
        }
        return  $nbsp?str_replace($nbsp?chr(7):' ', '&nbsp;', $line):$line;
    }
}
