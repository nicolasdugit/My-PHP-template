<?php
session_start();

require 'controller/controller.php';

try {
	if (isset($_GET['page'])) 
	{
		if ($_GET['page'] == 'data') 
		{
			if (isset($_POST['save']))
			{
				insertData($_POST['name'], $_POST['location']);
			} 
			elseif (isset($_POST['update'])) 
			{
				updateData($_POST['id'], $_POST['name'], $_POST['location']);
			}
			elseif (isset($_GET['delete'])) 
			{	
				$id = $_GET['delete'];
				deleteData($id);
			}
			else 
			{
				selectAllData();
			}
		}
		elseif ($_GET['page'] == 'contact')
		{
			if (isset($_POST['sendMail'])) 
			{
				insertMail($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['content']);
			}
			else
			{
				require 'view/pages/contact.php';
			}
		}
		elseif ($_GET['page'] == 'forum')
		{
			require 'view/pages/forum.php';
		}
		elseif ($_GET['page'] == 'blog')
		{
			require 'view/pages/blog.php';
		}
		else 
		{
			require 'view/homePage.php';
		}
	}
	elseif (isset($_GET['action'])) 
	{
		if ($_GET['action'] == 'signup')
		{
			$error_register = array();

			if (empty($_POST['username'])|| !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) 
			{
				$error_register['username'] = "Pseudo non valide";
				throw new Exception($error_register['username']);
				
			}
			if (empty($_POST['email'])|| !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
			{
				$error_register['email'] = "Email non valide";
				throw new Exception($error_register['email']);
				
			}
			if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) 
			{
				$error_register['password'] = "Password non valide";
				throw new Exception($error_register['password']);
				
			}
			if (empty($error_register)) 
			{
				insertUser($_POST['username'],$_POST['email'],$_POST['password']);
			}
		}
		elseif ($_GET['action'] == 'login')
		{
			if (isset($_POST['username']) && isset($_POST['password'])) 
			{
				selectUser($_POST['username'], $_POST['password']);
			}
			else 
			{
				throw new Exception("Something went wrong");
			}
		}
		elseif ($_GET['action'] == 'logout')
		{
			logout();
		}
		elseif ($_GET['action'] == 'confirm') 
		{
			if (isset($_GET['id']) && isset($_GET['token']))
			{
				
			}
		}
		else 
		{
			require 'view/homePage.php';
		}
	}
	else
	{
		require 'view/homePage.php';
	}
} catch (Exception $e) {
	$errorMessage = $e->getMessage();
	require 'view/errorView.php';
}