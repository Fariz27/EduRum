<?php
    require_once("config.php");
    require_once("auth.php");
			 		echo "<pre>";
					echo "</pre>";
					$sql = "SELECT * FROM posting ORDER BY watku DESC ";
					$stmt = $db->prepare($sql);	
					$stmt->execute();
					

					while($posting = $stmt->fetch(PDO::FETCH_ASSOC)){
						?>
						<?php
							$usid = $posting['upder'];
							$sql2 = "SELECT * FROM users WHERE id = '$usid' ";
							$stmt2 = $db->prepare($sql2);	
							$stmt2->execute();
							$user = $stmt2->fetch(PDO::FETCH_ASSOC);
						?>
						<div class="boxtext">
							<div class="up	"> </div>
							<div><h3 style="margin-top: 1%; margin-bottom: 2px"><?php echo  $user['name'] ?></h3>
							<p style="margin-top: 0;"><?php echo $posting['watku'] ?></p>
							</div>
							<div style="clear:both"> </div>
							<p class="post"><?php echo $posting['valpost']; ?></p>
							<?php echo "<td><a href='reply.php?id=".$posting['idpost']."'>reply</a>";
							if($_SESSION["user"]["jabatan"]==2){
								echo "<a href='deleteuser.php?id=".$user['id']."'>delete </a></td>";
							}
							if($_SESSION["user"]["id"]==$posting['upder']){
								echo "<a href='deleteuser.php?id=".$user['id']."'>delete </a></td>";
							}
							 ?>
						</div>
						<?php
					}
					?>    