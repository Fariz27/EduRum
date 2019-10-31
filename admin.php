<?php
include("config.php");
require("auth.php");
if($_SESSION["user"]['jabatan'] != '2'){
    header('location: index.php');
}
?> 
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
    <div class="adminnav">
        <center><a href="newmenu.php"><img src="assets/css/image/minilogo.png" height="100px" alt=""></a><br>
        <a class="link" href="timeline.php">Forum</a>
        </center>
        </div>
        <h1 class="admin" style="color:white;float: left">ADMIN</h1>
        <?php
        $sql = "SELECT * FROM users ";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        ?>
        <form method="GET">
            <input type="search" placeholder="Cari Nama...">
            <button type="submit" id="subm">Cari</button>
        </form>
        <div class="tablediv" style="float: left;">
            <table a   align="center" border="0" cellpadding="20" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Edit</th>
            </tr>
            <?php 
                $no = 1;
                while($user = $stmt->fetch(PDO::FETCH_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <?php echo "<td class='tengah' ><a class='edituser' href='editbyadmin.php?id=".$user['id']."'>Edit</a> 
                    <a class='deltuser' href='deleteuser.php?id=".$user['id']."'>delete </a></td>" ?>
                </tr>
                <?php 
                }
                ?>
                </table>
        </div>    
        
    </body>
</html>
