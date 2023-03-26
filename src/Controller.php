<?php
declare(strict_types=1);

namespace App;

include_once('./src/View.php');

class Controller{
    const DEAFULT_ACTION = 'list';

    private array $getData;
    private array $postData;

public function __construct(array $getData, array $postData)
{
    $this->$getData=$getData;
    $this->$postData=$postData;

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
