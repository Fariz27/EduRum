<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
<?php
        include("config.php");
        $sql = "SELECT * FROM users WHERE username LIKE '%ade%' ";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        ?>
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
</body>
</html>
