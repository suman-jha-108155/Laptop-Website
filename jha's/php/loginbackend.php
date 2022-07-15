<?php include "config.php";
$error_message = "";$success_message = "";

// Register user
if(isset($_POST['signup-btn'])){
   $email = trim($_POST['email']);
   $password = trim($_POST['password']);

   $isValid = true;

   // Check fields are empty or not
   if($name == '' || $email == '' || $password == '' || $confirmpassword == ''){
     $isValid = false;
     $error_message = "Please fill all fields.";
   }
  

   // Check if Email-ID is valid or not
   if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
     $isValid = false;
     $error_message = "Invalid Email-ID.";
   }

   }

   // Insert records
   if($isValid){
     $searchsql = "SELECT * FROM users WHERE email = ? and password=?";
     $stmt = $con->prepare($searchsql);
     $stmt->bind_param("ss",$name,$email,$password);
     $stmt->execute();
     $result = $stmt->get_result();
     $stmt->close();
     if($result->num_rows > 0){
       header("Location: ../dashboard.html");
     }

     
   }
}
?>