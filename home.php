<?php
	
	$conn=mysqli_connect('localhost','root','','project') or die("unsucessfull");
	session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" href="css/home.css"></link>
	</head>
	<body>
		<header id="heade">
				<nav id="navi">
					<ul>
						<li><a href="pages/container.php">About us</a></li>
						<li><a href="signup.php">Signup</a></li>		
						<li><a href='logout.php'>logout</a></li>
					</ul>
				</nav>
			<br>
			<br>
			WELCOME <?php 
			if(isset($_SESSION['username'])){}
			else{
					$_SESSION['username']='guest';
				}	
			echo $_SESSION['username'];
			?>!<br>
				this is the site best suited for you,<br>
				all your needs are already hear<br>
				scroll down to proceed

		</header>


		<article>
			<br><br><br><br><br><br><br><br><br>
				<div class="dynamic">
					<?php
						$result=mysqli_query($conn,'SELECT products.p_id, products.name ,products.price ,products.model ,images.path
FROM products ,images,product_images
WHERE products.p_id = product_images.p_id AND product_images.i_id = images.i_id');
						while($row=mysqli_fetch_array($result))
						{
						echo '"<div style="background-color:rgba(100,100,100,0.5);border:5px solid black;border-radius:10px;margin:10px;height:200px;width:200px;float:left"><img src='.$row['path'].' height="300px width="250px>'.'product:'.$row['name'].'<br>price ₹ '.$row['price'].'</div>' ;
						}
						?>
				</div>
		</article>
		<aside>
			<br><br><br><br><br><br><br><br><br>
			<div class="static">
				bla bla bla
			</div>
		</aside>
		
		<footer>
			<marquee>all rights reserved to me and my team</marquee>
		</footer>
		<script src="script/home.js"></script>
	</body>
</html>
<?php
	mysqli_close($conn);
?>