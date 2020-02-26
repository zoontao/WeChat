<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\MiniProgram\Mall;

/**
 * Class Application.
 *
 * @author mingyoung <mingyoungcheung@gmail.com>
 *
 * @property \WeChat\MiniProgram\Mall\OrderClient   $order
 * @property \WeChat\MiniProgram\Mall\CartClient    $cart
 * @property \WeChat\MiniProgram\Mall\ProductClient $product
 * @property \WeChat\MiniProgram\Mall\MediaClient   $media
 */
class ForwardsMall
{
    /**
     * @var \WeChat\Kernel\ServiceContainer
     */
    protected $app;

    /**
     * @param \WeChat\Kernel\ServiceContainer $app
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * @param string $property
     *
     * @return mixed
     */
    public function __get($property)
    {
        return $this->app["mall.{$property}"];
    }
}
