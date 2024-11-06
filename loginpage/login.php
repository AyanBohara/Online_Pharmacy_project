<?php

include "../html/dbconnect.php";
session_start();

// if(isset($_POST['login_btn1'])){
$Email=$_POST['Email'];
$Password=$_POST['Password'];


$q="SELECT * FROM `user` WHERE `Email`='$Email' and `Password`='$Password'"; 

$result=mysqli_query($conn,$q)  or die(mysqli_error($conn)) ;
$row=mysqli_fetch_array($result);


   if($row['usertype']=='user'){

      $_SESSION['user_name'] = $row['FirstName'];
      $_SESSION['user_email'] = $Email;
      $_SESSION['user_id'] = $row['id'];

      // echo "login successfull";
   header("location:../html/main.php");
   
}
else if($row['usertype']=='admin'){

   $_SESSION['admin_name'] = $row['FirstName'];
   $_SESSION['admin_email'] = $Email;
   $_SESSION['admin_id'] = $row['id'];
   header("location:../admin/admin_dashboard.php");

  }

else{

   
  
   echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
   echo '<script type="text/javascript">';
   echo 'Swal.fire({
     title: "Error",
     text: "An error occurred while trying to log in.",
     icon: "error",
     confirmButtonText: "OK"
   }).then(function() {
     window.location.href = "../loginpage/login-register.php";
   });';
   echo '</script>';
   
   

   
   

 

}

?>
