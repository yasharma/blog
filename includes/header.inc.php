<div class="sidebar pure-u-1 pure-u-med-1-4">
	<div class="header">
		<hgroup>
			<h1 class="brand-title"><a href="/">Blogpost</a></h1>
			<?php if(isset($_SESSION['username'])) : ?>
			<h2 class="brand-title">Welcome <?= $_SESSION['username']; ?></h2>
		<?php else: ?>
			<h2 class="brand-tagline">A Simple Blog</h2>
		<?php endif; ?>	
		</hgroup>
		
		<nav class="nav">
			<ul class="nav-list">
				<?php if(isset($_SESSION['username'])) : ?>
				<li class="nav-item">
					<a class="pure-button" href="create.post.php">New Post</a>
					<a class="pure-button" href="logout.php">Logout</a>
					<a class="pure-button" href="users.php">Users</a>
					<a class="pure-button" href="add_users.php">Add New User</a>
				</li>	
				<?php else: ?>	
				<li class="nav-item">	
					<a class="pure-button" href="login.php">Login</a>
				</li>
				<?php endif; ?>
			</ul>
		</nav>
	</div>
</div><!-- End sidebar -->
