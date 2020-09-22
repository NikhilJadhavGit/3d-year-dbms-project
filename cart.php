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
?>
<!DOCTYPE HTML>
<HTML>
<head>
	<script type="text/javascript">
		var num=1;
		function display()
		{
				if(num==0)
				{
					var a=document.getElementById('menustyle');
					a.style.display='none';
				}
				else
				{
					var a=document.getElementById('menustyle');
					a.style.display='block';
					a.style.height='700px;'	
				}
				num=(num+1)%2;
		}
	</script>
	<link rel="stylesheet" href="css/container.css">
	<style type="text/css">
						.block{
							height:150px;
							width:150px;
							background-color:rgba(255,200,200,0.75);
							float:left;
							margin-right: 5px;
						}
						.block:hover{
							background-color: rgba(255,150,150,1);
							transition: 1s;
						}
						.bigblock{
							height:300px;
							width:300px;
							background-color:rgba(255,200,200,0.75);
							float:left;
							margin: 12px;
						}
						.bigblock:hover{
							background-color: rgba(255,150,150,1);
							transition: 1s;
						}
						.btncontainer{
							margin-top: 25px;
							margin-left: 10px;
							height:50px;
							width:50px;
							border-radius: 50%;
							background-color: rgba(255,255,0,0.0);
							
						}
						.bars{
							
							height:5px;
							width:35px;
							margin-top: 5px;
							background-color: red;
							
						}
						#menustyle{
							position:absolute;
							float: left;
							width: 20%;
							background-color: #4e4e50;
							display: none;
							animation-name: leftright;
							animation-duration: 0.5s;
							height:700px;
						}
						@keyFrames leftright{
								from{left:-20%;}
								to{left:0%;}
							}

						.btncontainer:hover{
							transition: 0.75s;
							background-color: rgba(255,255,0,0.7);
						}
						article{
							text-align: center;
						}

	</style>

</head>
<body>
	<header id=head>
		<div style="width:5%;float:left;">
			<button class="btncontainer" onclick="display();">
				<div class="bars">
				</div>
				<div class="bars">
				</div>
				<div class="bars">
				</div>
			</button>
		</div>
		<div style="width:15%;float:left;">
			<h1 style="color:white;margin-bottom: -25px;">MoboMarket</h1><br>
			<span style="color:white;font-size: 75%;">You expect we deliver</span>
		</div>
		<div style="width:40%;float:left;">
			<form action="../../search.php" method="get">
				<input type="search" name="search" placeholder="SEARCH" id="search">
				<input type="submit" value="GO" id="go">
			</form>
		</div>
		<div style="width:40%;float:left">
			
		<nav id="navi">
					<ul>
						<?php
						if($_SESSION['username']=='guest')
							{
								echo "<li><a href='../../signup.php'>signup</a></li><li><a href='../../login.php'>login</a></li>";
							} 
							else
							{
								echo "<li><a href='../../cart.php'>Cart</a></li><li><a href='../../logout.php'>logout</a></li>";		
							}
						?>
						<li><a href="#">About us</a></li>
						<li><a href="../../index.php">Home</a></li>		
						
					</ul>
				</nav>
		</div>
	</header>
		
		
	<div id="menustyle">
		<b>username:</b><?php echo $_SESSION['username']; ?>
		<br><hr><b>mailid:</b><?php echo $_SESSION['emailid']; ?>
		<?php
			if($_SESSION['username']=='guest')
			{}
			else
				echo "<br><hr><b><a href='../../cart.php'><span style='color:white'>Cart</span></a></b>"
		?>
		<?php
			if($_SESSION['username']=='guest')
			{}
			else
				echo "<br><hr><b><a href='../../transaction.php'><span style='color:white'>Your orders</span></a></b>"
		?>
		<br><hr><b>adderss:</b><?php echo $_SESSION['address']; ?>
	</div>
	<article style="float:none;">
		<h2><em>CART</em></h5><br>
			<?php
			$totalmoney=0;
				if($_SESSION['username']=='guest')
				{
					echo "<p>The cart feature is only available if you log in!</p><b>THANK YOU!</b>";
				}
				else
				{
					$result=mysqli_query($conn,"CALL allcart(".$_SESSION['id'].");");
					$cart=0;
			while($row=mysqli_fetch_array($result))
			{
				$totalmoney=$totalmoney+$row['price'];
				$cart++;
				echo "<div class='bigblock'>
						<a href='pages".$row['link']."'><img src='pages".$row['path']."' height='200px' width='200px' alt='img'></a><br><a href='pages".$row['link']."'>".$row['name']."<br>"."Rs:".$row['price']."</a><form action='removefromcart.php' method='get'><button type='submit' name='remove' value='".$row['cart_id']."' style='width:150px;height:45px;background-color:orange;color:white;margin:0px;padding:0px;border-radius:5px;border:0px;'>remove from cart</button></form></div>";

				
			}

			
				}

				?>



	</article>
	<?php 
	if($cart==0)
			{
				echo "<p><b>your cart is currently empty<b></p>";
			}
			echo "<div style='width:720px;float:none;margin:250px;'><p style='margin-top:00px;'><br><br><b>Total Rs:".$totalmoney."</b><form action='buyfullcart.php' method='get'><input type='submit' name='buynow' value='buy Entire cart!' style='width:200px;height:50px;background-color:orange;color:white;margin-top:5px;padding:0px;border-radius:5px;border:0px;'></form></p></div>";?>
<footer>
		
		<div>
			<a href="#head">BACK TO TOP</a>
		</div>
		<div>
			<div class="foot">
				know about us<br>
				<b><a href='#'>Sanket Vetal</a><br>
				<a href='#'>Vaibhav Patil</a><br>
				<a href='#'>Vrushabh Kakkad</a><br>
				<a href='#'>Nikhil Jadhav</a><br></b>
			</div>
			<div class="foot">
				<b>categories<br>
				<a href='../../headphonesearch.php'>headphones</a><br>
				<a href='../../phonesearch.php'>phones</a><br>
				<a href='../../accessoriessearch.php'>accessories</a><br>
				</b>
			</div>
			<div style="float:left;margin-left: 70px;">
				<img style="border:none;" src="bg/logo.jpg" height=250px width=250px;>

			</div>
		</div>
	</footer>
</body>
</HTML>