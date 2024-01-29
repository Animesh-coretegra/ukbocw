<?php
function generateRandom($type, $length)
{
  return random_string($type, $length);
}

function decryptData($requestData)
{
  $publicKey = base64_encode(getenv('encryption.key'));
  $iv = str_repeat(0, openssl_cipher_iv_length('AES-256-CBC'));
  if (isset($requestData) && !empty($requestData)) {
    $decryptedData = openssl_decrypt($requestData, 'aes-256-cbc', $publicKey, 0, $iv);
    return json_decode($decryptedData);
  }
  return false;
}
function encryptData($requestData)
{
  $publicKey = base64_encode(getenv('encryption.key'));
  $iv = str_repeat(0, openssl_cipher_iv_length('AES-256-CBC'));
  $encrypted_data = openssl_encrypt(json_encode($requestData), 'aes-256-cbc', $publicKey, 0, $iv);
  return $encrypted_data;
}
