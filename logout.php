<?php
include ("auth.php");
unset($_SESSION['user']);
header("location: index.php")
?>