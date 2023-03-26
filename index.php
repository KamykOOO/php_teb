<?php

declare(strict_types=1);

namespace App;

include_once('./src/View.php');
include_once('./src/utils/debug.php');

const DEAFULT_ACTION = 'list';
$action = $_GET['action'] ?? DEAFULT_ACTION;

$vievParams = [];

if ($action === 'create') {
    $page = 'create';
    $created = false;

    if (!empty($_POST)) {
        $vievParams = [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
        ];
        $created = true;
    }
    $vievParams['created'] = $created;
} else {
    $page = 'list';
    $vievParams['resultList'] = 'Wyświetlamy listę notatek';
}



$view = new View();
$view->render($page, $vievParams);
