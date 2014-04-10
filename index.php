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
				<form action="search.php" class="pure-form" method="get">
					<input type="search" name="title" placeholder="Search for posts" autocomplete="off">
				</form>
				<div>
					<?php include 'includes/content.php'; ?>
				</div>	

				<?php include 'includes/footer.inc.php'; ?>
				<a href="#" class="scrollup">Scroll</a>
			</div><!-- End Content -->
		</div><!-- End pure-u-1-->	
	</div><!-- End pure-g-r -->

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
	 		// prettyPrint();
	    });

	</script>
</body>	
</html>	
