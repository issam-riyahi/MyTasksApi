<?php




function generateJWT($token,$secret){
    

    $header = json_encode([
        "typ" => "JWT",
        "alg" => "HS256",
    ]);
    
    
    $payload = json_encode($token);
    
    $base64UrlHeader = base64UrlEncode($header);
    
    $base64UrlPayload = base64UrlEncode($payload);
    
    
    $signature = hash_hmac('sha256', $base64UrlHeader . "." .$base64UrlPayload,$secret, true );
    
    
    
    $base64UrlSignature = base64UrlEncode($signature);
    
    $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
    return $jwt;
}