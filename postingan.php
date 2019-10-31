<?php
require_once("config.php");
require_once("auth.php");
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script>
    var auto_refresh = setInterval(
		function () {
		$('#postingann').load('postingan2.php').fadeIn("slow");
		}, 10000); // refresh setiap 10000 milliseconds
    </script>

</head>
<body>
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
			<div id="postingann">
				<?php include("postingan2.php") ?>
			</div>
</body>
</html>
