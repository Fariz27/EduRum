<?php
include("config.php");
require("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>EduRum</title>
	<link href="styled.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		var auto_refresh = setInterval(
		function () {
		$('#load_content').load('postingan.php').fadeIn("slow");
		}, 5000); // refresh setiap 10000 milliseconds
		
	</script>

</head>
<body>

<div class="wrapper">

	<header class="header">
		<div style="float:left"><a href="newmenu.php"><img src="assets/css/image/minilogo.png" height="65px" alt=""></a></div>
		<div class="rnav"> 
			<div class="link">
		<a href="newmenu.php">BERANDA</a> &nbsp&nbsp&nbsp
		<a href="logout.php">LOGOUT</a>	&nbsp&nbsp&nbsp
			</div>
		</div>
		<div style="clear:both"></div>
	</header><!-- .header-->

	<div class="middle">

		<div class="container">
			<main class="content">
			<div class="supdate">
				<div class="kls">
					<div class="up	"> </div>
					<div><h3><?php echo  $_SESSION["user"]["name"] ?></h3></div>
					<div style="clear:both"> </div>
					<form action="getpost.php" method="GET">
					<textarea name="valpost" id="" style="width:100%"></textarea>
					<input type="submit" name="gpost" value="Posting">
					</form>
				</div>	
			</div>
			<div class="isi" id="load_content">
				<?php include("postingan.php") ?>

			</div>
			</main><!-- .content -->
		</div><!-- .container-->

		<aside class="left-sidebar">
			<center><div class="photo"> </div></center>
			<div>
				<h2><?php echo  $_SESSION["user"]["username"] ?></h2>
				<h3>sekolah</h3>
				<p class="info"><?php echo($_SESSION["user"]["address"]) ?></p>
				<a href="edit.php"><p class="info"> Edit </p></a>
			</div>
			<a href="logout.php" class="logout">logout</a>
			<div class="">

			</div>
		</aside><!-- .left-sidebar -->

		<aside class="right-sidebar">
			
		</aside><!-- .right-sidebar -->
		

	</div><!-- .middle-->

<div class="bgfoot"> </div>
<div style="clear:both"></div>
</div><!-- .wrapper -->
<footer class="footer">
</footer><!-- .footer -->

</body>
</html>