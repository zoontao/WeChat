<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OpenPlatform\Authorizer\Auth;

use WeChat\Kernel\AccessToken as BaseAccessToken;
use WeChat\OpenPlatform\Application;
use Pimple\Container;

/**
 * Class AccessToken.
 *
 * @author mingyoung <mingyoungcheung@gmail.com>
 */
class AccessToken extends BaseAccessToken
{
    /**
     * @var string
     */
    protected $requestMethod = 'POST';

    /**
     * @var string
     */
    protected $queryName = 'access_token';

    /**
     * {@inheritdoc}.
     */
    protected $tokenKey = 'authorizer_access_token';

    /**
     * @var \WeChat\OpenPlatform\Application
     */
    protected $component;

    /**
     * AuthorizerAccessToken constructor.
     *
     * @param \Pimple\Container                    $app
     * @param \WeChat\OpenPlatform\Application $component
     */
    public function __construct(Container $app, Application $component)
    {
        parent::__construct($app);

        $this->component = $component;
    }

    /**
     * {@inheritdoc}.
     */
    protected function getCredentials(): array
    {
        return [
            'component_appid' => $this->component['config']['app_id'],
            'authorizer_appid' => $this->app['config']['app_id'],
            'authorizer_refresh_token' => $this->app['config']['refresh_token'],
        ];
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'cgi-bin/component/api_authorizer_token?'.http_build_query([
            'component_access_token' => $this->component['access_token']->getToken()['component_access_token'],
        ]);
    }
}
