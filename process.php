<?php 
//init session and conection with MYSQL DB
session_start();
$mysqli= new mysqli('localhost','root','serverus101090','crud') or die(mysql_error($mysqli));
	$id=0;
	$name='';
	$location='';
	$update=false;

// method post to save data in DB
if (isset($_POST['save'])) {
	$name = $_POST['name'];
	$location = $_POST['location'];
	$mysqli->query("INSERT INTO data(name,location) VALUES('$name','$location')") or
	die($mysqli->error);

	$_SESSION['message']="Record has been saved!";
	$_SESSION['msg_type']= "success";

	header("location: index.php");	
}	
//method delete to remove data from DB
if (isset($_GET['delete'])) {
	$id=$_GET['delete'];
	$mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

	$_SESSION['message']="Record has been deleted!";
	$_SESSION['msg_type']= "danger";

	header("location: index.php");
}
// method Edit and get to update data
if (isset($_GET['edit'])) {
	$id=$_GET['edit'];
	$update=true;
	$result=$mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
	if (@count($result)==1) {
		$row=$result->fetch_array();
		$name=$row['name'];
		$location=$row['location'];
	}
}
// method update before get data and save modify data
if (isset($_POST['update'])) {
	$id=$_POST['id'];
	$name=$_POST['name'];
	$location=$_POST['location'];
	$mysqli->query("UPDATE data SET name='$name', location='$location' WHERE id=$id") or die($mysqli->error);
	$_SESSION['message']="Record has been updated!";
	header("location: index.php");
}



?>