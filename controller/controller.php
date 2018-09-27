<?php 
require_once 'model/DataManager.php';
require_once 'model/MailManager.php';


function selectAllData()
{
	$dataManager = new \MonNameSpace\Model\DataManager();

	$data = $dataManager->selectAllData();
	require 'view/pages/data.php';
}

function insertData($name, $location)
{
	$dataManager = new \MonNameSpace\Model\DataManager();

	$result = $dataManager->insertData($name, $location);

	if ($result == false) 
	{
		throw new Exception('Impossible d\'inserer les data !');
	}
	else
	{
		$_SESSION['message'] = 'Record has been saved!';
		$_SESSION['msg_type'] = 'success';
		header('location: index.php?page=data');
	}
}

function updateData($id, $name, $location)
{
	$dataManager = new \MonNameSpace\Model\DataManager();

	$result = $dataManager->updateData($id, $name, $location);

	if ($result == false) 
	{
		throw new Exception('Impossible d\'updater les data !');
	}
	else 
	{
		$_SESSION['message'] = 'Record has been updated!';
		$_SESSION['msg_type'] = 'warning';
		header('location: index.php?page=data');
	}
}

function deleteData($id)
{
	$dataManager = new \MonNameSpace\Model\DataManager();

	$result = $dataManager->deleteData($id);
	
	if ($result == false) 
	{
		throw new Exception('Impossible de supprimer les data !');
	}
	else
	{
		$_SESSION['message'] = 'Record has been deleted!';
		$_SESSION['msg_type'] = 'danger';
		header('location: index.php?page=data');
	}
}

function insertMail($name, $email, $subject, $content)
{
	$mailManager = new \MonNameSpace\Model\MailManager();

	$result = $mailManager->insertMail($name, $email, $subject, $content);

	if ($result == false) 
	{
		throw new Exception('Impossible d\'envoyer le mail !');
	}
	else
	{
		$_SESSION['message'] = 'Message has been sent!';
		$_SESSION['msg_type'] = 'success';
		header('location: index.php?page=contact');
	}
}
