<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Work\GroupRobot\Messages;

/**
 * Class Markdown.
 *
 * @author her-cat <i@her-cat.com>
 */
class Markdown extends Message
{
    /**
     * @var string
     */
    protected $type = 'markdown';

    /**
     * @var array
     */
    protected $properties = ['content'];

    /**
     * Markdown constructor.
     *
     * @param string $content
     */
    public function __construct(string $content)
    {
        parent::__construct(compact('content'));
    }
}
