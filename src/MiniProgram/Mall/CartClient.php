<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\MiniProgram\Mall;

use WeChat\Kernel\BaseClient;

/**
 * Class Client.
 *
 * @author mingyoung <mingyoungcheung@gmail.com>
 */
class CartClient extends BaseClient
{
    /**
     * 导入收藏.
     *
     * @param array $params
     * @param bool  $isTest
     *
     * @return mixed
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params, $isTest = false)
    {
        return $this->httpPostJson('mall/addshoppinglist', $params, ['is_test' => (int) $isTest]);
    }

    /**
     * 查询用户收藏信息.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function query($params)
    {
        return $this->httpPostJson('mall/queryshoppinglist', $params, ['type' => 'batchquery']);
    }

    /**
     * 查询用户收藏信息.
     *
     * @param array $params
     *
     * @return mixed
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function queryByPage($params)
    {
        return $this->httpPostJson('mall/queryshoppinglist', $params, ['type' => 'getbypage']);
    }

    /**
     * 删除收藏.
     *
     * @param string $openid
     * @param array  $products
     *
     * @return mixed
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($openid, array $products = [])
    {
        if (empty($products)) {
            return $this->httpPostJson('mall/deletebizallshoppinglist', ['user_open_id' => $openid]);
        }

        return $this->httpPostJson('mall/deleteshoppinglist', ['user_open_id' => $openid, 'sku_product_list' => $products]);
    }
}
