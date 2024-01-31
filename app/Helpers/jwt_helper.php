<?php

use App\Models\UserModel;
use Config\Services;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function getJWTFromRequest($authenticationHeader): string
{
    if (is_null($authenticationHeader)) { //JWT is absent
        throw new Exception('Missing or invalid JWT in request');
    }
    //JWT is sent from client in the format Bearer XXXXXXXXX
    return explode(' ', $authenticationHeader)[1];
}

function validateJWTFromRequest(string $encodedToken)
{
    $key = Services::getSecretKey();
    $decodedToken = JWT::decode($encodedToken, $key);
    //$userModel = new UserModel();
    //$userModel->findUserByEmailAddress($decodedToken->email);
}

function getSignedJWTForUser(string $email)
{
    $issuedAtTime = time();
    $tokenTimeToLive = getenv('JWT_TIME_TO_LIVE');
    $tokenExpiration = $issuedAtTime + $tokenTimeToLive;
    $payload = [
        'email' => $email,
        'iat' => $issuedAtTime,
        'exp' => $tokenExpiration,
    ];

    $jwt = JWT::encode($payload, getenv('JWT_SECRET_KEY'),'HS256');
    return $jwt;
}

if (!function_exists('decode_jwt')) {
    function decode_jwt($token)
    {
        try {
            $decodedToken = $decoded = \Firebase\JWT\JWT::decode($token, new Key(getenv('JWT_SECRET_KEY'), 'HS256'));
            return $decodedToken;
        } catch (\Firebase\JWT\ExpiredException $e) {
            // Handle token expiration
            return null;
        } catch (\Exception $e) {
            // Handle other exceptions
            return $e->getMessage();
        }
    }
}
