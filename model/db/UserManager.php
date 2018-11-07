<?php 
namespace MonNameSpace\db;
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

	public function selectUserByEmail($email)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM user WHERE email = :email');
		$req->execute(array(
			':email' => $email,
		));
		$result = $req->fetch();
		return $result;
	}

	public function selectUserById($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM user WHERE id = :id');
		$req->execute(array(
			':id' => $id,
		));
		$result = $req->fetch();
		return $result;
	}

	public function selectUserByUsername($username)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM user WHERE (username = :username OR email = :username) AND confirmation_date IS NOT NULL');
		$req->execute(array(
			':username' => $username,
		));
		$result = $req->fetch();
		return $result;
	}

	public function selectUserByToken($id, $reset_token)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM user WHERE id=:id AND reset_token IS NOT NULL AND reset_token=:reset_token AND reset_date > DATE_SUB(NOW(), INTERVAL 30 MINUTE)');
		$result = $req->execute(array(
			':id' => $id,
			':reset_token' => $reset_token
		));
		$result = $req->fetch();
		return $result;
	}

	public function updateUserToken($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE user SET confirmation_token = NULL, confirmation_date = NOW() WHERE id=?')->execute([$id]);
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

	public function updatePassword($username, $password)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE user SET password=:password WHERE username=:username');
		$result = $req->execute(array(
			':username' => $username,
			':password' => $password
		));
		return $result;
	}

	public function changePassword($id, $reset_token)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE user SET reset_token=:reset_token, reset_date = NOW() WHERE id=:id');
		$result = $req->execute(array(
			':id' => $id,
			':reset_token' => $reset_token
		));
		return $result;
	}

	public function resetPassword($id, $password)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE user SET password=:password, reset_date = NULL, reset_token = NULL WHERE id=:id');
		$result = $req->execute(array(
			':id' => $id,
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