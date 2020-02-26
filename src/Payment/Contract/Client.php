<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Payment\Contract;

use WeChat\Payment\Kernel\BaseClient;

/**
 * Class Client.
 *
 * @author tianyong90 <412039588@qq.com>
 */
class Client extends BaseClient
{
    /**
     * entrust official account
     *
     * @param array $params
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function web(array $params)
    {
        $params['appid'] = $this->app['config']->app_id;

        return $this->safeRequest('papay/entrustweb', $params);
    }

    /**
     * entrust app
     *
     * @param array $params
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function app(array $params)
    {
        $params['appid'] = $this->app['config']->app_id;

        return $this->safeRequest('papay/preentrustweb', $params);
    }

    /**
     * entrust html 5
     *
     * @param array $params
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function h5(array $params)
    {
        $params['appid'] = $this->app['config']->app_id;

        return $this->safeRequest('papay/h5entrustweb', $params);
    }

    /**
     * apply papay
     *
     * @param array $params
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function apply(array $params)
    {
        $params['appid'] = $this->app['config']->app_id;

        return $this->safeRequest('papay/pappayapply', $params);
    }

    /**
     * delete papay contrace
     *
     * @param array $params
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete(array $params)
    {
        $params['appid'] = $this->app['config']->app_id;

        return $this->safeRequest('papay/deletecontract', $params);
    }
}
