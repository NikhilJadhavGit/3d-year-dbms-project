
	<?php
		$conn=mysqli_connect('localhost','root','','project');
		session_start();
		if(isset($_SESSION['username'])){}
		else
		{
				$_SESSION['username']='guest';
				$_SESSION['emailid']='guest';
				$_SESSION['address']='guestHouse';
		}



				if(isset($_GET['addtocart']))
					{
						$flag=0;
						$result=mysqli_query($conn,"SELECT * FROM `cart` WHERE c_id=".$_SESSION['id']);
						while($row=mysqli_fetch_array($result))
						{
							if($row['p_id']==$_GET['addtocart'])
							{
								$flag=$flag+1;
							}
						}
						if($flag==0)
						{
						mysqli_query($conn,"INSERT INTO `cart` (`cart_id`, `c_id`, `p_id`) VALUES (NULL, '".$_SESSION['id']."', '".$_GET['addtocart']."');");

						echo "<script>alert('added to cart successfully!');</script>";
						echo" <script>window.open('page.php','_self')</script>";
						}
						else
						{
							?>
							<?php
							echo "<script>alert('it already exists in cart');window.open('page.php','_self')</script>";
						}
					}
					?>
