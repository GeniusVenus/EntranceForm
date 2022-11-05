<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="entrance.css" type="text/css" />
</head>

<body>
    <form method="post" action="signup.php">
        <h2> SIGN UP </h2>
        <?php if(isset($_GET["error"])){ ?>
              <p class="error"> <?php echo $_GET["error"]; ?> </p> 
        <?php } ?>
        
        <label> Username</label>
        <?php if(isset($_GET["username"])){ ?>
        <input type="text" name = "username" placeholder="Enter the username" value="<?php echo $_GET["username"];?>" >
        <?php }else{ ?>
            <input type="text" name = "username" placeholder="Enter the username"> 
        <?php } ?>


        <label> Account </label>
        <?php if(isset($_GET["account"])){ ?>
        <input type="text" name = "account" placeholder="Enter the account" value="<?php echo $_GET["account"];?>" >
        <?php }else{ ?>
            <input type="text" name = "account" placeholder="Enter the account"> 
        <?php } ?>
        
        
        <label> Password </label>
        <?php if(isset($_GET["password"])){ ?>
        <input type="password" name = "password" placeholder="Enter the password" value="<?php echo $_GET["password"];?>" >
        <?php }else{ ?>
            <input type="password" name = "password" placeholder="Enter the password"> 
        <?php } ?>
        
            

        <label> Re-enter password </label>
        <?php if(isset($_GET["rpassword"])){ ?>
        <input type="password" name = "rpassword" placeholder="Enter the password again" value="<?php echo $_GET["rpassword"];?>" >
        <?php }else{ ?>
            <input type="password" name = "rpassword" placeholder="Enter the password again"> 
        <?php } ?>
        
        <label> Gender </label>
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Male
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other">Other
    
        <br> <br> <label> Email </label>
        <?php if(isset($_GET["email"])){ ?>
        <input type="text" name = "email" placeholder="Enter the email" value="<?php echo $_GET["email"];?>" >
        <?php }else{ ?>
            <input type="text" name = "email" placeholder="Enter the email"> 
        <?php } ?>

        <label> Phone number </label>
        <?php if(isset($_GET["phonenumber"])){ ?>
        <input type="text" name = "phonenumber" placeholder="Enter the phone number" value="<?php echo $_GET["phonenumber"];?>" >
        <?php }else{ ?>
            <input type="text" name = "phonenumber" placeholder="Enter the phone number"> 
        <?php } ?>
        
        <button type="submit" class="create-button"> Create account </button>
    </form>
</body>

</html>