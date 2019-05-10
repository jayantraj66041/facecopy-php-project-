<?php include "function/config.php"; session_start(); if(!isset($_SESSION['email'])){ header("location: index.php");} ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profile | facecopy</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="icon" href="photo/logo-27.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body class="bg-light">
	<?php include "function/nav.php"; ?>
	<br><br>
	<?php
		$email = $_GET['cat'];
		if(empty($email)){header("location: home.php");}
		$data = call_data("account"," email = '$email'");
	foreach($data as $d){
		$about = call_data("about"," user = '$email'");
		foreach($about as $ab){
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-9">
				<div class="card" style="position: absolute;">
					<img src="<?="photo/".$ab['c_img'];?>" class="card-img-top" style="height: 300px;">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-4 offset-4">
								<h4 class="text-dark"><?=$d['fname']." ".$d['lname'];?></h4>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 offset-1">
						<div class="card" style="margin-top: 150px; border-radius: 100%;">
							<img src="<?="photo/".$ab['img'];?>" class="card-img-top" style="border-radius: 1200px; height: 220px; width: 220px; background-size: cover;">
						</div>
					</div>
				</div>
				<div class="row my-5">
					<?php include "function/intro.php"; ?>
					<div class="col-lg-8">
						<h4 class="text-center mb-3">Posts</h4>
						<?php
							$email = $_GET['cat'];
							$post = call_post("post"," p_email = '$email'");
							foreach($post as $p){
						?>
						<div class="card my-2">
							<div class="card-body">
								<h6 class="text-dark py-0"><?=$d['fname']." ".$d['lname'];?> <span class="small text-muted">share a post.</span></h6>
								<hr>
								<h6 class="text-dark"><?=$p['p_title'];?></h6>
							</div>
							<img src="<?="photo/".$p['p_img'];?>" class="card-img-top">
							<div class="card-body">
							<a href="" class="btn btn-primary btn-block">
								<i class="fas fa-heart"></i> Like
							</a><br>
							<?php
								$id = $p['p_id'];
								$comment = call_data("comment"," c_p_id = '$id'");
								foreach($comment as $ct){
									$email = $ct['c_email'];
									$name = call_data("account"," email = '$email'");
									foreach($name as $ne){
							?>
								<p class="text-dark"><b><?=$ne['fname']." ".$ne['lname'];?></b> <?=$ct['c_title'];?></p>
							<?php } } ?>
								<form action="me.php?cat=<?=$p['p_email'];?>" method="post" class="form-inline">
									<div class="form-group">
										<input type="hidden" name="id" value="<?=$p['p_id'];?>">
										<input type="text" class="form-control" name="comment" size="63px" placeholder="Comment here...">
										<input type="submit" class="btn ml-2 btn-primary" name="commentbtn" value="Comments">
									</div>
								</form>
							</div>
						</div>
						<?php } ?>
					</div>
					
<?php
	if(isset($_POST['commentbtn'])){
		$mail = $_GET['cat'];
		$array = [
			'c_title' => $_POST['comment'],
			'c_p_id' => $_POST['id'],
			'c_email' => $_SESSION['email']
		];
		insert_data("comment",$array);
		redirect_cat("me",$mail);
	}
?>
				</div>
			</div>
			<?php include "function/chat.php"; ?>
		</div>
	</div>
	<?php } } ?>
</body>
</html>