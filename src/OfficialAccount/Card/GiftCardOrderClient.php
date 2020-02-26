<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OfficialAccount\Card;

use WeChat\Kernel\BaseClient;

/**
 * Class GiftCardOrderClient.
 *
 * @author overtrue <i@overtrue.me>
 */
class GiftCardOrderClient extends BaseClient
{
    /**
     * 查询-单个礼品卡订单信息接口.
     *
     * @param string $orderId
     *
     * @return mixed
     */
    public function get(string $orderId)
    {
        $params = [
            'order_id' => $orderId,
        ];

        return $this->httpPostJson('card/giftcard/order/get', $params);
    }

    /**
     * 查询-批量查询礼品卡订单信息接口.
     *
     * @param int    $beginTime
     * @param int    $endTime
     * @param int    $offset
     * @param int    $count
     * @param string $sortType
     *
     * @return mixed
     */
    public function list(int $beginTime, int $endTime, int $offset = 0, int $count = 10, string $sortType = 'ASC')
    {
        $params = [
            'begin_time' => $beginTime,
            'end_time' => $endTime,
            'sort_type' => $sortType,
            'offset' => $offset,
            'count' => $count,
        ];

        return $this->httpPostJson('card/giftcard/order/batchget', $params);
    }

    /**
     * 退款接口.
     *
     * @param string $orderId
     *
     * @return mixed
     */
    public function refund(string $orderId)
    {
        $params = [
            'order_id' => $orderId,
        ];

        return $this->httpPostJson('card/giftcard/order/refund', $params);
    }
}
