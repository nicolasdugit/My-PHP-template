<?php
require_once 'model/autoload.php';
require_once 'vendor/autoload.php';
require_once 'model/function.php';

\MonNameSpace\Autoloader::register();

function selectAllData()
{
	$dataManager = new \MonNameSpace\db\DataManager();

	$data = $dataManager->selectAllData();
	require 'view/pages/data.php';
}

function insertData($name, $location)
{
	$dataManager = new \MonNameSpace\db\DataManager();

	$result = $dataManager->insertData($name, $location);

	if ($result == false)
	{
		throw new Exception('Something went wrong. We can\'t insert data!');
		exit();
	}
	else
	{
		$_SESSION['flash']['success'] = 'Record has been saved!';
		header('location: index.php?page=data');
		exit();
	}
}

function updateData($id, $name, $location)
{
	$dataManager = new \MonNameSpace\db\DataManager();

	$result = $dataManager->updateData($id, $name, $location);

	if ($result == false)
	{
		throw new Exception('Something went wrong. We can\'t update data!');
		exit();
	}
	else
	{
		$_SESSION['flash']['warning'] = 'Record has been updated!';
		header('location: index.php?page=data');
		exit();
	}
}

function deleteData($id)
{
	$dataManager = new \MonNameSpace\db\DataManager();

	$result = $dataManager->deleteData($id);

	if ($result == false)
	{
		throw new Exception('Something went wrong. We can\'t delete data!');
		exit();
	}
	else
	{
		$_SESSION['flash']['danger'] = 'Record has been deleted!';
		header('location: index.php?page=data');
		exit();
	}
}

function insertMail($name, $email, $subject, $content)
{
	$mailManager = new \MonNameSpace\db\MailManager();

	$result = $mailManager->insertMail($name, $email, $subject, $content);

	if ($result == false)
	{
		throw new Exception('Something went wrong. We can\'t send email!!');
		exit();
	}
	else
	{
		$_SESSION['flash']['success'] = 'Message has been sent!';
		header('location: index.php?page=contact');
		exit();
	}
}

function signup($username, $email, $password)
{
	$userManager = new \MonNameSpace\db\UserManager();

	$pass_hash = password_hash($password, PASSWORD_BCRYPT);

	$token = str_random(60);

	$testUserUsername = $userManager->selectUser($username);
	$testUserEmail = $userManager->selectUserByEmail($email);

	if ($testUserUsername OR $testUserEmail)
	{
		throw new Exception('Something went wrong. This username or email exist already!');
		exit();
	}
	else {
		$user_id = $userManager->insertUser($username, $email, $pass_hash, 2, $token);

		if ($user_id == false)
		{
			throw new Exception('Something went wrong. We can\'t add new user!');
			exit();
		}
		else
		{
			$link = "http://localhost/My-PHP-template/index.php?action=confirm&id=$user_id&token=$token";
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
			// renvoie a la page actuelle
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit();
		}
	}
}

function confirmUser($id, $token)
{
	$userManager = new \MonNameSpace\db\UserManager();
	$user = $userManager->selectUserById($id);

	if ($user && $user['confirmation_token'] == $token)
	{
		$userManager->updateUserToken($id);
		$_SESSION['flash']['success']= 'Your account has been validated!';
		$_SESSION['auth'] = $user;
		header('location: index.php');
		exit();
	}
	else
	{
		$_SESSION['flash']['warning']= 'This token is not valid anymore!';
		header('location: index.php');
		exit();
	}
}

function login($username, $password)
{
	$userManager = new \MonNameSpace\db\UserManager();
	$user = $userManager->selectUserByUsername($username);

	$isPassCorrect = password_verify($password, $user['password']);

	if ($user == false)
	{
		$_SESSION['flash']['warning']= 'This account doesn\'t exist!';
		header('location: index.php');
		exit();
	}
	else
    {
		if ($isPassCorrect)
		{
			$_SESSION['flash']['success']= 'login success!';
			$_SESSION['auth'] = $user;
			// renvoie a la page actuelle
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit();
		}
		else
		{
			$_SESSION['flash']['danger'] = 'Wrong username or password!';
			// renvoie a la page actuelle
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit();
		}
	}
}

function changePassword($password, $username)
{
	$userManager = new \MonNameSpace\db\UserManager();
	$pass_hash = password_hash($password, PASSWORD_BCRYPT);

	$testupdate = $userManager->updatePassword($username, $pass_hash);

	if ($testupdate)
	{
		$_SESSION['flash']['success'] = 'Your password has been updated!';
		header('location: index.php?page=account');
		exit();
	}
	else
	{
		$_SESSION['flash']['danger'] = 'Your password cannot be updated!';
		header('location: index.php?page=account');
		exit();
	}
}

function rememberPassword($email)
{
	$userManager = new \MonNameSpace\db\UserManager();
	$user = $userManager->selectUserByUsername($email);
	if ($user)
	{
		$reset_token = str_random(60);
		$id = $user['id'];
		$test = $userManager->changePassword($id, $reset_token);

		if ($test)
		{
			$link = "http://localhost/My-PHP-template/index.php?action=reset&id=$id&reset_token=$reset_token";
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

			$_SESSION['flash']['success'] = 'New Password has been send!';
			// renvoie a la page actuelle
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit();
		}
		else
		{
			$_SESSION['flash']['danger'] = 'This user doesn\'t exist';
			// renvoie a la page actuelle
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit();
		}
	}
	else
	{
		$_SESSION['flash']['danger'] = 'This user doesn\'t exist';
		// renvoie a la page actuelle
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		exit();
	}
}

function resetPassword($id, $token, $password)
{
	$userManager = new \MonNameSpace\db\UserManager();
	$pass_hash = password_hash($password, PASSWORD_BCRYPT);
	$user = $userManager->selectUserByToken($id, $token);

	if ($user)
	{
		$result = $userManager->resetPassword($id, $pass_hash);
		$user = $user;
		if ($result)
		{
			$_SESSION['auth'] = $user;
			$_SESSION['flash']['success'] = 'Password has been changed';
			header('Location: index.php');
			exit();
		}
		else
		{
			$_SESSION['flash']['danger'] = 'This user doesn\'t exist';
			header('Location: index.php');
			exit();
		}
	}
	else
	{
		$_SESSION['flash']['danger'] = 'This user doesn\'t exist';
		header('Location: index.php');
		exit();
	}
}

function logout()
{
	session_start();
    unset($_SESSION['auth']);
    $_SESSION['flash']['success']= 'You are now Logged out!';
    header('Location: index.php');
    exit();
}

function uploadProduct($image, $name, $weigth, $price, $description, $ingredients)
{
	$storeFolder = 'public/img/';
	$tempFile = $image['tmp_name'];
	$extension = pathinfo($image['name'], PATHINFO_EXTENSION);
	$targetFile = $storeFolder.rand(100,1000000).'.'.$extension;

	$productManager = new \MonNameSpace\db\ProductManager();
	$result = $productManager->insertProduct($name, $weigth, $price, $description, $ingredients, $targetFile);

	if ($result == false)
	{
		throw new Exception('Something went wrong. We can\'t insert product!');
		exit();
	}
	else
	{
		move_uploaded_file($tempFile, $targetFile);

		$_SESSION['flash']['success'] = 'Record has been saved!';
		header('location: index.php?page=dragdrop');
		exit();
	}
}

function showProduct()
{

	$productManager = new \MonNameSpace\db\ProductManager();
	$product = $productManager->selectAllProduct();
	require 'view/pages/dragdrop.php';
}

function deleteProduct($id)
{
	$productManager = new \MonNameSpace\db\ProductManager();

	$result = $productManager->deleteProduct($id);

	if ($result == false)
	{
		throw new Exception('Something went wrong. We can\'t delete Product!');
		exit();
	}
	else
	{
		$_SESSION['flash']['danger'] = 'Product has been deleted!';
		header('location: index.php?page=dragdrop');
		exit();
	}
}
