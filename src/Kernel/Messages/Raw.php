<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Kernel\Messages;

/**
 * Class Raw.
 */
class Raw extends Message
{
    /**
     * @var string
     */
    protected $type = 'raw';

    /**
     * Properties.
     *
     * @var array
     */
    protected $properties = ['content'];

    /**
     * Constructor.
     *
     * @param string $content
     */
    public function __construct(string $content)
    {
        parent::__construct(['content' => strval($content)]);
    }

    /**
     * @param array $appends
     * @param bool  $withType
     *
     * @return array
     */
    public function transformForJsonRequest(array $appends = [], $withType = true): array
    {
        return json_decode($this->content, true) ?? [];
    }

    public function __toString()
    {
        return $this->get('content') ?? '';
    }
}
