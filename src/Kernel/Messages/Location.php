<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Kernel\Messages;

/**
 * Class Location.
 */
class Location extends Message
{
    /**
     * Messages type.
     *
     * @var string
     */
    protected $type = 'location';

    /**
     * Properties.
     *
     * @var array
     */
    protected $properties = [
        'latitude',
        'longitude',
        'scale',
        'label',
        'precision',
    ];
}
