<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Work\GroupRobot\Messages;

/**
 * Class News.
 *
 * @author her-cat <i@her-cat.com>
 */
class News extends Message
{
    /**
     * @var string
     */
    protected $type = 'news';

    /**
     * @var array
     */
    protected $properties = ['items'];

    /**
     * News constructor.
     *
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        parent::__construct(compact('items'));
    }

    /**
     * @param array $data
     * @param array $aliases
     *
     * @return array
     */
    public function propertiesToArray(array $data, array $aliases = []): array
    {
        return ['articles' => array_map(function ($item) {
            if ($item instanceof NewsItem) {
                return $item->toJsonArray();
            }
        }, $this->get('items'))];
    }
}
