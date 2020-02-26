<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Work\GroupRobot\Messages;

/**
 * Class NewsItem.
 *
 * @author her-cat <i@her-cat.com>
 */
class NewsItem extends Message
{
    /**
     * @var string
     */
    protected $type = 'news';

    /**
     * @var array
     */
    protected $properties = [
        'title',
        'description',
        'url',
        'image',
    ];

    public function toJsonArray()
    {
        return [
            'title' => $this->get('title'),
            'description' => $this->get('description'),
            'url' => $this->get('url'),
            'picurl' => $this->get('image'),
        ];
    }
}
