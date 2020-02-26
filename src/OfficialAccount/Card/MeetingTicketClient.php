<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OfficialAccount\Card;

/**
 * Class MeetingTicketClient.
 *
 * @author overtrue <i@overtrue.me>
 */
class MeetingTicketClient extends Client
{
    /**
     * @param array $params
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateUser(array $params)
    {
        return $this->httpPostJson('card/meetingticket/updateuser', $params);
    }
}
