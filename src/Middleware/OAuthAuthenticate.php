<?php

/*
 * This file is part of the zoontao/wechat.

 */

namespace Zoontao\WeChat\Middleware;

use Closure;
use http\Env\Request;
use Illuminate\Support\Arr;
use Zoontao\WeChat\Events\WeChatUserAuthorized;

/**
 * Class OAuthAuthenticate: 微信公众号, 企业微信的网页应用。
 */
class OAuthAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @param string|null              $scope
     * @param string|null              $type    : service(服务号), subscription(订阅号), work(企业微信)
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $account = 'default', $scope = null, $type = 'service')
    {
        $isNewSession = false;
        //保证兼容性
        $class = ('work' !== $type) ? 'wechat' : 'work';
        $prefix = ('work' !== $type) ? 'official_account' : 'work';
        $sessionKey = \sprintf($class.'.oauth_user.%s', $account);
        $config = config(\sprintf('wechat.'.$prefix.'.%s', $account), []);
        $officialAccount = app(\sprintf('wechat.'.$prefix.'.%s', $account));
        $scope = $scope ?: Arr::get($config, 'oauth.scopes', ['snsapi_base']);

        if (is_string($scope)) {
            $scope = array_map('trim', explode(',', $scope));
        }

        $session = session($sessionKey, []);

        if (!$session) {
            if ($request->has('code')) {
                session([$sessionKey => $officialAccount->oauth->user() ?? []]);
                $isNewSession = true;

                event(new WeChatUserAuthorized(session($sessionKey), $isNewSession, $account));

                return redirect()->to($this->getTargetUrl($request));
            }

            session()->forget($sessionKey);

            return $officialAccount->oauth->scopes($scope)->redirect($request->fullUrl());
        }

        event(new WeChatUserAuthorized(session($sessionKey), $isNewSession, $account));

        return $next($request);
    }

    /**
     * Build the target business url.
     *
     * @param Request $request
     *
     * @return string
     */
    protected function getTargetUrl($request)
    {
        $queries = Arr::except($request->query(), ['code', 'state']);

        return $request->url().(empty($queries) ? '' : '?'.http_build_query($queries));
    }
}
