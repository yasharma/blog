<?php

// Connect to db
require 'engine/connection.php';

// Checks for login
if(!is_logged_in() ){
	header('Location: /');
	die();
}

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

	$title    = trim(htmlentities($_POST['title']));
	$body     = $_POST['body'];
	$name     = trim(htmlentities($_POST['name']));
	$email    = trim(htmlentities($_POST['email']));
	$category = trim(htmlentities($_POST['category']));

	if( empty($title) || empty($body) || empty($name)) {
		$status = 'Please fill out all Fields.';
	} else {
		query(
			"INSERT INTO posts(title, name, email, body, category, created_at) VALUES(:title, :name, :email,:body, :category,CURRENT_DATE())",
			array(	'title'		=> $title, 
					'name'  	=> $name, 
					'email' 	=> $email,
					'body'  	=> $body,
					'category'  => $category),
							   		   $conn);
		$status = header('Location:index.php');
	}
}
?>

<!DOCTYPE HTML>
<html>
  	<head>
		<?= head('New Post') ?>
	</head>
<body>
	<div class="pure-g" id="layout">
		<?php include 'includes/header.inc.php'; ?>
		<div class="content pure-u-1 pure-u-med-3-4">
			<div class="container">
				<form action="" id="form" class="pure-form pure-form-stacked" method="POST">
					<fieldset>
						<legend>Create A New Post</legend>
					  	<label for="name">Full Name :</label>
						<input type="text" class="pure-input-1" name="name" id="name" placeholder="Enter your name" autofocus required>

						<label for="email">Email :</label>
						<input type="email" class"pure-input-1" name="email" id="email" pattern="[^ @]*@[^ @]*\.[a-zA-z]{2,}" placeholder="Enter your email address" required>
					
						<label for="title">Title :</label>
						<input type="text" class="pure-input-1" name="title" id="title" placeholder="Enter title for your blogpost" required>

						<label for="category">Category :</label>
						<input type="text" class="pure-input-1" name="category" id="category" placeholder="Enter Category Name for your post" required>

						<label for="body">Body :</label>
						<textarea name="body" class="pure-input-1" id="body" placeholder="Enter your post description" required></textarea>

						<button type="submit" name="submit" class="pure-button">Post</button>

						<?php if ( isset($status) ) : ?>
							<p class="error"><?= $status; ?></p>
						<?php endif; ?>	
					</fieldset>	
				</form>
			</div>
			<?php include 'includes/footer.inc.php'; ?>
		</div>
	</div>		
</body>	
</html>	
