<?php

/*
 * This file is part of the zoontao/wechat.

 */

namespace Zoontao\WeChat\Events\OpenPlatform;

abstract class OpenPlatformEvent
{
    /**
     * @var array
     */
    public $payload;

    /**
     * Create a new event instance.
     *
     * @param mixed $payload
     */
    public function __construct($payload)
    {
        $this->payload = $payload;
    }

    public function __call($name, $args)
    {
        return $this->payload[substr($name, 3)] ?? null;
    }
}
