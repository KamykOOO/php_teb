<?php

declare(strict_types=1);

namespace App;

include_once('./src/View.php');
require_once('./config/config.php');
require_once('./src/Database.php');

class Controller
{
    const DEAFULT_ACTION = 'list';
    private array $request;
    private static $configuration = [];
    private Database $database;
    private View $view;


    public function __construct(array $request)
    {
        $this->request = $request;
        $this->view = new View();
        $this->database = new Database(self::$configuration);
    }


    public static function initConfiguration(array $configuration): void
    {
        self::$configuration = $configuration;
    }

    public function run(): void
    {
        $vievParams = [];

        switch ($this->action()) {
            case 'create':
                $page = 'create';
                $created = false;
                $data = $this->getRequestPost();
                if (!empty($data)) {
                    $vievParams = [
                        'title' => $data['title'],
                        'description' => $data['description'],
                    ];
                    $this->database->createNote($vievParams);
                    header('Location: /');
                }
                $vievParams['created'] = $created;
                break;

            default:
                $page = 'list';
                $vievParams['resultList'] = 'Wyświetlamy listę notatek';
                break;
        }

        $this->view->render($page, $vievParams);
    }
    private function action(): string
    {
        $data = $this->getRequestGet();
        return $data['action'] ?? self::DEAFULT_ACTION;
    }
    private function getRequestPost(): array
    {
        return $this->request['post'] ?? [];
    }
    private function getRequestGet(): array
    {
        return $this->request['get'] ?? [];
    }
}
