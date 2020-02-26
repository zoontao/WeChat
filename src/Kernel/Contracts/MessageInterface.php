<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Kernel\Contracts;

/**
 * Interface MessageInterface.
 *
 * @author overtrue <i@overtrue.me>
 */
interface MessageInterface
{
    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @return array
     */
    public function transformForJsonRequest(): array;

    /**
     * @return string
     */
    public function transformToXml(): string;
}
