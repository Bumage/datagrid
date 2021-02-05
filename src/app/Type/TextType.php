<?php

declare(strict_types=1);

namespace App\Type;

use App\Interface\DataType;

class TextType implements DataType
{
    public function format(string $value): string
    {
        return $value;
    }
}
