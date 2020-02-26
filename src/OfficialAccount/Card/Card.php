<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OfficialAccount\Card;

use WeChat\Kernel\Exceptions\InvalidArgumentException;

/**
 * Class Card.
 *
 * @author overtrue <i@overtrue.me>
 *
 * @property \WeChat\OfficialAccount\Card\CodeClient          $code
 * @property \WeChat\OfficialAccount\Card\MeetingTicketClient $meeting_ticket
 * @property \WeChat\OfficialAccount\Card\MemberCardClient    $member_card
 * @property \WeChat\OfficialAccount\Card\GeneralCardClient   $general_card
 * @property \WeChat\OfficialAccount\Card\MovieTicketClient   $movie_ticket
 * @property \WeChat\OfficialAccount\Card\CoinClient          $coin
 * @property \WeChat\OfficialAccount\Card\SubMerchantClient   $sub_merchant
 * @property \WeChat\OfficialAccount\Card\BoardingPassClient  $boarding_pass
 * @property \WeChat\OfficialAccount\Card\JssdkClient         $jssdk
 * @property \WeChat\OfficialAccount\Card\GiftCardClient      $gift_card
 * @property \WeChat\OfficialAccount\Card\GiftCardOrderClient $gift_card_order
 * @property \WeChat\OfficialAccount\Card\GiftCardPageClient  $gift_card_page
 * @property \WeChat\OfficialAccount\Card\InvoiceClient       $invoice
 */
class Card extends Client
{
    /**
     * @param string $property
     *
     * @return mixed
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["card.{$property}"])) {
            return $this->app["card.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No card service named "%s".', $property));
    }
}
