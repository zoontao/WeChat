<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Work\GroupRobot\Messages;

/**
 * Class Image.
 *
 * @author her-cat <i@her-cat.com>
 */
class Image extends Message
{
    /**
     * @var string
     */
    protected $type = 'image';

    /**
     * @var array
     */
    protected $properties = ['base64', 'md5'];

    /**
     * Image constructor.
     *
     * @param string $base64
     * @param string $md5
     */
    public function __construct(string $base64, string $md5)
    {
        parent::__construct(compact('base64', 'md5'));
    }
}
