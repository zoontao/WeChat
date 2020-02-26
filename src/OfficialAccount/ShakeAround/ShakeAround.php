<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OfficialAccount\ShakeAround;

use WeChat\Kernel\Exceptions\InvalidArgumentException;

/**
 * Class Card.
 *
 * @author overtrue <i@overtrue.me>
 *
 * @property \WeChat\OfficialAccount\ShakeAround\DeviceClient   $device
 * @property \WeChat\OfficialAccount\ShakeAround\GroupClient    $group
 * @property \WeChat\OfficialAccount\ShakeAround\MaterialClient $material
 * @property \WeChat\OfficialAccount\ShakeAround\RelationClient $relation
 * @property \WeChat\OfficialAccount\ShakeAround\StatsClient    $stats
 */
class ShakeAround extends Client
{
    /**
     * @param string $property
     *
     * @return mixed
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["shake_around.{$property}"])) {
            return $this->app["shake_around.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No shake_around service named "%s".', $property));
    }
}
