<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OpenWork\Server\Handlers;

use WeChat\Kernel\Contracts\EventHandlerInterface;
use WeChat\Kernel\Decorators\FinallyResult;
use WeChat\Kernel\ServiceContainer;

/**
 * EchoStrHandler.
 *
 * @author xiaomin <keacefull@gmail.com>
 */
class EchoStrHandler implements EventHandlerInterface
{
    /**
     * @var ServiceContainer
     */
    protected $app;

    /**
     * EchoStrHandler constructor.
     *
     * @param ServiceContainer $app
     */
    public function __construct(ServiceContainer $app)
    {
        $this->app = $app;
    }

    /**
     * @param mixed $payload
     *
     * @return FinallyResult|null
     */
    public function handle($payload = null)
    {
        if ($decrypted = $this->app['request']->get('echostr')) {
            $str = $this->app['encryptor_corp']->decrypt(
                $decrypted,
                $this->app['request']->get('msg_signature'),
                $this->app['request']->get('nonce'),
                $this->app['request']->get('timestamp')
            );

            return new FinallyResult($str);
        }
        //把SuiteTicket缓存起来
        if (!empty($payload['SuiteTicket'])) {
            $this->app['suite_ticket']->setTicket($payload['SuiteTicket']);
        }
    }
}
