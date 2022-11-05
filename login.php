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
    if(isset($_POST["account"]) && isset($_POST["password"])){
    $account = validate($_POST["account"]);
    $password = validate($_POST["password"]);
    if(empty($account)){
        header("Location: index-login.php?error=Account is required");
        exit();
    }
    if(empty($password)){
        header("Location: index-login.php?error=Password is required");
        exit();
    }
    $sql = "SELECT * from users where account = '$account' and password='$password'; "; 
    $result = mysqli_query($conn , $sql);
    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);   
        if($row['account'] === $account && $row['password'] === $password){
            $_SESSION['id'] = $row['id']; 
            $_SESSION['user_name'] = $row['user_name']; 
            $_SESSION['account'] = $row['account']; 
            $_SESSION['email'] = $row['email']; 
            $_SESSION['phone_number'] = $row['phone_number']; 
            $_SESSION['gender'] = $row['gender']; 
            header("Location: main.php");
            exit();
        }
        else {
           header("Location: index-login.php?error=Incorrect account or password!");
           exit();
        }
    }
    else{
        header("Location: index-login.php?error=Incorrect account or password!");
        exit();
    }
} 

?>
