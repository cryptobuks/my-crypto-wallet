<?php

namespace App\Service;

use App\Contract\WalletProviderInterface;
use App\Exception\WalletProviderNotFound;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class WalletProviderService
{
    /**
     * @var array|WalletProviderInterface[]
     */
    private $providers;

    /**
     * @param WalletProviderInterface $provider
     */
    public function connectProvider(WalletProviderInterface $provider)
    {
        $this->providers[$provider->getName()] = $provider;
    }

    /**
     * @param string $name
     * @return WalletProviderInterface
     * @throws WalletProviderNotFound
     */
    public function getProviderByName(string $name): WalletProviderInterface
    {
        if (!isset($this->providers[$name])) {
            throw new WalletProviderNotFound(sprintf('Wallet provider with name %s not found', $name));
        }

        return $this->providers[$name];
    }
}
