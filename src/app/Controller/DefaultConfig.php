<?php

declare(strict_types=1);

namespace App\Controller;

use App\Interface\{Config, Column};
use App\Type\{MoneyType, NumberType, TextType};
use App\Model\Col;

class DefaultConfig implements Config
{

    private $columns = [];

    public function addColumn(string $key, Column $column): Config
    {
        $this->columns[$key] = $column;
        return $this;
    }

    public function getColumns(): array
    {
        return $this->columns;
    }

    public function addIntColumn(string $columnName, string $reg = ''): Config
    {
        $intNumber = new NumberType();
        $intNumber->setDecimalsOn(false);

        $newColumn = new Col();
        $newColumn->setReg($reg);

        $column = $newColumn
            ->withLabel($columnName)
            ->withDataType($intNumber)
            ->withAlign("right");

        return $this->addColumn($columnName, $column);
    }

    public function addTextColumn(string $columnName, string $reg = ''): Config
    {
        $newColumn = new Col();
        $newColumn->setReg($reg);

        $column = $newColumn
            ->withLabel($columnName)
            ->withDataType(new TextType())
            ->withAlign("left");

        return $this->addColumn($columnName, $column);
    }

    public function addCurrencyColumn(string $columnName, string $currency, string $reg = ''): Config
    {
        $newColumn = new Col();
        $newColumn->setReg($reg);
        $column = $newColumn
            ->withLabel($columnName)
            ->withDataType(new MoneyType($currency))
            ->withAlign("right");

        return $this->addColumn($columnName, $column);
    }
}
