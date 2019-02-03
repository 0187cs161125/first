<?php
$con = mysqli_connect('localhost','root','','compnay_pro');
if($con->connect_error)
{


	die("Connection failed: " . $con->connect_error);
}
/*else{
	echo "successfully";
}*/


?>