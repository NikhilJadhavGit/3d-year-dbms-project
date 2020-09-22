<?php
	$conn=mysqli_connect('localhost','root','','project') or die('failed');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>sign up</title>
		<link rel="stylesheet" href="css/form.css">
		<script>

			var a=document.getElementById('pic');
			var b=document.getElementById('profilepic');
			function previewer() 
				{
					b.src="images/1.png";
					alert('hi');
				}
		</script>
	</head>
	<body>
		<?php  

			?>
		<header>
				<nav>
					<ul>
						<li><a href="aboutus.php">About us</li>
						<li><a href="login.php">Login</li>
						<li><a href="index.php">Home</a>

					</ul>
				</nav>
				<p style="margin-top:-50px;">SIGN UP</p>
		</header>
		<div id="form_bg">
			
			<form onsubmit="return validate()" method="post" action="signup.php">
				<table>
				<tr>
					<td>
						First name:
					</td>
					<td>
						<input type="name" placeholder="first name" name="fname" id="fn" required="">
					</td>
				</tr>
				<tr>
					<td>
				 		Last name:
				 	</td>
				 	<td>
						 <input type="name" placeholder="last name"  name="lname" id="ln" required="">
				 	</td>
				 </tr>
				 <tr>
				 	<td>
				 		Email id:
				 	</td>
					<td>				 
				 		<input type="Email" placeholder="Email@email.com" name="email" id="em" required="">
				 	</td>
				 </tr>
				 <tr>
				 	<td>
				 		username
				 	</td>
				 	<td>
				 	<input type="username" placeholder="username" name="usrname" id="usr" required="">
				 	</td>
				 </tr>
				 <tr>
				 	<td>
				 		Password:
				 	</th>
				 	<td>
					 <input type="Password" placeholder="password" name="pass" id="pas" required="">
					</td>
				</tr>
				<tr>
					<td>
				 	Confirm:
				 	</td>
				 	<td>
				 	<input type="Password" placeholder="password" name="cpass" id="cpas" required="">
				 	</td>
				 </tr>
				 <tr>
				 	<td>
				 		address:
				 	</td>
				 	<td>
				 	<textarea   placeholder="address" name="addr" id="addr" height="50px" required=""></textarea>
				 	</td>
				 </tr>
				</table>
				 <input type="submit" value="submit" name='submit' class="btn">
				
			</form>
			<?php

				if(isset($_POST['submit']))
				{
					$uname=$_POST['usrname'];
					$firstname=$_POST['fname'];
					$lastname=$_POST['lname'];
					$email=$_POST['email'];
					$password=$_POST['pass'];
					$address=$_POST['addr'];
					$flag=0;
					$result=mysqli_query($conn,"SELECT username,emailid FROM customer");
					while($row=mysqli_fetch_array($result))
					{
						if($row['username']==$uname)
						{
							echo "<script>alert('the user name already exists');</script>";
							$flag++;
						}
						if($row['emailid']==$email)
						{
							echo "<script>alert('the email already exists');</script>";
							$flag++;
						}
					}
					if($flag==0)
					{
						if(mysqli_query($conn,"INSERT INTO `customer` (`c_id`, `username`, `firstname`, `lastname`, `emailid`, `password`, `address`) VALUES (NULL, '".$uname."', '".$firstname."', '".$lastname."', '".$email."', '".$password."', '".$address."');"))
						{
							echo "<script>window.open('login.php','_self');</script>";
						}

					}
					else
					{

					}
			}
			?>
		</div>
		<footer>
			<marquee>all rights reserved to me and my team</marquee>
		</footer>
		<script src="script/signup.js"></script>
		<?php
			mysqli_close($conn);
		?>
	</body>

</html>