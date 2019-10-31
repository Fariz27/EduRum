<?php

require_once("config.php");
session_start();
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

$ses=$_SESSION["user"];
$sesid=$ses['id'];
if(isset($_POST['register'])){
$nm=$_POST['name'];
$un=$_POST['username'];
$pw=password_hash($_POST["password"], PASSWORD_DEFAULT);
$em=$_POST['email'];
if($names !=  "" AND $usernames != "" AND $passwords != "" AND $emails != ""){
    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $gender = filter_input(INPUT_POST, 'jk', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $bd=$_POST['tl'];


    $sql2 = "UPDATE users SET name='$nm' , username='$un' , password='$pw' , email='$em' , gender='$gender' , address='$address' , birthday='$bd'  WHERE id='$sesid'  ";
    $stmt2 = $db->prepare($sql2);
    $stmt2->execute();
    if($stmt2) header("Location: logout.php");
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
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js">  </script>
</head>
<body>
<div class="boxlog">
    <center><h1>Edit Your Info</h1></center>
    <form method="POST">
    <span class="error">* <?php echo $nameErr;?></span>
    <span class="error"> <?php echo $usernameErr;?></span>
    <span class="error"> <?php echo $passwordErr;?></span>
    <table align="center">
    <td><input class="input" type="text" name="name" placeholder="Your Name" value="<?php echo $_SESSION['user']['name'] ?>" /></td><tr></tr>
    <td><input class="input" type="text" name="username" placeholder="Username" value="<?php echo $_SESSION['user']['username'] ?>" /></td><tr></tr>
    <td><input class="input" type="password" name="password" placeholder="Password" /></td><tr></tr>
    <td>
    <br/>            
      <input type="radio" name="jk" value="Laki-Laki" checked>Laki-Laki<br/><br/>  
      <input type="radio" name="jk" value="Perempuan">Perempuan<br/> 
    </td><tr></tr>
    <td>
      <label>Birthday </label>
      <input class="input" style="width: 250px;" type="date" name="tl">
    </td><tr></tr>
    <td><input class="input" type="email" name="email" placeholder="Email Address" value="<?php echo $_SESSION['user']['email'] ?>" /></td><tr></tr>
    <td>Alamat</td><tr></tr><td><textarea name="address" class="Area"></textarea> </td>
    </table>
    <input class="btn"  style="margin-left: 15px" type="submit" class="btn btn-success btn-block" name="register" value="Daftar" />
    </form>
    </div>  
</body>
</html> 