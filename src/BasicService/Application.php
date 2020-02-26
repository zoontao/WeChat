<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\BasicService;

use WeChat\Kernel\ServiceContainer;

/**
 * Class Application.
 *
 * @author overtrue <i@overtrue.me>
 *
 * @property \WeChat\BasicService\Jssdk\Client           $jssdk
 * @property \WeChat\BasicService\Media\Client           $media
 * @property \WeChat\BasicService\QrCode\Client          $qrcode
 * @property \WeChat\BasicService\Url\Client             $url
 * @property \WeChat\BasicService\ContentSecurity\Client $content_security
 */
class Application extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        Jssdk\ServiceProvider::class,
        QrCode\ServiceProvider::class,
        Media\ServiceProvider::class,
        Url\ServiceProvider::class,
        ContentSecurity\ServiceProvider::class,
    ];
}
