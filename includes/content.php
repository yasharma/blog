<!-- A Wrapper for all blog posts -->
<div class="posts">
	<h1 class="content-subhead">Recent Posts</h1>
	<section class="post">
		<header class="post-header">
			<?php foreach($posts as $post) : ?>
				<h2 class="post-title">
					<a href="single.php?id=<?= $post['id']; ?>"><?= $post['title']; ?></a>
				</h2>
				<p>
					<?php if(isset($_SESSION['username'])) : ?>
					<a href="update.php?id=<?= $post['id']; ?>">Edit</a> |
					<a href="delete.php?id=<?= $post['id']; ?>">Delete</a>
					<?php endif; ?>
				</p>	
				<p class="post-meta">By 
					<a href="mailto: <?= $post['email']; ?>" class="post-author"> <?= $post['name']; ?> </a> on <?= $post['created_at']; ?>
					<a href="category.php?category=<?= $post['category']; ?>" class="post-category post-category-pure"><?= $post['category']; ?></a>
				</p>
		</header>
		<div class="post-description">
			<?php 
			$space = strrpos($post['body'], " ");
			$part = substr($post['body'], 0, $space);

			echo  $part;
			?>
			<p><a href="single.php?id=<?= $post['id']; ?>"> Read More...</a></p>
			
		</div>
			<?php endforeach; ?>
	</section>
</div><!-- End Posts -->
