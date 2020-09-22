<?php
$conn=mysqli_connect('localhost','root','','try') or die("unsucessful");
?>
<!DOCTYPE HTML>
<html>
	<head>
	</head>
	<body>
		hi
		<?php
			$result=mysqli_query($conn,'SELECT * FROM try;');
			$row=mysqli_fetch_array($result);
			echo $row['name'] .' '. $row['roll'] ;
		?>
	</body>	

	<?php
	mysqli_close($conn);
	?>
</html>