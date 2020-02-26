<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Kernel\Messages;

use WeChat\Kernel\Contracts\MediaInterface;
use WeChat\Kernel\Support\Str;

/**
 * Class Media.
 */
class Media extends Message implements MediaInterface
{
    /**
     * Properties.
     *
     * @var array
     */
    protected $properties = ['media_id'];

    /**
     * @var array
     */
    protected $required = [
        'media_id',
    ];

    /**
     * MaterialClient constructor.
     *
     * @param string $mediaId
     * @param string $type
     * @param array  $attributes
     */
    public function __construct(string $mediaId, $type = null, array $attributes = [])
    {
        parent::__construct(array_merge(['media_id' => $mediaId], $attributes));

        !empty($type) && $this->setType($type);
    }

    /**
     * @return string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidArgumentException
     */
    public function getMediaId(): string
    {
        $this->checkRequiredAttributes();

        return $this->get('media_id');
    }

    public function toXmlArray()
    {
        return [
            Str::studly($this->getType()) => [
                'MediaId' => $this->get('media_id'),
            ],
        ];
    }
}
