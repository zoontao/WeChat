<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OfficialAccount\OCR;

use WeChat\Kernel\BaseClient;
use WeChat\Kernel\Exceptions\InvalidArgumentException;

/**
 * Class Client.
 *
 * @author joyeekk <xygao2420@gmail.com>
 */
class Client extends BaseClient
{
    /**
     * Allow image parameter type.
     *
     * @var array
     */
    protected $allowTypes = ['photo', 'scan'];

    /**
     * ID card OCR.
     *
     * @param string $path
     * @param string $type
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function idCard(string $path, string $type = 'photo')
    {
        if (!\in_array($type, $this->allowTypes, true)) {
            throw new InvalidArgumentException(sprintf("Unsupported type: '%s'", $type));
        }

        return $this->httpGet('cv/ocr/idcard', [
            'type' => $type,
            'img_url' => $path,
        ]);
    }

    /**
     * Bank card OCR.
     *
     * @param string $path
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function bankCard(string $path)
    {
        return $this->httpGet('cv/ocr/bankcard', [
            'img_url' => $path,
        ]);
    }

    /**
     * Vehicle license OCR.
     *
     * @param string $path
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function vehicleLicense(string $path)
    {
        return $this->httpGet('cv/ocr/driving', [
            'img_url' => $path,
        ]);
    }
}
