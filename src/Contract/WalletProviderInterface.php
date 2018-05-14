<?php

namespace App\Contract;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
interface WalletProviderInterface
{
    /**
     * @return string
     */
    public function getName(): string;
}
