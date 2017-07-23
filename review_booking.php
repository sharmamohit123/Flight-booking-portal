<?php
//$cars = array("INDIGO", "SPICEJET", "AIR INDIA");
$path=$_SERVER['DOCUMENT_ROOT']; 
$pageTitle = "REVIEW BOOKING";
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
		$user = new bookingUsers($db);
		$row = $user->getUser();
 }
?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Diamond Pricing Tables template Responsive, Login form web template,Flat Pricing w3tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Default-JavaScript-File -->
	<script type="text/javascript" src="css/js/jquery-2.1.4.min.js"></script>
<!-- //Default-JavaScript-File -->

<!-- default-css-files -->
	<link href="css/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<!-- default-css-files -->

<link href="css/css/popup-box.css" rel="stylesheet" type="text/css" media="all" /><!-- popup css -->  

<!-- style.css-file -->
	<link href="css/css/style.css" rel='stylesheet' type='text/css' />
<!-- //style.css-file -->

<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">

<style>
	.icon11{
background :url(https://www.jamf.com/jamf-nation/img/default-avatars/generic-user.png); 
background-repeat: no-repeat;
    background-position:right center;
    background-origin: content-box;
    background-size: 1.5rem 1.5rem;  
}

	.icon2{
background :url(./images/email.png); 
background-repeat: no-repeat;
    background-position:right center;
    background-origin: content-box;
    background-size: 1.5rem 1.5rem;  
}

	.icon3{
background :url(http://www.wetutorathome.com/images/icon-phone-2.png); 
background-repeat: no-repeat;
    background-position:right center;
    background-origin: content-box;
    background-size: 1.5rem 1.5rem;  
}
</style>

<!-- /plans -->
<div style="background-color:#00004d;height:1000px">
<div class="plans-section">
	<div class="plans-main">
		<h1 class="w3l-inner-h-title">review your booking</h1><br><br>
		<table>
			<tr>
				<td>
				 <div class="price-grid" style="width:100%;height:100%">
					<div class="price-block agile">
						<div class="price-gd-top pric-clr1">
							<img src="https://images.trvl-media.com/media/content/expus/graphics/launch/home/tvly/150324_flights-hero-image_1330x742.jpg" width="100%">
							<h4>Flight details</h4>
							<table style="margin-left:150px">
								<tr>
									<td colspan="2"><h5><?php echo $list['source']; ?> TO <?php echo $list['destination']; ?></h5></td>
								</tr>
								<tr>
									<td>
							<img src="/images/<?php echo $list['brand'].".png"; ?>" width="60px" height="60px">
									</td>
									<td>
							<h5><?php echo $list['brand']; ?><br>
							<?php echo $list['name']; ?></h5>
									</td>
									</tr>
									<tr><td colspan="2">
							<h5><?php echo $list['timing']; ?></h5>
									</td></tr>
									<tr><td colspan="2">
							<h5><?php echo $list['duration']; ?></h5>
									</td></tr>
									</table>
						</div>
							 <form action="/booked.php" method="POST">
							 <input type="hidden" name="flight" value="<?php echo $_POST['flightId']; ?>">
							 <input type="hidden" name="user" value="<?php echo $row['userId']; ?>">
							 <input type="hidden" name="amount" value="<?php echo $_POST['amount']; ?>">
							 <?php
							 	$detail = $_POST['first1'].' '.$_POST['last1'];
								 for($x=2;$x<=$_POST['amount'];$x++){
									 $detail= $detail.','.$_POST['first'.$x].' '.$_POST['last'.$x];
								 }
								//echo $detail;
								function generatePNR($length = 7) {
    								$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   									 $charactersLength = strlen($characters);
    									$randomString = '';
    								for ($i = 0; $i < $length; $i++) {
       									 $randomString .= $characters[rand(0, $charactersLength - 1)];
    								}
   									 return $randomString;
								}
								$pnr = generatePNR();
								?>
							 <input type="hidden" name="detail" value="<?php echo $detail; ?>">
							 <input type="hidden" name="contact" value="<?php echo $detail; ?>">
							 <input type="hidden" name="pnr" value="<?php echo $pnr; ?>">
								<div class="w3_submit">
									<input type="submit" class="register" value="Book Flight" method="POST">
								</div>
								<br>
					</div>
				</div>
			</td>
			<td>
				<div class="price-grid" style="width:100%">
					<div class="price-block price-block1 agile">
						<div class="price-gd-top pric-clr2">
							<img src="https://d30y9cdsu7xlg0.cloudfront.net/png/188590-200.png" width="180px" height="180px" style="margin-top:-30px">
						
							<h4>Travellers details</h4>
						</div>
						<div class="price-gd-bottom">
							
							<div class="price-selet pric-sclr2">
								<a href="#small-dialog" class="w3_agileits_sign_up2 popup-with-zoom-anim ab scroll" >Click Here</a>

							</div>
						</div>
					</div>
				</div>
				<div class="price-grid lost" style="width:100%">
					<div class="price-block price-block2 agile">
						<div class="price-gd-top pric-clr3">
							<br>
							<img src="https://cdn0.iconfinder.com/data/icons/social-messaging-productivity-4/128/phone3-512.png" width="100px" height="100px">
							<h4>contact details</h4>
						</div>
						<div class="price-gd-bottom">
							
							<div class="price-selet pric-sclr3">
								<a href="#small-dialog1" class="w3_agileits_sign_up2 popup-with-zoom-anim  ab scroll" >Click Here</a>
							</div>
						</div>
					</div>
				</div>
			</td>
			</tr>
			</table>
				<div class="clear"></div>
	</div>
	
</div>

<!-- //plans -->
	
<!-- copyright -->

<!-- //copyright -->
	
<!-- popup signup form -->
	<div class="wthree_pop_up"> 
		<div id="small-dialog" class="mfp-hide agile_signup_form">
		<img src="https://cdn1.iconfinder.com/data/icons/car-service-longshadow/512/passenger_seat-512.png" width="100px" height="100px" style="margin-left:230px">
			<h2>Traveller details are here</h2>			
			<form method="post">
			<?php 
			for($x=1;$x<=$_POST['amount'];$x++){
				?>
			
				<div class="form-control"> 
					<label class="header">Traveller <?php echo $x; ?><span>:</span></label>
					<input type="text" id="firstname" name="firstname" value="<?php echo $_POST['first'.$x]." ".$_POST['last'.$x]; ?>" class="icon11" disabled>
				</div>
				<?php
			} ?>
				
				
			</form>
		</div>
		<div id="small-dialog1" class="mfp-hide agile_signup_form">
		<img src="./images/contact.png" width="150px" height="150px" style="margin-left:210px">
			<h2>Contact details are here</h2>
			<form method="post">
			
				<div class="form-control"> 
					<label class="header">Address <span>:</span></label>
					<input type="text" id="firstname" name="firstname" value="<?php echo $_SESSION['Username']; ?>" disabled class="icon11">
				</div>
				
				<div class="form-control">
					<label class="header">Email <span>:</span></label>
					<input type="text" id="lastname" name="firstname" value="<?php echo $row['email']; ?>" disabled class="icon2">
				</div>

				<div class="form-control">	
					<label class="header">Contact No. <span>:</span></label>
					<input type="email" id="email" name="email" value="sgnkvs" disabled class="icon3">
				</div>

			
				
			</form>
		</div>
	</div>
	</div>
	<script type="text/javascript">
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}
		function validatePassword(){
			var pass2=document.getElementById("password2").value;
			var pass1=document.getElementById("password1").value;
			if(pass1!=pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');	 
				//empty string means no validation error
		}
	</script>

<!-- //popup signup form -->
	

<!-- pop-up-box -->
		<script src="css/js/jquery.magnific-popup.js" type="text/javascript"></script>
		<script>
			$(document).ready(function() {
				$('.popup-with-zoom-anim').magnificPopup({
					type: 'inline',
					fixedContentPos: false,
					fixedBgPos: true,
					overflowY: 'auto',
					closeBtnInside: true,
					preloader: false,
					midClick: true,
					removalDelay: 300,
					mainClass: 'my-mfp-zoom-in'
				});														
			});
		</script>
	<!--//pop-up-box -->