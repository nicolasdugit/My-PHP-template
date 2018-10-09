<?php 
namespace MonNameSpace;
require_once("Manager.php");

/**
 * 	
 */
class MailManager extends Manager
{
	
	public function selectAllMail()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT * FROM email');
		return $req;
	}
	
	public function insertMail($name, $email, $subject, $content)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO email (name, email, subject, content) VALUES (:name, :email, :subject, :content)');
		$result = $req->execute(array(
			':name' => $name,
			':email' => $email,
			':subject' => $subject,
			':content' => $content
		));
		return $result;
	}
	
	public function selectMail($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM email WHERE id = :id');
		$result = $req->execute(array(
			':id' => $id,
		));
		return $result;
	}
	
	public function deleteMail($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM email WHERE id= :id');
		$result = $req->execute(array(
			':id' => $id,
		));
		return $result;
	}
}