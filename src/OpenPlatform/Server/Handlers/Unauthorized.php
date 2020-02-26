<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OpenPlatform\Server\Handlers;

use WeChat\Kernel\Contracts\EventHandlerInterface;

/**
 * Class Unauthorized.
 *
 * @author mingyoung <mingyoungcheung@gmail.com>
 */
class Unauthorized implements EventHandlerInterface
{
    /**
     * {@inheritdoc}.
     */
    public function handle($payload = null)
    {
        // Do nothing for the time being.
    }
}
