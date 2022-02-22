<?php

require './php_logic/config.php';
if(!empty($_SESSION["id"])){

}else{
    header("Location: index.php");
  }

?>

<?php  
if(isset($_GET['unaply'])){
	$user_id = $_SESSION['id'];
	$job_id = $_GET['unaply'];
  	$query = "DELETE FROM `Applied_Jobs` WHERE `Job_Id` = '$job_id' AND `User_Id` = '$user_id'";
	//$query = "DELETE FROM `Applied_Jobs` WHERE `Job_Id`='$job_id' AND `User_Id`= '$user_id'";
	 mysqli_query($conn, $query);
	    header("Location: job-list.php?message2=$job_id");
}

?>