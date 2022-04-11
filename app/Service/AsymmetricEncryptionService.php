<?php

namespace App\Service;

/**
 * Class AsymmetricEncryptionService
 * @package pdaleramirez\asymmetric\encryption
 */
class AsymmetricEncryptionService
{
    const MINIMUM_KEY_SIZE = 128;
    const DEFAULT_KEY_SIZE = 2048;

  

    /**
     * Generate a private public key pair.
     *
     * @param null $keySize
     * @return array
     * @throws \Exception
     */
    public function createKeys($keySize = null) : array
    {
        $keySize = intval($keySize);
        if ($keySize < self::MINIMUM_KEY_SIZE) {
            $keySize = self::DEFAULT_KEY_SIZE;
        }

        $resource = openssl_pkey_new(array(
            'private_key_bits' => $keySize,
            'private_key_type' => OPENSSL_KEYTYPE_RSA,
        ));

        $publicKey = openssl_pkey_get_details($resource)['key'];

        if (strlen($publicKey) < 1) {
            throw new \Exception("OpenSSL: Error writing PUBLIC key.");
        }
        $privateKey = '';
        openssl_pkey_export($resource, $privateKey);

        if (strlen($privateKey) < 1) {
            throw new \Exception("OpenSSL: Error writing PRIVATE key.");
        }

        return [
            'privateKey' => $privateKey,
            'publicKey' => $publicKey
        ];
    }

    

   
    /**
     * Asymmetrically encrypts a payload.
     *
     * @param string $data
     * @param string $publicKey
     * @return string
     */
    public function asymmetricEncrypt(string $data, string $publicKey) : string
    {
        $key = openssl_get_publickey($publicKey);

        $encrypted = '';

        openssl_public_encrypt($data, $encrypted, $key, OPENSSL_PKCS1_OAEP_PADDING);

       // openssl_free_key($key);

        return $encrypted;
    }

    /**
     * Asymmetrically decrypts a payload.
     *
     * @param string $data
     * @param string $privateKey
     * @return string
     */
    public function asymmetricDecrypt(string $data, string $privateKey, string $passphrase) : string
    {
        $decrypted = '';

        $key = openssl_get_privatekey($privateKey, $passphrase);

        openssl_private_decrypt($data, $decrypted, $key, OPENSSL_PKCS1_OAEP_PADDING);

        return $decrypted;
    }

    
    
}