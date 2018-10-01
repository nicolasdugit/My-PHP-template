<?php 
namespace MonNameSpace\Model;
require_once("Manager.php");

/**
 * 	
 */
class UserManager extends Manager
{
	
	public function selectAllUser()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT * FROM user');
		return $req;
	}
	
	public function insertUser($username, $email, $password, $level, $confirmation_token)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO user (username, email, password, level, confirmation_token) VALUES (:username, :email, :password, :level, :confirmation_token)');
		$req->execute(array(
			':username' => $username,
			':email' => $email,
			':password' => $password,
			':level' => $level,
			':confirmation_token' => $confirmation_token
		));
		$user_id = $db->lastInsertId();
		return $user_id;
	}
	
	public function selectUser($username)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM user WHERE username = :username');
		$req->execute(array(
			':username' => $username,
		));
		$result = $req->fetch();
		return $result;
	}
	
	public function updateUser($id, $username, $email, $password)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE user SET username=:username, email=:email, password=:password WHERE id=:id');
		$result = $req->execute(array(
			':id' => $id,
			':username' => $username,
			':email' => $email,
			':password' => $password
		));
		return $result;
	}
	
	public function deleteUser($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM user WHERE id= :id');
		$result = $req->execute(array(
			':id' => $id,
		));
		return $result;
	}
}