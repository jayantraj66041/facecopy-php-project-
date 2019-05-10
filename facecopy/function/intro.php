<?php
$email = $_GET['cat'];
	$about = call_data("about"," user = '$email'");
foreach($about as $ab){
?>
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
	<?php } ?>