<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 * @ORM\Entity(repositoryClass="App\Repository\WalletRepository")
 * @ORM\Table(name="wallet")
 */
class Wallet
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column()
     */
    private $id;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="wallets")
     * @ORM\JoinColumn(name="user_id", onDelete="CASCADE")
     */
    private $user;

    /**
     * @var string
     * @ORM\Column(name="provider", type="string", length=150)
     */
    private $provider;

    /**
     * @var string
     * @ORM\Column(name="address", type="string", length=150)
     */
    private $address;

    /**
     * @var string
     * @ORM\Column(name="source", type="text")
     */
    private $source;

    /**
     * @var string
     * @ORM\Column(name="title", type="string", length=150)
     */
    private $title;

    /**
     * @var float
     * @ORM\Column(name="balance", type="float")
     */
    private $balance = 0;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     *
     * @return $this
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return string
     */
    public function getProvider(): string
    {
        return $this->provider;
    }

    /**
     * @param string $provider
     *
     * @return $this
     */
    public function setProvider(string $provider)
    {
        $this->provider = $provider;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     *
     * @return $this
     */
    public function setAddress(string $address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @param string $source
     *
     * @return $this
     */
    public function setSource(string $source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return float
     */
    public function getBalance(): float
    {
        return $this->balance;
    }

    /**
     * @param float $balance
     *
     * @return $this
     */
    public function setBalance(float $balance)
    {
        $this->balance = $balance;

        return $this;
    }
}
