<?php

declare(strict_types=1);

namespace App\Type;

use App\Interface\DataType;

class LinkType implements DataType
{

    private string $tag;
    private string $color;

    public function __construct(string $tag = 'a', string $color = 'primary')
    {
        $this->tag = $tag;
        $this->color = $color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setTag(string $tag): void
    {
        $this->tag = $tag;
    }

    public function getTag(): string
    {
        return $this->tag;
    }

    public function format(string $value): string
    {

        if ($this->tag === 'a') {
            return '<a href="#" class="text-' . $this->color . '">"' . $value . '"</a>';
        } elseif ($this->tag === 'button') {
            return '<button type="button" class="btn btn-' . $this->color . '">"' . $value . '"</button>';
        }
    }
}
