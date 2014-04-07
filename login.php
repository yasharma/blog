<?php // Connect to db
require 'engine/connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	if (empty($username) || empty($password)) {
		$errors[] = "Please fill both fields.";
	} else {
		$login = query("SELECT * FROM users WHERE username = :username and password = :password",
				array('username' => $username,
					  'password' => $password),
						$conn);
		if($login === false)
		{
			$errors[] = "Wrong username and password combination.";
		}else {
			$_SESSION['username'] = $username;
			header('Location: /');
		}
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
  		<meta charset="UTF-8">
		<?= head('Login'); ?>
	</head>
<body>
	<div class="pure-g" id="layout">
		<?php include 'includes/header.inc.php'; ?>
		<div class="content pure-u-1 pure-u-med-3-4">
			<div class="container">
				<form action="" class="pure-form pure-form-stacked" method="post">
					<fieldset>
						<legend>Login</legend>
						<input type="text" name="username" placeholder="Enter Username" autofocus required>
						<input type="password" name="password" placeholder="Enter Password" required>
						<button type="submit" name="submit" class="pure-button">Login</button>
					</fieldset>
					<?php if(isset($errors)) :?>
						<?php foreach($errors as $error) :?>
							<p class="error"><?= $error; ?></p>
						<?php endforeach; ?>
					<?php endif; ?>
				</form>
			</div>
			<?php include 'includes/footer.inc.php'; ?>
		</div>
	</div>	
</body>	
</html>
