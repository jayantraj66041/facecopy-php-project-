
			<div class="col-lg-3 mt-3">
				<div class="list-group" style="position: fixed; width: 22%;">
				<?php
	$account = call_data("account");
foreach($account as $ac){
	if($ac['email']==$_SESSION['email']){
		
	}
	else{
?>
					<a href="me.php?cat=<?=$ac['email'];?>" class="list-group-item list-group-item-action"><b class="text-success">✿</b> <?=$ac['fname']." ".$ac['lname'];?></a><?php }} ?>
				</div>
			</div>