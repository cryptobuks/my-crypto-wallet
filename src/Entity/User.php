<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="user")
 */
class User implements UserInterface
{
    const ROLE_USER = 'ROLE_USER';

    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="username", type="string", length=150, unique=true)
     */
    private $username;

    /**
     * @var string
     * @ORM\Column(name="salt", type="string", length=15)
     */
    private $salt;

    /**
     * @var string
     * @ORM\Column(name="password", type="string", length=100)
     */
    private $password;

    /**
     * @var array|Wallet[]|ArrayCollection
     * @ORM\OneToMany(targetEntity="App\Entity\Wallet", mappedBy="user")
     */
    private $wallets;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->wallets = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return $this
     */
    public function setUsername(string $username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string
     */
    public function getSalt(): string
    {
        return $this->salt;
    }

    /**
     * @param string $salt
     *
     * @return $this
     */
    public function setSalt(string $salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return $this
     */
    public function setPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Wallet[]|array|ArrayCollection
     */
    public function getWallets()
    {
        return $this->wallets;
    }

    /**
     * @param Wallet[]|array|ArrayCollection $wallets
     *
     * @return $this
     */
    public function setWallets($wallets)
    {
        $this->wallets = $wallets;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return [self::ROLE_USER];
    }

    /**
     * @return void
     */
    public function eraseCredentials()
    {
    }
}
