<?php
	session_start();
	require_once('new-connection.php');
	$get_emails_query = "SELECT * FROM users";
	$emails = fetch($get_emails_query);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Email Validation with DB</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id="container">
<?php 
		if(isset($_SESSION['email_success']) && $_SESSION['email_success'] == true)
		{ ?>
		<div class="success">
			<div class="message">
				<p><?= 'The email address you entered (' . $_SESSION['email'] . ') is VALID!'; ?></p><br>
			</div>
		</div>
		<h4>Email Addresses Entered:</h4>
<?php 	} ?>
		<ul>
<?php 	foreach($emails as $email)
		{ ?>
			<li><p><?php echo $email['email']; ?> - <small><?php echo $email['created_at']; ?></small></p></li>
<?php	} ?>
		</ul>
	</div>
</body>
</html>