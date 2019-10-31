<?php
require_once("config.php");
$gid=$_GET['id'];
$sql = "DELETE FROM users WHERE id='$gid'";

// Prepare statement
$stmt = $db->prepare($sql);
// execute the query
$saved = $stmt->execute($params);

if($saved) header("Location: admin.php");
?>