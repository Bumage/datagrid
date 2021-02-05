<?php

declare(strict_types=1);

namespace App\Type;

use App\Interface\DataType;
use Error;

class DateType implements DataType
{

    private string $dateFormat;

    public function __construct(string $dateFormat = 'Y-m-d')
    {
        $this->dateFormat = $dateFormat;
    }

    public function setDateFormat(string $dateFormat): void
    {
        $this->dateFormat = $dateFormat;
    }

    public function getDateFormat(): string
    {
        return $this->dateFormat;
    }

    public function format(string $value): string
    {
        $date = date_create($value);
        return date_format($date, $this->dateFormat);
    }
}
