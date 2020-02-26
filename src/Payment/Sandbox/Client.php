<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Payment\Sandbox;

use WeChat\Kernel\Traits\InteractsWithCache;
use WeChat\Payment\Kernel\BaseClient;
use WeChat\Payment\Kernel\Exceptions\SandboxException;

/**
 * Class Client.
 *
 * @author mingyoung <mingyoungcheung@gmail.com>
 */
class Client extends BaseClient
{
    use InteractsWithCache;

    /**
     * @return string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \WeChat\Payment\Kernel\Exceptions\SandboxException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws \WeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getKey(): string
    {
        if ($cache = $this->getCache()->get($this->getCacheKey())) {
            return $cache;
        }

        $response = $this->requestArray('sandboxnew/pay/getsignkey');

        if ('SUCCESS' === $response['return_code']) {
            $this->getCache()->set($this->getCacheKey(), $key = $response['sandbox_signkey'], 24 * 3600);

            return $key;
        }

        throw new SandboxException($response['retmsg'] ?? $response['return_msg']);
    }

    /**
     * @return string
     */
    protected function getCacheKey(): string
    {
        return 'easywechat.payment.sandbox.'.md5($this->app['config']->app_id.$this->app['config']['mch_id']);
    }
}
