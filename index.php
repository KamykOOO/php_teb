<?php

declare(strict_types=1);

namespace App;

include_once('./src/View.php');
include_once('./src/utils/debug.php');

const DEAFULT_ACTION = 'list';
$action = $_GET['action'] ?? DEAFULT_ACTION;

$vievParams = [];

if ($action === 'create') {
    $vievParams['resultCreate'] = 'Tworzymy nową notatkę';
} else {
    $vievParams['resultList'] = 'Wyświetlamy listę notatek';
}



$view = new View();
$view->render($action, $vievParams);
