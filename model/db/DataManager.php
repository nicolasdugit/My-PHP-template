<?php 
namespace MonNameSpace\db;
require_once("Manager.php");

/**
 * 	
 */
class DataManager extends Manager
{
	/**
	 * [selectAllData description]
	 * @return [type] [description]
	 */
	public function selectAllData()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT * FROM data');
		// $result = ($req->fetchAll(\PDO::FETCH_OBJ));
		// debug($req);
		return $req;
	}
	/**
	 * [insertData description]
	 * @param  [type] $name     [description]
	 * @param  [type] $location [description]
	 * @return [type]           [description]
	 */
	public function insertData($name, $location)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO data (name, location) VALUES (:name, :location)');
		$result = $req->execute(array(
			':name' => $name,
			':location' => $location,
		));
		return $result;
	}
	/**
	 * [selectData description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function selectData($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM data WHERE id = :id');
		$result = $req->execute(array(
			':id' => $id,
		));
		return $result;
	}
	/**
	 * [updateData description]
	 * @param  [type] $id       [description]
	 * @param  [type] $name     [description]
	 * @param  [type] $location [description]
	 * @return [type]           [description]
	 */
	public function updateData($id, $name, $location)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE data SET name=:name, location=:location WHERE id=:id');
		$result = $req->execute(array(
			':id' => $id,
			':name' => $name,
			':location' => $location,
		));
		return $result;
	}
	/**
	 * [deleteData description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function deleteData($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM data WHERE id= :id');
		$result = $req->execute(array(
			':id' => $id,
		));
		return $result;
	}
}