<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Content-Type: application/json; charset=utf-8');
header('Allow: GET, POST, PUT, DELETE');

require 'productModel.php';
$productModel = new productModel();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $response = $productModel->getProducts();
        echo json_encode($response);
        break;
    case 'POST':
        $POST = json_decode(file_get_contents('php://input', true));
        if (!isset($POST->name)  || is_null($POST->name) || empty(trim($POST->name))) {
            $response = ['error', 'El nombre es requerido'];
            
        } else if (!isset($POST->price) || is_null($POST->price) || empty(trim($POST->price)) || !is_numeric($POST->price)) {
            $response = ['error', 'El precio es requerido y debe ser numerico'];
            
        } else if (!isset($POST->category) || is_null($POST->category) || empty(trim($POST->category))) {
            $response = ['error', 'La categoria es requerida'];
            
        } else if (!isset($POST->description) || is_null($POST->description) || empty(trim($POST->description))) {
            $response = ['error', 'La descripcion es requerida'];
            
        } else if (!isset($POST->image) || is_null($POST->image) || empty(trim($POST->image))  ) {
            $response = ['error', 'La imagen es requerida'];
            
        } else {
            $response = $productModel->saveProducts($POST['name'], $POST['price'], $POST['category'], $POST['description'], $POST['image']);
        }
        echo json_encode($response);
            
        
        break;
    case 'PUT':
        $_PUT = json_decode(file_get_contents('php://input'), true);
        if (!isset($_PUT->id) || is_null($_PUT->id) || empty(trim($_PUT->id))) {
            $response = ['error', 'El id es requerido'];
        }
        else if (!isset($_PUT->name) || is_null($_PUT->name) || empty(trim($_PUT->name))) {
            $response = ['error', 'El nombre es requerido'];
        }
        else if (!isset($_PUT->price) || is_null($_PUT->price) || empty(trim($_PUT->price)) || !is_numeric($_PUT->price)) {
            $response = ['error', 'El precio es requerido y debe ser numerico'];
        }
        else if (!isset($_PUT->category) || is_null($_PUT->category) || empty(trim($_PUT->category))) {
            $response = ['error', 'La categoria es requerida'];
        }
        else if (!isset($_PUT->description) || is_null($_PUT->description) || empty(trim($_PUT->description))) {
            $response = ['error', 'La descripcion es requerida'];
        }
        else if (!isset($_PUT->image) || is_null($_PUT->image) || empty(trim($_PUT->image))) {
            $response = ['error', 'La imagen es requerida'];
        }
        else {
            $response = $productModel->updateProducts($_PUT->id, $_PUT->name, $_PUT->price, $_PUT->category, $_PUT->description, $_PUT->image);
        }
        echo json_encode($response);
        break;
    case 'DELETE':
        $_DELETE = json_decode(file_get_contents('php://input'), true);
        if (!isset($_DELETE->id) || is_null($_DELETE->id) || empty(trim($_DELETE->id))) {
            $response = ['error', 'El id es requerido'];
        }
        else {
            $response = $productModel->deleteProducts($_DELETE->id);
        }
        break;
}

