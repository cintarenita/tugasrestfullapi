<?php

require_once "method.php";
$obj_food = new Food();
$request_method = $_SERVER["REQUEST_METHOD"];
switch ($request_method) { case 'GET':
    if (!empty($_GET["id"])) {
        $id = intval($_GET["id"]);
        $obj_food->get_food($id);
    } else {
        $obj_food->get_foods();
    }
    
    break;
    case 'POST':
        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);
            $obj_food->update_food($id);
        
        } else {
            $obj_food->insert_food();
        }
        break;
        case 'DELETE':
            $id = intval($_GET["id"]);
            $obj_food->delete_food($id);
            break;
        default:
        header("HTTP/1.0 405 Method Not Allowed");
        break; }