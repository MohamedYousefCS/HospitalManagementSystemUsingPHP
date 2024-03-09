<?php 

$dbuser="root";
$dbpass="";
$host="localhost";
$db="HMS";
$mysql=new mysqli($host,$dbuser, $dbpass, $db);
if(isset($_POST['btnSubmit'])){
	$name = $_POST['full_name'];
	$email = $_POST['email'];
	$Date = $_POST['his_date'];
    $department=$_POST['department'];
	$phone = $_POST['phone'];
	$Messages = $_POST['Messages'];



    $query="INSERT INTO `his_contact`(`full_name`, `email`, `his_date`, `department`, `phone`, `Messages`) VALUES ('$name','$email','$Date','$department','$phone','$Messages')";
    $stmt = mysqli_query($mysql,$query);

    if($stmt)
			{
				$success = "شكرا علي رايك البناء";
			}
			else {
				$err = "حاول في وقت لاحق";
			}

   

}