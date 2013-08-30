<?php
require 'functions.php';

// Connect to daatbase
$conn = connect($config);
if ( !$conn ) die ('problem connecting to db.');

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

	$title = $_POST['title'];
	$body = $_POST['body'];
	$name = $_POST['name'];

	if( empty($title) || empty($body) ) {
		$status = 'Please fill out all Fields.';
	} else {
		query(
			"INSERT INTO posts(title, name, body) VALUES(:title, :name, :body)",
			array('title' => $title, 'name' => $name, 'body' => $body ),
			$conn);
		$status = header('Location:index.php');
	}
}
?>

<!DOCTYPE HTML>
<html>
  <head>
		<title>Create New Post</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.2.1/pure-min.css">
		<link rel="stylesheet" href="css/custom.css">
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
					<p class="success"><?= $status; ?></p>
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
