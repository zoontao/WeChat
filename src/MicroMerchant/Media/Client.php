<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\MicroMerchant\Media;

use WeChat\Kernel\Exceptions\InvalidArgumentException;
use WeChat\MicroMerchant\Kernel\BaseClient;

/**
 * Class Client.
 *
 * @author   liuml  <liumenglei0211@163.com>
 * @DateTime 2019-06-10 14:50
 */
class Client extends BaseClient
{
    /**
     * Upload material.
     *
     * @param string $path
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \WeChat\MicroMerchant\Kernel\Exceptions\InvalidSignException
     */
    public function upload(string $path)
    {
        if (!file_exists($path) || !is_readable($path)) {
            throw new InvalidArgumentException(sprintf("File does not exist, or the file is unreadable: '%s'", $path));
        }

        $form = [
            'media_hash' => strtolower(md5_file($path)),
            'sign_type' => 'HMAC-SHA256',
        ];

        return $this->httpUpload('secapi/mch/uploadmedia', ['media' => $path], $form);
    }
}
