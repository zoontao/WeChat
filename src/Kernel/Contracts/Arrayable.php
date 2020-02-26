<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Kernel\Contracts;

use ArrayAccess;

/**
 * Interface Arrayable.
 *
 * @author overtrue <i@overtrue.me>
 */
interface Arrayable extends ArrayAccess
{
    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray();
}
