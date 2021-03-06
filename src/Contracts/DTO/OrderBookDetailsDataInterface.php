<?php

/**
 * @author Marc MOREAU <moreau.marc.web@gmail.com>
 * @license https://github.com/MockingMagician/coinbase-pro-sdk/blob/master/LICENSE.md MIT
 * @link https://github.com/MockingMagician/coinbase-pro-sdk/blob/master/README.md
 */

namespace MockingMagician\CoinbaseProSdk\Contracts\DTO;

interface OrderBookDetailsDataInterface
{
    public function getPrice(): float;

    public function getSize(): float;

    public function getNumOrders(): ?int;

    public function getOrderId(): ?string;
}
