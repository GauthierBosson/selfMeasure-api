<?php
/**
 * Created by PhpStorm.
 * User: gauthierbosson
 * Date: 20/02/2019
 * Time: 12:58
 */

namespace App\EventSubscriber;


use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\User;
use App\Entity\Weight;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

final class AddUserToWeight implements EventSubscriberInterface
{

    private $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {

        $this->tokenStorage = $tokenStorage;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['attachUser', EventPriorities::PRE_WRITE],
        ];
    }

    public function attachUser(GetResponseForControllerResultEvent $event)
    {
        $weight = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if (!$weight instanceof Weight || Request::METHOD_POST !== $method)
        {
            return;
        }

        $token = $this->tokenStorage->getToken();
        if (!$token)
        {
            return;
        }

        $owner = $token->getUser();
        if (!$owner instanceof User)
        {
            return;
        }

        $weight->setUser($owner);
    }

}