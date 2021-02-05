<?php

declare(strict_types=1);

include __DIR__ . "/vendor/autoload.php";

use App\Controller\{HttpState, HtmlDataGrid, DefaultConfig, ErrorHandler};

try {
    $rows = json_decode(file_get_contents("DataSet.json"), true);
    $state = HttpState::create();
    $dataGrid = new HtmlDataGrid();
    $config = new DefaultConfig();
    $config->addIntColumn('id', '{^[0-9]+$}');
    $config->addCurrencyColumn('balance', 'USD');
    $config->addTextColumn('name', '{^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*}');
    $config->addIntColumn('age', '{^(0?[1-9]|[1-9][0-9])$}');
    $config->addTextColumn('gender', '{^(?:m|M|male|Male|f|F|female|Female)$}');
    $config->addTextColumn('company', '{(?!^\d+$)^.+$}');
    $config->addTextColumn('email', '{^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$}');
    $config->addTextColumn('phone', '{((\(\d{3}\) ?)|(\d{3}-))?\d{3}-\d{4}}');
    $dataGrid->withConfig($config)->render($rows, $state);
} catch (Error $e) {
    ErrorHandler::render($e->getMessage());
}
