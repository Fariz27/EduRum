<?php

require_once("config.php");

if(isset($_POST['register'])){

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    // menyiapkan query
    $sql = "INSERT INTO users (name, username, email, password) 
            VALUES (:name, :username, :email, :password)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":name" => $name,
        ":username" => $username,
        ":password" => $password,
        ":email" => $email
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: index.php");
}

?>
<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main1.css" />
    <script src="main.js"></script>
</head>
<body>
    <div class="boxlog">
    <center><h1>EDU-RUM</h1></center>
    <form action="POST">
    <table>
    <td>Full Name</td><td><input class="form-control" type="text" name="name" placeholder="Your Name" /></td><tr></tr>
    <td>Nickname</td><td><input class="form-control" type="text" name="username" placeholder="Username" /></td><tr></tr>
    <td>Password</td><td><input class="form-control" type="password" name="password" placeholder="Password" /></td><tr></tr>
    <td>Birth Date</td><td> </td><tr></tr>
    <td>Gender</td><td> </td><tr></tr>
    <td>Email</td><td><input class="form-control" type="email" name="email" placeholder="Email Address" /></td><tr></tr>
    <td>Address</td><td> </td>
    </table>
    <input class="btn"  style="margin-left: 15px" type="submit" class="btn btn-success btn-block" name="register" value="Daftar" />
    </form>
    </div>
</body>
</html>



<input class="form-control" type="password" name="password" placeholder="Password" />