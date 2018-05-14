<?php

namespace App\Manager;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class UserManager
{
    /**
     * @var EntityManagerInterface
     */
    private $em;
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * UserManager constructor.
     * @param EntityManagerInterface $em
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(EntityManagerInterface $em, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->em = $em;
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @param User $user
     * @return User
     */
    public function create(User $user): User
    {
        $user->setSalt($this->genSalt());

        if (!empty($user->getPassword())) {
            $user->setPassword($this->getEncodedPassword($user, $user->getPassword()));
        }

        return $this->save($user);
    }

    /**
     * @param User $user
     * @return User
     */
    private function save(User $user): User
    {
        $this->em->persist($user);
        $this->em->flush();

        return $user;
    }

    /**
     * @return string
     */
    private function genSalt(): string
    {
        return substr(md5(uniqid('', true)), 0, 10);
    }

    /**
     * @param User $user
     * @param $password
     * @return string
     */
    private function getEncodedPassword(User $user, $password): string
    {
        return $this->passwordEncoder->encodePassword($user, $password);
    }

}
