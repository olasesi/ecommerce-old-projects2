<?php
require("../incs_gen3/config.php");
include("../incs_gen3/cookie_for_most.php");
if(!isset ($_SESSION['user_id'])){ 
	header("Location:".GEN_WEBSITE);
	exit();
}

mysqli_query($connect,"UPDATE users SET cookie_sessions = '' WHERE user_id = '".$_SESSION['user_id']."' AND active = '1'") or die(db_conn_error);	
session_destroy();
setcookie("remember_me", "", time() - 31104000);		//I think i made the cookie session time to be a month
	
header("Location:index.php");
exit();

?>
