
		<link href='http://fonts.googleapis.com/css?family=Montserrat|Cardo' rel='stylesheet' type='text/css'>
<link href='css/style.css' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/nav.js"></script>
<header class="main_h">

    <div class="raw">
        <a class="logo" href="#">MyFLight</a>

        <div class="mobile-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <nav>
            <ul>
            <?php
            if(isset($_SESSION['LoggedIn']) && isset($_SESSION['Username']) && $_SESSION['LoggedIn']==1){
                ?> 
                <li><a href="./main.php"><img src="./images/home.png" width="20px" height="17px"></a></li>
                <li><a href=".sec02">CONTACT US</a></li>
                <li><a href="./logout.php">LOGOUT</a></li>
                <li><a href="./new_booking.php">NEW_BOOKING</a></li>
                <li><a href="./my_bookings.php">MY_BOOKINGS</a></li>
            <?php
            }
                else{
                    ?>

                <li><a href="./main.php"><img src="./images/home.png" width="20px" height="20px"></a></li>
                <li><a href=".sec02">CONTACT US</a></li>
                <li><a href="./login.php">LOGIN</a></li>
                <li><a href="./signup.php">SIGNUP</a></li>
                <li><a href="./new_booking.php">NEW_BOOKING</a></li>
                <?php
                    }
                ?>
            </ul>
        </nav>

    </div> <!-- / row -->

</header>

