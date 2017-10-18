<?php
$cars = array("INDIGO", "SPICEJET", "AIR INDIA");
$path=$_SERVER['DOCUMENT_ROOT']; 
$pageTitle = "BOOK FLIGHT";
session_start();
include_once $path.'/common/header.php';?>
<?php include_once $path.'/common/navbar.php';?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

 
	//if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])){
	 	include_once $path.'/common/base.php'; 
	 	include_once $path.'/inc/class.users.inc.php'; 
	 	$flights = new populate($db);
        $list = $flights->showFlights();
   //     }
    //else{
      //  echo "Sorry! You are not logged in.";
    //}
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
	<br>
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
	<?php
	if(empty($list)){?>
			<br><br><br><br><br>
			<img src="./images/sorry.png" width="200px" height="200px" style="margin-left:500px">
			<h1 style="color:white;text-align:center"> Sorry! No flights are found on this date.</h1>
			<form class="form">
			<button type="button" id="login-button" onclick="call()" style="margin-left:500px;width:200px">Search another flight</button>
		</form>
		<?php } 
		else{ ?>
	<table width="70%" style="background-color:#00004d;margin-left:300px;color:white">
		<tr>
			<td align="center">Flight</td>
			<td width="30%">Timing</td>
			<td width="15%">Duration</td>
			<td width="25%">Book Flight</td>
		</tr>
		</table><br>
		<div id="filter">
		<?php

		foreach($list as $row){ ?>
			<table width="70%" style="background-color:#ffcc99;margin-left:300px;border-radius:8px;color:#00004d">
				<tr>
					<td><img src="/images/<?php echo $row['brand'].".png"; ?>" width="30px" height="30px"></td>
					<td><?php echo $row['brand']; ?><br><?php echo $row['name']; ?></td>
					<td width="30%"><?php echo $row['timing']; ?></td>
					<td width="15%"><?php echo $row['duration']; ?></td>
				<td width="25%" height="70px">
					<?php
						if(empty($_SESSION['LoggedIn']) && empty($_SESSION['Username'])){
							//$set = TRUE; 
							?>
							<button type="button" class="login-button1" onclick="myFunction()">Book</button>
						<?php }
					else{ ?>
					<form method="POST" action="/details.php">
					<input type="hidden" name="flight" value="<?php echo $row['flightId']; ?>">
					<input type="hidden" name="user" value="<?php echo $_SESSION['Username']; ?>">
					<input type="hidden" name="amount" value="<?php echo $_POST['passenger']; ?>">
					<button type="submit" class="login-button1" method="POST">Book</button>
					</form>
					<?php } ?>
					</td> 
				</tr>
			</table><br>
		<?php
		} ?>
		</div>
		<?php
		}
		?>
		<input type="checkbox" id="indigo" onclick="todo()">
		</div>

<script>
			var flight = ['mu', 'po'];
			//var content="";
			//var s = JSON.stringify(flight);
			

function myFunction() {
	document.getElementById('change').innerHTML="<meta http-equiv='refresh' content='3; url=/login.php'>"; 
}
function call() {
	document.getElementById('change').innerHTML="<meta http-equiv='refresh' content='3; url=/new_booking.php'>"; 
}
</script>
<?php include_once $path.'/common/close.php';?>
