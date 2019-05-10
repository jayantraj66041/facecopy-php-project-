<?php
	$connect = mysql_connect("localhost","root","");
	$db = mysql_select_db("facecopy",$connect);

function insert_data($table,$array){
	$key = implode(",",array_keys($array));
	$value = implode("','",array_values($array));
	
	$query = mysql_query("insert into $table($key)value('$value')");
}
function redirect($page){
	echo "<script>window.open('$page.php','_self')</script>";
}
function redirect_cat($page,$email,$where=NULL){
	if($where == NULL){
		echo "<script>window.open('$page.php?cat=$email','_self')</script>";
	}
	else{
		echo "<script>window.open('$page.php?$where=$email','_self')</script>";
	}
}
function call_post($table,$cond=NULL){
	$array = [];
	if($cond==NULL){
		$query = mysql_query("select * from $table order by p_id DESC");
	}
	else{
		$query = mysql_query("select * from $table where $cond order by p_id DESC");
	}
	while($row=mysql_fetch_array($query)){
		$array[] = $row;
	}
	return $array;
}
function call_data($table,$cond=NULL){
	$array = [];
	if($cond==NULL){
		$query = mysql_query("select * from $table");
	}
	else{
		$query = mysql_query("select * from $table where $cond");
	}
	while($row=mysql_fetch_array($query)){
		$array[] = $row;
	}
	return $array;
}
?>