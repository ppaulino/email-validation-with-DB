<?php 
session_start(); 
// require_once('new-connection.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Email Validation with DB</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id="container">
		<h1>Email Validation with DB</h1>
<?php 
	if(isset($_SESSION['error'])) {
		echo '<div class="error">';
	
	foreach($_SESSION['error'] as $name => $message) {
		echo '<p>' . $message . '</p>';
	}
		echo '</div>';
	}
	session_destroy();
?>
		<form id="email_form" action="process.php" method="post">
			<input type="hidden" name="action" value="email_form">
			<div class="fields">
				<div class="form_input">
					<input type="text" name="email">
					<input type="submit" name="submit" value="Submit">
				</div>
			</div>
		</form>
	</div>
</body>
</html>