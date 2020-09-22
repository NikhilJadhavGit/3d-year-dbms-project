<?php
	$search='';
	$product_id=4;
	$conn=mysqli_connect('localhost','root','','project');
	session_start();
	if(isset($_SESSION['username'])){}
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
				}
				num=(num+1)%2;
		}
		var images=['images/1.jpg','images/2.jpg','images/3.jpg','images/4.jpg','images/5.jpg','images/6.jpg','images/7.jpg','images/8.jpg']

		function changeimg(n)
			{
				var bimg=document.getElementById('bigimage');
				bimg.src=images[n];
			}

				
		
			
	</script>
	<link rel="stylesheet" href="container.css">
	<style type="text/css">

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
	<article>
		<div id="images">
		<img id="bigimage" src="images/1.jpg" height="400px" width="400px;" alt="hi" ><br>
		<script>
			var n=0;
			var a=images[n];
			while(1)
			{	
				a=images[n];
				if(a==null)
					break;
				document.write("<img style='margin:5px; ' src="+a+" height='50px' width='50px' alt='hi' style='float:left;' onclick='changeimg("+n+")' >")
				n++;
			}
		</script>
		<?php

				if($_SESSION['username']!='guest')
				{
				echo "<form action='addtocart.php' method='get'><button type='submit' name='addtocart' value='".$product_id."' style='width:200px;height:50px;background-color:orange;color:white;margin-top:15px;padding:0px;border-radius:5px;border:0px;'>addtocart</button></form><form action='buynow.php' method='get'><button type='submit' name='buynow' value='".$product_id."' style='width:200px;height:50px;background-color:orange;color:white;margin-top:15px;padding:0px;border-radius:5px;border:0px;'>Buy now</button></form>";
				}
					
		?>
		</div>
		<div id="content">
			<h1>IPHONE XR</h1>
		<b style='font-size: 150%;color:red;width:200px;height: 100px;border-radius: 5px;'><pre>price:Rs 49900  <del>Rs54900</del></b></pre>
		<?php

				if($_SESSION['username']!='guest')
				{
				echo "<form action='addtocart.php' method='get'><button type='submit' name='addtocart' value='".$product_id."' style='width:200px;height:50px;background-color:orange;color:white;margin-top:15px;padding:0px;border-radius:5px;border:0px;'>addtocart</button></form>";
				}
					
		?>
		<div style='width:500px;margin-left: 150px;font-size: 50%;'><p>
														 <h1> highlights :   </h1><br>6 GB RAM <br> 64 GB ROM <br>
  														15.49 cm (6.1 inch) Display<br>
														 12 MP Rear Camera | 7 MP Front Camera<br>
														 A 12 bionic chip processor<br>
			                                            ios 13 compatible <br>


                                                        <h1> specification : </h1><br>


                                                        Model Number  :MRY42HN/A<br>
                                                        
                                                        Model Name  : iPhone XR <br>
														
							Color  :  red<br>

							Browse Type :Smartphones <br>

							SIM Type  :Dual Sim<br>

							Hybrid Sim Slot : No<br>

							Touchscreen :Yes<br>

							OTG Compatible : NO<br>

							Quick Charging :Yes<br>

                                                        <h1> display features : </h1><br>

                                                        Display Size :  15.49 cm (6.1 inch)<br>

                                                        Resolution : 1792 x 828 pixels <br>

                                                        <h1> os and feature processor : </h1><br>


                                                       Internal Storage : 64 GB <br>

							Operating System: Ios 12 <br>

							Processor Type : A12 Bionic chip <br>

							<h1> Battery & Power Features : </h1><br>


							Battery Capacity : 3700 mAh <br>
  
                                                        Battery Type : lithium-ion <br>	


                                                        <br>


					                                  </p></div>       
		</div>
	</article>
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
				<img style="border:none;" src="../../bg/logo.jpg" height=250px width=250px;>

			</div>
		</div>
	</footer>
</body>

</HTML>