<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OfficialAccount;

use WeChat\BasicService;
use WeChat\Kernel\ServiceContainer;

/**
 * Class Application.
 *
 * @author overtrue <i@overtrue.me>
 *
 * @property \WeChat\BasicService\Media\Client                     $media
 * @property \WeChat\BasicService\Url\Client                       $url
 * @property \WeChat\BasicService\QrCode\Client                    $qrcode
 * @property \WeChat\BasicService\Jssdk\Client                     $jssdk
 * @property \WeChat\OfficialAccount\Auth\AccessToken              $access_token
 * @property \WeChat\OfficialAccount\Server\Guard                  $server
 * @property \WeChat\OfficialAccount\User\UserClient               $user
 * @property \WeChat\OfficialAccount\User\TagClient                $user_tag
 * @property \WeChat\OfficialAccount\Menu\Client                   $menu
 * @property \WeChat\OfficialAccount\TemplateMessage\Client        $template_message
 * @property \WeChat\OfficialAccount\Material\Client               $material
 * @property \WeChat\OfficialAccount\CustomerService\Client        $customer_service
 * @property \WeChat\OfficialAccount\CustomerService\SessionClient $customer_service_session
 * @property \WeChat\OfficialAccount\Semantic\Client               $semantic
 * @property \WeChat\OfficialAccount\DataCube\Client               $data_cube
 * @property \WeChat\OfficialAccount\AutoReply\Client              $auto_reply
 * @property \WeChat\OfficialAccount\Broadcasting\Client           $broadcasting
 * @property \WeChat\OfficialAccount\Card\Card                     $card
 * @property \WeChat\OfficialAccount\Device\Client                 $device
 * @property \WeChat\OfficialAccount\ShakeAround\ShakeAround       $shake_around
 * @property \WeChat\OfficialAccount\POI\Client                    $poi
 * @property \WeChat\OfficialAccount\Store\Client                  $store
 * @property \WeChat\OfficialAccount\Base\Client                   $base
 * @property \WeChat\OfficialAccount\Comment\Client                $comment
 * @property \WeChat\OfficialAccount\OCR\Client                    $ocr
 * @property \WeChat\OfficialAccount\Goods\Client                  $goods
 * @property \Zoontao\Socialite\Providers\WeChatProvider              $oauth
 * @property \WeChat\OfficialAccount\WiFi\Client                   $wifi
 * @property \WeChat\OfficialAccount\WiFi\CardClient               $wifi_card
 * @property \WeChat\OfficialAccount\WiFi\DeviceClient             $wifi_device
 * @property \WeChat\OfficialAccount\WiFi\ShopClient               $wifi_shop
 */
class Application extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        Auth\ServiceProvider::class,
        Server\ServiceProvider::class,
        User\ServiceProvider::class,
        OAuth\ServiceProvider::class,
        Menu\ServiceProvider::class,
        TemplateMessage\ServiceProvider::class,
        Material\ServiceProvider::class,
        CustomerService\ServiceProvider::class,
        Semantic\ServiceProvider::class,
        DataCube\ServiceProvider::class,
        POI\ServiceProvider::class,
        AutoReply\ServiceProvider::class,
        Broadcasting\ServiceProvider::class,
        Card\ServiceProvider::class,
        Device\ServiceProvider::class,
        ShakeAround\ServiceProvider::class,
        Store\ServiceProvider::class,
        Comment\ServiceProvider::class,
        Base\ServiceProvider::class,
        OCR\ServiceProvider::class,
        Goods\ServiceProvider::class,
        WiFi\ServiceProvider::class,
        // Base services
        BasicService\QrCode\ServiceProvider::class,
        BasicService\Media\ServiceProvider::class,
        BasicService\Url\ServiceProvider::class,
        BasicService\Jssdk\ServiceProvider::class,
    ];
}
