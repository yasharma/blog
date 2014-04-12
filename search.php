<?php require 'engine/connection.php';	?>
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
					
					<?php
					if (isset($_GET['title'])) {
						$search = '%'. $_GET['title'] .'%';
						$posts = query("SELECT id, title, name, email, category,created_at, LEFT(body, 330) as body FROM 			posts WHERE title LIKE :search ORDER BY id DESC",
									   array(':search' => $search),
															$conn);	
						if($posts){
							include 'includes/content.php';
						}else{
							echo "<h2>No Match Found.</h2>";
						}
						
					}	
					?>
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

