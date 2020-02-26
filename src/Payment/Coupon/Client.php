<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Payment\Coupon;

use WeChat\Payment\Kernel\BaseClient;

/**
 * Class Client.
 *
 * @author tianyong90 <412039588@qq.com>
 */
class Client extends BaseClient
{
    /**
     * send a cash coupon.
     *
     * @param array $params
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send(array $params)
    {
        $params['appid'] = $this->app['config']->app_id;
        $params['openid_count'] = 1;

        return $this->safeRequest('mmpaymkttransfers/send_coupon', $params);
    }

    /**
     * query a coupon stock.
     *
     * @param array $params
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function stock(array $params)
    {
        $params['appid'] = $this->app['config']->app_id;

        return $this->request('mmpaymkttransfers/query_coupon_stock', $params);
    }

    /**
     * query a info of coupon.
     *
     * @param array $params
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function info(array $params)
    {
        $params['appid'] = $this->app['config']->app_id;

        return $this->request('mmpaymkttransfers/querycouponsinfo', $params);
    }
}
