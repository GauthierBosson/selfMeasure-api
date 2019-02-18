<?php
/**
 * Created by PhpStorm.
 * User: gauthierbosson
 * Date: 18/02/2019
 * Time: 10:13
 */

namespace App\EventListener;


use App\Entity\User;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserListener
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    /**
     * UserListener constructor.
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * @ORM\PrePersist()
     * @param User $user
     * @param LifecycleEventArgs $eventArgs
     */
    public function encodePasswordInPersistHandler(User $user, LifecycleEventArgs $eventArgs){
        $user->setPassword($this->encoder->encodePassword($user,$user->getPassword()));
    }

    /**
     * @ORM\PreUpdate()
     * @param User $user
     * @param PreUpdateEventArgs $eventArgs
     */
    public function updatePassword(User $user, PreUpdateEventArgs $eventArgs){
        if($eventArgs->hasChangedField('password')){
            $this->encodePasswordInPersistHandler($user);
        }
    }
}