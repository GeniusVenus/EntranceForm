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
    if(isset($_POST["username"]) && isset($_POST["account"]) && isset($_POST["password"]) && isset($_POST["rpassword"]) && isset($_POST["email"]) && isset($_POST["phonenumber"]) ){
    $username = validate($_POST["username"]);
    $account = validate($_POST["account"]);
    $password = validate($_POST["password"]);
    $rpassword = validate($_POST["rpassword"]);
    $email = validate($_POST["email"]);
    $phone_number = validate($_POST["phonenumber"]);
    $gender = validate($_POST["gender"]);
    $user_data = 'username='. $username . '&account=' . $account . '&password' . $password . '&gender=' . $gender. '&email=' . $email . '&phonenumber=' . $phone_number ;
    // Check username valid
    if(empty($username)){
       header("Location: index-signup.php?error=Username is required&$user_data");
       exit();
    }
    // Check account valid
    if(empty($account)){
        header("Location: index-signup.php?error=Account is required&$user_data");
        exit();
    }
    $sql = "SELECT * from Users where account = '$account' ";
    $result = mysqli_query($conn , $sql); 
    if(mysqli_num_rows($result)){
        header("Location: index-signup.php?error=Account already existed&$user_data");
        exit();
    }
    //Check password valid
    if(empty($password)){
        header("Location: index-signup.php?error= Password is required&$user_data");
        exit();
    }
    //Check re-entered password valid 
    if(empty($rpassword)){
        header("Location: index-signup.php?error= Re-entered Password is required&$user_data");
        exit();
    }
    if($rpassword !== $password){
        header("Location: index-signup.php?error= Re-entered Password is wrong&$user_data");
        exit(); 
    }
    // Check gender valid 
    if(empty($gender)){
        header("Location: index-signup.php?error= Gender is required&$user_data");
        exit();
    }
    //Check email valid
    if(empty($email)){
        header("Location: index-signup.php?error= Email is required&$user_data");
        exit();
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: index-signup.php?error=Invalid email&$user_data");
        exit();
    }
    $sql = "SELECT * from Users where email = '$email' ";
    $result = mysqli_query($conn , $sql); 
    if(mysqli_num_rows($result)){
        header("Location: index-signup.php?error=Email already existed&$user_data");
        exit();
    }
    //Check phonenumber valid 
    if(empty($phone_number)){
        header("Location: index-signup.php?error= Phone number is required&$user_data");
        exit();
    } 
    if(!preg_match("/^[+]?[0-9][0-9]{9,14}$/", $phone_number)){
        header("Location: index-signup.php?error= Invalid Phone number&$user_data");
        exit();
    }
    $sql = "SELECT * from Users where phone_number = '$phone_number' ";
    $result = mysqli_query($conn , $sql); 
    if(mysqli_num_rows($result)){
        header("Location: index-signup.php?error=Phone number already existed&$user_data");
        exit();
    }
    // Update data to database
    $sql = "INSERT INTO users(account,password,user_name,email,phone_number,gender)
    VALUES ('$account' , '$password' , '$username' , '$email' , '$phone_number' , '$gender')"; 
    $result = mysqli_query($conn , $sql);
    header("Location: index-login.php?access= Your account has been created successfully");
}
?>