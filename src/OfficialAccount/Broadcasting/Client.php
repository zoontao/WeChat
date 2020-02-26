<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OfficialAccount\Broadcasting;

use WeChat\Kernel\BaseClient;
use WeChat\Kernel\Contracts\MessageInterface;
use WeChat\Kernel\Exceptions\RuntimeException;
use WeChat\Kernel\Messages\Card;
use WeChat\Kernel\Messages\Image;
use WeChat\Kernel\Messages\Media;
use WeChat\Kernel\Messages\Text;
use WeChat\Kernel\Support\Arr;

/**
 * Class Client.
 *
 * @method \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string previewTextByName($text, $name);
 * @method \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string previewNewsByName($mediaId, $name);
 * @method \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string previewVoiceByName($mediaId, $name);
 * @method \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string previewImageByName($mediaId, $name);
 * @method \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string previewVideoByName($message, $name);
 * @method \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string previewCardByName($cardId, $name);
 *
 * @author overtrue <i@overtrue.me>
 */
class Client extends BaseClient
{
    const PREVIEW_BY_OPENID = 'touser';
    const PREVIEW_BY_NAME = 'towxname';

    /**
     * Send a message.
     *
     * @param array $message
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \WeChat\Kernel\Exceptions\RuntimeException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send(array $message)
    {
        if (empty($message['filter']) && empty($message['touser'])) {
            throw new RuntimeException('The message reception object is not specified');
        }

        $api = Arr::get($message, 'touser') ? 'cgi-bin/message/mass/send' : 'cgi-bin/message/mass/sendall';

        return $this->httpPostJson($api, $message);
    }

    /**
     * Preview a message.
     *
     * @param array $message
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function preview(array $message)
    {
        return $this->httpPostJson('cgi-bin/message/mass/preview', $message);
    }

    /**
     * Delete a broadcast.
     *
     * @param string $msgId
     * @param int    $index
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete(string $msgId, int $index = 0)
    {
        $options = [
            'msg_id' => $msgId,
            'article_idx' => $index,
        ];

        return $this->httpPostJson('cgi-bin/message/mass/delete', $options);
    }

    /**
     * Get a broadcast status.
     *
     * @param string $msgId
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function status(string $msgId)
    {
        $options = [
            'msg_id' => $msgId,
        ];

        return $this->httpPostJson('cgi-bin/message/mass/get', $options);
    }

    /**
     * Send a text message.
     *
     * @param string $message
     * @param mixed  $reception
     * @param array  $attributes
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \WeChat\Kernel\Exceptions\RuntimeException
     */
    public function sendText(string $message, $reception = null, array $attributes = [])
    {
        return $this->sendMessage(new Text($message), $reception, $attributes);
    }

    /**
     * Send a news message.
     *
     * @param string $mediaId
     * @param mixed  $reception
     * @param array  $attributes
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \WeChat\Kernel\Exceptions\RuntimeException
     */
    public function sendNews(string $mediaId, $reception = null, array $attributes = [])
    {
        return $this->sendMessage(new Media($mediaId, 'mpnews'), $reception, $attributes);
    }

    /**
     * Send a voice message.
     *
     * @param string $mediaId
     * @param mixed  $reception
     * @param array  $attributes
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \WeChat\Kernel\Exceptions\RuntimeException
     */
    public function sendVoice(string $mediaId, $reception = null, array $attributes = [])
    {
        return $this->sendMessage(new Media($mediaId, 'voice'), $reception, $attributes);
    }

    /**
     * Send a image message.
     *
     * @param string $mediaId
     * @param mixed  $reception
     * @param array  $attributes
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \WeChat\Kernel\Exceptions\RuntimeException
     */
    public function sendImage(string $mediaId, $reception = null, array $attributes = [])
    {
        return $this->sendMessage(new Image($mediaId), $reception, $attributes);
    }

    /**
     * Send a video message.
     *
     * @param string $mediaId
     * @param mixed  $reception
     * @param array  $attributes
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \WeChat\Kernel\Exceptions\RuntimeException
     */
    public function sendVideo(string $mediaId, $reception = null, array $attributes = [])
    {
        return $this->sendMessage(new Media($mediaId, 'mpvideo'), $reception, $attributes);
    }

    /**
     * Send a card message.
     *
     * @param string $cardId
     * @param mixed  $reception
     * @param array  $attributes
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \WeChat\Kernel\Exceptions\RuntimeException
     */
    public function sendCard(string $cardId, $reception = null, array $attributes = [])
    {
        return $this->sendMessage(new Card($cardId), $reception, $attributes);
    }

    /**
     * Preview a text message.
     *
     * @param string $message   message
     * @param string $reception
     * @param string $method
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\RuntimeException
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function previewText(string $message, $reception, $method = self::PREVIEW_BY_OPENID)
    {
        return $this->previewMessage(new Text($message), $reception, $method);
    }

    /**
     * Preview a news message.
     *
     * @param string $mediaId   message
     * @param string $reception
     * @param string $method
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\RuntimeException
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function previewNews(string $mediaId, $reception, $method = self::PREVIEW_BY_OPENID)
    {
        return $this->previewMessage(new Media($mediaId, 'mpnews'), $reception, $method);
    }

    /**
     * Preview a voice message.
     *
     * @param string $mediaId   message
     * @param string $reception
     * @param string $method
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\RuntimeException
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function previewVoice(string $mediaId, $reception, $method = self::PREVIEW_BY_OPENID)
    {
        return $this->previewMessage(new Media($mediaId, 'voice'), $reception, $method);
    }

    /**
     * Preview a image message.
     *
     * @param string $mediaId   message
     * @param string $reception
     * @param string $method
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\RuntimeException
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function previewImage(string $mediaId, $reception, $method = self::PREVIEW_BY_OPENID)
    {
        return $this->previewMessage(new Image($mediaId), $reception, $method);
    }

    /**
     * Preview a video message.
     *
     * @param string $mediaId   message
     * @param string $reception
     * @param string $method
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\RuntimeException
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function previewVideo(string $mediaId, $reception, $method = self::PREVIEW_BY_OPENID)
    {
        return $this->previewMessage(new Media($mediaId, 'mpvideo'), $reception, $method);
    }

    /**
     * Preview a card message.
     *
     * @param string $cardId    message
     * @param string $reception
     * @param string $method
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\RuntimeException
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function previewCard(string $cardId, $reception, $method = self::PREVIEW_BY_OPENID)
    {
        return $this->previewMessage(new Card($cardId), $reception, $method);
    }

    /**
     * @param \WeChat\Kernel\Contracts\MessageInterface $message
     * @param string                                        $reception
     * @param string                                        $method
     *
     * @return mixed
     *
     * @throws \WeChat\Kernel\Exceptions\RuntimeException
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function previewMessage(MessageInterface $message, string $reception, $method = self::PREVIEW_BY_OPENID)
    {
        $message = (new MessageBuilder())->message($message)->buildForPreview($method, $reception);

        return $this->preview($message);
    }

    /**
     * @param \WeChat\Kernel\Contracts\MessageInterface $message
     * @param mixed                                         $reception
     * @param array                                         $attributes
     *
     * @return mixed
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \WeChat\Kernel\Exceptions\RuntimeException
     */
    public function sendMessage(MessageInterface $message, $reception = null, $attributes = [])
    {
        $message = (new MessageBuilder())->message($message)->with($attributes)->toAll();

        if (\is_int($reception)) {
            $message->toTag($reception);
        } elseif (\is_array($reception)) {
            $message->toUsers($reception);
        }

        return $this->send($message->build());
    }

    /**
     * @codeCoverageIgnore
     *
     * @param string $method
     * @param array  $args
     *
     * @return mixed
     */
    public function __call($method, $args)
    {
        if (strpos($method, 'ByName') > 0) {
            $method = strstr($method, 'ByName', true);

            if (method_exists($this, $method)) {
                array_push($args, self::PREVIEW_BY_NAME);

                return $this->$method(...$args);
            }
        }

        throw new \BadMethodCallException(sprintf('Method %s not exists.', $method));
    }
}
