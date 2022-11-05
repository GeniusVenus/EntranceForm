<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="entrance.css" type="text/css" />
</head>

<body>
    <form method="post" action="verify-check.php">
        <h2> VERIFY </h2>
        <?php if(isset($_GET["error"])){ ?>
              <p class="error"> <?php echo $_GET["error"]; ?> </p> 
        <?php } ?>
        <label> Account</label>
        <input type="text" name="account" placeholder="Enter the account" />
        <label> Email </label>
        <input type="text" name="email" placeholder="Enter the email" /> 
        <label> Phone number </label>
        <input type="text" name="phone_number" placeholder="Enter the phone number" /> 
        <button type="submit" class="next-step-button"> Next step </button>
    </form>
</body>

</html>