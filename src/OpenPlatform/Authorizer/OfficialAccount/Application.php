<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OpenPlatform\Authorizer\OfficialAccount;

use WeChat\OfficialAccount\Application as OfficialAccount;
use WeChat\OpenPlatform\Authorizer\Aggregate\AggregateServiceProvider;

/**
 * Class Application.
 *
 * @author mingyoung <mingyoungcheung@gmail.com>
 *
 * @property \WeChat\OpenPlatform\Authorizer\OfficialAccount\Account\Client     $account
 * @property \WeChat\OpenPlatform\Authorizer\OfficialAccount\MiniProgram\Client $mini_program
 */
class Application extends OfficialAccount
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
            MiniProgram\ServiceProvider::class,
        ];

        foreach ($providers as $provider) {
            $this->register(new $provider());
        }
    }
}
