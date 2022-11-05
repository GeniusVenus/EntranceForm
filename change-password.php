<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="entrance.css" type="text/css" />
</head>

<body>
    <form method="post" action="change-password-check.php">
        <h2> Change password </h2>
        <?php if(isset($_GET["error"])){ ?>
              <p class="error"> <?php echo $_GET["error"]; ?> </p>   
        <?php } ?>
        <label> New password</label>
        <input type="password" name="password" placeholder="Enter the password" />
        <label> Re-enter password </label>
        <input type="password" name="rpassword" placeholder="Enter the password again" />
        <button type="submit" class = "finish-button">Finish</button>    
    </form>
</body>

</html>