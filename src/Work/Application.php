<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Work;

use WeChat\Kernel\ServiceContainer;
use WeChat\Work\MiniProgram\Application as MiniProgram;

/**
 * Application.
 *
 * @author mingyoung <mingyoungcheung@gmail.com>
 *
 * @property \WeChat\Work\OA\Client                        $oa
 * @property \WeChat\Work\Auth\AccessToken                 $access_token
 * @property \WeChat\Work\Agent\Client                     $agent
 * @property \WeChat\Work\Department\Client                $department
 * @property \WeChat\Work\Media\Client                     $media
 * @property \WeChat\Work\Menu\Client                      $menu
 * @property \WeChat\Work\Message\Client                   $message
 * @property \WeChat\Work\Message\Messenger                $messenger
 * @property \WeChat\Work\User\Client                      $user
 * @property \WeChat\Work\User\TagClient                   $tag
 * @property \WeChat\Work\Server\ServiceProvider           $server
 * @property \WeChat\Work\Jssdk\Client                     $jssdk
 * @property \Zoontao\Socialite\Providers\WeWorkProvider      $oauth
 * @property \WeChat\Work\Invoice\Client                   $invoice
 * @property \WeChat\Work\Chat\Client                      $chat
 * @property \WeChat\Work\ExternalContact\Client           $external_contact
 * @property \WeChat\Work\ExternalContact\ContactWayClient $contact_way
 * @property \WeChat\Work\ExternalContact\StatisticsClient $external_contact_statistics
 * @property \WeChat\Work\ExternalContact\MessageClient    $external_contact_message
 * @property \WeChat\Work\GroupRobot\Client                $group_robot
 * @property \WeChat\Work\GroupRobot\Messenger             $group_robot_messenger
 *
 * @method mixed getCallbackIp()
 */
class Application extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        OA\ServiceProvider::class,
        Auth\ServiceProvider::class,
        Base\ServiceProvider::class,
        Menu\ServiceProvider::class,
        OAuth\ServiceProvider::class,
        User\ServiceProvider::class,
        Agent\ServiceProvider::class,
        Media\ServiceProvider::class,
        Message\ServiceProvider::class,
        Department\ServiceProvider::class,
        Server\ServiceProvider::class,
        Jssdk\ServiceProvider::class,
        Invoice\ServiceProvider::class,
        Chat\ServiceProvider::class,
        ExternalContact\ServiceProvider::class,
        GroupRobot\ServiceProvider::class,
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
    public function miniProgram(): MiniProgram
    {
        return new MiniProgram($this->getConfig());
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
