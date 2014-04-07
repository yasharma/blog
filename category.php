<?php
// Connect to db
require 'engine/connection.php';
$category = $_GET['category'];
$posts = query("SELECT id, title, name, email, category,created_at, LEFT(body, 330) as body FROM posts WHERE category = :category ORDER BY id DESC",
				array('category' => $category),
				$conn);
foreach($posts as $post):
?>
<!DOCTYPE html>
<html>
  <head>
  		<meta charset="UTF-8">
  		<?= head($post['category']); ?>
	</head>
<body>
	<div class="pure-g-r" id="layout">

		<?php include 'includes/header.inc.php'; ?>

		<div class="content pure-u-1 pure-u-med-3-4">
			<div>
				<!-- A Wrapper for all blog posts -->
				<div class="posts">
					<h1 class="content-subhead">Recent Posts</h1>
					<section class="post">
						<header class="post-header">
							
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
		</div><!-- End pure-u-1-->	
	</div><!-- End pure-g-r -->	
</body>	
</html>
