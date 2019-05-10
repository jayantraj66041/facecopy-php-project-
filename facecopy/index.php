<?php include "function/config.php"; session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Facecopy | Log In</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="icon" href="photo/logo-27.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body class="bg-light">
	<nav class="navbar navbar-expand-lg navbar-dark bg-info">
		<a href="" class="navbar-brand ml-5">
			FaceCopy
		</a>
		<ul class="navbar-nav ml-auto mr-5">
			<li class="navbar-item">
				<table>
					<form action="index.php" method="post">
						<tr class="text-white">
							<td class="ml-2">Email</td>
							<td class="ml-2">Password</td>
							<td></td>
						</tr>
						<tr>
							<td class="ml-2">
								<input type="text" class="form-control form-control-sm" name="email">
							</td>
							<td class="ml-2">
								<input type="password" class="form-control form-control-sm" name="password">
							</td>
							<td>
								<input type="submit" class="btn btn-primary btn-sm" value="Log In" name="login">
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<a href="" class="nav-link mt-0">forgotten account?</a>
							</td>
						</tr>
					</form>
					<?php
						if(isset($_POST['login'])){
							$email = $_POST['email'];
							$password = $_POST['password'];
							
							$query = mysql_query("select * from account where email = '$email' and password = '$password'");
							$count = mysql_num_rows($query);
							
							if($count < 1){
								
							}
							else{
								$_SESSION['email'] = $email;
								header("location: home.php");
							}
						}
					?>
				</table>
			</li>
		</ul>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				
			</div>
			<div class="col-lg-5">
				<h2 class="text-dark">Create a new account</h2>
				<p class="lead">It's free and always will be.</p>
				<form action="index.php" method="post">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<input type="text" class="form-control" name="fname" placeholder="First name">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<input type="text" class="form-control" name="lname" placeholder="Last name">
							</div>
						</div>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="contact1" placeholder="Contact No.">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="email" placeholder="Email ID">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="password" placeholder="New Password">
					</div>
					<div class="form-group">
						<label class="mt-2 text-dark h5">Birthday</label><br>
						<input type="date" class="form-control" name="dob">
					</div>
					<div class="form-group">
						<input type="radio" name="gender" value="Female"> Female&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="gender" value="Male"> Male
					</div>
					<div class="row">
						<div class="col-lg-6">
							<input type="submit" class="btn btn-success btn-block btn-lg" name="signup" value="Sign Up">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<?php
	if(isset($_POST['signup'])){
		$array = [
			'fname' => $_POST['fname'],
			'lname' => $_POST['lname'],
			'contact1' => $_POST['contact1'],
			'email' => $_POST['email'],
			'password' => $_POST['password'],
			'dob' => $_POST['dob'],
			'gender' => $_POST['gender']
		];
		$email = $_POST['email'];
		$query = mysql_query("insert into about(user)value('$email')");
		insert_data("account",$array);
		redirect("index");
	}
?>