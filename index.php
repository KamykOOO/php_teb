<?php

declare(strict_types=1);

namespace App;

require_once('./exception/AppException.php');
include_once('./src/Controller.php');
include_once('./src/utils/debug.php');
require_once('./config/config.php');

try {
    Controller::initConfiguration($configuration);
    $controller = new Controller($_GET, $_POST);
    $controller->run();
} catch (AppException $e) {
    echo "<h1>Wystąpił błąd w aplikacji</h1>";
    echo '<h3>' . $e->getMessage() . '<h3>';
}
