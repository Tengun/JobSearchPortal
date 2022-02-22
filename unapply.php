<?php

require './php_logic/config.php';
if(!empty($_SESSION["id"])){

}else{
    header("Location: index.php");
  }

?>

<?php  
if(isset($_GET['unapply'])){
	$user_id = $_SESSION['id'];
	$job_id = $_GET['unapply'];
  	$query = "DELETE FROM `Applied_Jobs` WHERE `Job_Id` = '$job_id' AND `User_Id` = '$user_id'";
	//$query = "DELETE FROM `Applied_Jobs` WHERE `Job_Id`='$job_id' AND `User_Id`= '$user_id'";
	 mysqli_query($conn, $query);
	    header("Location: repository.php?unapply=$job_id");
}

?>