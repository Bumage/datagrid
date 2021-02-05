<?php

declare(strict_types=1);

namespace App\Interface;

interface DataType
{
    /**
     * Formatuje dane dla danego typu.
     */
    public function format(string $value): string;
}
