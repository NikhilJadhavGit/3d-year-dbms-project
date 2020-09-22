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
			$totalmoney=0;
				if($_SESSION['username']=='guest')
				{
					echo "<p>The cart feature is only available if you log in!</p><b>THANK YOU!</b>";
				}
				else
				{
							$result=mysqli_query($conn,"SELECT products.p_id,cart.cart_id,images.path,products.name,products.price,products.model, products.link FROM cart,customer,images,products,product_images WHERE products.p_id=product_images.p_id AND product_images.i_id=images.i_id AND cart.p_id=products.p_id AND cart.c_id=customer.c_id AND cart.c_id=".$_SESSION['id'].";");
							$flag=0;
					while($row=mysqli_fetch_array($result))
					{
						mysqli_query($conn,"INSERT INTO payment (payment_id, c_id, p_id, p_price) VALUES (NULL, '".$_SESSION['id']."', '".$row['p_id']."', '".$row['price']."');");
						echo "<script>alert('check your orders');window.open('cart.php','_self');</script>";
						
					}
				}
				echo "<script>alert('clear your cart');window.open('cart.php','_self');</script>"
?>