<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Work\Server;

use WeChat\Kernel\ServerGuard;

/**
 * Class Guard.
 *
 * @author overtrue <i@overtrue.me>
 */
class Guard extends ServerGuard
{
    /**
     * @return $this
     */
    public function validate()
    {
        return $this;
    }

    /**
     * Check the request message safe mode.
     *
     * @return bool
     */
    protected function isSafeMode(): bool
    {
        return true;
    }

    /**
     * @return bool
     */
    protected function shouldReturnRawResponse(): bool
    {
        return !is_null($this->app['request']->get('echostr'));
    }
}
