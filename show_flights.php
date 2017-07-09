<?php
$path=$_SERVER['DOCUMENT_ROOT']; 
$pageTitle = "BOOK FLIGHT";
session_start();
include_once $path.'/common/header.php';?>
<?php include_once $path.'/common/navbar.php';?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

 
	if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])){
	 	//$path = $_SERVER['DOCUMENT_ROOT'];
	 	include_once $path.'/common/base.php'; 
	 	include_once $path.'/inc/class.users.inc.php'; 
	 	$flights = new populate($db);
        $list = $flights->showFlights();
        }
    else{
        echo "Sorry! You are not logged in.";
    }
 }
?>
 <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/login.js"></script>
<link rel="stylesheet" href="css/login.css">

  <div class="wrapper" style="min-height:100px;height:300px">
	<div class="container" style="min-width:900px">
		<h1 style="color:#00004d">Searching best flights for you.</h1><br><br>
		<table width=100%>
			<tr>
				<td align="right" width=20%>
					<h3 style="color:#00004d">FROM</h3>
					<h2 style="color:#00004d"><?php echo $_POST['source']; ?></h2>
				</td>
				<td>
					<img src="http://downloadicons.net/sites/default/files/aircraft-logo-icon-52466.png" width="50px" height="50px">
				</td>
				<td align="left" width="20%">
					<h3 style="color:#00004d">TO</h3>
					<h2 style="color:#00004d"><?php echo $_POST['destination']; ?></h2>
				</td>
				<td>
				<hr width="1" size="100">					
				</td>
				<td>
				<img src="https://lh3.ggpht.com/oGR9I1X9No3SfFEXrq655tETtVVzI3jIphhmEVPGPEVuM5gfwh8lOGWHQFf6gjSTvw=w300" width="50px" height="50px">
				<h2 style="color:#00004d"><?php echo $_POST['date']; ?></h2>
				</td>
			</tr>
		</table>

	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>

<div class="down">
	<table width="100%">
		<tr>
			<td>Flight</td>
			<td>Timing</td>
			<td>Duration</td>
			<td>Book Flight</td>
		</tr>
		</table>
		<?php

		foreach($list as $row){?>
			<table width="70%" style="background-color:white;margin-left:300px">
				<tr>
					<td><img src="/images/<?php echo $row['brand'].".png"; ?>" width="30px" height="30px"></td>
					<td><?php echo $row['brand']; ?><br><?php echo $row['name']; ?></td>
					<td><?php echo $row['timing']; ?></td>
					<td><?php echo $row['duration']; ?></td>
				<td><form method="POST" action="/review_booking.php">
					<input type="hidden" name="flight" value="<?php echo $row['flightId']; ?>">
					<input type="hidden" name="user" value="<?php echo $_SESSION['Username']; ?>">
					<input type="hidden" name="amount" value="<?php echo $_POST['passenger']; ?>">
					<button type="submit" id="login-button" method="POST">Book Flight</button>
					</form>
					</td>
				</tr>
			</table><br><br>
		<?php
		}
		?>
		</table>
</div>