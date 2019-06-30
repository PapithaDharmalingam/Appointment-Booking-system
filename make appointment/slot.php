<?php

		$s_id=$_REQUEST["country1"];		
		$_SESSION["st_id"]=$s_id;
		session_start();
		$val=$_SESSION['current_stud_users'];
		


//mysql_select_db('appointments_system');
$connection=new mysqli('localhost','root','','appointment_system');
 

$theDate = $_POST['date'];
//echo $theDate;
$date_time=$theDate." "."00:00:00";	
//echo $val.$s_id.$_POST['subject'].$date_time;

$res_up=mysqli_query($connection,"select * from customize  where staff_id='".$s_id."'");
//$name_row = mysqli_fetch_array($res_up, MYSQLI_ASSOC);
 while ($name_row = mysqli_fetch_array($res_up,MYSQLI_ASSOC)) {	
$from_date=$name_row['fromdate'];
$to_date=$name_row['todate'];


if($theDate>=$from_date and $theDate<=$to_date)
{
	 header("Location: ../after login/refuse.php");
    exit;

 }}




$sqlappointment = "insert into appointments(staff_id,date,student_id, purpose, status) values ('".$s_id."','".$date_time."','".$val."','".$_POST['subject']."','not valid')";
mysqli_query($connection,$sqlappointment);
$res_up=mysqli_query($connection,"select appointment_no from appointments where date='".$date_time."'and student_id='".$val."'");
$name_row = mysqli_fetch_array($res_up, MYSQLI_ASSOC);
$pass=$name_row['appointment_no'];



$unixTimestamp = strtotime($theDate);
$day = date("l", $unixTimestamp);
//echo $day;
?>
		




<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact V15</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100">
			<div class="wrap-contact100">
			<div class="contact100-form-title" style="background-image: url(images/bg-01.jpg);">
				<span class="contact100-form-title-1">
					APPOINTMENT MANAGEMENT SYSTEM
				</span>

				<span class="contact100-form-title-2">
					choose the slot
				</span>
			</div>

			<form  action="insert_slot.php"  method ="post">
			<div class="contact100-form validate-form"><br>
				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">APPOINTMENT REQUEST NO:</span>
	  <?php echo'<input class="input100" type="text" id="app_no" name="app_no" value="'.$pass.'" readonly><br><br>'; 
	  ?>

					
					<span class="focus-input100"></span>
				</div>

				<?php
				
				$sqlslot = "SELECT * FROM slot WHERE staff_id='$s_id' and day= '$day' ";
$s_result = mysqli_query($connection,$sqlslot);
$s_rows = mysqli_fetch_array($s_result, MYSQLI_ASSOC);

				?>
				
				<div class="wrap-input100 validate-input" >
					<span class="label-input100">CHOOSE SLOT:</span><BR>
				<select  class="input100" name='slot' >	
				<option class='input100' value=''>Select slot</option>
	              <?php

if(!$s_rows)
{
	header("Location: ../after login/refuse.php");
    exit;
}

foreach($connection-> query($sqlslot)as $n){
	//echo $n['time'];
	echo "<option class='input100' value='".$n['time']."'>".$n['time']."</option>";


}
	
	 

             ?>
					
					</select>
					
					<span class="focus-input100"></span>
				</div>
							
				

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" type="submit" name="check">
						<span>
							BOOK APPOINTMENT
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
				</div>
			</form>
		</div>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
	

</body>
</html>
