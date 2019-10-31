<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/umenu/umenu.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/slider.css" />
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/umenu/umenu.js"></script>
    <script src="ajax/parallax/landing.js"></script>
</head>
<body>
<?php include("ajax/parallax/bg/parralax.html") ?>
<div id="conten">

    <div id="nav">
        <div class="home" onclick="al()">
            <button onclick="al()"> tes</button>
        </div>
    </div>

    <div class="head">
        <h1 id="h1head">Edu-Rum</h1><br>
        <h2 class="head-er">Education Forum Comunity</h2><br>
        <center><a href="login.php"class="btn">Lets Join Now!!</a></center>
    </div>
    <br><br><br>    
    <div style="clear:both"> </div>

    <div class=contain-box>

        <h2 class="head-isi">"Apa sih Edu-Rum itu?</h2>
        <div class="box" >
            <p class="head-isi">
            &nbsp &nbsp &nbsp Edu-Rum sebuah Website yang dapat digunakan sebagai sarana komunikasi online untuk membahas berbagai ilmu pengetahuan. 
            Website ini diharapkan dapat membantu agar siswa dapat lebih mudah dalam menyelesaikan tugasnya. 
            Website ini tidak hanya ditujukan untuk siswa yang sedang bersekolah, namun juga untuk guru maupun orang yang bekerja dibidang lain agar dapat membantu dan bertukar ide satu sama lain. 
            Website ini di desain seperti kita sedang melakukan forum ataupun rapat, hanya saja dilakukan dalam jarak jauh.
            </p>
        </div>
        <img src="assets/css/image/dis.png" alt="" style="margin-left: 100px" class="head-img kiri">
        
        <div style="clear:both"> </div>

        <h2 style="text-align: right" class="head-isi">"Apa aja sih fiturnya?</h2>
        <div class=boxright>
            <p class="head-isi">
            &nbsp &nbsp &nbsp Edu-Rum mempunyai banyak fitur. yang pertama adalah fitur forum diskusi online, disini kalian dapat berbagi masalah dan dalam proses pembelajaran. 
            Kalian juga dapat sharing materi materi pelajaran baru. 
            Kemudian kami juga akan membuat lebih banyak fitur lagi.
            </p>
        </div>
        <img src="assets/css/image/fit.png" alt=""  width="400px" class="head-img kanan">
        <div style="clear:both"> </div>
        
    </div>
        
</div>


<div id="biobox">
        <h1>Our Team</h1>
        <?php include("ajax/slide/slide.html") ?>
</div>

<div id="contact">
<center><h1>Follow Us</h1></center>
</div>
<div id="contactb">
    <br><br><br>
    <center><?php include("ajax/contact/contact.html") ?></center>
    <center><video controls width="75%" style="margin-bottom:2%" >
    <source src="assets/css/vid/smk.mp4" type="video/mp4">
    </video></center>
    <div style="clear:both"> </div>
</div>

</body>
</html>
<script>
function al(){
    alert("Hello\nHow are you?");
}
</script>