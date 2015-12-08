<?php
	include "../blocks/db.php";

	if(!isset($_GET['id'])) {
		header("Location: index.php");
	}
	$id = $_GET['id'];
	$sql = "select * from projects where id=" .$id;
	$result = mysql_query($sql, $conn);
	$project = mysql_fetch_assoc($result);
?>
<!doctype html>
<html lang="en-US" class="no-js">
	<head>
		<meta charset="UTF-8">
		<title><?php echo $project['title']; ?> - aibol.kz</title>
		
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
	<body class="page custom-background single single-portfolio">
	
		<!-- wrapper -->
		<div id="page">
			
			<!-- OFFCANVAS NAVIGATION -->
			<div id="offcanvas">
			
				<div class="show-offcanvas">
					<i class="fa fa-align-justify fa-2x" style="display:none;"></i>
					<i class="fa fa-times fa-2x"></i>
				</div>
				<nav id="offcanvas-navigation">
				
					<!-- sidebar -->

					<!-- search -->
					<form class="search" method="get" action="https://oioi.se" role="search">
						<input class="search-input" type="search" name="s" placeholder="Search">
						
						<button class="search-submit" type="submit" role="button"><i id="submit-search" class="fa fa-search fa-rotate-90 fa-lg"></i></button>
					</form>
					<!-- /search -->
					<ul class="sidebar-nav">
						<li>
							<a href="../">Home</a>
						</li>
						<li class="page_item page-item-35 current_page_item">
							<a href="../projects/">My Projects</a>
						</li>
					</ul>

					<div class="sidebar-widget"></div>
		
				<!-- /sidebar -->					
				</nav>
				<div id="project-top-bar">
					<?php
						$prev_id = $id - 1;
						$next_id = $id + 1;
						$sql = "select id,title from projects where id=" . $prev_id;
						$sql2 = "select id,title from projects where id=" . $next_id;

						$res1 = mysql_query($sql, $conn);
						$res2 = mysql_query($sql2, $conn);

						$prev = mysql_fetch_assoc($res1);
						$next = mysql_fetch_assoc($res2);

						if($prev) {
							printf('<div class="col-xs-2">
										<a href="project.php?id=%s" class="load">
											<div id="previous-project"><i class="fa fa-caret-left fa-3x"></i></div>
										</a>
										<div id="previous-project-name" style="left: 8em; opacity: 0;"><h2 id="project-title">%s</h2></div>
									</div>', $prev['id'], $prev['title']);
						}
					?>
					
					<div class="col-xs-8">			
						<div class="show-offcanvas">
							<i class="fa fa-align-justify fa-2x"></i>
							<i class="fa fa-times fa-2x"></i>
						</div>			
					</div>
					<?php
						if($next) {
							printf('<div class="col-xs-2">
										<a href="project.php?id=%s" class="load">
											<div id="next-project"><i class="fa fa-caret-right fa-3x"></i></div>
										</a>
										<div id="next-project-name"><h2 id="project-title">%s</h2></div>
									</div>', $next['id'], $next['title']);
						}
					?>
					
				<!-- END PROJECT-TOP-BAR -->
				</div>	

				<div id="project-header">
					<img src=".<?php echo $project['image']; ?>" alt="<?php echo $project['title']; ?>"/>
				</div>

				<article id="post-45" >
					<div id="project-details" class="post-45 portfolio type-portfolio status-publish has-post-thumbnail hentry category-utbildning">
						<div class="container">
							<div class="row">
								<div class="col-xs-12 col-sm-3 col-sm-offset-1">
									<h2 id="project-title"><?php echo $project['title']; ?></h2>
									<p id="project-client"><?php echo $project['little_desc']; ?></p>
									<?php
										$sql = "select name from categories where id=" . $project['category'];
				    					$res = mysql_query($sql, $conn);
				    					$category = mysql_fetch_assoc($res);
									?>
									<p id="project-categories">Categories: <a href="#" rel="tag"><?php echo $category['name']; ?></a></p>
									<p id="project-tags"></p>
								</div>
								<div class="col-xs-12 col-sm-7 end">
									<p><?php echo $project['description']; ?></p>
								</div>
							</div>
						</div>
					</div>
				</article>
				<!--  FOOTER -->
				<?php include "../blocks/footer.php"; ?>

			</div>
		</div>
	</body>
</html>