<?php
session_start();
$current_user=$_SESSION['current_stud_users'];
if(!$current_user){
	header("Location:../login/login.php");
}
?>

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
input{
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
							<li><a  href="../make appointment/make_app.php">Make an Appointment</a></li>
							<li><a  href="upcoming.php">Upcoming</a></li>
							<li><a  href="history.php">Feedback </a></li>
							<li><a  href="change_pswd.php">Change password </a></li>
							<li><a  href="../logout.php">Logout</a></li>
						</ul>
					</nav>
				</div>
			<p>


<script>
function validatePassword() {
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
currentPassword.focus();
//document.getElementById("currentPassword").innerHTML = "required";
alert("current password is required");
output = false;
}
else if(!newPassword.value) {
newPassword.focus();
//document.getElementById("newPassword").innerHTML = "required";
alert("new password is required");
output = false;
}
else if(!confirmPassword.value) {
confirmPassword.focus();
//document.getElementById("confirmPassword").innerHTML = "required";
alert("confirm password field is required");
output = false;
}
if(newPassword.value != confirmPassword.value) {
newPassword.value="";
confirmPassword.value="";
newPassword.focus();
alert("new password and confirm password are not same");
output = false;
}   
return output;
}
</script>

<form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
<div style="width:500px;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<br>
<br><br>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">

<tr>
<td width="40%"><label>Current Password</label></td>
<td width="60%"><input type="password" name="currentPassword" class="txtField"/><span id="currentPassword"  class="required"></span></td>
</tr>
<tr>
<td><label>New Password</label></td>
<td><input type="password" name="newPassword" class="txtField"/><span id="newPassword" class="required"></span></td>
</tr>
<td><label>Confirm Password</label></td>
<td><input type="password" name="confirmPassword" class="txtField"/><span id="confirmPassword" class="required"></span></td>
</tr>
<tr>
<td colspan="2"></center></td>
</tr>
</table>
<center><button type="submit" name="submit" value="Submit" class="btnSubmit">Submit</button>
</div>
</form>
</p>
				
			</div>
		</div><!-- /container -->
		<script src="js/ytmenu.js"></script>
	</body>
</html>
<?php



$conn = mysqli_connect("localhost", "root", "", "appointment_system") or die("Connection Error: " . mysqli_error($conn));

if (count($_POST) > 0) {
    $result = mysqli_query($conn, "SELECT * from login WHERE roll_no='" . $current_user . "'");

    $row = mysqli_fetch_array($result);
    
    if ($_POST["currentPassword"] == $row["password"]) {
        mysqli_query($conn, "UPDATE login set password='" . $_POST["newPassword"] . "' WHERE roll_no='" . $current_user . "'");
        echo '<script language="javascript">';
echo 'alert("PASSWORD UPDATED SUCCESSFULLY")';
echo '</script>';
      
    } else
	{
        echo '<script language="javascript">';
echo 'alert("Current Password is not correct")';
	echo '</script>';}
}
?>