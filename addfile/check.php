<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style1.css" type="text/css">
			<title>drop down menu</title>
	
	</head>
	
	<body>
	<div class="wrapper">
		<header>
			<h2>Parallax.com</h2>
		</header>
		<div class="navigationDeskop">
			<nav>
				<ul>
					<li><a href="#">programming</a>
						<ul>
							<?php
								
								include("db.php");
					
									$all_cat=$con->prepare("select * from main_cat");

									$all_cat->setFetchMode(PDO:: FETCH_ASSOC);
									$all_cat->execute();

									while($row_id=$all_cat->fetch()):
										
										echo"<li><a href='#'>".$row_id['cat_name']."</a></li>";
									
									endwhile;
								
								?>
								<ul>
									<li><a href="#">javascript</a></li>
									<li><a href="#">php</a></li>
									<li><a href="#">ruby</a></li>
								</ul>
							</li>
							<li><a href="#">python</a></li>
						</ul>
					</li>
					<li><a href="#">os</a>
						<ul>
							<li><a href="#">Windows</a></li>
							<li><a href="#">macintosh</a></li>
							<li><a href="#">linux</a></li>
						</ul>
					</li>
					<li><a href="#">projects</a>
						<ul>
							<li><a href="#">android</a></li>
							<li><a href="#">IOS</a></li>
							<li><a href="#">Web</a></li>
							<li><a href="#">windows</a></li>
						</ul>
					</li>
					<li><a href="like.jpg">about</a></li>
				</ul>
			</nav>
		</div>
	<article>
		<p>this my first drow down to finish after twenty minutes...
		this my first drow down to finish after twenty minutes...
		this my first drow down to finish after twenty minutes...
		this my first drow down to finish after twenty minutes...
		this my first drow down to finish after twenty minutes...
		this my first drow down to finish after twenty minutes...
		this my first drow down to finish after twenty minutes...
		this my first drow down to finish after twenty minutes...</p>
		<p>this my first drow down to finish after twenty minutes...
		this my first drow down to  <strong>parallax</strong>   finish after twenty minutes...
		this my first drow down to finish after twenty minutes...this my first drow down to finish after twenty minutes...
		this my first drow down   <strong>learn alone to very strong</strong>   to finish after twenty minutes...</p><p>this my first drow down to finish after twenty minutes...</p>
	</article>
	<footer>
	 parallax &copy:2020
	</footer>
	</div>
	
	
							
	
	</body>
</html>