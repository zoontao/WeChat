<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat;

/**
 * Class Factory.
 *
 * @method static \WeChat\Payment\Application            payment(array $config)
 * @method static \WeChat\MiniProgram\Application        miniProgram(array $config)
 * @method static \WeChat\OpenPlatform\Application       openPlatform(array $config)
 * @method static \WeChat\OfficialAccount\Application    officialAccount(array $config)
 * @method static \WeChat\BasicService\Application       basicService(array $config)
 * @method static \WeChat\Work\Application               work(array $config)
 * @method static \WeChat\OpenWork\Application           openWork(array $config)
 * @method static \WeChat\MicroMerchant\Application      microMerchant(array $config)
 */
class Factory
{
    /**
     * @param string $name
     * @param array  $config
     *
     * @return \WeChat\Kernel\ServiceContainer
     */
    public static function make($name, array $config)
    {
        $namespace = Kernel\Support\Str::studly($name);
        $application = "\\WeChat\\{$namespace}\\Application";

        return new $application($config);
    }

    /**
     * Dynamically pass methods to the application.
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        return self::make($name, ...$arguments);
    }
}
