<?php

declare(strict_types=1);

namespace App\Type;

use App\Interface\DataType;
use App\Type\NumberType;
use Error;

class MoneyType extends NumberType implements DataType
{

    private string $currency;

    public function __construct(
        string $currency = 'USD',
        int $decimals = 2,
        string $decimalSeparator = ',',
        string $thousandsSeparator = ' ',
        bool $decimalsOn = true,
        string $round = ""
    ) {
        if ($currency !== 'PLN' && $currency !== 'USD' && $currency !== 'BHD') {
            throw new Error('Wrong currency');
        }

        parent::__construct($decimals, $decimalSeparator, $thousandsSeparator, $decimalsOn, $round);
        $this->currency = $currency;
    }

    public function format(string $value): string
    {
        return parent::format($value) . '<br/>' . $this->currency;
    }

    /**
     * Get the value of currency
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * Set the value of currency
     *
     * @return  self
     */
    public function setCurrency(string $currency)
    {
        if ($currency !== 'PLN' && $currency !== 'USD' && $currency !== 'BHD') {
            throw new Error('Wrong currency');
        }
        $this->currency = $currency;

        return $this;
    }
}
