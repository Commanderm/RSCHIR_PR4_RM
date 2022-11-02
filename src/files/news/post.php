<?php

/*http://user1:cisco@localhost/files/news/post.php*/

header('Content-type: json/application'); //указываем, что результат запроса возвращается в формате JSON
require 'functions.php';


$method = $_SERVER['REQUEST_METHOD'];

$mysqli = new mysqli("database", "user", "password", "userDB");

//$q = $_GET['q']; //$_GET, $_POST — суперглобальные переменные
//$params = explode('/', $q);

//$type = $params[0];
//$id = $params[1];

switch ($method) {
	case 'GET':
        if (isset($_GET['id']))
            getPost($mysqli, $_GET['id']);
        else
            getPosts($mysqli);
        break;
	case 'POST':
        $data = file_get_contents('php://input');
        $data = json_decode($data, true);
        addPost($mysqli, $data);
        break;
	case 'PATCH':
        if (isset($_GET['id'])) {
            $data = file_get_contents('php://input');
            $data = json_decode($data, true);
            updatePost($mysqli, $_GET['id'], $data);
        }
        else {
            http_response_code(400);
        }
        break;
	case 'DELETE':
        if (isset($_GET['id'])) {
            deletePost($mysqli, $_GET['id'], $data);
        }
        break;
	default:
		break;
}


?>