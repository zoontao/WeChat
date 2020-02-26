<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Kernel\Events;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class ServerGuardResponseCreated.
 *
 * @author mingyoung <mingyoungcheung@gmail.com>
 */
class ServerGuardResponseCreated
{
    /**
     * @var \Symfony\Component\HttpFoundation\Response
     */
    public $response;

    /**
     * @param \Symfony\Component\HttpFoundation\Response $response
     */
    public function __construct(Response $response)
    {
        $this->response = $response;
    }
}
