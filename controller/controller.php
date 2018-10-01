<?php 
require_once 'model/DataManager.php';
require_once 'model/MailManager.php';
require_once 'model/UserManager.php';
require_once 'model/function.php';
require_once 'vendor/autoload.php';


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
		throw new Exception('Something went wrong. We can\'t insert data!');
	}
	else
	{
		$_SESSION['flash']['success'] = 'Record has been saved!';
		header('location: index.php?page=data');
	}
}

function updateData($id, $name, $location)
{
	$dataManager = new \MonNameSpace\Model\DataManager();

	$result = $dataManager->updateData($id, $name, $location);

	if ($result == false) 
	{
		throw new Exception('Something went wrong. We can\'t update data!');
	}
	else 
	{
		$_SESSION['flash']['warning'] = 'Record has been updated!';
		header('location: index.php?page=data');
	}
}

function deleteData($id)
{
	$dataManager = new \MonNameSpace\Model\DataManager();

	$result = $dataManager->deleteData($id);
	
	if ($result == false) 
	{
		throw new Exception('Something went wrong. We can\'t delete data!');
	}
	else
	{
		$_SESSION['flash']['danger'] = 'Record has been deleted!';
		header('location: index.php?page=data');
	}
}

function insertMail($name, $email, $subject, $content)
{
	$mailManager = new \MonNameSpace\Model\MailManager();

	$result = $mailManager->insertMail($name, $email, $subject, $content);

	if ($result == false) 
	{
		throw new Exception('Something went wrong. We can\'t send email!!');
	}
	else
	{
		$_SESSION['flash']['success'] = 'Message has been sent!';
		header('location: index.php?page=contact');
	}
}

function insertUser($username, $email, $password)
{
	$userManager = new \MonNameSpace\Model\UserManager();

	$pass_hash = password_hash($password, PASSWORD_BCRYPT);

	$token = str_random(60);

	$testUser = $userManager->selectUser($username);
	

	if ($testUser)
	{
		throw new Exception('Something went wrong. This username exist already!');
	}
	else {
		$user_id = $userManager->insertUser($username, $email, $pass_hash, 2, $token);

		if ($user_id == false) 
		{
			throw new Exception('Something went wrong. We can\'t add new user!');
		}
		else
		{
			$link = "http://127.0.0.1/site/Lien%20vers%20Bibliotheque/My-template/index.php?action=confirm&id=$user_id&token=$token";
			// Create the Transport
			$transport = (new Swift_SmtpTransport('localhost', 1025))
			  ->setUsername('')
			  ->setPassword('')
			;
			// Create the Mailer using your created Transport
			$mailer = new Swift_Mailer($transport);
			// Create a message
			$message = (new Swift_Message('Wonderful Subject'))
			  ->setFrom(['john@doe.com' => 'John Doe'])
			  ->setTo([$email => 'A name'])
			  ->setBody("Here is the message itself: <br> <a href=$link> $link </a>")
			  ;
			// Send the message
			$result = $mailer->send($message);

			$_SESSION['flash']['success'] = 'User has been saved!'; 
			header('location: '.$_POST['pageName']);
		}
	}
}

function confirmUser($id, $token) 
{
	$userManager = new \MonNameSpace\Model\UserManager();
	$user = $userManager->selectUserById($id);

	if ($user && $user['confirmation_token'] == $token) 
	{
		$userManager->updateUserToken($id);
		$_SESSION['flash']['success']= 'Your account has been validated!';
		$_SESSION['auth'] = $user['username'];
		header('location: index.php');
	}
	else
	{
		$_SESSION['flash']['warning']= 'This token is not valid anymore!';
		header('location: index.php');
	}
}

function selectUser($username, $password)
{
	$userManager = new \MonNameSpace\Model\UserManager();
	$result = $userManager->selectUser($username);

	$isPassCorrect = password_verify($password, $result['password']);

	if ($result == false)
	{
		throw new Exception('Something went wrong. We can\'t log! Wrong username or password');
	}
	else
    {
		if ($isPassCorrect) 
		{
			$_SESSION['flash']['success']= 'login success!';
			$_SESSION['auth'] = $result['username'];
			header('location: '.$_POST['pageName']);
		}
		else 
		{
			$_SESSION['flash']['danger'] = 'login danger!';
			header('location: '.$_POST['pageName']);
		}
	}
}

function logout()
{
	session_start();
    unset($_SESSION['auth']);
    header('Location: index.php');
}