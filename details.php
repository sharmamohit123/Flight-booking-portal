<?php
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
	 	$flight = new populate($db);
        $list = $flight->getFlight();
        //echo $list['name'];
   //     }
    //else{
      //  echo "Sorry! You are not logged in.";
    //}
 }
?>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/login1.js"></script>
<link rel="stylesheet" href="css/login1.css">

  <div class="wrapper" style="min-height:100px;height:300px">
	<div class="container" style="min-width:900px">
		<h1 style="color:#00004d">Fetching passenger details</h1><br><br>
		<table width=100%>
			<tr>
				<td align="right" width=15%>
					<h3 style="color:#00004d">FROM</h3>
					<h2 style="color:#00004d"><?php echo $list['source']; ?></h2>
				</td>
				<td>
					<img src="http://downloadicons.net/sites/default/files/aircraft-logo-icon-52466.png" width="50px" height="50px">
				</td>
				<td align="left" width="15%">
					<h3 style="color:#00004d">TO</h3>
					<h2 style="color:#00004d"><?php echo $list['destination']; ?></h2>
				</td>
				<td>
				<hr width="1" size="100">					
				</td>
				<td>
				<img src="https://lh3.ggpht.com/oGR9I1X9No3SfFEXrq655tETtVVzI3jIphhmEVPGPEVuM5gfwh8lOGWHQFf6gjSTvw=w300" width="50px" height="50px">
				<h2 style="color:#00004d"><?php echo $list['date']; ?></h2>
				</td>
                <td>
                    <hr width="1" size="100">
                </td>
                <td><img src="/images/<?php echo $list['brand'].".png"; ?>" width="50px" height="50px"></td>
					<td><h2 style="color:#00004d"><?php echo $list['brand']; ?></h2>
                    <h3 style="color:#00004d"><?php echo $list['name']; ?></h3></td>
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

<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Server Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="css/details.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link href="//fonts.googleapis.com/css?family=Muli:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,vietnamese" rel="stylesheet">

<!-- //css files -->
<div class="big">
<!-- main -->
<div class="w3ls-header">
	<h1 class="top">PASSENGER DETAILS</h1>
    <form action="/review_booking.php" method="post">
	<div class="header-main">
    <?php
    for($x=1;$x<=$_POST['amount'];$x++){ ?>
		<h2>Passenger<?php echo $x; ?></h2>
			<div class="header-bottom">
				<div class="header-right w3agile">
					<div class="header-left-bottom agileinfo">
							<div class="icon1">
								<input type="text" placeholder="Firstname" required name="first<?php echo $x; ?>" />
							</div>
							<div class="icon1">
								<input type="text" placeholder="Lastname" required name="last<?php echo $x; ?>" />
							</div>
                            <?php
    } ?>
							
							<div class="bottom">
								<input type="submit" value="Save" method="POST"/>
							</div>
							
					</form>	
					</div>
				</div>
			</div>
	</div>
</div>
<!--header end here-->
<!-- copyright start here -->

<!--copyright end here-->
</div>