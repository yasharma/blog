<?php

require 'functions.php';

// Connect to daatbase
$conn = connect($config);
if ( !$conn ) die ('problem connecting to db.');

// Fetch Posts
$posts = get('posts', $conn);
?>
<!DOCTYPE HTML>
<html>
  <head>
		<title>Blog</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.2.1/pure-min.css">
		<link rel="stylesheet" href="css/custom.css">
	</head>
<body>
	<div class="pure-g-r" id="layout">
		<div class="sidebar pure-u">
			<header class="header">
				<h1 class="brand-title">A Simple Blog</h1>
				<h2 class="brand-tagline">Create Your BlogPost</h2>

				<nav class="nav">
					<ul class="nav-list">
						<li class="nav-item">
							<a class="pure-button" href="create.view.php">Create New Post</a>
						</li>
					</ul>
				</nav>
			</header>
		</div><!-- End sidebar pure-u -->

		<div class="pure-u-1">
			<div class="content">
				<!-- A Wrapper for all blog posts -->
				<div class="posts">
					<h1 class="content-subhead">Recent Posts</h1>
					<section class="post">
						<header class="post-header">
							<?php foreach($posts as $post) : ?>
								<h2 class="post-title">
									<?= $post['title']; ?>
								</h2>
								<p class="post-meta">By <a href="#" class="post-author"> <?= $post['name']; ?></a></p>
						</header>
						<div class="post-description">
							<?= $post['body']; ?>
						</div>
							<?php endforeach; ?>
					</section>
				</div><!-- End Posts -->

				<footer class="footer">
					<div class="pure-menu pure-menu-horizontal pure-menu-open">
						<ul>
							<li><a href="#">About</a></li>
							<li><a href="#">Twitter</a></li>
							<li><a href="#">Facebook</a></li>
						</ul>
					</div>
				</footer>
			</div><!-- End Content -->
		</div><!-- End pure-u-1-->	
	</div><!-- End pure-g-r -->	
</body>	
</html>	
