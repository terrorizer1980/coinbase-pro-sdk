<?php

/**
 * @author Marc MOREAU <moreau.marc.web@gmail.com>
 * @license https://github.com/MockingMagician/coinbase-pro-sdk/blob/master/LICENSE.md MIT
 * @link https://github.com/MockingMagician/coinbase-pro-sdk/blob/master/README.md
 */

namespace MockingMagician\CoinbaseProSdk\Functional\DTO;

use MockingMagician\CoinbaseProSdk\Contracts\DTO\FeeDataInterface;

class FeeData extends AbstractCreator implements FeeDataInterface
{
    /**
     * @var float
     */
    private $makerFeeRate;
    /**
     * @var float
     */
    private $takerFeeRate;
    /**
     * @var null|float
     */
    private $usdVolume;

    public function __construct(float $makerFeeRate, float $takerFeeRate, ?float $usdVolume)
    {
        $this->makerFeeRate = $makerFeeRate;
        $this->takerFeeRate = $takerFeeRate;
        $this->usdVolume = $usdVolume;
    }

    public function getMakerFeeRate(): float
    {
        return $this->makerFeeRate;
    }

    public function getTakerFeeRate(): float
    {
        return $this->takerFeeRate;
    }

    public function getUsdVolume(): ?float
    {
        return $this->usdVolume;
    }

    public static function createFromArray(array $array, ...$extraData)
    {
        return new static($array['maker_fee_rate'], $array['taker_fee_rate'], $array['usd_volume']);
    }
}
