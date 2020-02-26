<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Kernel\Messages;

/**
 * Class Image.
 *
 * @property string $media_id
 */
class Image extends Media
{
    /**
     * Messages type.
     *
     * @var string
     */
    protected $type = 'image';
}
