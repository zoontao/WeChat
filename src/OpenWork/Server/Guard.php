<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OpenWork\Server;

use WeChat\Kernel\Encryptor;
use WeChat\Kernel\ServerGuard;

/**
 * Guard.
 *
 * @author xiaomin <keacefull@gmail.com>
 */
class Guard extends ServerGuard
{
    /**
     * @var bool
     */
    protected $alwaysValidate = true;

    /**
     * @return $this
     */
    public function validate()
    {
        return $this;
    }

    /**
     * @return bool
     */
    protected function shouldReturnRawResponse(): bool
    {
        return !is_null($this->app['request']->get('echostr'));
    }

    protected function isSafeMode(): bool
    {
        return true;
    }

    /**
     * @param array $message
     *
     * @return mixed
     *
     * @throws \WeChat\Kernel\Exceptions\RuntimeException
     */
    protected function decryptMessage(array $message)
    {
        $encryptor = new Encryptor($message['ToUserName'], $this->app['config']->get('token'), $this->app['config']->get('aes_key'));

        return $message = $encryptor->decrypt(
            $message['Encrypt'],
            $this->app['request']->get('msg_signature'),
            $this->app['request']->get('nonce'),
            $this->app['request']->get('timestamp')
        );
    }
}
