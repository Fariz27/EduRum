<?php
include("config.php");
require_once("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/newmenu/newmenu.css" />
    <script src="assets/js/newmenu/newmenu.js"></script>
    <script src="assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
</head>
<body>
    <section class="header">
        <img src="assets/css/image/minilogo.png" style="float:left" height="50px;" alt="">
        <div class="search">
            <form action="">
            <img src="assets/css/newmenu/lup.png" height="30px" alt="">
            <input type="search" placeholder="Search content...">
            <button>cari</button>
            </form>
        </div>
        <div class="navb">
                <a class="rnav" href="#" id="feedback">Feedback</a>
                <a class="rnav" href="#">News</a>
                <a class="rnav" href="#" id="forum">Forum</a>
                <a class="rnav" href="#" id="home">Home</a>
        </div>
        <div style="clear:both"></div>
    </section>
    <section>
    
    <div class="middle">

		<div class="container">
			<main class="content">
			<div class="isi" id="load_content">
                <?php 
                if(isset($_GET['tp'])){
                    if($_GET['tp']==1){
                        include("postingan.php");
                    }if($_GET['tp']==0){
                        include("home.php");
                    }if($_GET['tp']==2){
                        include("feedback.php");
                    }
                    
                }else{
                    include("home.php");
                }
                ?>
			</div>
			</main><!-- .content -->
		</div><!-- .container-->

		<aside class="left-sidebar" id="sidebar">
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

		

	</div><!-- .middle-->

    </section>
</body>
</html>
<script>
$(function() {

var $sidebar   = $("#sidebar"), 
    $window    = $(window),
    offset     = $sidebar.offset(),
    topPadding = 15;

$window.scroll(function() {
    if ($window.scrollTop() > offset.top) {
        $sidebar.stop().animate({
            marginTop: $window.scrollTop() - offset.top + topPadding
        });
    } else {
        $sidebar.stop().animate({
            marginTop: 0
        });
    }
});

});
$( "#feedback" ).click(function() {
    $('#load_content').load('feedback.php?tp=2').fadeIn("slow");
});
$( "#forum" ).click(function() {
    $('#load_content').load('postingan.php?tp=1').fadeIn("slow");
});
$( "#home" ).click(function() {
    $('#load_content').load('home.php?tp=0').fadeIn("slow");
});

</script>
