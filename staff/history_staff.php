<!DOCTYPE html>
<html lang="en">
<?php
$conn=new mysqli('localhost','root','','appointment_system');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
date_default_timezone_set('Asia/Calcutta'); 
$date1 = date("Y-m-d H:i:s");
session_start();
$current_user=$_SESSION['current_staff_users'];
if(!$current_user){
	header("Location:../login/login.php");
}


$sql = "SELECT * FROM appointments where date<'$date1' and staff_id='$current_user ' and (status='Approved' )";
$result = mysqli_query($conn,$sql);

?>




	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Appointment Management System</title>
		<meta name="keywords" content="Add keywords" />
		<meta name="author" content="_yourName_ for Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<style>
table {
  border-collapse: collapse;
 
}
th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

</style>
	<body>
		<div class="container">	
			<!-- Codrops top bar -->
			<div class="codrops-top clearfix">
				
			</div><!--/ Codrops top bar -->
			<header class="clearfix">
				<h1>Appointment Management System </h1>	
			</header>
			<div class="main">
			<div class="side">
					<nav class="dr-menu">
						<div class="dr-trigger"><span class="dr-icon dr-icon-menu"></span><a class="dr-label">Account</a></div>
						<ul>
							<li><a  href="index.php">Profile</a></li>
							<li><a  href="requests.php">Approve/Reject </a></li>
							<li><a  href="upcoming_staff.php">cancel Upcoming</a></li>
							<li><a  href="history_staff.php">History Appointments</a></li>
							<li><a  href="change_pswd.php">change password</a></li>
							<li><a  href="customize.php">Customize schedule</a></li>
							<li><a  href="../logout.php">Logout</a></li>
						</ul>
					</nav>
				</div>
			<p>

<form method="post" action="">
<table cellpadding="15">
<thead>
<?php
$rows = mysqli_fetch_array($result, MYSQLI_ASSOC);
if(!$rows){
	echo"<H1>Have no appointment history</H1>";
}
else{
echo'
<tr>
    
	<th>STUDENT NAME</th>
	
	<th>PURPOSE</th>
	<th>FEEDBACK</th>
	<th>DATE</th>
</tr>
</thead>';




foreach($conn-> query($sql) as $row){
	$stud_name=$row["student_id"];
	$names = "SELECT name FROM student where student_id='$stud_name'";
    $name_res = mysqli_query($conn,$names);
	$name_row = mysqli_fetch_array($name_res, MYSQLI_ASSOC);
echo'
<tr>
    
	

    
	<td>'.  $name_row["name"].'</td>

	<td>'.  $row["purpose"].'</td>
	<td>'.  $row["feedback"] .'</td>
	<td>'.  $row["date"] .'</td>
</tr>';


}
echo'
</table><br><br>

</form>
';
}
?>





				</p>
				
			</div>
		</div><!-- /container -->
		<script src="js/ytmenu.js"></script>
	</body>
</html>
