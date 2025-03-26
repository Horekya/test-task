<?php

namespace App\Services\Interfaces;

interface NotificationServiceInterface
{
    function notify(string $event, array $data);
    function makeNotificationEvent(string $event, array $data);
}
