<?php  
 $con=new mysqli('localhost','root','','appointment_system');
if (isset($_POST['submit']))
{
	
// Assigning POST values to variables.
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM login";
		foreach($con-> query($sql) as $result)
			{
				$name = $result['roll_no'];
				$pass= $result['password'];
				if($name==$username && $pass==$password)
				{
					
                   
					if (strpos($name, 'staff') !== false)
					{   session_start();
                        $_SESSION['current_staff_users']=$username;
						header("Location:../staff/index.php");
					break;}
					elseif(strpos($name, 'admin') !== false)
					{   session_start();
				        //Storing username in session variable
                        $_SESSION['current_staff_users']=$username;
						header("Location:../admin home/index.php");
					break;}
					else{
						 session_start();
						$_SESSION['current_stud_users']=$username;
						
						header("Location:../student/index.php");
					}
					
					
				}
				elseif($name==$username && $pass!=$password)
				{
					 echo '<script language="javascript">';
echo 'alert("INVALID CREDENTIALS")';
	echo '</script>';
					break;
					
				}
				
			}
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">APPOINTMENT MANAGEMENT SYSTEM - LOGIN </h2>
                        
                        <div class="form-group">
                            <input type="text" class="form-input" name="username" id="username" placeholder="username"/required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password"/required>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign in"/>
                        </div>
                    </form>
                    
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
