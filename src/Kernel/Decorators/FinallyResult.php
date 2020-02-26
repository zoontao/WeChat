<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Kernel\Decorators;

/**
 * Class FinallyResult.
 *
 * @author overtrue <i@overtrue.me>
 */
class FinallyResult
{
    /**
     * @var mixed
     */
    public $content;

    /**
     * FinallyResult constructor.
     *
     * @param mixed $content
     */
    public function __construct($content)
    {
        $this->content = $content;
    }
}
