<?php

?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_SESSION['userLogin']['userName'] ?>'s Profile</title>
        <link type='text/css' rel='stylesheet' href='views/userprofile.css?<?php /*I found this piece online(stackoverflow)to help my CSS work properly*/echo time(); ?>'>
    </head>
    
    <body>
        <header>Quebec Social Media</header>
        
        <div id="userImg">
            <img src="./images/<?php echo $_SESSION['userLogin']['image'] ?>">
            <p><a class="buttons" href="registration.php?action=uploadImage">Change Profile Picture</a></p>
        </div>
        
        <div id="userInfo">
            <fieldset>
                <label>First Name</label>
                <h3><?php echo $_SESSION['userLogin']['firstName'] ?> &nbsp; <a class="editbuttons" href="registration.php?action=changeFirstname">Edit</a></h3><br>
                <label>Last Name</label>
                <h3><?php echo $_SESSION['userLogin']['lastName'] ?> &nbsp; <a class="editbuttons" href="registration.php?action=changeLastname">Edit</a></h3><br>
                <label>Username</label>
                <label>Email Address</label>
                <h3><?php echo $_SESSION['userLogin']['email'] ?>&nbsp; <a class="editbuttons" href="registration.php?action=changeEmail">Edit</a></h3><br>
                <p><a class="buttons" href="registration.php?action=changePassword">Change Password</a></p>
                <p><a class="buttons" href="registration.php?action=logout">Logout</a></p>
            </fieldset>
        </div>
        <!-- Users still able to leave another comment here -->
        <div id="commentSection">
            <fieldset>
                <form action="registration.php" method="post">
                    <label>Leave a comment for the user</label>
                    <input type="text" name="userComment" value="<?php echo htmlspecialchars($userComment); ?>"><br>
                    <label>&nbsp;</label>       
                    <input type="hidden" name="action" value="postComment">
                    <input type="hidden" name="action"
                           value="postComment">
                    <input type="submit" id='postComment' class="buttons" value="postComment">
                </form>
            </fieldset>
        </div>
        <!-- Users able to view comments here -->
        <div id="userCommentSection">
            <fieldset>
                    <label>Username</label>
                    <?php echo $_SESSION['userLogin']['userName'] + strtotime($time)?>
                    <?php echo $_SESSION['userComment']?>
            </fieldset>
            <!-- User can reply and also see replies -->
            <div id ="replySection">
                <fieldset>
                    <form action="registration.php" method="post">
                        <label>Reply</label>
                        <input type="text" name="action" value="reply">
                        <input type="hidden" name="action"
                               value="reply">
                        <input type="submit" id='reply' class="buttons" value="reply">
                    </form>
                </fieldset>
            </div>
        </div>
    </body>
</html>
