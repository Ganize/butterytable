<?php

function checkDigit($string, $len = 0)
{
	if(is_numeric($string) && strlen($string) == $len)
	{
		return true;
	}
	else if(is_numeric($string) && $len == 0)
	{
		return true;
	}
	else
	{
		return false;
	}

}

//Keys : SVsjgW9qXTyhvY4A
function encryptString($string)
{
	$encrypt_method = "AES-256-CBC";
    $secret_key = '791899656e1427b2f804c0d4e18f748d';
    $secret_iv = 'SVsjgW9qXTyhvY4A';

    // hash
    $key = hash('sha256', $secret_key);    
    // iv - encrypt method AES-256-CBC expects 16 bytes 
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
   
    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($output);
 
    return $output;
}

//Keys : SVsjgW9qXTyhvY4A
function decryptString($string)
{
	$encrypt_method = "AES-256-CBC";
    $secret_key = '791899656e1427b2f804c0d4e18f748d';
    $secret_iv = 'SVsjgW9qXTyhvY4A';

    // hash
    $key = hash('sha256', $secret_key);    
    // iv - encrypt method AES-256-CBC expects 16 bytes 
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    
    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
 
    return $output;
}

?>