<?php

    require_once 'config/session.php';
    require_once 'config/database.php';
    require_once 'controllers/EmployeeController.php';
    require_once 'controllers/AuthController.php';


    // routing dengan switch case statement
    $action = isset($_GET['action']) ? $_GET['action'] : '';

    $controller = new EmployeeController();
    $authController = new AuthController($pdo);

    switch ($action){
        case 'register':
            $authController->register();
        break;
        case 'login':
            $authController->login();
        break;
        case 'logout' :
            $authController->logout();
            break;
        case 'create':
            $controller->create();
        break;
        case 'store':
            $controller->save();
            break;
        case 'edit':
            $controller->edit($_GET['id']);
            break;
        case 'update':
            $controller->update($_GET['id']);
            break;
        case 'delete':
            $controller->delete($_GET['id']);
            break;
    default:
        $controller->index();
        break;
    }


?>