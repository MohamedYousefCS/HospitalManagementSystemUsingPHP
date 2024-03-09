<?php
$con=mysqli_connect("localhost","root","","hms");
if(isset($_POST['patsub'])){
	$Email=$_POST['Email'];
	$password=$_POST['password'];
	$query="select * from login_patient where Email='$Email' and password='$password';";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)==1)
	{
		while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
      $_SESSION['id'] = $row['id'];
      $_SESSION['username'] = $row['Fname']." ".$row['Lname'];
      $_SESSION['Fname'] = $row['Fname'];
      $_SESSION['Lname'] = $row['Lname'];
      $_SESSION['Gender'] = $row['Gender'];
      $_SESSION['Phone'] = $row['Phone'];
      $_SESSION['Email'] = $row['Email'];
    }
		header("Location:admin-panel.php");
	}
  else {
    echo("<script>alert('Invalid Username or Password. Try Again!');
          window.location.href = 'index1.php';</script>");
    // header("Location:error.php");
  }
		
}
if(isset($_POST['update_data']))
{
	$phone=$_POST['phone'];
	$status=$_POST['status'];
	$query="update appointment set payment='$status' where phone='$phone';";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:updated.php");
}




// function display_docs()
// {
// 	global $con;
// 	$query="select * from his_docs";
// 	$result=mysqli_query($con,$query);
// 	while($row=mysqli_fetch_array($result))
// 	{
// 		$name=$row['name'];
//     $cost=$row['docFees'];
// 		echo '<option value="'.$name.'" data-price="' .$cost. '" >'.$name.'</option>';
// 	}
// }


