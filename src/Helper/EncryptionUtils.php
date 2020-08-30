<?php

namespace Thresh\Helper;

/**
 * This class is used to encrypt the API Key
 * @package Thresh\Helper
 */
class EncryptionUtils
{
    private static $cipher_method = 'aes-128-ctr';
    private static $digest_method = 'SHA256';

    /**
     * @param $data
     * @return string
     */
    public static function encrypt($data){
        $enc_key = openssl_digest(php_uname(), self::$digest_method, true);
        $enc_iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length(self::$cipher_method));
        $crypted_data = openssl_encrypt($data, self::$cipher_method, $enc_key, 0, $enc_iv) . '::' . bin2hex($enc_iv);
        unset($token, $cipher_method, $enc_key, $enc_iv);
        return $crypted_data;
    }

    /**
     * @param $data
     * @return string
     */
    public static function decrypt($data){
        list($crypted_token, $enc_iv) = explode('::', $data);;
        $enc_key = openssl_digest(php_uname(), self::$digest_method, true);
        $token = openssl_decrypt($crypted_token, self::$cipher_method, $enc_key, 0, hex2bin($enc_iv));
        unset($crypted_token, $cipher_method, $enc_key, $enc_iv);
        return $token;
    }
}