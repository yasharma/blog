<?php

// Connect to db
require 'engine/connection.php';

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

	$title = $_POST['title'];
	$body = $_POST['body'];
	$name = $_POST['name'];

	if( empty($title) || empty($body) || empty($name)) {
		$status = 'Please fill out all Fields.';
	} else {
		query(
			"INSERT INTO posts(title, name, body, created_at) VALUES(:title, :name, :body, CURRENT_DATE())",
			array(	'title' => $title, 
					'name'  => $name, 
					'body'  => $body),
							   $conn);
		$status = header('Location:index.php');
	}
}
?>

<!DOCTYPE HTML>
<html>
  	<head>
		<?php head('New Post') ?>
	</head>
<body>
	<div class="container">
		<form action="" id="form" class="pure-form pure-form-stacked" method="POST">
			<fieldset>
				<legend>Create A New Post</legend>
			  	<label for="name">Full Name :</label>
				<input type="text" class="pure-input-1" name="name" id="name" placeholder="Enter your name" autofocus required/>
			
				<label for="title">Title :</label>
				<input type="text" class="pure-input-1" name="title" id="title" placeholder="Enter title for your blogpost" required/>

				<label for="body">Body :</label>
				<textarea name="body" class="pure-input-1" id="body" placeholder="Enter your post description" required></textarea>

				<button type="submit" name="submit" class="pure-button">Post</button>

				<?php if ( isset($status) ) : ?>
					<p class="error"><?= $status; ?></p>
				<?php endif; ?>	

				<footer class="footer">
					<div class="pure-menu pure-menu-horizontal pure-menu-open">
						<ul>
							<li class="dark"><a href="index.php">Go To Homepage</a></li>
						</ul>	
					</div>	
				</footer>	
			</fieldset>	
		</form>
	</div>	
</body>	
</html>	
