<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Kernel\Decorators;

/**
 * Class TerminateResult.
 *
 * @author overtrue <i@overtrue.me>
 */
class TerminateResult
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
