<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OpenPlatform\Component;

use WeChat\Kernel\BaseClient;

/**
 * Class Client.
 *
 * @author dudashuang <dudashuang1222@gmail.com>
 */
class Client extends BaseClient
{
    /**
     * 通过法人微信快速创建小程序.
     *
     * @param array $params
     *
     * @return array
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function registerMiniProgram(array $params)
    {
        return $this->httpPostJson('cgi-bin/component/fastregisterweapp', $params, ['action' => 'create']);
    }

    /**
     * 查询创建任务状态.
     *
     * @param string $companyName
     * @param string $legalPersonaWechat
     * @param string $legalPersonaName
     *
     * @return array
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRegistrationStatus(string $companyName, string $legalPersonaWechat, string $legalPersonaName)
    {
        $params = [
            'name' => $companyName,
            'legal_persona_wechat' => $legalPersonaWechat,
            'legal_persona_name' => $legalPersonaName,
        ];

        return $this->httpPostJson('cgi-bin/component/fastregisterweapp', $params, ['action' => 'search']);
    }
}
