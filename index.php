<?php
session_start();

$id = 0;
$name = '';
$location = '';

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
	else
	{
		require 'view/homePage.php';
	}
} catch (Exception $e) {
	$errorMessage = $e->getMessage();
	require 'view/errorView.php';
}