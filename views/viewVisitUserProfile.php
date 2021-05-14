<?php
if (!isset($userComment)) {
    $userComment = '';
}
?>

<!DOCTYPE html>

<html>
    <head>
        <title><?php echo $userInfo['userName'] ?>'s Profile</title>
        <link type='text/css' rel='stylesheet' href='views/userprofile.css?<?php /*I found this piece online(stackoverflow)to help my CSS work properly*/echo time(); ?>'>
    </head>
    
    <body>
        <header>Quebec Social Media
            <a class="buttons" href="registration.php?action=showUserProfiles">Users</a>
        </header>
        
        <div id="userImg">
            <img src="./images/<?php echo $userInfo['image'] ?>">
            <p><a class="buttons" href="registration.php?action=uploadImage">Change Profile Picture</a></p>
        </div>
        
        <div id="userInfo">
            <fieldset>
                <label>First Name</label>
                <h3><?php echo $userInfo['firstName'] ?> &nbsp; <br>
                <label>Last Name</label>
                <h3><?php echo $userInfo['lastName']?> &nbsp; <br>
                <label>Username</label>
                <h3><?php echo $userInfo['userName'] ?>;</h3>
                
            </fieldset>
        </div>
        
        <!--This is where we will need to have the comments be for user profiles-->
        <div id="commentSection">
            <fieldset>
                <form action="registration.php" method="post">
                    <label>Leave a comment for the user</label><br><br>
                    <textarea name="userComment" rows="10" cols="50" value="<?php echo htmlspecialchars($userComment); ?>">
                    </textarea><br><br>
                    <label>&nbsp;</label>       
                    <input type="hidden" name="action" value="postComment">
                    <input type="hidden" name="action"
                           value="postComment">
                    <input type="submit" id='post' class="buttons" value="Post">
                </form>
            </fieldset>
        </div>
    </body>

</html>