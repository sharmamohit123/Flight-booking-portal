<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $path = $_SERVER['DOCUMENT_ROOT'];
	 	include_once $path.'/common/base.php'; 
	 	include_once $path.'/inc/class.users.inc.php'; 

}         //if($users->verify)
         ?>
<html>
    <head>
        </head>
    <body>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <input type="text" name="code">
        <button type="submit" method="POST">submit</button>
        </form>
        </body>
        </html>