<?php

$conn=new mysqli('localhost','root','','appointment_system');
$res_up=mysqli_query($conn,"select * from appointments where appointment_no='".$_POST['app_no']."'");
$name_row = mysqli_fetch_array($res_up, MYSQLI_ASSOC);
$pass=$name_row['date'];
$s_id=$name_row['staff_id'];


$new_date=str_replace("00:00:00",$_POST['slot'],$pass);
$count=1;
mysqli_query($conn,"update appointments set date='".$new_date."' WHERE appointment_no='".$_POST['app_no']."'");
mysqli_query($conn,"update appointments set status='Requested' WHERE appointment_no='".$_POST['app_no']."'");
$sql_check = "SELECT * FROM appointments";
		foreach($conn-> query($sql_check) as $result)
			{
				$name = $result['staff_id'];
				$pass= $result['date'];
				$appo_no=$result['appointment_no'];
				if($name==$s_id && $pass==$new_date && $appo_no!=$_POST['app_no'])
				{
                      echo"<script>alert('cant book');</script>";
					  mysqli_query($conn,"delete from appointments  WHERE appointment_no='".$_POST['app_no']."'");
                      header("Location:refuse.php");
                      $count=0	;				  
                     break;					 
				}
			}
if($count==1){
header("Location:../after login/index.php");	}
else
{header("Location:../after login/refuse.php");
}
	

?>