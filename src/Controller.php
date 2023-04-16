<?php

declare(strict_types=1);

namespace App;

include_once('./src/View.php');
require_once('./config/config.php');
require_once('./src/Database.php');

class Controller
{
    const DEAFULT_ACTION = 'list';

    private array $getData;
    private array $postData;
    private static $configuration = [];

    public function __construct(array $getData, array $postData)
    {
        $this->$getData = $getData;
        $this->$postData = $postData;
        $db = new database(self::$configuration);
    }

    public static function initConfiguration(array $configuration): void
    {
        self::$configuration = $configuration;
    }

    public function run(): void
    {
        $action = $_GET['action'] ?? self::DEAFULT_ACTION;
        $view = new View();

        $vievParams = [];

        switch ($action) {
            case 'create':
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
                break;

            default:
                $page = 'list';
                $vievParams['resultList'] = 'Wyświetlamy listę notatek';
                break;
        }

        $view->render($page, $vievParams);
    }
}
