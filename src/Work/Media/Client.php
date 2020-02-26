<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Work\Media;

use WeChat\Kernel\BaseClient;
use WeChat\Kernel\Http\StreamResponse;

/**
 * Class Client.
 *
 * @author mingyoung <mingyoungcheung@gmail.com>
 */
class Client extends BaseClient
{
    /**
     * Get media.
     *
     * @param string $mediaId
     *
     * @return array|\WeChat\Kernel\Http\Response|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $mediaId)
    {
        $response = $this->requestRaw('cgi-bin/media/get', 'GET', [
            'query' => [
                'media_id' => $mediaId,
            ],
        ]);

        if (false !== stripos($response->getHeaderLine('Content-Type'), 'text/plain')) {
            return $this->castResponseToType($response, $this->app['config']->get('response_type'));
        }

        return StreamResponse::buildFromPsrResponse($response);
    }

    /**
     * Upload Image.
     *
     * @param string $path
     *
     * @return mixed
     */
    public function uploadImage(string $path)
    {
        return $this->upload('image', $path);
    }

    /**
     * Upload Voice.
     *
     * @param string $path
     *
     * @return mixed
     */
    public function uploadVoice(string $path)
    {
        return $this->upload('voice', $path);
    }

    /**
     * Upload Video.
     *
     * @param string $path
     *
     * @return mixed
     */
    public function uploadVideo(string $path)
    {
        return $this->upload('video', $path);
    }

    /**
     * Upload File.
     *
     * @param string $path
     *
     * @return mixed
     */
    public function uploadFile(string $path)
    {
        return $this->upload('file', $path);
    }

    /**
     * Upload media.
     *
     * @param string $type
     * @param string $path
     *
     * @return mixed
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function upload(string $type, string $path)
    {
        $files = [
            'media' => $path,
        ];

        return $this->httpUpload('cgi-bin/media/upload', $files, [], compact('type'));
    }
}
