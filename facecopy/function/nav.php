<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-info">
	<a href="home.php" class="navbar-brand">FaceCopy</a>
	<form action="user.php" method="post" class="form-inline offset-3">
		<input type="text" class="form-control" name="search" placeholder="search by name or email..." size="50px">
		<input type="submit" class="btn btn-primary ml-2" name="searchbtn" value="Search">
	</form>
	<ul class="navbar-nav ml-auto">
		<li class="nav-item">
			<a href="profile.php" class="nav-link">
				<?php
					$email = $_SESSION['email'];
				$data = call_data("account","email = '$email'");
				foreach($data as $d){
					echo $d['fname'];
				}
				?>
			</a>
		</li>
		<li class="nav-item">
			<a href="home.php" class="nav-link">Home</a>
		</li>
		<li class="nav-item">
			<a href="user.php" class="nav-link">Users</a>
		</li>
		<li class="nav-item">
			<a href="logout.php" class="nav-link text-danger"><i class="fas fa-power-off"></i> <b>Log Out</b></a>
		</li>
	</ul>
</nav>