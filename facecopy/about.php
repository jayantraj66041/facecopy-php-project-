<?php include "function/config.php"; session_start(); if(!isset($_SESSION['email'])){header("location: index.php");} ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>About | facecopy</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="icon" href="photo/logo-27.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body class="bg-light">
	<?php include "function/nav.php"; ?>
	<br><br>
	<?php
		$email = $_SESSION['email'];
	$about = call_data("about"," user = '$email'");
	foreach($about as $ab){
		$account = call_data("account"," email = '$email'");
		foreach($account as $ac){
		
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-9">
				<div class="card" style="position: absolute;">
					<img src="<?="photo/".$ab['c_img'];?>" class="card-img-top" style="height: 300px;">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-4 offset-4">
								<h4 class="text-dark"><?=$ac['fname']." ".$d['lname'];?></h4>
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
								<h4 class="text-center h5">About</h4>
							</div>
							<div class="card-body">
								<form action="about.php" method="post">
									<div class="form-group">
										<label class="small text-muted p-0 m-0">First Name</label>
										<input type="text" class="form-control rounded-0 border-top-0 border-left-0 border-right-0" name="fname" value="<?=$ac['fname'];?>">
									</div>
									<div class="form-group">
										<label class="small text-muted p-0 m-0">Last Name</label>
										<input type="text" class="form-control rounded-0 border-top-0 border-left-0 border-right-0" name="lname" value="<?=$ac['lname'];?>">
									</div>
									<div class="form-group">
										<label class="small text-muted p-0 m-0">Date of Birth</label>
										<input type="date" class="form-control rounded-0 border-top-0 border-left-0 border-right-0" name="dob" value="<?=$ac['dob'];?>">
									</div>
									<div class="form-group">
										<label class="small text-muted p-0 m-0">Education</label>
										<input type="text" class="form-control rounded-0 border-top-0 border-left-0 border-right-0" name="edu" value="<?=$ab['edu'];?>">
									</div>
									<div class="form-group">
										<label class="small text-muted p-0 m-0">Work</label>
										<input type="text" class="form-control rounded-0 border-top-0 border-left-0 border-right-0" name="work" value="<?=$ab['work'];?>">
									</div>
									<div class="form-group">
										<label class="small text-muted p-0 m-0">Address</label>
										<input type="text" class="form-control rounded-0 border-top-0 border-left-0 border-right-0" name="address" value="<?=$ab['address'];?>">
									</div>
									<div class="form-group">
										<label class="small text-muted p-0 m-0">Hometown</label>
										<input type="text" class="form-control rounded-0 border-top-0 border-left-0 border-right-0" name="hometown" value="<?=$ab['hometown'];?>">
									</div>
									<div class="form-group">
										<label class="small text-muted p-0 m-0">City</label>
										<input type="text" class="form-control rounded-0 border-top-0 border-left-0 border-right-0" name="city" value="<?=$ab['city'];?>">
									</div>
									<div class="form-group">
										<label class="small text-muted p-0 m-0">State</label>
										<input type="text" class="form-control rounded-0 border-top-0 border-left-0 border-right-0" name="state" value="<?=$ab['state'];?>">
									</div>
									<div class="form-group">
										<label class="small text-muted p-0 m-0">Pin Code</label>
										<input type="text" class="form-control rounded-0 border-top-0 border-left-0 border-right-0" name="pin" value="<?=$ab['pin'];?>">
									</div>
									<div class="form-group">
										<input type="submit" class="btn btn-block btn-info" name="update" value="Update">
									</div>
								</form>
								<?php
									if(isset($_POST['update'])){
										$fname = $_POST['fname'];
										$lname = $_POST['lname'];
										$dob = $_POST['dob'];
										$edu = $_POST['edu'];
										$work = $_POST['work'];
										$address = $_POST['address'];
										$hometown = $_POST['hometown'];
										$city = $_POST['city'];
										$state = $_POST['state'];
										$pin = $_POST['pin'];
										$email = $_SESSION['email'];
										$query1 = mysql_query("update account set fname = '$fname', lname = '$lname', dob = '$dob' where email = '$email'");
										$query2 = mysql_query("update about set edu = '$edu', work = '$work', address = '$address', hometown = '$hometown', city = '$city', state = '$state', pin = '$pin' where user = '$email'");
										redirect("profile");
										
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include "function/chat.php"; ?>
		</div>
	</div>
	<?php } } ?>
</body>
</html>