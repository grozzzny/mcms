<?php
namespace main\handlers;

use yii\base\Event;

/**
 * Class OrderHandler
 * @package main\handlers
 *
 * @property-read string $adminEmail
 * @property-read string $sender
 */
class OrderHandler extends MailerHandler
{
    public function noticeTest(Event $event)
    {
        $this->send($this->adminEmail, 'TEST', 'notice_test');
    }
}