<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\MiniProgram\DataCube;

use WeChat\Kernel\BaseClient;

/**
 * Class Client.
 *
 * @author mingyoung <mingyoungcheung@gmail.com>
 */
class Client extends BaseClient
{
    /**
     * Get summary trend.
     *
     * @param string $from
     * @param string $to
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     */
    public function summaryTrend(string $from, string $to)
    {
        return $this->query('datacube/getweanalysisappiddailysummarytrend', $from, $to);
    }

    /**
     * Get daily visit trend.
     *
     * @param string $from
     * @param string $to
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     */
    public function dailyVisitTrend(string $from, string $to)
    {
        return $this->query('datacube/getweanalysisappiddailyvisittrend', $from, $to);
    }

    /**
     * Get weekly visit trend.
     *
     * @param string $from
     * @param string $to
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     */
    public function weeklyVisitTrend(string $from, string $to)
    {
        return $this->query('datacube/getweanalysisappidweeklyvisittrend', $from, $to);
    }

    /**
     * Get monthly visit trend.
     *
     * @param string $from
     * @param string $to
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     */
    public function monthlyVisitTrend(string $from, string $to)
    {
        return $this->query('datacube/getweanalysisappidmonthlyvisittrend', $from, $to);
    }

    /**
     * Get visit distribution.
     *
     * @param string $from
     * @param string $to
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     */
    public function visitDistribution(string $from, string $to)
    {
        return $this->query('datacube/getweanalysisappidvisitdistribution', $from, $to);
    }

    /**
     * Get daily retain info.
     *
     * @param string $from
     * @param string $to
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     */
    public function dailyRetainInfo(string $from, string $to)
    {
        return $this->query('datacube/getweanalysisappiddailyretaininfo', $from, $to);
    }

    /**
     * Get weekly retain info.
     *
     * @param string $from
     * @param string $to
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     */
    public function weeklyRetainInfo(string $from, string $to)
    {
        return $this->query('datacube/getweanalysisappidweeklyretaininfo', $from, $to);
    }

    /**
     * Get monthly retain info.
     *
     * @param string $from
     * @param string $to
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     */
    public function monthlyRetainInfo(string $from, string $to)
    {
        return $this->query('datacube/getweanalysisappidmonthlyretaininfo', $from, $to);
    }

    /**
     * Get visit page.
     *
     * @param string $from
     * @param string $to
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     */
    public function visitPage(string $from, string $to)
    {
        return $this->query('datacube/getweanalysisappidvisitpage', $from, $to);
    }

    /**
     * Get user portrait.
     *
     * @param string $from
     * @param string $to
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     */
    public function userPortrait(string $from, string $to)
    {
        return $this->query('datacube/getweanalysisappiduserportrait', $from, $to);
    }

    /**
     * Unify query.
     *
     * @param string $api
     * @param string $from
     * @param string $to
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function query(string $api, string $from, string $to)
    {
        $params = [
            'begin_date' => $from,
            'end_date' => $to,
        ];

        return $this->httpPostJson($api, $params);
    }
}
