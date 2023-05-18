<?php

declare(strict_types=1);

namespace App\Controller;

use App\Request;
use App\database;
use App\View;

abstract class AbstractController
{
    const DEAFULT_ACTION = 'list';
    protected Request $request;
    protected static $configuration = [];
    protected Database $database;
    protected View $view;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->view = new View();
        $this->database = new database(self::$configuration);
    }

    public static function initConfiguration(array $configuration): void
    {
        self::$configuration = $configuration;
    }

    public function run(): void
    {
        $action = $this->action() . 'Action';
        if (!method_exists($this, $action)) {
            $action = self::DEAFULT_ACTION . 'Action';
        }
        $this->$action();
    }

    protected function action(): string
    {
        return $this->request->getParam('action') ?? self::DEAFULT_ACTION;
    }

    protected function redirect(string $to, array $params)
    {
        $location = $to;
        if (count($params)) {
            $queryParams = [];
            foreach ($params as $key => $value) {
                $queryParams[] = urlencode($key) . '=' . urlencode($value);
            }
            $queryParams = implode('&', $queryParams);
            $location .= '?' . $queryParams;
        }
        header("Location: $location");
        exit;
    }
}
