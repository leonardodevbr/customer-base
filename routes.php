<?php

use \App\Controller;

$controller = new Controller();
$id = id();

switch (action()) {
    case 'create':
        return $controller->create();
    case 'store':
        return $controller->store();
    case 'update':
        return $controller->update();
    case 'edit':
        if (isset($id)) {
            return $controller->edit($id);
        }
        include_once 'views/404.php';
        break;
    case 'delete':
        if (isset($id)) {
            return $controller->delete($id);
        }
        include_once 'views/404.php';
        break;
    case '':
        return $controller->list();
    default:
        include_once 'views/404.php';
}
