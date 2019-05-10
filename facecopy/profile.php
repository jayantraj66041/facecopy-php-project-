<?php include "function/config.php"; session_start(); if(!isset($_SESSION['email'])){ header("location: index.php");} ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profile | facecopy</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="icon" href="photo/logo-27.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
	<?php include "function/nav.php"; ?>
	<br><br>
	<?php
		$email = $_SESSION['email'];
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
						<form action="profile.php" method="post" enctype="multipart/form-data">
							<input type="file" name="img">
							<input type="submit" class="btn mt-2 ml-5 btn-sm btn-primary" value="Edit Profile" name="p_edit">
						</form>
						<?php
							if(isset($_POST['p_edit'])){
							$email = $_SESSION['email'];
								$img = $_FILES['img']['name'];
								$tmp_img = $_FILES['img']['tmp_name'];
								move_uploaded_file($tmp_img,"photo/$img");
								$query = mysql_query("update about set img = '$img' where = '$email'");
								redirect("profile");
							}
						?>
					</div>
					<div class="col-lg-8">
						<form action="profile.php" method="post" enctype="multipart/form-data" style="margin-top: 250px; margin-left: 180px;">
							<input type="file" name="c_img">
							<input type="submit" class="btn btn-sm btn-primary" value="Edit Cover" name="c_edit">
						</form>
						<?php
							if(isset($_POST['c_edit'])){
								$email = $_SESSION['email'];
								$c_img = $_FILES['c_img']['name'];
								$tmp_c_img = $_FILES['c_img']['tmp_name'];	move_uploaded_file($tmp_c_img,"photo/$c_img");
								$query = mysql_query("update about set c_img = '$c_img' where user = '$email'");
								redirect("profile");
							}
						?>
						<a href="about.php" class="btn btn-lg btn-success" style="margin-top: 30px; margin-left: 440px;">Edit Profile</a>
					</div>
				</div>
				<div class="row my-5">
					<div class="col-lg-4">
						<div class="card sticky-top">
							<div class="card-body my-5">
								<h4>Intro</h4>
								<p class="lead small"><b>Work: </b><?=$ab['work'];?></p><hr>
								<p class="lead small"><b>Education: </b><?=$ab['edu'];?></p>
								<p class="lead small"><b>Date of Birth: </b><?=$d['dob'];?></p>
								<p class="lead small"><b>Gender: </b><?= $d['gender'];?></p>
								<p class="lead small"><b>Address: </b><?= $ab['address'];?></p>
								<p class="lead small"><b>Hometown: </b><?= $ab['hometown'];?></p>
								<p class="lead small"><b>City: </b><?= $ab['city'];?></p>
								<p class="lead small"><b>State: </b><?= $ab['state'];?></p>
								<p class="lead small"><b>Pin: </b><?= $ab['pin'];?></p>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="card">
							<div class="card-header">
								<h4 class="text-center h5">Make Post</h4>
							</div>
							<div class="card-body">
								<form action="profile.php" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<input type="file" name="p_img">
									</div>
									<div class="form-group">
										<textarea class="form-control" name="p_title" placeholder="What's on your mind?"></textarea>
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
										redirect('profile');
									}
								?>
							</div>
						</div>
						<h4 class="text-center mt-5 mb-3">Posts</h4>
						<?php
							$email = $_SESSION['email'];
							$post = call_post("post"," p_email = '$email'");
							foreach($post as $p){
						?>
						<div class="card my-2">
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12">
										<h6 class="text-dark float-left py-0"><?=$d['fname']." ".$d['lname'];?><span class="small text-muted"> share a post on</span></h6>
								<div class="dropdown">
  <button class="btn btn-light float-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 		...
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="profile.php?del=<?=$p['p_id'];?>">Delete Post</a>
  </div>
</div>
									</div>
								</div>
								<div class="row">
									<p class="ml-3">
									<span class="text-muted float-left small">
										<?=date("D d M Y h:i A",strtotime($p['p_doc']));?>
									</span>
								</p>
								</div>
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
									<div class="row">
										<div class="col-lg-12">
											<p class="text-dark float-left"><b><?=$ne['fname']." ".$ne['lname'];?> </b> <?= $ct['c_title'];?></p>
									<p class="float-right text-muted"><?=date("D d M Y h:i A",strtotime($ct['c_doc']));?></p>
										</div>
									</div>
								<?php }} ?>
								<form action="profile.php" method="post" class="form-inline">
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
				</div>
			</div>
			<?php include "function/chat.php"; ?>
		</div>
	</div>
	<?php } } ?>
</body>
</html>
<?php
	if(isset($_GET['del'])){
		$del = $_GET['del'];
		$query = mysql_query("delete from post where p_id = '$del'");
		redirect("profile");
	}
	if(isset($_POST['commentbtn'])){
	$array = [
				'c_p_id' => $_POST['id'],
				'c_title' => $_POST['comment'],
				'c_email' => $_SESSION['email']
			];
			insert_data("comment",$array);
			redirect("profile");
	}
?>