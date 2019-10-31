<?php 
session_start();
require_once("config.php");
if(isset($_SESSION['user'])){
    header("location: newmenu.php ");
}

if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE username=:username OR email=:email";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":email" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar
    if($user){
        // verifikasi password
        if(password_verify($password, $user["password"])){
            if($user['jabatan']==2){
                session_start();
                $_SESSION["user"] = $user;
                header("Location: admin.php");    
            }else{
            // buat Session
            session_start();
            $_SESSION["user"] = $user;
            // login sukses, alihkan ke halaman timeline
            header("Location: newmenu.php");
            }
        }
    }
}


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="kotak">     </div>
    <div class="main">
            <div class="panel">
                <div><a href="utama.php" id="join_pop">Sign Up</a></div>
                <div><a href="#login_form" id="login_pop">Log In</a></div>
            </div>
    </div>
    <br><br><br><br><br><br><br>
    <div align="center"><h1 class="npage">Edu-Rum</h1></div>
    <div align="center"><h1 class="nbpage">Education Forum Community</h1></div>
        <form action="" method="POST">  
        <!-- popup form #1 -->
        <a href="#x" class="overlay" id="login_form"></a>
        <div class="popup">
        <center><h2>LOGIN</h2></center>
            <p>Masukan username dan password anda!</p>
            <div>
                <center><input class="tombol" type="text"   name="username" placeholder="Username atau email" /></center>
            </div>
            <div>
            <center><input class="tombol" type="password" required name="password" placeholder="Password" /></center>
            </div>
            <center><input class="btn" type="submit" name="login" value="Masuk" /></center>
            <a class="close" href="#close"></a>
            </form>
        </div>
    <div id=footer>
        <p>Created by: 4Dev</p>
    </div>  

</body>
</html> 

<!--<form action="" method="POST">

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" name="name" placeholder="Nama kamu" />
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Username" />
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Alamat Email" />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password" />
            </div>

            <input type="submit" class="btn btn-success btn-block" name="register" value="Daftar" />

        </form>
-->