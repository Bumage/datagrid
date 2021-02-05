<?php

declare(strict_types=1);

namespace App\Controller;

use App\Interface\State;

class HttpState implements State
{

    public static function create()
    {
        return new HttpState();
    }


    /**
     * Zwraca aktualna strone DataGrid do wyświetlenia
     */
    public function getCurrentPage(): int
    {
        if (isset($_GET['current-page'])) {
            return (int)$_GET['current-page'];
        } else {
            return 1;
        }
    }
    /**
     * Klucz kolumny, po której będzie sortowany DataGrid.
     */
    public function getOrderBy(): string
    {
        if (isset($_GET['order-by'])) {
            return $_GET['order-by'];
        } else {
            return "id";
        }
    }
    /**
     * Czy dane mają zostać posortowane malejąco?
     */
    public function isOrderDesc(): bool
    {
        if (isset($_GET['order-desc'])) {
            return $_GET['order-desc'] === 'true' ? true : false;
        } else {
            return false;
        }
    }
    /**
     * Czy dane mają zostać posortowane rosnąco?
     */
    public function isOrderAsc(): bool
    {
        if (isset($_GET['order-asc'])) {
            return $_GET['order-asc'] === 'true' ? true : false;
        } else {
            return false;
        }
    }
    /**
     * Zwraca ilośc wierszy które mają zostać wyświetlone na jednej stronie.
     */
    public function getRowsPerPage(): int
    {
        /*if (isset($_GET['rowsPerPage'])) {
            return (int)$_GET['rowsPerPage'];
        } else {
            return 5;
        }*/
        return 9;
    }
}
