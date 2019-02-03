<?php
include("../db/dbcon.php");
if(isset($_POST['submit']))
{

	$name = $_POST['name'];
	$mail = $_POST['email'];
	$college = $_POST['college'];
	$country = $_POST['country'];
	$pass = $_POST['password'];
	$repass = $_POST['rpassword'];
	$namei= $_FILES['images']['name'];
$tmp_name= $_FILES['images']['tmp_name'];
if (isset($name)) 
{ 
  
  if (!empty($namei))
    {
        move_uploaded_file($tmp_name,"../dbimage/$namei" ) ;
        
    }
}  

$doc= $_FILES['msfile']['name'];
$tmp_doc= $_FILES['msfile']['tmp_name'];
if (isset($doc)) 
{ 
  
  if (!empty($doc))
    {
        move_uploaded_file($tmp_doc, "../dbfiles/$doc"); 
        
    }
}     
$messag=$_POST['message'];
  

	$qry = "SELECT  `email` FROM `register` WHERE `email`='$mail'";
	$run1 = mysqli_query($con,$qry);
	$row1 = mysqli_num_rows($run1);
	if($row1>0)
	{
		?>
			<script type="text/javascript">
				alert("This Email Alredy Exits");
				window.open('../register.php','_self');	
			</script>
		<?php
	}elseif($pass!=$repass)
	{
			?>
		<script type="text/javascript">
			alert("password and retype password not match");
			window.open('../register.php','_self');	
		</script>
			<?php
	}
	else{
		$final_pass = $pass;
		$fquery = "INSERT INTO `register`(`name`, `email`, `college`, `country`, `image`, `msfile`, `password`, `message`) VALUES ('$name','$mail','$college','$country','$namei','$doc','$final_pass','$messag')";			
		$run2 = mysqli_query($con,$fquery);
		echo $fquery;
			if($run2 = true)
			{				?>
					<script type="text/javascript">
					alert("Account created ...");
					window.open('../index.php','_self');

				</script>

			<?php
		}
		else{

		?>
					<script type="text/javascript">
					alert("Account Not created ...");
					window.open('../register.php','_self');

				</script>

			<?php
		}
		}


}




?>