<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Work\GroupRobot;

use WeChat\Kernel\Exceptions\InvalidArgumentException;
use WeChat\Kernel\Exceptions\InvalidConfigException;
use WeChat\Kernel\Exceptions\RuntimeException;
use WeChat\Work\GroupRobot\Messages\Message;
use WeChat\Work\GroupRobot\Messages\Text;

/**
 * Class Messenger.
 *
 * @author her-cat <i@her-cat.com>
 */
class Messenger
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var Message|null
     */
    protected $message;

    /**
     * @var string|null
     */
    protected $groupKey;

    /**
     * Messenger constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string|Message $message
     *
     * @return Messenger
     *
     * @throws InvalidArgumentException
     */
    public function message($message)
    {
        if (is_string($message) || is_numeric($message)) {
            $message = new Text($message);
        }

        if (!($message instanceof  Message)) {
            throw new InvalidArgumentException('Invalid message.');
        }

        $this->message = $message;

        return $this;
    }

    /**
     * @param string $groupKey
     *
     * @return Messenger
     */
    public function toGroup(string $groupKey)
    {
        $this->groupKey = $groupKey;

        return $this;
    }

    /**
     * @param string|Message|null $message
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws RuntimeException
     * @throws InvalidArgumentException
     * @throws InvalidConfigException
     */
    public function send($message = null)
    {
        if ($message) {
            $this->message($message);
        }

        if (empty($this->message)) {
            throw new RuntimeException('No message to send.');
        }

        if (is_null($this->groupKey)) {
            throw new RuntimeException('No group key specified.');
        }

        $message = $this->message->transformForJsonRequest();

        return $this->client->send($this->groupKey, $message);
    }

    /**
     * @param string $property
     *
     * @return mixed
     *
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }

        throw new InvalidArgumentException(sprintf('No property named "%s"', $property));
    }
}
