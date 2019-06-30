<html>
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
button{
	 background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 15px;
  margin: 4px 2px;
  cursor: pointer;
	border-radius: 12px;
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


<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
currentPassword.focus();
document.getElementById("currentPassword").innerHTML = "required";
output = false;
}
else if(!newPassword.value) {
newPassword.focus();
document.getElementById("newPassword").innerHTML = "required";
output = false;
}
else if(!confirmPassword.value) {
confirmPassword.focus();
document.getElementById("confirmPassword").innerHTML = "required";
output = false;
}
if(newPassword.value != confirmPassword.value) {
newPassword.value="";
confirmPassword.value="";
newPassword.focus();
document.getElementById("confirmPassword").innerHTML = "not same";
output = false;
}   
return output;
}
</script>
<h3>WILL NOT BE AVAILABLE</h3><br>
<form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
<div style="width:500px;">

<div class="message"><?php if(isset($message)) { echo $message; } ?></div>

<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">

<tr>
<td width="40%"><label>FROM </label></td>
<td width="60%"><input type="date" name="currentPassword" class="txtField"/><span id="currentPassword"  class="required"></span></td>
</tr>
<tr>
<td><label>TO</label></td>
<td><input type="date" name="newPassword" class="txtField"/><span id="newPassword" class="required"></span></td>
</tr>


<tr>
<td colspan="2"><br><center><button type="submit" name="submit" value="Submit" class="btnSubmit">SUBMIT</button></center></td>
</tr>

</table>
</div>
</form>
</p>
				
			</div>
		</div><!-- /container -->
		<script src="js/ytmenu.js"></script>
	</body>
</html>
<?php


session_start();
$current_user=$_SESSION['current_staff_users'];
if(!$current_user){
	header("Location:../login/login.php");
}
$conn = mysqli_connect("localhost", "root", "", "appointment_system") or die("Connection Error: " . mysqli_error($conn));

if (count($_POST) > 0) {
	$from_date=$_POST['currentPassword'];
$to_date=$_POST['newPassword'];
  if($from_date>$to_date)
  {
	  echo '<script language="javascript">';
echo 'alert("ENTER A VALID DATE")';
	echo '</script>';
					break;
  }
  else{
    $sqlinsert = "insert into customize(staff_id,fromdate,todate) values ('$current_user','$from_date','$to_date')";
	$conn->query($sqlinsert);
	echo '<script language="javascript">';
echo 'alert("SUCCESSFULLY UPDATED")';
	echo '</script>';
					break;
  }
    
    
        
}
?>