<?php
	session_start();
	include('../conn.php');
	
	if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
	header('location:../');
    exit();
	}
	
	$sq=mysqli_query($conn,"select * from `user` where userid='".$_SESSION['id']."'");
	$srow=mysqli_fetch_array($sq);
	
	$sqq=mysqli_query($conn,"select * from `file` where userid='".$_SESSION['id']."'");
	$srowfile=mysqli_fetch_array($sqq);
		
	if ($srow['access']!=2){
		header('location:../');
		exit();
	}
	
	$user=$srow['username'];
?>