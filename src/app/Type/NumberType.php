<?php

namespace App\Type;

use App\Interface\DataType;

class NumberType implements DataType
{

    private string $thousandsSeparator;
    private string $decimalSeparator;
    private int $decimals;
    private string $round;
    private bool $decimalsOn;

    public function __construct(
        int $decimals = 2,
        string $decimalSeparator = ',',
        string $thousandsSeparator = ' ',
        bool $decimalsOn = true,
        string $round = ''
    ) {
        $this->decimals = $decimals;
        $this->decimalSeparator = $decimalSeparator;
        $this->thousandsSeparator = $thousandsSeparator;
        $this->decimalsOn = $decimalsOn;
        $this->round = $round;
    }

    public function setDecimals(int $decimals)
    {
        $this->decimals = $decimals;
    }

    public function setDecimalsOn(bool $decimalsOn): void
    {
        $this->decimalsOn = $decimalsOn;
    }

    public function setDecimalSeparator(string $decimalSeparator)
    {
        $this->decimalSeparator = $decimalSeparator;
    }

    public function setThousandsSeparator(string $thousandsSeparator)
    {
        $this->thousandsSeparator = $thousandsSeparator;
    }

    public function setRound(string $round)
    {
        $this->round = $round;
    }

    public function format(string $value): string
    {
        if ($this->decimalsOn) {
            return number_format(
                floatval($value),
                $this->decimals,
                $this->decimalSeparator,
                $this->thousandsSeparator
            );
        } else {
            return number_format(intval($value), 0, '', $this->thousandsSeparator);
        }
    }

    /**
     * Get the value of thousandsSeparator
     */
    public function getThousandsSeparator()
    {
        return $this->thousandsSeparator;
    }

    /**
     * Get the value of decimalSeparator
     */
    public function getDecimalSeparator()
    {
        return $this->decimalSeparator;
    }

    /**
     * Get the value of decimals
     */
    public function getDecimals()
    {
        return $this->decimals;
    }

    /**
     * Get the value of round
     */
    public function getRound()
    {
        return $this->round;
    }

    /**
     * Get the value of decimalsOn
     */
    public function getDecimalsOn()
    {
        return $this->decimalsOn;
    }
}
