    <?php

require_once("config.php");

$nameErr = $usernameErr = $passwordErr = $websiteErr = "";
$names = $usernames = $passwords = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name belum diisi <br>";
  } else {
    $names = test_input($_POST["name"]);
  }
  if (empty($_POST["username"])) {
    $usernameErr = "* Username belum diisi <br>";
  } else {
    $usernames = test_input($_POST["name"]);
  }
  if (empty($_POST["password"])) {
    $passwordErr = "* Password belum diisi <br>";
  } else {
    $passwords = test_input($_POST["password"]);
  }
  if (empty($_POST["email"])) {
    $emailErr = "* Email belum diisi";
  } else {
    $emails = test_input($_POST["email"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if(isset($_POST['register'])){
  

    ?> <script> alert("berhasil") </script> <?php
    if($names !=  "" AND $usernames != "" AND $passwords != "" AND $emails != ""){
      // filter data yang diinputkan
      $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
      $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
      $gender = filter_input(INPUT_POST, 'jk', FILTER_SANITIZE_STRING);
      $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
      $birth = $_POST['tl'];
      // enkripsi password
      $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
      $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
      
      $sql2 = "SELECT max(id) FROM users";
      $stmt2 = $db->prepare($sql2);
      $stmt2->execute();
      $mid = $stmt2->fetch(PDO::FETCH_ASSOC);
      $mxid = $mid['max(id)'] + 1;
      // menyiapkan query
      $sql = "INSERT INTO users (name, username, email, password, gender, address, birthday, id) 
              VALUES (:name, :username, :email, :password, :gender, :address, '$birth', '$mxid')";
      $stmt = $db->prepare($sql);
  
      // bind parameter ke query
      $params = array(
          ":name" => $name,
          ":username" => $username,
          ":password" => $password,
          ":email" => $email,
          ":gender" => $gender,
          ":address" => $address
      );
  
      // eksekusi query untuk menyimpan ke database
      $saved = $stmt->execute($params);
      // jika query simpan berhasil, maka user sudah terdaftar
      // maka alihkan ke halaman login
      if($saved){
  
        echo '<script language="javascript">';
        echo 'alert("Daftar Berhasil Silakan Login")';
        echo '</script>';
        header("location: login.php");
      }
  }
  
  

}
?>
<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
<div class="boxlog">
  <br>  
    <center><img src="assets/css/image/minilogo.png" alt="" height="100px"></center>
    <form method="POST">
    <span class="error"> <?php echo $nameErr;?></span>
    <span class="error"> <?php echo $usernameErr;?></span>
    <span class="error"> <?php echo $passwordErr;?></span>
    <table align="center">
    <td><input class="input" type="text" name="name" required placeholder="Your Name" /></td><tr></tr>
    <td><input class="input" type="text" name="username" required placeholder="Username" /></td><tr></tr>
    <td>
    <br/>            
      <input type="radio" name="jk" value="Laki-Laki" checked>Laki-Laki<br/><br/>  
      <input type="radio" name="jk" value="Perempuan">Perempuan<br/> 
    </td><tr></tr>
    <td>
      <label>Birth Date </label>
      <input class="input" style="width: 250px;" type="date" name="tl" required>
    </td><tr></tr>
    <td><input class="input" type="password" name="password" placeholder="Password" required /></td><tr></tr>
    <td><input class="input" type="email" name="email" placeholder="Email Address" required /></td><tr></tr>
    <td>Alamat</td><tr></tr><td><textarea name="address" class="Area" required></textarea> </td>
    </table>
    <center><div class="g-recaptcha" data-sitekey="6Ld6aI4UAAAAAM4VkUkYD1qtf9XI0ALd2DcHP5hj"></div></center>
    <br>
    <center><input class="btn"  style="margin-left: 15px" type="submit" class="btn btn-success btn-block" name="register" value="Daftar" /></center>
    <br>
    <div style="clear:both"> </div>
    </form>
</div>  
</body>
</html>