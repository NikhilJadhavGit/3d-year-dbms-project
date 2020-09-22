<?php
	$conn=mysqli_connect('localhost','root','','project');
	session_start();
		if(isset($_SESSION['username']))
		{
		}
		else
		{
			$_SESSION['username']='guest';
			$_SESSION['emailid']='guest';
			$_SESSION['address']='guestHouse';
		}
mysqli_query($conn,"DELETE FROM payment WHERE payment.payment_id =".$_GET['remove'].";" ); 
header('Location:transaction.php');
?>