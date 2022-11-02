<?php

# GET
# http://user1:cisco@localhost/files/news/index.php/posts
# http://user1:cisco@localhost/files/news/index.php/posts/2



/*{
    "title" : "TYDU", 
    "p_date" : "12/12/12"
}*/




function getPosts ($mysqli) {
	$postsList = [];

	$posts = $mysqli->query("SELECT * FROM posts"); //выборка всех постов

	// создаем массив постов 
	while($post = mysqli_fetch_assoc($posts)) {
		$postsList[] = $post;
	}

	echo json_encode($postsList);

}

function getPost ($mysqli, $id) { 
	$post = $mysqli->query("SELECT * FROM posts WHERE id = $id"); //выборка всех постов

	if (mysqli_num_rows($post) === 0) { // когда передан id несуществующего поста
		http_response_code(404);
		$res = [
			"status" => false, 
			"message" => "Post not found"
		];
		echo json_encode($res);

	}
	else {
		$post = mysqli_fetch_assoc($post); //создание ассоциативного массива
		echo json_encode($post);
	}
	
}

function addPost ($mysqli, $data) {
	$title = $data['title'];
	$p_date = $data['p_date'];
	$post = $mysqli->query("INSERT INTO posts (title, p_date) VALUES ('$title','$p_date')");

	http_response_code(201); // CREATED 

	$res = [
        "post" => $post,
		"status" => true,
		"post_id" => mysqli_insert_id($mysqli)
	];

	echo json_encode($res);
	
}


function updatePost($mysqli, $id, $data) {
	$title = $data['title'];
	$p_date = $data['p_date'];
	$mysqli->query("UPDATE posts SET title = $title, p_date = $p_date WHERE id = $id");

	http_response_code(200); // OK

	$res = [
		"status" => true,
		"message" => "Post is updated"

	];

	echo json_encode($res);


}

function deletePost($mysqli, $id, $data) {
	$mysqli->query("DELETE FROM posts SET 'title' = '$title', 'p_date' = '$p_date' WHERE 'id' = '$id'");

	http_response_code(200); // OK

	$res = [
		"status" => true,
		"message" => "Post is deleted"

	];

	echo json_encode($res);


}