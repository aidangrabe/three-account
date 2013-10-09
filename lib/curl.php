<?php

function curl($url, $post = array()) {
    $handle = curl_init($url);
    //curl_setopt($handle, CURLOPT_VERBOSE, true);
    //curl_setopt($handle, CURLOPT_HEADER, true);

    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($handle, CURLOPT_COOKIEJAR, __DIR__ . "/cookie.txt");
    curl_setopt($handle, CURLOPT_COOKIEFILE, __DIR__ . "/cookie.txt");

    // format the POST content if it was provided
    if (count($post) > 0) {
        $postFields = "";
        $sep = "";
        foreach ($post as $key => $val) {
            $postFields .= $sep . $key . "=" . urlencode($val);
            $sep = "&";
        }
        curl_setopt($handle, CURLOPT_POST, count($post));
        curl_setopt($handle, CURLOPT_POSTFIELDS, $postFields);
    }

    $content = curl_exec($handle);
    curl_close($handle);
    return $content;
}

?>
