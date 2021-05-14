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
            
        <h3>Old Email Address:</h3>
        <input type="text" name="oldEmail" value="<?php echo htmlspecialchars($_SESSION['userLogin']['email']); ?>"><br>
                <br>
        
        <h3>New Email Address: </h3>
        <input type="text" name="newEmail"><br>
                <?php if (!empty($errorEmail)) { ?>
                    <p class="error"><?php echo htmlspecialchars($errorEmail); ?></p>
                <?php } ?><br>
        
        <label>&nbsp;</label>       
                <input type="hidden" name="action" value="showChangeEmail">
                <input type="hidden" name="action"
                       value="showChangeEmail">
                <input type="submit" id='btnSubmit' class="buttons" value="Change"></form><br><br>
                
         <label>&nbsp;</label>
         <a href="registration.php" name="action" value="showRegistration" class="buttons" id="btnSubmit">Registration</a><br><br><br>
        
        </main>
    </body>
</html>