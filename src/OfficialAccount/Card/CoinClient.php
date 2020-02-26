<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OfficialAccount\Card;

use WeChat\Kernel\BaseClient;

/**
 * Class CoinClient.
 *
 * @author overtrue <i@overtrue.me>
 */
class CoinClient extends BaseClient
{
    /**
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function activate()
    {
        return $this->httpGet('card/pay/activate');
    }

    /**
     * @param string $cardId
     * @param int    $quantity
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPrice(string $cardId, int $quantity)
    {
        return $this->httpPostJson('card/pay/getpayprice', [
            'card_id' => $cardId,
            'quantity' => $quantity,
        ]);
    }

    /**
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function summary()
    {
        return $this->httpGet('card/pay/getcoinsinfo');
    }

    /**
     * @param int $count
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function recharge(int $count)
    {
        return $this->httpPostJson('card/pay/recharge', [
            'coin_count' => $count,
        ]);
    }

    /**
     * @param string $orderId
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function order(string $orderId)
    {
        return $this->httpPostJson('card/pay/getorder', ['order_id' => $orderId]);
    }

    /**
     * @param array $filters
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function orders(array $filters)
    {
        return $this->httpPostJson('card/pay/getorderlist', $filters);
    }

    /**
     * @param string $cardId
     * @param string $orderId
     * @param int    $quantity
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function confirm(string $cardId, string $orderId, int $quantity)
    {
        return $this->httpPostJson('card/pay/confirm', [
            'card_id' => $cardId,
            'order_id' => $orderId,
            'quantity' => $quantity,
        ]);
    }
}
