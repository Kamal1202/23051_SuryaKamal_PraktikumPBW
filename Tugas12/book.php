<?php
require_once "method.php";
//Membuat object dari class book
$obj_book = new Book();
//Mengambil request client 
$request_method = $_SERVER["REQUEST_METHOD"];

//pengkondisian berdasarkan case request method 
switch ($request_method) {
    case 'GET':
        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);
            $obj_book->get_book($id);
        } else {
            $obj_book->get_books();
        }
        break;

    case 'POST':
        if(!empty($_GET['id'])){
            $id = intval($GET['id']);
            $obj_book->insert_book($id);
        }else {
            $obj_book->insert_book();
        }
        break;

    case 'DELETE':
        if(!empty($_GET['id'])){
            $id = intval($_GET['id']);
            $obj_book->delete_book($id);
        }else{
            header("Content-Type: application/json");
            echo json_encode([
                'status' => 400,
                'message' => 'Bad Request: ID is required for deletion'
            ]);
        }
        break;
        
    default:
        header("Content-Type: application/json");
        echo json_encode([
            'status' => 405,
            'message' => 'Method Not Allowed'
        ]);
        break;
}