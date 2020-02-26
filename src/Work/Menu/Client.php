<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Work\Menu;

use WeChat\Kernel\BaseClient;

/**
 * Class Client.
 *
 * @author mingyoung <mingyoungcheung@gmail.com>
 */
class Client extends BaseClient
{
    /**
     * Get menu.
     *
     * @return mixed
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function get()
    {
        return $this->httpGet('cgi-bin/menu/get', ['agentid' => $this->app['config']['agent_id']]);
    }

    /**
     * Create menu for the given agent.
     *
     * @param array $data
     *
     * @return mixed
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(array $data)
    {
        return $this->httpPostJson('cgi-bin/menu/create', $data, ['agentid' => $this->app['config']['agent_id']]);
    }

    /**
     * Delete menu.
     *
     * @return mixed
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function delete()
    {
        return $this->httpGet('cgi-bin/menu/delete', ['agentid' => $this->app['config']['agent_id']]);
    }
}
