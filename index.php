<?php
// Connect to db
require 'engine/connection.php';

// Fetch Posts
$posts = get('posts', $conn);

?>
<!DOCTYPE HTML>
<html>
  	<head>
		<meta charset='utf-8'>
		<?= head('Home'); ?>
	</head>
<body>
	<div class="pure-g" id="layout">

		<?php include 'includes/header.inc.php'; ?>

		
			<div class="content pure-u-1 pure-u-med-3-4">
				<div>
					<!-- A Wrapper for all blog posts -->
					<div class="posts">
						<h1 class="content-subhead">Recent Posts</h1>
						<section class="post">
							<header class="post-header">
								<?php foreach($posts as $post) : ?>
									<h2 class="post-title">
										<a href="single.php?id=<?= $post['id']; ?>">
											<?= $post['title']; ?>
										</a>
									</h2>
									<p class="post-meta">By 
										<a href="mailto: <?= $post['email']; ?>" class="post-author"> <?= $post['name']; ?> </a> on <?= $post['created_at']; ?>
										<a href="category.php?category=<?= $post['category']; ?>" class="post-category post-category-pure"><?= $post['category']; ?></a>
									</p>
							</header>
							<div class="post-description">
								<?php 
								$space = strrpos($post['body'], " ");
								$part = substr($post['body'], 0, $space);
								echo $part
								?>
								<p><a href="single.php?id=<?= $post['id']; ?>"> Read More...</a></p>
								
							</div>
								<?php endforeach; ?>
						</section>
					</div><!-- End Posts -->
				</div>	

				<?php include 'includes/footer.inc.php'; ?>
				<a href="#" class="scrollup">Scroll</a>
			</div><!-- End Content -->
		</div><!-- End pure-u-1-->	
	</div><!-- End pure-g-r -->

	<!-- Javascript -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

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
