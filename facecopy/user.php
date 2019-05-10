<?php include "function/config.php"; session_start(); if(!isset($_SESSION['email'])){header("location: index.php");} ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home | FaceCopy</title>
	<link rel="icon" href="photo/logo-27.png">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body class="bg-light">
	<?php include "function/nav.php"; ?>
	<br><br>
	<?php
	$email = $_SESSION['email'];
		$data = call_data("account"," email = '$email'");
	foreach($data as $d){
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-9">
				<div class="row my-3">
					<?php include "function/homeleft.php"; ?>
					<div class="col-lg-8">
					<h4 class="text-danger">
						<?php
							if(isset($_POST['searchbtn'])){
								$search = strtoupper($_POST['search']);
								echo "<h4 class='text-danger'>Your search $search...</h4>";
							}
						?>
					</h4>
						<div class="row">
					<?php
						if(isset($_POST['searchbtn'])){
							$search = $_POST['search'];
							$account = call_data("account"," fname like '%$search%' or lname like '%$search' or email like '%$search' or contact1 like '%$search'");
						}
						else{
							$account = call_data("account");
						}
						foreach($account as $ac){
							if($ac['email']==$_SESSION['email']){} else{
								$email = $ac['email'];
								$pic = call_data("about"," user = '$email'");
								foreach($pic as $p){
					?>
							<div class="col-lg-6 mt-4">
								<a href="me.php?cat=<?=$ac['email'];?>">
								<div class="card">
									<img src="<?="photo/".$p['img'];?>" class="card-img-top">
									<div class="card-body">
										<p class="text-dark"><?=$ac['fname']." ".$ac['lname'];?></p>
									</div>
								</div>
								</a>
							</div>
					<?php }}} ?>
						</div>
					</div>
				</div>
			</div>
			<?php include "function/chat.php"; ?>
		</div>
	</div>
	<?php } ?>
</body>
</html>