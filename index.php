<?php

// Connect to db
require 'engine/connection.php';

// Fetch Posts
$posts = get('posts', $conn);
?>
<!DOCTYPE HTML>
<html>
  	<head>
		<?php head('home') ?>
	</head>
<body>
	<div class="pure-g-r" id="layout">
		<div class="sidebar pure-u">
			<header class="header">
				<h1 class="brand-title">A Simple Blog</h1>
				<h2 class="brand-tagline">Create Your BlogPost</h2>

				<nav class="nav">
					<ul class="nav-list" id="inline-popups">
						<li class="nav-item">
							<a class="pure-button" href="create.post.php">Create New Post</a>
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
								<p class="post-meta">By <a href="#" class="post-author"> <?= $post['name']; ?> </a> on <?= $post['created_at']; ?></p>
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
							<li><a href="about.php">About</a></li>
							<li><a href="http://facebook.com/yasharma">facebook</a></li>
							<li><a href="https://github.com/yasharma/blog/">Github</a></li>
							<br>
							<li class="bottom">&copy; copyright <?= date("Y"); ?> code licensed under the<a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache License v2.0</a>.</li>
						</ul>
					</div>
				</footer>
				<a href="#" class="scrollup">Scroll</a>
			</div><!-- End Content -->
		</div><!-- End pure-u-1-->	
	</div><!-- End pure-g-r -->

	<!-- Javascript -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

	<!-- Script for scroll -->
	<script>
	    $(document).ready(function(){ 
	 
	        $(window).scroll(function(){
	            if ($(this).scrollTop() > 100) {
	                $('.scrollup').fadeIn();
	            } else {
	                $('.scrollup').fadeOut();
	            }
	        }); 
	 
	        $('.scrollup').click(function(){
	            $("html, body").animate({ scrollTop: 0 }, 600);
	            return false;
	        });
	 
	    });
	</script>
</body>	
</html>	