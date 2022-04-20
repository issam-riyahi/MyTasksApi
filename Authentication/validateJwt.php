<?php



function validateJWT($jwt, $secret){

    if(empty($jwt)){
        return false;
    }
    $tokenParts = explode('.', $jwt);
    
    
    $header = base64_decode($tokenParts[0]);
    $payload = base64_decode($tokenParts[1]);
    $signature = $tokenParts[2];
 
    $expiration = json_decode($payload)->exp;

    $isTokenExpired = ($expiration - time()) < 0 ;
    
    $base64UrlHeader = base64UrlEncode($header);


    $base64UrlPayload = base64UrlEncode($payload);


    $newSignature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload , $secret , true);

    $base64UrlSignature = base64UrlEncode($newSignature);
     
    
    if($isTokenExpired && $base64UrlSignature === $signature){
        return true;
    }
    return false;
 }
 
 function getAuthorisationHeader(){
     $request = $GLOBALS['request'];
     $header = null;
 
     if(isset($_SERVER["Authorization"])){
         $header = $request->server('Authorization');
     }
     else if (isset($_SERVER['HTTP_AUTHORIZATION'])){
         $header = $request->server('HTTP_AUTHORIZATION');
     }
     
     return $header;
 }
 
 
 function getBearerToken(){
     $header = getAuthorisationHeader();
     if(!empty($header)){
         if(preg_match('/Bearer\s(\S+)/',$header, $matches));
         return $matches[1];
     }
     else {
        return null;
     }
 }