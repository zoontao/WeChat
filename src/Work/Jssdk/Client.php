<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Work\Jssdk;

use WeChat\BasicService\Jssdk\Client as BaseClient;
use WeChat\Kernel\Exceptions\RuntimeException;

/**
 * Class Client.
 *
 * @author mingyoung <mingyoungcheung@gmail.com>
 */
class Client extends BaseClient
{
    protected $ticketEndpoint = 'https://qyapi.weixin.qq.com/cgi-bin/get_jsapi_ticket';

    /**
     * @return string
     */
    protected function getAppId()
    {
        return $this->app['config']->get('corp_id');
    }

    /**
     * @param bool   $refresh
     * @param string $type
     *
     * @return array|\WeChat\Kernel\Support\Collection|mixed|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws RuntimeException
     * @throws \WeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function getAgentTicket(bool $refresh = false, string $type = 'agent_config')
    {
        $cacheKey = sprintf('wechat.work.jssdk.ticket.%s.%s', $type, $this->getAppId());

        if (!$refresh && $this->getCache()->has($cacheKey)) {
            return $this->getCache()->get($cacheKey);
        }

        /** @var array<string, mixed> $result */
        $result = $this->castResponseToType(
            $this->requestRaw('cgi-bin/ticket/get', 'GET', ['query' => ['type' => $type]]),
            'array'
        );

        $this->getCache()->set($cacheKey, $result, $result['expires_in'] - 500);

        if (!$this->getCache()->has($cacheKey)) {
            throw new RuntimeException('Failed to cache jssdk ticket.');
        }

        return $result;
    }
}
