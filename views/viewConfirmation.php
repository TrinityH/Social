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
            
            <h1>Thank you for registering!</h1><br>
        <h3>Name: </h3>
        <span id="blue"><?php echo $firstName . " " . $lastName; ?></span><br><br>
        
        <h3>Username: </h3>
        <span id="blue"><?php echo $userName; ?></span><br><br>
        
        <h3>Email Address: </h3>
        <span id="blue"><?php echo $email; ?></span><br><br><br>
        
        <label>&nbsp;</label>
            <form action='registration.php' method='post'>
                <input type="hidden" name="action"
                       value="displayUsers">
                <input type="submit" class="buttons" id="btnSubmit" value="Display Users"></form><br><br><br>
                
        <label>&nbsp;</label>
            <form action="registration.php" method='post'>
                <input type="hidden" name="action"
                       value="showLoginPage">
                <input type="submit" value="Login" id="btnSubmit" class="buttons"></form><br><br><br>
                
         <label>&nbsp;</label>
         <a href="registration.php" name="action" value="showRegistration" class="buttons" id="btnSubmit">Registration</a><br><br><br>
        
        </main>
    </body>
</html>
