<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Payment\Bill;

use WeChat\Kernel\Http\StreamResponse;
use WeChat\Payment\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * Download bill history as a table file.
     *
     * @param string $date
     * @param string $type
     * @param array  $optional
     *
     * @return \WeChat\Kernel\Http\StreamResponse|\Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $date, string $type = 'ALL', array $optional = [])
    {
        $params = [
            'appid' => $this->app['config']->app_id,
            'bill_date' => $date,
            'bill_type' => $type,
        ] + $optional;

        $response = $this->requestRaw($this->wrap('pay/downloadbill'), $params);

        if (0 === strpos($response->getBody()->getContents(), '<xml>')) {
            return $this->castResponseToType($response, $this->app['config']->get('response_type'));
        }

        return StreamResponse::buildFromPsrResponse($response);
    }
}
