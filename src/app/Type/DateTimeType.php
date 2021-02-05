<?php

declare(strict_types=1);

namespace App\Type;

use App\Interface\DataType;

class DateTimeType implements DataType
{

    private string $dateTimeFormat;

    public function __construct(string $dateTimeFormat = 'Y-m-d H:i:s')
    {
        $this->dateTimeFormat = $dateTimeFormat;
    }

    public function setDateTimeFormat(string $dateTimeFormat): void
    {
        $this->dateTimeFormat = $dateTimeFormat;
    }

    public function getDateTimeFormat(): string
    {
        return $this->dateTimeFormat;
    }

    public function format(string $value): string
    {
        $date = date_create($value);
        return date_format($date, $this->dateTimeFormat);
    }
}
