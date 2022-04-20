<?php 



function cleanUrl($url){
    return str_replace(['%20', ' '], '-', $url);
}

function base64UrlEncode($text){
    return str_replace(
        ['+', '/', '='],
        ['-', '_', ''],
        base64_encode($text)
    );
}

function dd($parm){
    echo '<pre>';
    var_dump($parm);
    echo '</pre>';
}