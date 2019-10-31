<?php
require_once("config.php");
require_once("auth.php");
?>

    <?php
                    $posid = $_GET['id'];
					$sql = "SELECT * FROM posting WHERE idpost = $posid ";
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
						</div>
						<?php
					}
					?>    
				<div class="kls">
					<div class="up	"> </div>
					<div><h3><?php echo  $_SESSION["user"]["name"] ?></h3></div>
					<div style="clear:both"> </div>
					<form action="getpost.php" method="GET">
					<textarea name="valpost" id="" style="width:100%"></textarea>
					<input type="submit" name="gpost" value="Posting">
					</form>
				</div>	