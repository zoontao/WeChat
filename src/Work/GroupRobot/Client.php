<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Work\GroupRobot;

use WeChat\Kernel\BaseClient;
use WeChat\Work\GroupRobot\Messages\Message;

/**
 * Class Client.
 *
 * @author her-cat <i@her-cat.com>
 */
class Client extends BaseClient
{
    /**
     * @param string|Message $message
     *
     * @return Messenger
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidArgumentException
     */
    public function message($message)
    {
        return (new Messenger($this))->message($message);
    }

    /**
     * @param string $key
     * @param array  $message
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send(string $key, array $message)
    {
        $this->accessToken = null;

        return $this->httpPostJson('cgi-bin/webhook/send', $message, ['key' => $key]);
    }
}
