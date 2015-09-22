<?php 
session_start(); 
require_once('new-connection.php');

function validateEmail($email) {
	return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? true : false;
}

if(isset($_POST['action']) && $_POST['action'] == 'email_form') {

if(empty($_POST['email']))
		$_SESSION['error']['email'] = 'Email address field cannot be blank.';
	
else {
	$_SESSION['email_success'] = validateEmail($_POST['email']);

	if(!$_SESSION['email_success'])
		$_SESSION['error']['email'] = 'Email is INVALID.';

	else {
		$insert_email_query = "INSERT INTO users (email, created_at, updated_at)
	  			  VALUES('{$_POST['email']}', NOW(), NOW())";

		$insert_email_result = run_mysql_query($insert_email_query, $connection);

		if($insert_email_result == true) {
			$_SESSION['email'] = $_POST['email'];
			header('Location: success.php');
			exit();
		}
		else
			$_SESSION['error']['email'] = "Error. Check database connection.";
	}
}

header('Location: index.php');
exit();
}

?>