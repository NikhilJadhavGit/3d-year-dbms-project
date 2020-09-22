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
		if($_SESSION['username']!='guest')
		{
			header("Location:page.php");
		}
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</HEAD>
<body>
					<div id="title">
						<h1>MoboMarket</h1><br>
						<p>You expect we Deliver</p>
					</div>
			<div style="width:29%;float:left;height: 10px;">
			</div>
			<div  style="width:40%;float:left;">
					<ul>
						<li><a href="login.php"> Login </a></li>
						<li><a href="signup.php">Signup</a></li>
						<li><a href="page.php">guest</a></li>
					</ul>
			</div>
		
</body>
<script type="text/javascript">
	

</script>
</HTML>