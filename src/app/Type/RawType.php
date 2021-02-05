<?php

declare(strict_types=1);

namespace App\Type;

use App\Interface\DataType;
use Error;

class RawType implements DataType
{

    public function format(string $value): string
    {
        return htmlspecialchars($value);
    }
}
