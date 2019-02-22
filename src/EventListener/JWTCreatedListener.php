<?php
/**
 * Created by PhpStorm.
 * User: gauthierbosson
 * Date: 12/02/2019
 * Time: 23:26
 */

namespace App\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;


class JWTCreatedListener
{

    public function onJwtCreated(JWTCreatedEvent $event): void
    {
        $user = $event->getUser();

        $payload = $event->getData();
        $payload['id'] = $user->getId();

        $event->setData($payload);
    }
}