<?php



session_start();
include('assets/inc/config.php');
if (isset($_POST['reg-pat'])) {
  $Fname = $_POST['Fname'];
  $Lname = $_POST['Lname'];
  $Gender = $_POST['Gender'];
  $Email = $_POST['Email'];
  $Phone = $_POST['Phone'];
  $pat_number = $_POST['pat_number'];
  $pat_addr = $_POST['pat_addr'];
  $pat_age = $_POST['pat_age'];
  $pat_dob = $_POST['pat_dob'];
  $password = sha1(md5($_POST['password']));
  $cpassword = sha1(md5($_POST['cpassword']));
  if ($password == $cpassword) {
    $query = "insert into login_patient(Fname,Lname,Gender,Email,Phone,password,cpassword ,pat_addr,pat_age,pat_number,
     pat_dob) values ('$Fname','$Lname','$Gender','$Email','$Phone','$password','$cpassword','$pat_addr',' $pat_age','$pat_number','$pat_dob'
  );";
    $result = mysqli_query($mysqli, $query);
    if ($result) {
      $_SESSION['username'] = $_POST['Fname'] . " " . $_POST['Lname'];
      $_SESSION['Fname'] = $_POST['Fname'];
      $_SESSION['Lname'] = $_POST['Lname'];
      $_SESSION['Gender'] = $_POST['Gender'];
      $_SESSION['pat_number'] = $_POST['pat_number'];

      $_SESSION['Phone'] = $_POST['Phone'];
      $_SESSION['Email'] = $_POST['Email'];
      $_SESSION['pat_addr'] = $_POST['pat_addr'];
      $_SESSION['pat_age'] = $_POST['pat_age'];
      $_SESSION['pat_dob'] = $_POST['pat_dob'];
      header("Location:index.php");
    }

    $query1 = "select * from login_patient;";
    $result1 = mysqli_query($con, $query1);
    if ($result1) {
      $_SESSION['id'] = $row['id'];
    }
  } else {
    header("Location:error1.php");
  }
}
?>

<!DOCTYPE html>
<html  dir="ltr">

<head>
  <meta charset="UTF-8">

  <link rel="stylesheet" href="assets/css/resgister.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrat a patient</title>
  <script>
    var check = function() {
      if (document.getElementById('password').value ==
        document.getElementById('cpassword').value) {
        document.getElementById('message').style.color = '#5dd05d';
        document.getElementById('message').innerHTML = 'Matched';
      } else {
        document.getElementById('message').style.color = '#f55252';
        document.getElementById('message').innerHTML = 'Not Matching';
      }
    }
  </script>
  <style>
    a {
      text-decoration: none;
      color: #21a99b !important;
    }
  </style>
</head>

<body class="bg-image" style="background-image: url(assets/img/2.jpg);">
  <div class="boxing">
    <div class="title">تسجيل المريض</div>
    <div class="content">
      <form action="Regesrtration.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">الاسم الاول </span>
            <input type="text" name="Fname" placeholder="ادخل الاسم الاول" required>
          </div>
          <div class="input-box">
            <span class="details">الاسم الاخير</span>
            <input type="text" name="Lname" placeholder="ادخل الاسم الاخير" required>
          </div>
          <div class="input-box">
            <span class="details">الأيميل</span>
            <input type="Email" name="Email" placeholder="ادخل الأيميل" required>
          </div>
          <div class="input-box">
            <span class="details">رقم الهاتف </span>
            <input type="text" name="Phone" placeholder="ادخل رقم الهاتف" required>
          </div>
          <div class="input-box">
            <span class="details">كلمه المرور</span>
            <input type="password"   placeholder="ادخل كلمه المرور" id="password" name="password" onkeyup='check();' required>
          </div>
          <div class="input-box">
            <span class="details">تأكيد كلمه المرور</span>
            <input type="password"  placeholder="تأكيد كلمه المرور" id="cpassword" name="cpassword" onkeyup='check();' required>
            <span id='message'></span>
          </div>
          <div class="input-box">
            <span class="details">تاريخ الميلاد </span>
            <input type="date" name="pat_dob" placeholder=" تاريخ الميلاد  " required>
            <span id='message'></span>
          </div>
          <div class="input-box">
            <span class="details">العمر</span>
            <input type="text" name="pat_age" placeholder="age" required>
            <span id='message'></span>
          </div>
          <div class="input-box">
            <span class="details"></span>
            <input type="text" name="pat_addr" placeholder="address" required>
            <span id='message'></span>
          </div>
          <div class="form-group col-md-2" style="display:none">
            <?php
            $length = 5;
            $patient_number =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, $length);
            ?>
            <label for="inputZip" class="col-form-label">Patient Number</label>
            <input type="text" name="pat_number" value="<?php echo $patient_number; ?>" class="form-control" id="inputZip">
          </div>

        </div>
        <div class="form-group col-md-4">
          <label for="inputState" class="col-form-label">Gender</label>
          <select id="inputState" required="required" name="Gender" class="form-control">
            <option disabled selected>Choose</option>
            <option>male</option>
            <option>female</option>
          </select>
        </div>
        <div class="pt-4">
          Already have an account ? <a href="index.php" style="color:teal"> sign in</a>
        </div>
        <div class="button">
          <input type="submit" name="reg-pat" value="تسجيل">
        </div>
      </form>
    </div>
  </div>

</body>

</html>