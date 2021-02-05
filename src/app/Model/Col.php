<?php

declare(strict_types=1);

namespace App\Model;

use App\Interface\{Column, DataType};

class Col implements Column
{
    private string $reg;
    private string $label;
    private DataType $dataType;
    private string $align;

    public function __construct()
    {
        $this->reg = '';
    }


    public function withLabel(string $label): Column
    {
        $this->label = $label;
        return $this;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * Ustawia typ danych dla kolumny.
     */
    public function withDataType(DataType $type): Column
    {
        $this->dataType = $type;
        return $this;
    }

    public function getDataType(): DataType
    {
        return $this->dataType;
    }

    /**
     * Ustawienie wyrównania treści znajdujących się w kolumnie.
     */
    public function withAlign(string $align): Column
    {
        $this->align = $align;
        return $this;
    }

    public function getAlign(): string
    {
        return $this->align;
    }

    public function getReg(): string
    {
        return $this->reg;
    }

    public function setReg(string $reg): Column
    {
        $this->reg = $reg;

        return $this;
    }
}
