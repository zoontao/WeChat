<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OfficialAccount\Semantic;

use WeChat\Kernel\BaseClient;

/**
 * Class Client.
 *
 * @author overtrue <i@overtrue.me>
 */
class Client extends BaseClient
{
    /**
     * Get the semantic content of giving string.
     *
     * @param string $keyword
     * @param string $categories
     * @param array  $optional
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function query(string $keyword, string $categories, array $optional = [])
    {
        $params = [
            'query' => $keyword,
            'category' => $categories,
            'appid' => $this->app['config']['app_id'],
        ];

        return $this->httpPostJson('semantic/semproxy/search', array_merge($params, $optional));
    }
}
