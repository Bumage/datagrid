<?php

declare(strict_types=1);

namespace App\Type;

use App\Interface\DataType;

class ImageType implements DataType
{

    private int $imageWidth;
    private int $imageHeight;

    public function __construct(int $imageWidth = 16, int $imageHeight = 16)
    {
        $this->imageWidth = $imageWidth;
        $this->imageHeight = $imageHeight;
    }

    public function format(string $value): string
    {
        return '<img src="' . $value . '" width="' . $this->imageWidth . '" height="' . $this->imageHeight . '" />';
    }
}
