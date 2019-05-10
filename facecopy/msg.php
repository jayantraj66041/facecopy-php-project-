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
					if($ac['email']==$_SESSION['email']){}else{
			?>
					<a href="msg.php?msg=<?=$ac['email'];?>" class="list-group-item list-group-item-action"><?=$ac['fname']." ".$ac['lname'];?></a>
			<?php }} ?>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="card">
					<div class="card-header">
					<?php
						$email = $_GET['msg'];
						if(empty($email)){header("location: messenger.php");}
						$name = call_data("account"," email = '$email'");
						foreach($name as $ne){
					?>
						<h3 class="text-dark h5 text-center"><?= $ne['fname']." ".$ne['lname'];?></h3>
					<?php } ?>
					</div>
					<div class="card-body" style="height: 420px; width: auto; overflow: auto;">
						<div class="row">
					<?php
						$m_from = $_GET['msg'];
						$me = $_SESSION['email'];
						$messageo = call_data("messege"," m_from = '$m_from' and m_to = '$me'");
						foreach($messageo as $msgo){
					?>
							<div class="col-lg-6">
								<div class="card bg-light">
									<div class="card-body py-2">
										<h6 class="lead float-left text-dark py-0"><?=$msgo['m_msg'];?></h6>
										<span class="text-dark small float-right"><?=$msgo['m_doc'];?></span>
									</div>
								</div>
							</div>
							<div class="col-lg-6"></div>
					<?php }
						$me = $_SESSION['email'];
						$cat = $_GET['msg'];
						$messagep = call_data("messege"," m_from = '$me' and m_to = '$cat'");
						foreach($messagep as $msgp){
					?>
							<div class="col-lg-6 offset-6">
								<div class="card bg-primary">
									<div class="card-body py-2">
										<h6 class="lead float-left text-white py-0"><?=$msgp['m_msg'];?></h6>
										<span class="float-right text-white small"><?=$msgp['m_doc'];?></span>
									</div>
								</div>
							</div>
					<?php } ?>
						</div>
					</div>
					<div class="card-footer">
						<form action="msg.php?msg=<?=$_GET['msg'];?>" method="post" class="form-inline">
							<input type="text" class="form-control" name="m_msg" size="99">
							<input type="hidden" class="form-control" name="m_to" value="<?=$_GET['msg'];?>">
							<input type="submit" class="btn btn-primary ml-2" value="Send" name="msgsend">
						</form>
						<?php
							if(isset($_POST['msgsend'])){
								$semail = $_GET['msg'];
								$array = [
									'm_msg' => $_POST['m_msg'],
									'm_from' => $_SESSION['email'],
									'm_to' => $_POST['m_to']
								];
								insert_data("messege",$array);
								redirect_cat("msg",$semail,"msg");
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>