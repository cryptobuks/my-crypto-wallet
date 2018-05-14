<?php

namespace App\WalletProvider;

use App\Contract\WalletProviderInterface;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class EthereumWalletProvider implements WalletProviderInterface
{
    const NAME = 'ethereum';

    /**
     * @return string
     */
    public function getName(): string
    {
        return self::NAME;
    }
}
