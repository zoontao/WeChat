<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Payment\Notify;

use Closure;
use WeChat\Kernel\Support\XML;

class Refunded extends Handler
{
    protected $check = false;

    /**
     * @param \Closure $closure
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \WeChat\Kernel\Exceptions\Exception
     */
    public function handle(Closure $closure)
    {
        $this->strict(
            \call_user_func($closure, $this->getMessage(), $this->reqInfo(), [$this, 'fail'])
        );

        return $this->toResponse();
    }

    /**
     * Decrypt the `req_info` from request message.
     *
     * @return array
     *
     * @throws \WeChat\Kernel\Exceptions\Exception
     */
    public function reqInfo()
    {
        return XML::parse($this->decryptMessage('req_info'));
    }
}
