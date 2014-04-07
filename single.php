<?php
require 'engine/connection.php';

$posts = get_by_id( (int)$_GET['id'], $conn );
foreach($posts as $post) :
?>
<!DOCTYPE html>
<html>
  <head>
  		<meta charset="UTF-8">
		<?= head($post['title']); ?>
	</head>
<body>
	<div class="pure-g-r" id="layout">

		<?php include 'includes/header.inc.php'; ?>

		<div class="pure-u-1">
			<div class="content">
				<!-- A Wrapper for all blog posts -->
				<div class="posts">
					<h1 class="content-subhead">Single Post</h1>
					<section class="post">
						<header class="post-header">
							
								<h2 class="post-title">
									<?= $post['title']; ?>
								</h2>
								<p class="post-meta">By 
									<a href="mailto: <?= $post['email']; ?>" class="post-author"> <?= $post['name']; ?> </a> on <?= $post['created_at']; ?>
								</p>
						</header>
						<div class="post-description">
							<?= $post['body']; ?>
						</div>
							<?php endforeach; ?>
							
					</section>
				</div><!-- End Posts -->

				<?php include 'includes/footer.inc.php'; ?>
				
			</div><!-- End Content -->
		</div><!-- End pure-u-1-->	
	</div><!-- End pure-g-r -->
</body>	
</html>
