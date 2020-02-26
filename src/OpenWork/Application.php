<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OpenWork;

use WeChat\Kernel\ServiceContainer;
use WeChat\OpenWork\Work\Application as Work;

/**
 * Application.
 *
 * @author xiaomin <keacefull@gmail.com>
 *
 * @property \WeChat\OpenWork\Server\Guard            $server
 * @property \WeChat\OpenWork\Corp\Client             $corp
 * @property \WeChat\OpenWork\Provider\Client         $provider
 * @property \WeChat\OpenWork\SuiteAuth\AccessToken   $suite_access_token
 * @property \WeChat\OpenWork\Auth\AccessToken        $provider_access_token
 * @property \WeChat\OpenWork\SuiteAuth\SuiteTicket   $suite_ticket
 * @property \WeChat\OpenWork\MiniProgram\Auth\Client $mini_program
 */
class Application extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        Auth\ServiceProvider::class,
        SuiteAuth\ServiceProvider::class,
        Server\ServiceProvider::class,
        Corp\ServiceProvider::class,
        Provider\ServiceProvider::class,
        MiniProgram\ServiceProvider::class,
    ];

    /**
     * @var array
     */
    protected $defaultConfig = [
        // http://docs.guzzlephp.org/en/stable/request-options.html
        'http' => [
            'base_uri' => 'https://qyapi.weixin.qq.com/',
        ],
    ];

    /**
     * Creates the miniProgram application.
     *
     * @return \WeChat\Work\MiniProgram\Application
     */
    public function miniProgram(): \WeChat\Work\MiniProgram\Application
    {
        return new \WeChat\Work\MiniProgram\Application($this->getConfig());
    }

    /**
     * @param string $authCorpId    企业 corp_id
     * @param string $permanentCode 企业永久授权码
     *
     * @return Work
     */
    public function work(string $authCorpId, string $permanentCode): Work
    {
        return new Work($authCorpId, $permanentCode, $this);
    }

    /**
     * @param string $method
     * @param array  $arguments
     *
     * @return mixed
     */
    public function __call($method, $arguments)
    {
        return $this['base']->$method(...$arguments);
    }
}
