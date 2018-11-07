<?php 
namespace MonNameSpace\db;
require_once("Manager.php");

/**
 * 	
 */
class ProductManager extends Manager
{
	/**
	 * [selectAllData description]
	 * @return [type] [description]
	 */
	public function selectAllProduct()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT * FROM product');
		return $req;
	}
	
	
	public function insertProduct($name, $weigth, $price, $description, $ingredients, $image)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO product (name, weigth, price, description, ingredients, image) VALUES (:name, :weigth, :price, :description, :ingredients, :image)');
		$result = $req->execute(array(
			':name' => $name,
			':weigth' => $weigth,
			':price' => $price,
			':description' => $description,
			':ingredients' => $ingredients,
			':image' => $image
		));
		return $result;
	}
	
	public function selectData($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM product WHERE id = :id');
		$result = $req->execute(array(
			':id' => $id,
		));
		return $result;
	}
	
	public function updateData($id, $name, $location)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE product SET name=:name, location=:location WHERE id=:id');
		$result = $req->execute(array(
			':id' => $id,
			':name' => $name,
			':location' => $location,
		));
		return $result;
	}
	
	public function deleteProduct($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM product WHERE id= :id');
		$result = $req->execute(array(
			':id' => $id,
		));
		return $result;
	}
}