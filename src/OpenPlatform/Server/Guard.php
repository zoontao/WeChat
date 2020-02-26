<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OpenPlatform\Server;

use function WeChat\Kernel\data_get;
use WeChat\Kernel\ServerGuard;
use WeChat\OpenPlatform\Server\Handlers\Authorized;
use WeChat\OpenPlatform\Server\Handlers\Unauthorized;
use WeChat\OpenPlatform\Server\Handlers\UpdateAuthorized;
use WeChat\OpenPlatform\Server\Handlers\VerifyTicketRefreshed;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class Guard.
 *
 * @author mingyoung <mingyoungcheung@gmail.com>
 */
class Guard extends ServerGuard
{
    const EVENT_AUTHORIZED = 'authorized';
    const EVENT_UNAUTHORIZED = 'unauthorized';
    const EVENT_UPDATE_AUTHORIZED = 'updateauthorized';
    const EVENT_COMPONENT_VERIFY_TICKET = 'component_verify_ticket';
    const EVENT_THIRD_FAST_REGISTERED = 'notify_third_fasteregister';

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \WeChat\Kernel\Exceptions\BadRequestException
     * @throws \WeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     */
    protected function resolve(): Response
    {
        $this->registerHandlers();

        $message = $this->getMessage();

        if ($infoType = data_get($message, 'InfoType')) {
            $this->dispatch($infoType, $message);
        }

        return new Response(static::SUCCESS_EMPTY_RESPONSE);
    }

    /**
     * Register event handlers.
     */
    protected function registerHandlers()
    {
        $this->on(self::EVENT_AUTHORIZED, Authorized::class);
        $this->on(self::EVENT_UNAUTHORIZED, Unauthorized::class);
        $this->on(self::EVENT_UPDATE_AUTHORIZED, UpdateAuthorized::class);
        $this->on(self::EVENT_COMPONENT_VERIFY_TICKET, VerifyTicketRefreshed::class);
    }
}
