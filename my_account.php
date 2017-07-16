<?php
$path=$_SERVER['DOCUMENT_ROOT']; 
$pageTitle = "MY ACCOUNT";
session_start();
include_once $path.'/common/header.php';?>
<?php include_once $path.'/common/navbar.php';?>
<?php
    include_once $path.'/common/base.php'; 
	 	include_once $path.'/inc/class.users.inc.php'; 
	 	$user = new bookingUsers($db);
        $list = $user->getUser();
    ?>
<?php include_once $path.'/change_user.php';?>
<?php include_once $path.'/change_pass.php';?>
<?php include_once $path.'/delete_acc.php';?>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/login.js"></script>
<link rel="stylesheet" href="css/login1.css">

  <div class="wrapper" style="min-height:100px;height:300px">
	<div class="container" style="min-width:900px">
        <img src="./images/profile.png" height="100px" width="100px">
		<h1 style="color:#00004d">Welcome <?php echo $_SESSION['Username']; ?></h1>
		<h2 style="color:#00004d"><?php echo $list['email']; ?></h2><br><br>

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
 <link rel="stylesheet" href="css/settings.css">
<div style="background-color:#00004d;min-height:600px" class="settings">
   <br>
   <table>
       <tr>
           <td><img src="./images/settings.png" width="40px" height="40px"></td>
           <td><h1 style="color:white">ACCOUNT SETTINGS</h1></td>
        </tr>
    </table>
    <br>
 <div class="btn">
  <div class="btn-back">
    <p>Are you sure you want to change your email?</p>
    <button class="yes" onclick="call1()">Yes</button>
    <button class="no">No</button>
  </div>
  <div class="btn-front" onclick="my()">Change Email Address</div>
  </div><br>

 <div class="btn1">
  <div class="btn1-back">
    <p>Are you sure you want to change your password?</p>
    <button class="yes" onclick="call2()">Yes</button>
    <button class="no">No</button>
  </div>
  <div class="btn1-front" onclick="my1()">Change Password</div>
</div><br>

 <div class="btn2">
  <div class="btn2-back">
    <p>Are you sure you want to delete your account?</p>
    <button class="yes" onclick="call3()">Yes</button>
    <button class="no">No</button>
  </div>
  <div class="btn2-front" onclick="my2()">Delete Account</div>
</div><br>

<div class="btn3">
  <div class="btn3-back">
    <p>Are you sure you want to logout?</p>
    <button class="yes" onclick="call4()">Yes</button>
    <button class="no">No</button>
  </div>
  <div class="btn3-front" onclick="my3()">Logout</div>
</div>

</div>

<script>
    function call1(){
        document.getElementById('id01').style.display='block';
        document.getElementById('id03').style.display='none';
        document.getElementById('id05').style.display='none';
    }
    function call2(){
        document.getElementById('id01').style.display='none';
        document.getElementById('id03').style.display='block';
        document.getElementById('id05').style.display='none';
    }
    function call3(){
        document.getElementById('id01').style.display='none';
        document.getElementById('id03').style.display='none';
        document.getElementById('id05').style.display='block';
    }
    function call4(){
        document.getElementById('change').innerHTML = "<meta http-equiv='refresh' content='0; url=/logout.php'>";
    }
</script>

<script>
    function my(){
        var btn = document.querySelector( '.btn' );

var btnFront = btn.querySelector( '.btn-front' ),
    btnYes = btn.querySelector( '.btn-back .yes' ),
    btnNo = btn.querySelector( '.btn-back .no' );

  var mx = event.clientX - btn.offsetLeft,
      my = event.clientY - btn.offsetTop;

  var w = btn.offsetWidth,
      h = btn.offsetHeight;
	
  var directions = [
    { id: 'top', x: w/2, y: 0 },
    { id: 'right', x: w, y: h/2 },
    { id: 'bottom', x: w/2, y: h },
    { id: 'left', x: 0, y: h/2 }
  ];
  
  directions.sort( function( a, b ) {
    return distance( mx, my, a.x, a.y ) - distance( mx, my, b.x, b.y );
  } );
  
  btn.setAttribute( 'data-direction', directions.shift().id );
  btn.classList.add( 'is-open' );


btnYes.addEventListener( 'click', function( event ) {	
  btn.classList.remove( 'is-open' );
} );

btnNo.addEventListener( 'click', function( event ) {
  btn.classList.remove( 'is-open' );
} );

function distance( x1, y1, x2, y2 ) {
  var dx = x1-x2;
  var dy = y1-y2;
  return Math.sqrt( dx*dx + dy*dy );
}
    }

     function my1(){
        var btn = document.querySelector( '.btn1' );

var btnFront = btn.querySelector( '.btn1-front' ),
    btnYes = btn.querySelector( '.btn1-back .yes' ),
    btnNo = btn.querySelector( '.btn1-back .no' );

  var mx = event.clientX - btn.offsetLeft,
      my = event.clientY - btn.offsetTop;

  var w = btn.offsetWidth,
      h = btn.offsetHeight;
	
  var directions = [
    { id: 'top', x: w/2, y: 0 },
    { id: 'right', x: w, y: h/2 },
    { id: 'bottom', x: w/2, y: h },
    { id: 'left', x: 0, y: h/2 }
  ];
  
  directions.sort( function( a, b ) {
    return distance( mx, my, a.x, a.y ) - distance( mx, my, b.x, b.y );
  } );
  
  btn.setAttribute( 'data-direction', directions.shift().id );
  btn.classList.add( 'is-open' );


btnYes.addEventListener( 'click', function( event ) {	
  btn.classList.remove( 'is-open' );
} );

btnNo.addEventListener( 'click', function( event ) {
  btn.classList.remove( 'is-open' );
} );

function distance( x1, y1, x2, y2 ) {
  var dx = x1-x2;
  var dy = y1-y2;
  return Math.sqrt( dx*dx + dy*dy );
}
    }

 function my2(){
        var btn = document.querySelector( '.btn2' );

var btnFront = btn.querySelector( '.btn2-front' ),
    btnYes = btn.querySelector( '.btn2-back .yes' ),
    btnNo = btn.querySelector( '.btn2-back .no' );

  var mx = event.clientX - btn.offsetLeft,
      my = event.clientY - btn.offsetTop;

  var w = btn.offsetWidth,
      h = btn.offsetHeight;
	
  var directions = [
    { id: 'top', x: w/2, y: 0 },
    { id: 'right', x: w, y: h/2 },
    { id: 'bottom', x: w/2, y: h },
    { id: 'left', x: 0, y: h/2 }
  ];
  
  directions.sort( function( a, b ) {
    return distance( mx, my, a.x, a.y ) - distance( mx, my, b.x, b.y );
  } );
  
  btn.setAttribute( 'data-direction', directions.shift().id );
  btn.classList.add( 'is-open' );


btnYes.addEventListener( 'click', function( event ) {	
  btn.classList.remove( 'is-open' );
} );

btnNo.addEventListener( 'click', function( event ) {
  btn.classList.remove( 'is-open' );
} );

function distance( x1, y1, x2, y2 ) {
  var dx = x1-x2;
  var dy = y1-y2;
  return Math.sqrt( dx*dx + dy*dy );
}
    }

 function my3(){
        var btn = document.querySelector( '.btn3' );

var btnFront = btn.querySelector( '.btn3-front' ),
    btnYes = btn.querySelector( '.btn3-back .yes' ),
    btnNo = btn.querySelector( '.btn3-back .no' );

  var mx = event.clientX - btn.offsetLeft,
      my = event.clientY - btn.offsetTop;

  var w = btn.offsetWidth,
      h = btn.offsetHeight;
	
  var directions = [
    { id: 'top', x: w/2, y: 0 },
    { id: 'right', x: w, y: h/2 },
    { id: 'bottom', x: w/2, y: h },
    { id: 'left', x: 0, y: h/2 }
  ];
  
  directions.sort( function( a, b ) {
    return distance( mx, my, a.x, a.y ) - distance( mx, my, b.x, b.y );
  } );
  
  btn.setAttribute( 'data-direction', directions.shift().id );
  btn.classList.add( 'is-open' );


btnYes.addEventListener( 'click', function( event ) {	
  btn.classList.remove( 'is-open' );
} );

btnNo.addEventListener( 'click', function( event ) {
  btn.classList.remove( 'is-open' );
} );

function distance( x1, y1, x2, y2 ) {
  var dx = x1-x2;
  var dy = y1-y2;
  return Math.sqrt( dx*dx + dy*dy );
}
    }
</script>