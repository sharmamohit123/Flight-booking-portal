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
<style>
    .header-main{
          display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    left: 0;
    top: 0;
    width: 50%;
    /* Full width */
    height: 75%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: white;
    /* Fallback color */
    background-color: white;
    /* Black w/ opacity */
    padding-top: 60px;
    margin-top:100px;
    margin-left:320px;
    z-index: 50; 
    border-radius:5px;               
    }
</style>




<div class="header-main" id="id01">
		<h2>Change Email Address</h2>
			<div class="header-bottom">
				<div class="header-right w3agile">
					<div class="header-left-bottom agileinfo">
						<form action="/action_email.php" method="post" id="id02">
							<div class="icon1">
								<input type="password" placeholder="Type current password" required="" name="pass" />
							</div>
							<div class="icon1">
								<input type="text" placeholder="Type new email address" required="" name="new" />
							</div>
                            <div id="err">
                                
                            </div>
							<div class="bottom">
								<input type="submit" value="Save" />
                                <button type="button" onclick="cancel1()">Cancel</button>
							</div>
							
					</form>	
					</div>
				</div>
			</div>
	</div>

    <script>
        function cancel1(){
            document.getElementById('id02').reset();
            document.getElementById('id01').style.display = 'none';
            document.getElementById('err').innerHTML = "";
        }
    </script>