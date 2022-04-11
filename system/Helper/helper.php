<?php 



function cleanUrl($url){
    return str_replace(['%20', ' '], '-', $url);
}