<?php

declare(strict_types=1);

namespace App\Interface;

interface Config
{
    /**
     * Dodaje nową kolumnę do DataGrid.
     */
    public function addColumn(string $key, Column $column): Config;
    /**
     * Zwraca wszystkie kolumny dla danego DataGrid.
     */
    public function getColumns(): array;
}
