<?php
include "dbconnect.php";

$FirstName = $_POST["FirstName"];
$LastName = $_POST["LastName"];
$Email = $_POST["Email"];
$Password = $_POST["Password"];

// TODO: Sanitize and validate user inputs before using them in the query

$sql = "INSERT INTO `user`(`FirstName`, `LastName`, `Email`, `Password`) VALUES ('$FirstName','$LastName','$Email','$Password')";

if ($conn->query($sql) === TRUE) {
  $registrationSuccess = true;
} else {
  $registrationSuccess = false;
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <!-- Include SweetAlert library -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
if ($registrationSuccess) {
  // Display SweetAlert when registration is successful
  echo '<script>
    Swal.fire({
      title: "Register successfully",
      icon: "success",
      showConfirmButton: false,
      timer: 2000 // Display for 2 seconds
    }).then(function() {
      window.location.href = "../loginpage/login-register.php";
    });
  </script>';
}
?>
</body>
</html>
