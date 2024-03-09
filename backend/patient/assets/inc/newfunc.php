<?php

$con=mysqli_connect("localhost","root","","hms");

if(isset($_POST['update_data']))
{
 $phone=$_POST['phone'];
 $status=$_POST['status'];
 $query="update appointment set payment='$status' where phone='$phone';";
 $result=mysqli_query($con,$query);
 if($result)
  header("Location:updated.php");
}




function display_doc_depts() {
  global $con;
  $query="select distinct(doc_dept) from his_docs";
  $result=mysqli_query($con,$query);
  while($row=mysqli_fetch_array($result))
  {
    $doc_dept=$row['doc_dept'];
    echo '<option data-value="'.$doc_dept.'">'.$doc_dept.'</option>';
  }
}

function display_docs()
{
 global $con;
 $query = "select * from his_docs";
 $result = mysqli_query($con,$query);
 while( $row = mysqli_fetch_array($result) )
 {
  $doc_fname = $row['doc_fname'];
  $doc_lname = $row['doc_lname'];
  $price = $row['docFees'];
  $doc_dept = $row['doc_dept'];
  echo '<option value="' .$doc_fname.'" data-value="'.$price.'" data-doc_dept="'.$doc_dept.'">'.$doc_fname." ". $doc_lname.'</option>';
 }
}



if(isset($_POST['doc_sub']))
{
$doc_fname = $row['doc_fname'];
 $query="insert into his_docs(fname)values('$fname')";
 $result=mysqli_query($con,$query);
 if($result)
  header("Location:adddoc.php");
}

?>