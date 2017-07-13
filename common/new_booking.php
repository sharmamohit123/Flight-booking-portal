

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    
    <!-- Load jQuery JS -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- Load jQuery UI Main JS  -->
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    
    <!-- Load SCRIPT.JS which will create datepicker for input field  -->
    <script src="js/script.js"></script>
    
    <link rel="stylesheet" href="css/runnable.css" />
  
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/login.js"></script>
  <link rel="stylesheet" href="css/login.css">

<div class="wrapper">
	<div class="container">
		<h1>Book Flight</h1>
        <table width="100%">
            <tr>
                <td width="60%" align="center">
                    <img src="./images/book.png" width="250px" height="250px">
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

  