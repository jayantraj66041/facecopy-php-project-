<?php include "function/config.php"; session_start(); if(!isset($_SESSION['email'])){header("location: index.php");} ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Messenger | FaceCopy</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="icon" href="photo/logo-27.png">
</head>
<body class="bg-light">
	<?php include "function/nav.php"; ?>
	<br><br><br>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-4">
				<div class="list-group">
			<?php
				$account = call_data("account");
				foreach($account as $ac){
				if($ac['email']==$_SESSION['email']){ } else{
			?>
					<a href="msg.php?msg=<?=$ac['email'];?>" class="list-group-item list-group-item-action"><?=$ac['fname']." ".$ac['lname'];?></a>
			<?php }} ?>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="card">
					<img src="photo/messenger-wallpaper.jpg" class="card-img-top">
				</div>
			</div>
		</div>
	</div>
</body>
</html>