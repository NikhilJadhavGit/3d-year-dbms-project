<?php
$conn=mysqli_connect('localhost','root','','project') or die('error connecting server');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title><b>Login</b></title>
		<link rel="stylesheet" href="css/form.css">

		<script>
		</script>
	</head>
	<body>
		<header>
				<nav>
					<ul>
						<li><a href="aboutus.php">About us</a></li>
						<li><a href="signup.php">Signup</a></li>
						<li><a href="index.php">Home</a></li>

					</ul>
				</nav>
				<p style="margin-top: -50px;">Login</p>
		</header>
		<div id="login_bg">
			<form action="login.php" method="post">
				<table>
						<tr>
						<th>username</th>
						<td>
						 <input type="username" placeholder="username OR Email" name="usrname" required="">
						</td>
						</tr>
						<tr>
						<th>Password:</th>
						<td>
						<input type="Password" placeholder="password" name="pass" required="">
						</td>
						</tr>
						</table>
				 <div  class="submit"><input type="submit" name=submit value="login" class="btn"></div>
			</form>
		</div>
			<?php
				if(isset($_POST['submit']))
				{
					$usrname=$_POST['usrname'];
					$password=$_POST['pass'];
					$result=mysqli_query($conn,"SELECT * FROM customer WHERE username='".$usrname."' OR emailid='".$usrname."' ;");
					$row=mysqli_fetch_array($result);
					if($row)
					{

						if($row['password']==$password)
						{
							echo "<script>alert('welcome');</script>";
							session_start();
							$_SESSION['id']=$row['c_id'];
							$_SESSION['username']=$row['username'];
							$_SESSION['firstname']=$row['firstname'];
							$_SESSION['lastname']=$row['lastname'];
							$_SESSION['emailid']=$row['emailid'];
							$_SESSION['address']=$row['address'];
							echo "<script>window.open('page.php','_self');</script>";

						}
						else
						{
							echo "<script>alert('username and password does not match please try again')</script>";
						}
					}

				}
			?>
		
		<footer>
			<marquee>all rights reserved to me and my team</marquee>
		</footer>
	</body>
	<?php
		mysqli_close($conn);
	?>
</html>