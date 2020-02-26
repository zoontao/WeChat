<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Kernel\Messages;

/**
 * Class MiniProgramPage.
 */
class MiniProgramPage extends Message
{
    protected $type = 'miniprogrampage';

    protected $properties = [
        'title',
        'appid',
        'pagepath',
        'thumb_media_id',
    ];

    protected $required = [
        'thumb_media_id', 'appid', 'pagepath',
    ];
}
