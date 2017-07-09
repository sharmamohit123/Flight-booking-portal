<?php
 if($_SERVER['REQUEST_METHOD']=='POST'){

 
	if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])){
	 	$path = $_SERVER['DOCUMENT_ROOT'];
	 	include_once $path.'/common/base.php'; 
	 	include_once $path.'/inc/class.users.inc.php'; 
	 	$flights = new populate($db);
        $list = $flights->showFlights();
        foreach ($list as $row){
            echo $row['name']." ";
        }
        }
    else{
        echo "No flights found.";
    }
 }
?>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/login.js"></script>
<link rel="stylesheet" href="css/login.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
<div class="wrapper">
	<div class="container">
		<h1>Book Flight</h1>
        <table>
            <tr>
                <td>
                </td>
                <td>                    
		<form class="form" method="POST" action="/show_flights.php">
			<input type="text" placeholder="From" required name="source">
			<input type="text" placeholder="To" required name="destination">
            <div class="styled-select blue semi-square">
            <select name="passenger" class="icon4">
                <option value="1" style="color:black">1</option>
                <option value="2" style="color:black">2</option>
                <option value="3" style="color:black">3</option>
                <option value="4" style="color:black">4</option>
                <option value="5" style="color:black">5</option>
                <option value="6" style="color:black">6</option>
                <option value="7" style="color:black">7</option>
                <option value="8" style="color:black">8</option>
                <option value="9" style="color:black">9</option>
                <option value="10" style="color:black">10</option>
            </select>
            </div>
            <input type="text" placeholder="Departure" required id="datepicker" name="date">
            <div class="styled-select blue semi-square">
            <select name="money" class="select" class="icon6">
                <option value="Rupees" selected style="color:black">Rupees</option>
                <option value="US Dollars" style="color:black">US Dollars</option>
                <option value="Euro" style="color:black">Euro</option>
                <option value="Dirham" style="color:black">Dirham</option>
                <option value="Pounds" style="color:black">Pounds</option>
            </select><br>
            </div>
			<button type="submit" id="login-button" method="POST">Search Flight</button>
		</form>
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

  