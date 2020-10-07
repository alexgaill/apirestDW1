<?php

$page = ucfirst($_GET["page"]);
require $page.".php";
$class = new $page();
$method = $_GET["method"];



switch ($_SERVER["REQUEST_METHOD"]) {
    case 'GET':
        if (key_exists("id", $_GET)) {
            $class->getOne($_GET["id"]);
        } else {
            $class->getAll();
        }
        break;
    case 'POST':
        if ($page === "Client" && $method === "connexion") {
            $class->connexion($_POST);
        } else {
            $class->save($_POST);
        }

    break;
    case 'PUT':
        $class->put($_GET["id"], file_get_contents("php://input"));
    break;
    case 'DELETE':
        $class->delete($_GET["id"],);
    break;

    default:
        # code...
        break;
}
