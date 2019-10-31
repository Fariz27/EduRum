<?php
require_once("auth.php");
require_once("config.php");
$upid=$_SESSION['user']['id'];
if(isset($_GET['gpost'])){

    
$vpost=$_GET['valpost'];

    
    // menyiapkan query
    $sql = "INSERT INTO posting ( valpost, idgrup, upder, idpost) 
            VALUES ('$vpost','1','$upid','')";
    $stmt = $db->prepare($sql);


    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute();

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: newmenu.php?tp=1   ");
}

?>