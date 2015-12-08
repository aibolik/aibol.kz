<!doctype html>
<html lang="en-US" class="no-js">
	<head>
		<meta charset="UTF-8">
		<title>My Projects - aibol.kz</title>
		
		<!-- meta -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no,maximum-scale=1">
		<meta name="description" content="Projects section of Aibol Kussain's site">
		<meta name="keywords" content="Aibol Kussain,personal site,web developer,mobile developer,programming,programmer,projects">
		<!-- icons -->
		<link href="../icons/favicon.jpg" rel="shortcut icon">		
		<link href="../icons/touch.png" rel="apple-touch-icon-precomposed">
			
		<!-- css + javascript -->
		<link rel='stylesheet' id='font-awesome-css'  href='../css/font-awesome.min.css' media='all' />
		<link rel='stylesheet' id='google-fonts-css'  href='../fonts/fonts.css' media='all' />
		<link rel='stylesheet' id='normalize-css'  href='../css/normalize.min.css' media='all' />
		<link rel='stylesheet' id='bootstrap-css'  href='../css/bootstrap.min.css' media='all' />
		<link rel='stylesheet' id='cotton-css'  href='../css/style.min.css' media='all' />
		<link rel='stylesheet' id='custom-styles-css'  href='../css/custom-styles.min.css' media='all' />

		<script type='text/javascript' src='../js/jquery.min.js'></script>
		<script type='text/javascript' src='../js/conditionizr.min.js'></script>
		<script type='text/javascript' src='../js/modernizr.js'></script>  <!-- FOR NAV RESPONSE -->
		<script type='text/javascript' src='../js/jquery.easing.min.js'></script> <!-- FOR SMOOTH MOVING SCROLL -->
		<script type='text/javascript' src='../js/jquery.mixitup.js'></script> <!-- WORKS SECTION -->
		<script type='text/javascript' src='../js/bootstrap.min.js'></script>
		<script type='text/javascript' src='../js/scripts.min.js'></script>

		<?php
			include "../blocks/google_analytics.php";
		?>

	</head>
	<body class="page custom-background">
	
		<!-- wrapper -->
		<div id="page">
			
			<!-- OFFCANVAS NAVIGATION -->
			<div id="offcanvas">
				<div class="show-offcanvas">
					<i class="fa fa-align-justify fa-2x"></i>
					<i class="fa fa-times fa-2x"></i>
				</div>
	
				<nav id="offcanvas-navigation">
					<!-- search -->
					<form class="search" method="get" action="" role="search">
						<input class="search-input" type="search" name="s" placeholder="Search">
						<button class="search-submit" type="submit" role="button"><i id="submit-search" class="fa fa-search fa-rotate-90 fa-lg"></i></button>
					</form>
					<!-- /search -->
					<ul class="sidebar-nav">
						<li><a href="../">Home</a></li>
						<li class="page_item page-item-35 current_page_item"><a href="../projects">My Projects</a></li>
					</ul>
				</nav>
			</div>
			<!-- /OFFCANVAS NAVIGATION -->
			<section class="page-section" role="main">
				<!-- header -->
				<header id="blog-header">
					<div class="align-horizontal">
						<div class="align-vertical">
							<div class="container">
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-sm-offset-3">
										<h1>My Projects</h1>
										<h3 class="meta">Recently done project works</h3>
										</div>
								</div>
							</div>
						</div>
					</div>
				</header>
				<!-- /header -->	
		
				<!-- page content -->
				<div id="page-content">
					<div class="container">
						<div class="row">
							<div id="portfolio" class="row">
								<div class="col-xs-12">
									<div class="work-filter center-list">
				    					<ul class="list-inline hidden-xs">
				        					<li class="filter active" data-filter="all">all</li>
				        					<?php
					        					include "../blocks/db.php";

	    										$sql = "select * from categories";
	    										$result = mysql_query($sql, $conn);

	    										while($row = mysql_fetch_assoc($result)) {
	    											printf('<li class="filter" data-filter="%s">%s</li>', $row['key_name'], strtolower($row['name']));
	    										}
				        					?>
					        			</ul>
									</div>
								</div>
							</div>
							<div id="work-container" class="row work-container">
								<?php
				    				$sql = "select id,title,image,category from projects";
				    				$result = mysql_query($sql, $conn);

				    				while($row = mysql_fetch_assoc($result)) {
				    					$sql2 = "select key_name from categories where id=" . $row['category'];
				    					$res = mysql_query($sql2, $conn);
				    					$category = mysql_fetch_assoc($res);
				    					printf('<div class="col-xs-12 col-sm-6 col-md-4 mix all %s">
													<a href="project.php?id=%s" class="load" title="%s">
														<div class="work">
															<img src=".%s" class="attachment-post-thumbnail wp-post-image" alt="work2" />
															<div class="work-info">
																<h3>%s</h3>
															</div>
														</div>
													</a>
												</div>', $category['key_name'], $row['id'], $row['title'], $row['image'], $row['title']);
				    				}
				    			?>
							</div>
						</div>
					</div>
				</div>
				<!-- /page content -->
			</section>
			<!-- /section -->
			<?php include "../blocks/footer.php"; ?>
		
		</div>
		<!-- /wrapper -->
		<script>
		jQuery('#work-container').mixitup({
					targetDisplayGrid: 'block'
				});				
		</script>
	</body>
</html>