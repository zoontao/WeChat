<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OfficialAccount\ShakeAround;

use WeChat\Kernel\BaseClient;

/**
 * Class PageClient.
 *
 * @author allen05ren <allen05ren@outlook.com>
 */
class PageClient extends BaseClient
{
    /**
     * @param array $data
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(array $data)
    {
        return $this->httpPostJson('shakearound/page/add', $data);
    }

    /**
     * @param int   $pageId
     * @param array $data
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update(int $pageId, array $data)
    {
        return $this->httpPostJson('shakearound/page/update', array_merge(['page_id' => $pageId], $data));
    }

    /**
     * Fetch batch of pages by pageIds.
     *
     * @param array $pageIds
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listByIds(array $pageIds)
    {
        $params = [
            'type' => 1,
            'page_ids' => $pageIds,
        ];

        return $this->httpPostJson('shakearound/page/search', $params);
    }

    /**
     * Pagination to get batch of pages.
     *
     * @param int $begin
     * @param int $count
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list(int $begin, int $count)
    {
        $params = [
            'type' => 2,
            'begin' => $begin,
            'count' => $count,
        ];

        return $this->httpPostJson('shakearound/page/search', $params);
    }

    /**
     * delete a page.
     *
     * @param int $pageId
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete(int $pageId)
    {
        $params = [
            'page_id' => $pageId,
        ];

        return $this->httpPostJson('shakearound/page/delete', $params);
    }
}
