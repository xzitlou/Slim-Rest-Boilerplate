<?php
class Post{
	public function getPosts(){
		$query= "SELECT * FROM posts";
		$posts= getData($query, "all");
		return $posts;
	}
	public function getPost($id_post){
		$query= "SELECT * FROM posts WHERE id_post = $id_post";
		$post= getData($query, "one");
		return $post;
	}
	public function createPost($title, $content){
		$query= "INSERT INTO posts VALUES (NULL, \"$title\", \"$content\")";
		$post= postData($query, "insert");
		return $post;
	}
	public function updatePost($id_post, $title){
		$query= "UPDATE posts SET title = \"$title\" WHERE id_post = $id_post";
		$rows= postData($query, "update");
		return $rows;
	}
	public function deletePost($id_post){
		$query= "DELETE posts WHERE id_post = $id_post";
		$rows= postData($query, "delete");
		return $rows;
	}
}
?>