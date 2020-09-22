<?php
	$search='';
	$product_id=1;
	$conn=mysqli_connect('localhost','root','','project');
	session_start();
	if(isset($_SESSION['username'])){}
	else
	{
			$_SESSION['username']='guest';
			$_SESSION['emailid']='guest';
			$_SESSION['address']='guestHouse';
	}

	$flag=0;
	$result=mysqli_query($conn,"SELECT * FROM payment WHERE payment.c_id=".$_SESSION['id'].";");
						while($row=mysqli_fetch_array($result))
						{
							if($row['p_id']==$_GET['buynow'])
							{
								$flag++;
							}
							else
							{}
						}
						if($flag==0)
						{
							$result1=mysqli_query($conn,"SELECT * FROM products WHERE products.p_id=".$_GET['buynow'].";");
							$row1=mysqli_fetch_array($result1);
							mysqli_query($conn,"INSERT INTO payment (payment_id, c_id, p_id, p_price) VALUES (NULL, '".$_SESSION['id']."', '".$row1['p_id']."', '".$row1['price']."');");
							echo "<script>alert('Your order is placed now.Head to your orders to view it ');window.open('page.php','_self')</script>";
						}
						else
						echo "<script>alert('Your order is placed already.Head to your orders to view it ');window.open('page.php','_self')</script>";

?>