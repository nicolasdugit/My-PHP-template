<?php

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
		elseif ($_GET['page'] == 'dragdrop')
		{
			if (isset($_POST['sendProduct'])) 
			{	
				if (!empty($_FILES) && ($_FILES['image']['type'] === 'image/jpeg' OR $_FILES['image']['type'] === 'image/png' )) 
				{
					// debug($_FILES);
					uploadProduct($_FILES['image'], $_POST['name'], $_POST['weight'], $_POST['price'], $_POST['description'], $_POST['ingredients']);
				}
				else
				{
					var_dump($_FILES);
					throw new Exception("oups");
				}
			}
			elseif (isset($_GET['delete'])) 
			{	
				$id = $_GET['delete'];
				deleteProduct($id);
			}
			else 
			{
				showProduct();
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
		elseif ($_GET['page'] == 'account')
		{
			require 'view/pages/account.php';
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
				signup($_POST['username'],$_POST['email'],$_POST['password']);
			}
		}
		elseif ($_GET['action'] == 'login')
		{
			if (!empty($_POST['username']) && !empty($_POST['password'])) 
			{
				login($_POST['username'], $_POST['password']);
			}
			else 
			{
				$_SESSION['flash']['warning']= 'This account doesn\'t exist!';
				header('location: index.php');
			}
		}
		elseif ($_GET['action'] == 'confirm') 
		{
			if (isset($_GET['id']) && isset($_GET['token']))
			{
				confirmUser($_GET['id'], $_GET['token']);
			}
			else
			{
				throw new Exception("error");
			}
		}
		elseif ($_GET['action'] == 'changePassword') 
		{
			if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm'])
			{
				$_SESSION['flash']['warning']= 'The two password don\'t match!';
				header('location: index.php?page=account');
			}
			else
			{
				changePassword($_POST['password'], $_SESSION['auth']['username']);
			}
		}
		elseif ($_GET['action'] == 'rememberPassword') 
		{
			if (empty($_POST['email'])|| !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
			{
				throw new Exception("Something went wrong We can\'t sent a new password");
			}
			else
			{
				rememberPassword($_POST['email']);
			}
		}
		elseif ($_GET['action'] == 'reset') 
		{
			if (isset($_GET['id']) && isset($_GET['reset_token']))
			{
				// resetPassword($_GET['id'], $_GET['reset_token']);
				require 'view/pages/reset.php';
			}
			else
			{
				throw new Exception("error");
			}
		}
		elseif ($_GET['action'] == 'resetPassword') 
		{
			if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm'])
			{
				throw new Exception("Two password must be the same");
			}
			else
			{
				resetPassword($_POST['id'], $_POST['token'], $_POST['password']);
			}
		}
		elseif ($_GET['action'] == 'logout')
		{
			logout();
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


} catch (Exception $e) 
{
	$errorMessage = $e->getMessage();
	require 'view/errorView.php';
}