

<?php
session_start();
$conn=new mysqli('localhost','root','','appointment_system');
 

$resu="Select staff_id,name from staff where department='CSE'";

			  $res = mysqli_query($conn,$resu);

			  $array_result = array();

while ($row7 = mysqli_fetch_array($res, MYSQL_NUM)) {

$array_result[] = $row7;}



			  $resu1="Select staff_id,name from staff where department='ECE'";

			  

			  $res1= mysqli_query($conn,$resu1);

			  $array_result1 = array();

while ($row1 = mysqli_fetch_array($res1, MYSQL_NUM)) {

$array_result1[] = $row1;}



			  $resu2="Select staff_id,name from staff where department='BIOMED'";

			  $res2= mysqli_query($conn,$resu2);

			  $array_result2 = array();

while ($row2 = mysqli_fetch_array($res2, MYSQL_NUM)) {

$array_result2[] = $row2;}



			  $resu3="Select staff_id,name from staff where department='MECH'";

			  $res3= mysqli_query($conn,$resu3);

			  $array_result3 = array();

while ($row3 = mysqli_fetch_array($res3, MYSQL_NUM)) {

$array_result3[] = $row3;}


			 $resu4="Select staff_id,name from staff where department='IT'";

			  $res4= mysqli_query($conn,$resu4);

			  $array_result4 = array();

while ($row4 = mysqli_fetch_array($res4, MYSQL_NUM)) {

$array_result4[] = $row4;}



			    $resu5="Select staff_id,name from staff where department='EEE'";

			  $res5= mysqli_query($conn,$resu5);

			  $array_result5 = array();

while ($row5 = mysqli_fetch_array($res5, MYSQL_NUM)) {

$array_result5[] = $row5;}



			   

			    $resu6="Select staff_id,name from staff where department='EEE'";

			  $res6= mysqli_query($conn,$resu6);

			  $array_result6 = array();

while ($row6 = mysqli_fetch_array($res6, MYSQL_NUM)) {
$array_result6[] = $row6;}

			


			

	

 ?>
 
 

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact V15</title>
	 <script language="javascript" src="calendar/calendar.js"></script>
	  <link href="calendar.css" rel="stylesheet" type="text/css">
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
					Make an Appointment
				</span>
			</div>

			<form action="slot.php" method ="post"><div class="contact100-form validate-form">
				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">FULL NAME:</span>
	  <?php 
	  $val=$_SESSION['current_stud_users'];
	  $sql="select name from student where student_id='$val'";
	  $res = mysqli_query($conn,$sql);
	  $name_row = mysqli_fetch_array($res, MYSQLI_ASSOC);
	  echo'
      <input class="input100" type="text" id="fname" name="firstname" placeholder="Enter full name" value="'.$name_row["name"].'" disabled>';
	  ?>

					
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<span class="label-input100">ROLL NO:</span>
					
	  <?php 
	  $val=$_SESSION['current_stud_users'];
	  echo'
      <input class="input100" type="text" id="fname" name="firstname" value="'.$val.'" disabled>';
	  ?>
					
					<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<span class="label-input100">BRANCH:</span><BR>
					
	 <select  class="input100" id="country" name="country" onChange="changeList()" required>

	                <option class="input100" value=""> Choose Department </option> 
					 <?php

	  $sql = "SELECT distinct department FROM staff";
      $result = mysqli_query($conn,$sql);
      while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {	  
	  echo "<option class='input100' value='" . $row['department'] . "'>" . $row['department'] . "</option>";}			

             ?>
					</select>
					
					<span class="focus-input100"></span>
				</div>
				
				
				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<span class="label-input100">STAFF:</span><br>
					<select  class="input100" id="country1" name="country1" onChange="wjd()" required>
                   
	                <option value="">Choose Staff</option> 
					</select>
	  			
					<span class="focus-input100"></span>
				</div>

				

				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">PURPOSE:</span>
					
					<textarea class="input100" id="subject" name="subject" placeholder="reason for booking an appointment..." style="height:200px" required></textarea>
					
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100"> Choose a date :</span><br>
					
					 <?php
					 date_default_timezone_set('Asia/Calcutta'); 
                     $date1 = date("Y-m-d");
					 //echo $date1;echo"hi";
					 
					 //echo gettype($date1);
					 $newDate=date('Y-m-d',strtotime('+30 days',strtotime($date1))) . PHP_EOL;
					 $newDate=rtrim($newDate);
					 //echo $newDate;echo"hi";
					 //echo gettype($newDate);
					 echo'
      <input class="input100" type="date" id="fname" name="date" required min="'.$date1.'" max="'.$newDate.'">';
    
    ?>
					<span class="focus-input100"></span>
				</div>
				<br><br>
 
  
				
				
<br><br>
				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" type="submit" name="check">
						<span>
							CHECK SLOT AVAILABILITY
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
				</div>
			</form>
			<br><br><br>
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
	<script>
	function wjd()

{
var numbRange = document.getElementById("country1");
var selectDiff1= numbRange.options[numbRange.selectedIndex].value; //staff id

}

window.difficulty = {};
window.difficulty2 = {};

window.difficulty["CSE"] =[<?php echo '"'.implode('","',array_map(function($el){ return $el["1"]; }, $array_result)).'"' ?>];
window.difficulty2["CSE"] =[<?php echo '"'.implode('","',array_map(function($el){ return $el["0"]; }, $array_result)).'"' ?>];

window.difficulty["ECE"] =[<?php echo '"'.implode('","',array_map(function($el){ return $el["1"]; }, $array_result1)).'"' ?>];
window.difficulty2["ECE"] =[<?php echo '"'.implode('","',array_map(function($el){ return $el["0"]; }, $array_result1)).'"' ?>];


window.difficulty["EEE"] =[<?php echo '"'.implode('","',array_map(function($el){ return $el["1"]; }, $array_result5)).'"' ?>];
window.difficulty2["EEE"] =[<?php echo '"'.implode('","',array_map(function($el){ return $el["0"]; }, $array_result5)).'"' ?>];


window.difficulty["IT"] =[<?php echo '"'.implode('","',array_map(function($el){ return $el["1"]; }, $array_result4)).'"' ?>];
window.difficulty2["IT"] =[<?php echo '"'.implode('","',array_map(function($el){ return $el["0"]; }, $array_result4)).'"' ?>];


window.difficulty["MECH"] =[<?php echo '"'.implode('","',array_map(function($el){ return $el["1"]; }, $array_result3)).'"' ?>];
window.difficulty2["MECH"] =[<?php echo '"'.implode('","',array_map(function($el){ return $el["0"]; }, $array_result3)).'"' ?>];

window.difficulty["BIOMED"] =[<?php echo '"'.implode('","',array_map(function($el){ return $el["1"]; }, $array_result2)).'"' ?>];
window.difficulty2["BIOMED"] =[<?php echo '"'.implode('","',array_map(function($el){ return $el["0"]; }, $array_result2)).'"' ?>];




function changeList() {

	
    var diffList = document.getElementById("country");

    var numbRange = document.getElementById("country1");

	

    var selectDiff = diffList.options[diffList.selectedIndex].value; //departmentname

	

	
	

    while(numbRange.options.length)

    {

        numbRange.remove(0);

    }

    var diff = window.difficulty[selectDiff];

	var diff2=window.difficulty2[selectDiff];

    if(diff)

    {

        var i;

		

        for(i = 0; i < diff.length; i++)

        {

			

			var difficulty = new Option(diff[i], diff2[i]);

            numbRange.options.add(difficulty);

        }

    }

	

}



</script>

</body>
</html>
