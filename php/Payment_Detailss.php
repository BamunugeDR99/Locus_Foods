<!DOCTYPE html>

<html>

	<head>
	  <meta charset = "utf - 8">
	  <meta name = "description" content = "Locus food ride">
	  <meta name = "keywords" content = "HTML,delivery">
	  <meta name = "author" content = "LFD">
	  <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
	  <link rel = "stylesheet"  href = "../css/header_style.css">
	  <link rel = "stylesheet"  href = "../css/footer_style.css"> 
	  <link rel = "stylesheet"  href = "../css/side_menu_style.css">
	  <script src = "../js/side_menu_java_script.js"></script>
	  <!--<link rel = "stylesheet" href = "../css/"> your css file "your wireframe name_style.css"-->
	  <link rel = "stylesheet"  href = "../css/Payment_Detailss.css">
	  
	  <script src = "../js/Food cart_page.js"></script>
	  
	  <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico">
	  <link href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel = "stylesheet">
	  <title>Your Card Details</title>
	</head>
	<header>
	<!--<script src = "../js/"></script>-->
		<ul class = "navigation">
			<li class = "list_property logo_property"><img class = "logo" src = "../images/LocusLogo.png" alt = "Locus Food Ride Logo"></li>
			<li class = "list_property"><a class = "navigation_property" href = "home_USER.php">HOME</a></li>
			<li class = "list_property"><a class = "navigation_property" href = "restaurant_page.php">RESTAURANT</a></li>
			<li class = "list_property"><a class = "navigation_property" href = "Offers&Combos.php">ONGOING OFFERS AND COMBOS</a></li>
			<!--<li class = "list_property"><img class = "navigation_property navi head_image" src = "../images/iii.png" alt = "Search"></li>
			<!--<li class = "list_property"><input class = "txtxt" type = "text" placeholder = "Search.." ></li>-->
			<li class = "list_property1"><a class = "navigation_property navi navigation_property2" href = "Logout.php">Sign out</a></li>
			<li class = "list_property1"><a href = "User_Page.php"><img class = "navigation_property navi head_image" src = "../images/userW.png" alt = "User"></a></li>
            <li class = "list_property1"><a href= "Food_cart.php"><img class = "navigation_property head_image" src = "../images/shooping.png" alt = "Food Cart"></a></li>
		</ul>
	
	</header>
	
	
	<body>
		<div id="mySidenav" class="sidenav">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&lArr;</a>
		  <a href="User_Page.php">MY ACCOUNT</a>
             <a href = "Customer_his.php">ORDER HISTORY </a>
		  <a href="Payment_Detailss.php">PAYMENTS</a>
		  <a href="Logout.php">SIGN OUT</a>
		</div>
		<span class = "menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
		<!--
	Enter your code here...
	don't change anything ***
	-->
	<br>
	
	<?php
        session_start();

        include "config.php";
        $uID = $_SESSION['user'];
        //$a = $uID;
        //echo $a;
		$fetchQuery = mysqli_query($conn, "select * from payments where Customer_ID = '$uID' ") or die ("Could not fetch" .mysqli_error($conn));
		$i = 0;
		
		if(isset($_POST['delete'])){
			$key = $_POST['key'];
			
			//Checking whether the values exist or not
			$check = mysqli_query($conn, "select*from payments where Card_Number = '$key' ") or die("Value not found". mysqli_error($conn));
		
		
		if(mysqli_num_rows($check) > 0){
			$queryDelete = mysqli_query($conn, "DELETE FROM payments WHERE Card_Number = '$key' ") or die ("Not deleted" .mysqli_error($conn));
			//header('Location:Payment_Detailss.php');
            echo "<script type='text/javascript'>window.location.href = 'Payment_Detailss.php';</script>";
		}
	}
	?>
	
	
	
	<div class = "myDiv" style = "width:80%;">
	<h2><center>Payment Details</center></h2>
	
	<center>
	<h2><center><a href = "payment.php" ><input type = "button" value = "Add another card" style = "width:400px;" class = "btn"></a></center></h2>
	<table style = "width:100%;">
	<tr>	
		<?php 
			$j = 0;
			while($row = mysqli_fetch_array($fetchQuery)) { 
		 ?>
			<form action = "" method = "post" role = "form" >
						<td>
						<?php
						if($j == 0){
							echo('<div class = "div2" style = "width : 450px; border-radius : 7px;">');
							$j = 1+1;
						}
						else{
							echo('<div class = "div2" style = "background-color:blue; width : 450px; border-radius : 7px;">');
							$j = 0;
						}
							?>
								<h2>BRAND - <?php echo $row['Card_Type']; ?></h2><br>
								<h3> Card Number - <?php echo $row['Card_Number']; ?></h3><br>
								<h3> Card Holer Name - <?php echo $row['Card_Holder_Name']; ?></h3><br>
								<h3>EXP - <?php echo $row['Expired_Date']; ?></h3><br>
								<h1 style = "margin-left:300px; padding-right:40px;"><?php echo $row['Card_Type']; ?></h1>
							</div>
							<input type = "hidden" class = "checkmark" name = "key" value =  "<?php echo $row['Card_Number']; ?>" required>
							<center><input type = "submit" class = "btn" name = "delete" class = "s1" value = "Delete" ></center>
							<br>
						</td>
						<?php $i = $i+1; ?>
			</form>
					<?php
					if($i==2){
						echo('</tr>');
						echo('<tr>');
						$i = 0;
					}	
					
		} ?>
	
	
					
				</table>
				</center>
			</div>

	
			
	<br><br>
	
	
	</body>

	<footer style = "margin-top:100px;">
		<div class="foo">
			<div class="inner-footer" >

		

				<div class="footer-items">
					<h2> Links</h2>
					<div class="border"></div>
					<ul>
						<a href="home_USER.php"><li>Home</li></a>
						<a href="restaurant_page.php"><li>Restaurant</li></a>
						<a href="Food_cart.php"><li>Cart</li></a>
						<a href="../html/ContactUSUser.html"><li>Contact Us</li></a>
					</ul>
				</div>

				<div class="footer-items">
					<h2>About Us</h2>
					<div class="border"></div>
					<ul>
						<a href=""><li>Our Story</li></a>
						<a href=""><li>FAQ</li></a>
						<a href=""><li>Site Map</li></a>
						
					</ul>
				</div>
				

				<div class="footer-items">
					<!--<div class="border"></div>-->
					<img  id = "logoo" src="../images/logo.jpg" alt = "LOCUS FOOD RIDE">

					<ul>
						<li><i class="fa fa-map-marker" aria-hidden="true"></i>94/2 locus way colombo 7</li>
						<li><i class="fa fa-phone" aria-hidden="true"></i>+9423671245</li>
						<li><i class="fa fa-envelope" aria-hidden="true"></i>LocusFoodRide@gmail.com</li>
					</ul> 
					

				<form action = "#" target = "self" method="get">
					<h3 > Select Language </h3>
					<select class="language">
						<option> English </option>
						<option> Chinese </option>
						<option> French </option>
						<option> Spanish </option>
						<option> Latin </option>
					</select> <br> <br>
					
					<div class="social-media">
						<a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
						<a href="https://twitter.com/?lang=en"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						<a href="https://www.instagram.com/?hl=en"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						<a href="https://www.google.com/intl/si/gmail/about/#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
					</div>
				</div>
				
			</div>
			<div class="footer-bottom">
				&copy Copyright Online Food Delivery. All rights reserved.
			</div>
		</div>
	</footer>
</html>