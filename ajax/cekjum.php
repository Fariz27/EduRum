<?php
    require_once("config.php");
    
    $sql = "SELECT max(idpost) FROM posting ";
	$stmt = $db->prepare($sql);	
	$stmt->execute();
    $posting = $stmt->fetch(PDO::FETCH_ASSOC);
    $mp=$posting['max(idpost)'];

    if($ada == $mp){
        echo("ada sama max");
    }else{
        echo("belum sama");
        $ada = $mp;
    }

?>