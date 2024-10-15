<?php

use CodeIgniter\I18n\Time;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

if (!function_exists('createJWT')) {
    function createJWT($data)
    {
        $key = getenv('JWT_SECRET_KEY');
        $time = time();

        $payload = [
            'iat' => $time,
            'data' => $data
        ];

        return JWT::encode($payload, $key, getenv('JWT_ALGORITHM'));
    }
}

if (!function_exists('validateJWT')) {
    function validateJWT($token)
    {
        try {
            $key = getenv('JWT_SECRET_KEY');
            $decoded = JWT::decode($token, new Key($key, 'HS256'));

            $decodedArray = (array) $decoded;

            return $decodedArray;
        } catch (Exception $e) {
            //throw $th;
            return false;
        }
    }
}
