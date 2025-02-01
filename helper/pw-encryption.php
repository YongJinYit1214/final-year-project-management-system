<?php

class Encryption {
    private static $cipher = 'aes-256-cbc';
    private static $key = 'abcdefghijklmnopqrstuvwxyz123456'; // 🔑 Securely fetch from environment/config (NEVER hardcode)

    public static function encrypt($plaintext) {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length(self::$cipher));
        $encrypted = openssl_encrypt(
            $plaintext, 
            self::$cipher, 
            self::$key, 
            OPENSSL_RAW_DATA, // Return raw bytes
            $iv
        );
        // Return IV + raw encrypted data (binary)
        return $iv . $encrypted;
    }

    public static function decrypt($data) {
        $iv_length = openssl_cipher_iv_length(self::$cipher);
        $iv = substr($data, 0, $iv_length);
        $encrypted = substr($data, $iv_length);
        return openssl_decrypt(
            $encrypted, 
            self::$cipher, 
            self::$key, 
            OPENSSL_RAW_DATA, 
            $iv
        );
    }
}
?>