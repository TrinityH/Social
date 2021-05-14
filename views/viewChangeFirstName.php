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
            
        <h3>Old First Name:</h3>
        <input type="text" name="oldFirstName" value="<?php echo htmlspecialchars($_SESSION['userLogin']['firstName']); ?>"><br>
                <br>
        
        <h3>New First Name: </h3>
        <input type="text" name="newFirstName"><br>
                <?php if (!empty($errorFName)) { ?>
                    <p class="error"><?php echo htmlspecialchars($errorFName); ?></p>
                <?php } ?><br>
        
        <label>&nbsp;</label>       
                <input type="hidden" name="action" value="showChangeFirstName">
                <input type="hidden" name="action"
                       value="showChangeFirstName">
                <input type="submit" id='btnSubmit' class="buttons" value="Change"></form><br><br>
                
         <label>&nbsp;</label>
         <a href="registration.php" name="action" value="showRegistration" class="buttons" id="btnSubmit">Registration</a><br><br><br>
        
        </main>
    </body>
</html>
