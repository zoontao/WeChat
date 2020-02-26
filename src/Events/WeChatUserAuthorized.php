<?php

/*
 * This file is part of the zoontao/wechat.

 */

namespace Zoontao\WeChat\Events;

use Illuminate\Queue\SerializesModels;
use Zoontao\Socialite\User;

class WeChatUserAuthorized
{
    use SerializesModels;

    public $user;

    public $isNewSession;

    public $account;

    /**
     * Create a new event instance.
     *
     * @param \Zoontao\Socialite\User $user
     * @param bool                     $isNewSession
     */
    public function __construct(User $user, $isNewSession = false, string $account)
    {
        $this->user = $user;
        $this->isNewSession = $isNewSession;
        $this->account = $account;
    }

    /**
     * Retrieve the authorized user.
     *
     * @return \Zoontao\Socialite\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * The name of official account.
     *
     * @return string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Check the user session is first created.
     *
     * @return bool
     */
    public function isNewSession()
    {
        return $this->isNewSession;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
