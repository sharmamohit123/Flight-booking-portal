
		<link href='http://fonts.googleapis.com/css?family=Montserrat|Cardo' rel='stylesheet' type='text/css'>
<link href='css/style.css' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/nav.js"></script>
<header class="main_h">

    <div class="raw">
        <a class="logo" href="#"><div style="color:#00004d">MyFLight</div></a>

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
                <li><a href=".sec02"><div style="color:#00004d">CONTACT US</div></a></li>
                <li><a href="./new_booking.php"><div style="color:#00004d">NEW_BOOKING</div></a></li>
                <li><a href="./my_bookings.php"><div style="color:#00004d">MY_BOOKINGS</div></a></li>
                <li><a href="./my_account.php"><img src="./images/user.png" width="50px" height="50px"></a></li>
                                    
            <?php
            }
                else{
                    ?>
                
                <li><a href="./main.php"><img src="./images/home.png" width="20px" height="17px"></a></li>
                <li><a href=".sec02"><div style="color:#00004d">CONTACT US</div></a></li>
                <li><a href="./login.php"><div style="color:#00004d">LOGIN</div></a></li>
                <li><a href="./signup.php"><div style="color:#00004d">SIGNUP</div></a></li>
                <li><a href="./new_booking.php"><div style="color:#00004d">NEW_BOOKING</div></a></li>
                <?php
                    }
                ?>
            </ul>
        </nav>
        

    </div> <!-- / row -->

</header>

