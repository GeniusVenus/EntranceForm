<?php 
   session_start();
   include "dbh.inc.php"; 
   function validate($data)
   {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
   } 
   if(isset($_POST['account']) && isset($_POST['email']) && isset($_POST['phone_number']))
   {
       $account = validate($_POST['account']);
       $email = validate($_POST['email']);
       $phone_number = validate($_POST['phone_number']); 
       // Check account valid 
      if(empty($account)){
      header("Location: verify.php?error=Account is required");
      exit();
      }
       $sql = "SELECT * from users where account = '$account'; ";
       $result = mysqli_query($conn , $sql);
       $row = mysqli_fetch_assoc($result);
       if(mysqli_num_rows($result) === 0){
            header("Location: verify.php?error=Account doesn't exist");
            exit();
       }
       // Check email valid 
        if(empty($email)){
        header("Location: verify.php?error= Email is required");
        exit();
        }  
        if($row['email'] !== $email){
         header("Location: verify.php?error= Email is not correct");
         exit();
        }
        // Check phone_number valid 
        if(empty($phone_number)){
        header("Location: verify.php?error= Phone number is required");
        exit();
        }
        if($row['phone_number'] !== $phone_number){
         header("Location: verify.php?error= Phone number is not correct");
         exit();
        }
        $_SESSION['account'] = $account;
        header("Location: change-password.php");
   }
?> 