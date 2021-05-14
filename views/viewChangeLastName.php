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
            
        <h3>Old Last Name:</h3>
        <input type="text" name="oldLastName" value="<?php echo htmlspecialchars($_SESSION['userLogin']['lastName']); ?>"><br>
                <br>
        
        <h3>New Last Name: </h3>
        <input type="text" name="newLastName"><br>
                <?php if (!empty($errorLName)) { ?>
                    <p class="error"><?php echo htmlspecialchars($errorLName); ?></p>
                <?php } ?><br>
        
        <label>&nbsp;</label>       
                <input type="hidden" name="action" value="showChangeLastName">
                <input type="hidden" name="action"
                       value="showChangeLastName">
                <input type="submit" id='btnSubmit' class="buttons" value="Change"></form><br><br>
                
         <label>&nbsp;</label>
         <a href="registration.php" name="action" value="showRegistration" class="buttons" id="btnSubmit">Registration</a><br><br><br>
        
        </main>
    </body>
</html>
