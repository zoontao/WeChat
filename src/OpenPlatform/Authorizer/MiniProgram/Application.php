<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OpenPlatform\Authorizer\MiniProgram;

use WeChat\MiniProgram\Application as MiniProgram;
use WeChat\OpenPlatform\Authorizer\Aggregate\AggregateServiceProvider;

/**
 * Class Application.
 *
 * @author mingyoung <mingyoungcheung@gmail.com>
 *
 * @property \WeChat\OpenPlatform\Authorizer\MiniProgram\Account\Client $account
 * @property \WeChat\OpenPlatform\Authorizer\MiniProgram\Code\Client    $code
 * @property \WeChat\OpenPlatform\Authorizer\MiniProgram\Domain\Client  $domain
 * @property \WeChat\OpenPlatform\Authorizer\MiniProgram\Setting\Client $setting
 * @property \WeChat\OpenPlatform\Authorizer\MiniProgram\Tester\Client  $tester
 */
class Application extends MiniProgram
{
    /**
     * Application constructor.
     *
     * @param array $config
     * @param array $prepends
     */
    public function __construct(array $config = [], array $prepends = [])
    {
        parent::__construct($config, $prepends);

        $providers = [
            AggregateServiceProvider::class,
            Code\ServiceProvider::class,
            Domain\ServiceProvider::class,
            Account\ServiceProvider::class,
            Setting\ServiceProvider::class,
            Tester\ServiceProvider::class,
        ];

        foreach ($providers as $provider) {
            $this->register(new $provider());
        }
    }
}
