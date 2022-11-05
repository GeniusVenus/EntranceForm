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
    if(isset($_POST['password']) && isset($_POST['rpassword']) ){
        $account = $_SESSION['account'];
        $password = validate($_POST['password']);
        $rpassword = validate($_POST['rpassword']); 
        if(empty($password)){
            header("Location: change-password.php?error= Password is required");
            exit();
        }
        if(empty($rpassword)){
            header("Location: change-password.php?error= You need to enter the password again!");
            exit();
        }
        if($password !== $rpassword){
            header("Location: change-password.php?error= Re-entered password is wrong");
            exit();
        }
        $sql = "UPDATE users set password = '$password' where account = '$account'";
        $result = mysqli_query($conn , $sql);
        header("Location: index-login.php?access= Your account's password has been changed successfully ");
    }

?>