<?php 
namespace MonNameSpace\db;
require_once("Manager.php");

/**
 * 	
 */
class PostManager extends Manager
{
	
	public function selectAllPost()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT * FROM post');
		return $req;
	}
	
	public function insertPost($title, $content, $author)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO post (title, content, author) VALUES (:title, :content, :author)');
		$result = $req->execute(array(
			':title' => $title,
			':content' => $content,
			':author' => $author
		));
		return $result;
	}
	
	public function selectPost($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM post WHERE id = :id');
		$result = $req->execute(array(
			':id' => $id,
		));
		return $result;
	}
	
	public function deletePost($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM post WHERE id= :id');
		$result = $req->execute(array(
			':id' => $id,
		));
		return $result;
	}
}