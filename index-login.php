<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="entrance.css" type="text/css" />
</head>

<body>
    <form method="post" action="login.php">
        <h2> LOGIN </h2>
        <?php if(isset($_GET["error"])){ ?>
              <p class="error"> <?php echo $_GET["error"]; ?> </p> 
        <?php } ?>
        <?php if(isset($_GET["access"])){ ?>
              <p class="access"> <?php echo $_GET["access"]; ?> </p> 
        <?php } ?>
        <label> Account</label>
        <input type="text" name="account" placeholder="Enter the account" />
        <label> Password </label>
        <input type="password" name="password" placeholder="Enter the password" />
        <button type="submit" class = "login-button">Login</button> 
        <input type="button" onclick="window.location.href='index-signup.php';" class="signup-button" value="Sign up"/>
        <a class="change-password" href = "verify.php"> Forget your password ? </a> 
    </form>
</body>

</html>