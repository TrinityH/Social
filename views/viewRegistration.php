<?php
if (!isset($firstName)) {
    $firstName = '';
}
if (!isset($lastName)) {
    $lastName = '';
}
if (!isset($userName)) {
    $userName = '';
}
if (!isset($email)) {
    $email = '';
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
        <link href="views/register.css?<?php /* I found this piece online(stackoverflow)to help my CSS work properly */echo time(); ?>" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header>
            <h1>Quebec Social Media</h1>
            <p>Sign Up Now!</p>
        </header>
        <div id="form">
            
            <form action="registration.php" method="post">
                
                <label>First Name<span class="req">*</span></label>
                <input type="text" name="firstName" value="<?php echo htmlspecialchars($firstName); ?>"><br>
                <?php if (!empty($errorFName)) { ?>
                    <p class="error"><?php echo htmlspecialchars($errorFName); ?></p>
                <?php } ?><br>

                <label>Last Name<span class="req">*</span></label>
                <input type="text" name="lastName" value="<?php echo htmlspecialchars($lastName); ?>"><br>
                <?php if (!empty($errorLName)) { ?>
                    <p class="error"><?php echo htmlspecialchars($errorLName); ?></p>
                <?php } ?><br>


                <label>Username<span class="req">*</span></label>
                <input type="text" name="userName" value="<?php echo htmlspecialchars($userName); ?>"><br>
                <?php if (!empty($errorUserName)) { ?>
                    <p class="error"><?php echo htmlspecialchars($errorUserName); ?></p>
                <?php } ?><br>

                <label>Email Address<span class="req">*</span></label>
                <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>"><br>
                <?php if (!empty($errorEmail)) { ?>
                    <p class="error"><?php echo htmlspecialchars($errorEmail); ?></p>
                <?php } ?><br>

                <label>Password<span class="req">*</span></label>
                <input type="password" name="password" value="<?php echo htmlspecialchars($pass); ?>"><br>
                <?php if (!empty($errorPass)) { ?>
                    <p class="error"><?php echo ($errorPass);/*Do not use htmlspecialchars here*/ ?></p>
                <?php } ?><br>

                <label>&nbsp;</label>       
                <input type="hidden" name="action" value="showConfirmation">
                <input type="hidden" name="action"
                       value="showConfirmation">
                <input type="submit" id='signUp' class="buttons" value="Sign Up"></form><br>

            <label>&nbsp;</label>
            <form action="registration.php" method='post'>
                <input type="hidden" name="action"
                       value="showLoginPage">
                <input type="submit" value="Login" id="login" class="buttons"></form><br>

            <label>&nbsp;</label>
            <form action='registration.php' method='post'>
                <input type="hidden" name="action"
                       value="displayUsers">
                <input type="submit" class="buttons" value="Display Users"></form>
            <br><br><br>


        </div>

    </body>