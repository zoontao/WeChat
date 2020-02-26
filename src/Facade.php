<?php

/*
 * This file is part of the zoontao/wechat.

 */

namespace Zoontao\WeChat;

use Illuminate\Support\Facades\Facade as LaravelFacade;

/**
 * Class Facade.
 *
 * @author overtrue <i@overtrue.me>
 */
class Facade extends LaravelFacade
{
    /**
     * 默认为 Server.
     *
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return 'wechat.official_account';
    }

    /**
     * @return \WeChat\OfficialAccount\Application
     */
    public static function officialAccount($name = '')
    {
        return $name ? app('wechat.official_account.'.$name) : app('wechat.official_account');
    }

    /**
     * @return \WeChat\Work\Application
     */
    public static function work($name = '')
    {
        return $name ? app('wechat.work.'.$name) : app('wechat.work');
    }

    /**
     * @return \WeChat\Payment\Application
     */
    public static function payment($name = '')
    {
        return $name ? app('wechat.payment.'.$name) : app('wechat.payment');
    }

    /**
     * @return \WeChat\MiniProgram\Application
     */
    public static function miniProgram($name = '')
    {
        return $name ? app('wechat.mini_program.'.$name) : app('wechat.mini_program');
    }

    /**
     * @return \WeChat\OpenPlatform\Application
     */
    public static function openPlatform($name = '')
    {
        return $name ? app('wechat.open_platform.'.$name) : app('wechat.open_platform');
    }
}
