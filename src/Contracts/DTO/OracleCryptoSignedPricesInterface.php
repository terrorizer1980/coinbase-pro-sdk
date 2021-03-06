<?php

/**
 * @author Marc MOREAU <moreau.marc.web@gmail.com>
 * @license https://github.com/MockingMagician/coinbase-pro-sdk/blob/master/LICENSE.md MIT
 * @link https://github.com/MockingMagician/coinbase-pro-sdk/blob/master/README.md
 */

namespace MockingMagician\CoinbaseProSdk\Contracts\DTO;

/**
 * Class OracleCryptoSignedPricesInterface.
 */
interface OracleCryptoSignedPricesInterface
{
    public function getTimestamp(): int;

    public function getMessages(): array;

    public function getSignatures(): array;

    public function getPrices(): array;
}
