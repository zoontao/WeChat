<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\MicroMerchant\Certficates;

use WeChat\Kernel\Exceptions\InvalidArgumentException;
use WeChat\MicroMerchant\Kernel\BaseClient;
use WeChat\MicroMerchant\Kernel\Exceptions\InvalidExtensionException;

/**
 * Class Client.
 *
 * @author   liuml  <liumenglei0211@163.com>
 * @DateTime 2019-05-30  14:19
 */
class Client extends BaseClient
{
    /**
     * get certficates.
     *
     * @param bool $returnRaw
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \WeChat\MicroMerchant\Kernel\Exceptions\InvalidExtensionException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(bool $returnRaw = false)
    {
        $params = [
            'sign_type' => 'HMAC-SHA256',
            'nonce_str' => uniqid('micro'),
        ];

        if (true === $returnRaw) {
            return $this->requestRaw('risk/getcertficates', $params);
        }
        /** @var array $response */
        $response = $this->requestArray('risk/getcertficates', $params);

        if ('SUCCESS' !== $response['return_code']) {
            throw new InvalidArgumentException(sprintf('Failed to get certificate. return_code_msg: "%s" .', $response['return_code'].'('.$response['return_msg'].')'));
        }
        if ('SUCCESS' !== $response['result_code']) {
            throw new InvalidArgumentException(sprintf('Failed to get certificate. result_err_code_desc: "%s" .', $response['result_code'].'('.$response['err_code'].'['.$response['err_code_desc'].'])'));
        }
        $certificates = \GuzzleHttp\json_decode($response['certificates'], true)['data'][0];
        $ciphertext = $this->decrypt($certificates['encrypt_certificate']);
        unset($certificates['encrypt_certificate']);
        $certificates['certificates'] = $ciphertext;

        return $certificates;
    }

    /**
     * decrypt ciphertext.
     *
     * @param array $encryptCertificate
     *
     * @return string
     *
     * @throws \WeChat\MicroMerchant\Kernel\Exceptions\InvalidExtensionException
     */
    public function decrypt(array $encryptCertificate)
    {
        if (false === extension_loaded('sodium')) {
            throw new InvalidExtensionException('sodium extension is not installed，Reference link https://php.net/manual/zh/book.sodium.php');
        }

        if (false === sodium_crypto_aead_aes256gcm_is_available()) {
            throw new InvalidExtensionException('aes256gcm is not currently supported');
        }

        // sodium_crypto_aead_aes256gcm_decrypt function needs to open libsodium extension.
        // https://www.php.net/manual/zh/function.sodium-crypto-aead-aes256gcm-decrypt.php
        return sodium_crypto_aead_aes256gcm_decrypt(
            base64_decode($encryptCertificate['ciphertext'], true),
            $encryptCertificate['associated_data'],
            $encryptCertificate['nonce'],
            $this->app['config']->apiv3_key
        );
    }
}
