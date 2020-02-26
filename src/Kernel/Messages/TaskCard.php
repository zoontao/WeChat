<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Kernel\Messages;

/**
 * Class TaskCard.
 *
 * @property string $title
 * @property string $description
 * @property string $url
 * @property string $task_id
 * @property array  $btn
 */
class TaskCard extends Message
{
    /**
     * Messages type.
     *
     * @var string
     */
    protected $type = 'taskcard';

    /**
     * Properties.
     *
     * @var array
     */
    protected $properties = [
        'title',
        'description',
        'url',
        'task_id',
        'btn',
    ];
}
