<?php 
$con=mysqli_connect("localhost","root","","hms");
if(isset($_POST['btnSubmit'])){
	$name = $_POST['full_name'];
	$email = $_POST['email'];
	$Date = $_POST['his_date'];
    $department=$_POST['department'];
	$phone = $_POST['phone'];
	$Messages = $_POST['Messages'];



    $query="insert into his_contact(full_name, email, his_date, department, phone, Messages) values(?,?,?,?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    $rc=$stmt->bind_param('sssssssss', $name, $email, $Date, $department, $phone, $Messages);
    $stmt->execute();

    // if($stmt)
    // {
    //     header("LOCATION: index.php");
    // }
    // else {
    //     echo "Please Try Again Or Try Later";
    // }

}