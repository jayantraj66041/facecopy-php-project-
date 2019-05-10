<?php include "function/config.php"; session_start(); if(!isset($_SESSION['email'])){header("location: index.php");} ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home | FaceCopy</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="icon" href="photo/logo-27.png">
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
				<?php include "function/homeleft.php";?>
					<div class="col-lg-8">
						<div class="card">
							<div class="card-header">
								<h4 class="text-center h5">Make Post</h4>
							</div>
							<div class="card-body">
								<form action="home.php" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<input type="file" name="p_img">
									</div>
									<div class="form-group">
										<textarea class="form-control" name="p_title" placeholder="What's on your mind?" style="height: 200px;"></textarea>
									</div>
									<div class="form-group">
										<input type="submit" class="btn btn-block btn-primary" name="post" value="Post">
									</div>
								</form>
								<?php
									if(isset($_POST['post'])){
										$array = [
											'p_title' => $_POST['p_title'],
											'p_img' => $_FILES['p_img']['name'],
											'p_email' => $_SESSION['email']
										];
										
										$img = $_FILES['p_img']['name'];
										$tmp_img = $_FILES['p_img']['tmp_name'];
										move_uploaded_file($tmp_img,"photo/$img");
										
										insert_data("post",$array);
										redirect('home');
									}
								?>
							</div>
						</div>
						<h4 class="text-center mt-5 mb-3">Posts</h4>
						<?php
							$post = call_post("post");
						foreach($post as $p){
							$email = $p['p_email'];
							$data = call_data("account"," email = '$email'");
						foreach($data as $d){
						?>
						<div class="card my-2">
							<div class="card-body">
								<h6 class="text-dark py-0"><?=$d['fname']." ".$d['lname'];?> <span class="small text-muted">share a post.</span></h6>
								<p>
									<span class="text-muted float-left small">
										<?=date("D d M Y h:i A",strtotime($p['p_doc']));?>
									</span>
								</p><br>
								<hr>
								<h6 class="text-dark mb-0"><?=$p['p_title'];?></h6>
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
									<div class="row">
										<div class="col-lg-12">
											<p class="text-dark float-left"><b><?=$ne['fname']." ".$ne['lname'];?> </b> <?= $ct['c_title'];?></p>
									<p class="float-right text-muted"><?=date("D d M Y h:i A",strtotime($ct['c_doc']));?></p>
										</div>
									</div>
								<?php }} ?>
								<form action="home.php" method="post" class="form-inline">
									<div class="form-group">
										<input type="hidden" name="id" value="<?=$p['p_id'];?>">
										<input type="text" class="form-control" name="comment" size="62px" placeholder="Comment here...">
										<input type="submit" class="btn ml-2 btn-primary" name="commentbtn" value="Comments">
									</div>
								</form>
							</div>
						</div>
						<?php }} ?>
					</div>
				</div>
			</div>
			<?php include "function/chat.php"; ?>
		</div>
	</div>
	<?php } ?>
</body>
</html>
<?php
	if(isset($_POST['commentbtn'])){
	$array = [
				'c_p_id' => $_POST['id'],
				'c_title' => $_POST['comment'],
				'c_email' => $_SESSION['email']
			];
			insert_data("comment",$array);
			redirect("home");
		}
	?>