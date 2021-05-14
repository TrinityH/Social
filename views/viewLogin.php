<?php
if (!isset($userName)) {
    $userName = '';
}
if (!isset($pass)) {
    $pass = '';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Team Quebec</title>
        <link rel="stylesheet" type="text/css" 
              href="views/confirmation.css?<?php /*I found this piece online(stackoverflow)to help my CSS work properly*/echo time(); ?>">
    </head>
    <body>
        <main id="formWrapper">
            
            <form action="registration.php" method="post">
            
            <h1>Login</h1><br>
        <h3>Username: </h3>
        <input type="text" name="userName" value="<?php echo htmlspecialchars($userName); ?>"><br>
                <?php if (!empty($errorUserName)) { ?>
                    <p class="error"><?php echo htmlspecialchars($errorUserName); ?></p>
                <?php } ?><br>
        
        <h3>Password: </h3>
        <input type="password" name="pass"><br>
                <?php if (!empty($errorPass)) { ?>
                    <p class="error"><?php echo htmlspecialchars($errorPass); ?></p>
                <?php } ?><br>
        
        <label>&nbsp;</label>       
                <input type="hidden" name="action" value="showLoginAttempt">
                <input type="hidden" name="action"
                       value="showLoginAttempt">
                <input type="submit" id='btnSubmit' class="buttons" value="Login"></form><br><br>
                
         <label>&nbsp;</label>
         <a href="registration.php" name="action" value="showRegistration" class="buttons" id="btnSubmit">Registration</a><br><br><br>
        
        </main>
    </body>
</html>

