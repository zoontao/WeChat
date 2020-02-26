<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OpenWork\Work;

use WeChat\OpenWork\Application as OpenWork;
use WeChat\OpenWork\Work\Auth\AccessToken;
use WeChat\Work\Application as Work;

/**
 * Application.
 *
 * @author xiaomin <keacefull@gmail.com>
 */
class Application extends Work
{
    /**
     * Application constructor.
     *
     * @param string   $authCorpId
     * @param string   $permanentCode
     * @param OpenWork $component
     * @param array    $prepends
     */
    public function __construct(string $authCorpId, string $permanentCode, OpenWork $component, array $prepends = [])
    {
        parent::__construct($component->getConfig(), $prepends + [
                'access_token' => function ($app) use ($authCorpId, $permanentCode, $component) {
                    return new AccessToken($app, $authCorpId, $permanentCode, $component);
                },
            ]);
    }
}
