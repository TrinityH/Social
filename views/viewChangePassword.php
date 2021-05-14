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
            
        <h3>New Password:</h3>
        <input type="password" name="newPass"><br>
                <br>
        
        <h3>Re-enter New Password </h3>
        <input type="password" name="newPass1"><br>
                <?php if (!empty($errorPass)) { ?>
                    <p class="error"><?php echo ($errorPass); ?></p>
                <?php } ?><br>
        
        <label>&nbsp;</label>       
                <input type="hidden" name="action" value="showChangePassword">
                <input type="hidden" name="action"
                       value="showChangePassword">
                <input type="submit" id='btnSubmit' class="buttons" value="Change"></form><br><br>
                
         <label>&nbsp;</label>
         <a href="registration.php" name="action" value="showRegistration" class="buttons" id="btnSubmit">Registration</a><br><br><br>
        
        </main>
    </body>
</html>