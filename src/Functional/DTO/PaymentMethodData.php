<?php


namespace MockingMagician\CoinbaseProSdk\Functional\DTO;


use MockingMagician\CoinbaseProSdk\Contracts\DTO\PaymentMethodDataInterface;
use MockingMagician\CoinbaseProSdk\Contracts\DTO\PaymentMethodLimitsDataInterface;

class PaymentMethodData implements PaymentMethodDataInterface
{
    /**
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $type;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $currency;
    /**
     * @var bool
     */
    private $primary_buy;
    /**
     * @var bool
     */
    private $primary_sell;
    /**
     * @var bool
     */
    private $allow_buy;
    /**
     * @var bool
     */
    private $allow_sell;
    /**
     * @var bool
     */
    private $allow_deposit;
    /**
     * @var bool
     */
    private $allow_withdraw;
    /**
     * @var PaymentMethodLimitsDataInterface
     */
    private $limits;

    public function __construct(
        string $id,
        string $type,
        string $name,
        string $currency,
        bool $primary_buy,
        bool $primary_sell,
        bool $allow_buy,
        bool $allow_sell,
        bool $allow_deposit,
        bool $allow_withdraw,
        PaymentMethodLimitsDataInterface $limits
    ) {
        $this->id = $id;
        $this->type = $type;
        $this->name = $name;
        $this->currency = $currency;
        $this->primary_buy = $primary_buy;
        $this->primary_sell = $primary_sell;
        $this->allow_buy = $allow_buy;
        $this->allow_sell = $allow_sell;
        $this->allow_deposit = $allow_deposit;
        $this->allow_withdraw = $allow_withdraw;
        $this->limits = $limits;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return bool
     */
    public function isPrimaryBuy(): bool
    {
        return $this->primary_buy;
    }

    /**
     * @return bool
     */
    public function isPrimarySell(): bool
    {
        return $this->primary_sell;
    }

    /**
     * @return bool
     */
    public function isAllowBuy(): bool
    {
        return $this->allow_buy;
    }

    /**
     * @return bool
     */
    public function isAllowSell(): bool
    {
        return $this->allow_sell;
    }

    /**
     * @return bool
     */
    public function isAllowDeposit(): bool
    {
        return $this->allow_deposit;
    }

    /**
     * @return bool
     */
    public function isAllowWithdraw(): bool
    {
        return $this->allow_withdraw;
    }

    /**
     * @return PaymentMethodLimitsDataInterface
     */
    public function getLimits(): PaymentMethodLimitsDataInterface
    {
        return $this->limits;
    }

    public static function createCollectionFromJson(string $json)
    {
        $collection = json_decode($json, true);
        foreach ($collection as $k => $value) {
            $collection[$k] = new PaymentMethodData(
                $value['id'],
                $value['type'],
                $value['name'],
                $value['currency'],
                $value['primary_buy'],
                $value['primary_sell'],
                $value['allow_buy'],
                $value['allow_sell'],
                $value['allow_deposit'],
                $value['allow_withdraw'],
                PaymentMethodLimitsData::createFromArray($value['limits'])
            );
        }

        return $collection;
    }
}