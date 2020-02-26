<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Kernel\Events;

use WeChat\Kernel\ServiceContainer;

/**
 * Class ApplicationInitialized.
 *
 * @author mingyoung <mingyoungcheung@gmail.com>
 */
class ApplicationInitialized
{
    /**
     * @var \WeChat\Kernel\ServiceContainer
     */
    public $app;

    /**
     * @param \WeChat\Kernel\ServiceContainer $app
     */
    public function __construct(ServiceContainer $app)
    {
        $this->app = $app;
    }
}
