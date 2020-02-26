<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\MiniProgram;

use WeChat\BasicService;
use WeChat\Kernel\ServiceContainer;

/**
 * Class Application.
 *
 * @author mingyoung <mingyoungcheung@gmail.com>
 *
 * @property \WeChat\MiniProgram\Auth\AccessToken           $access_token
 * @property \WeChat\MiniProgram\DataCube\Client            $data_cube
 * @property \WeChat\MiniProgram\AppCode\Client             $app_code
 * @property \WeChat\MiniProgram\Auth\Client                $auth
 * @property \WeChat\OfficialAccount\Server\Guard           $server
 * @property \WeChat\MiniProgram\Encryptor                  $encryptor
 * @property \WeChat\MiniProgram\TemplateMessage\Client     $template_message
 * @property \WeChat\OfficialAccount\CustomerService\Client $customer_service
 * @property \WeChat\MiniProgram\Plugin\Client              $plugin
 * @property \WeChat\MiniProgram\Plugin\DevClient           $plugin_dev
 * @property \WeChat\MiniProgram\UniformMessage\Client      $uniform_message
 * @property \WeChat\MiniProgram\ActivityMessage\Client     $activity_message
 * @property \WeChat\MiniProgram\Express\Client             $logistics
 * @property \WeChat\MiniProgram\NearbyPoi\Client           $nearby_poi
 * @property \WeChat\MiniProgram\OCR\Client                 $ocr
 * @property \WeChat\MiniProgram\Soter\Client               $soter
 * @property \WeChat\BasicService\Media\Client              $media
 * @property \WeChat\BasicService\ContentSecurity\Client    $content_security
 * @property \WeChat\MiniProgram\Mall\ForwardsMall          $mall
 * @property \WeChat\MiniProgram\SubscribeMessage\Client    $subscribe_message
 * @property \WeChat\MiniProgram\RealtimeLog\Client         $realtime_log
 * @property \WeChat\MiniProgram\Search\Client              $search
 */
class Application extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        Auth\ServiceProvider::class,
        DataCube\ServiceProvider::class,
        AppCode\ServiceProvider::class,
        Server\ServiceProvider::class,
        TemplateMessage\ServiceProvider::class,
        CustomerService\ServiceProvider::class,
        UniformMessage\ServiceProvider::class,
        ActivityMessage\ServiceProvider::class,
        OpenData\ServiceProvider::class,
        Plugin\ServiceProvider::class,
        Base\ServiceProvider::class,
        Express\ServiceProvider::class,
        NearbyPoi\ServiceProvider::class,
        OCR\ServiceProvider::class,
        Soter\ServiceProvider::class,
        Mall\ServiceProvider::class,
        SubscribeMessage\ServiceProvider::class,
        RealtimeLog\ServiceProvider::class,
        Search\ServiceProvider::class,
        // Base services
        BasicService\Media\ServiceProvider::class,
        BasicService\ContentSecurity\ServiceProvider::class,
    ];

    /**
     * Handle dynamic calls.
     *
     * @param string $method
     * @param array  $args
     *
     * @return mixed
     */
    public function __call($method, $args)
    {
        return $this->base->$method(...$args);
    }
}
