<?php

declare(strict_types=1);

namespace App\Controller;

use App\Interface\{DataGrid, Config, State};
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class HtmlDataGrid implements DataGrid
{

    private $loader;
    private $twig;
    private $config;

    public function __construct()
    {
        $this->loader = new FilesystemLoader('./src/templates');
        $this->twig = new Environment($this->loader);
    }

    public function withConfig(Config $config): DataGrid
    {
        $this->config = $config;
        return $this;
    }

    public function render(array $rows, State $state): void
    {
        $currentPage = $state->getCurrentPage();
        $orderBy = $state->getOrderBy();
        $isOrderDesc = $state->isOrderDesc();
        $isOrderAsc = $state->isOrderAsc();
        $rowsPerPage = $state->getRowsPerPage();

        $totalPages = ceil(count($rows) / $rowsPerPage);

        $columns = array_column($rows, $orderBy);

        if ($isOrderAsc) {
            array_multisort($columns, SORT_ASC, $rows);
        } elseif ($isOrderDesc) {
            array_multisort($columns, SORT_DESC, $rows);
        }

        $rows = array_slice($rows, ($currentPage - 1) * $rowsPerPage, $rowsPerPage);

        echo $this->twig->render('table.html.twig', [
            'rows' => $rows,
            'columns' => $this->config->getColumns(),
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
            'state' => $state
        ]);
    }
}
