<?php
if (!isset($userComment)) {
    $userComment = '';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_SESSION['userLogin']['userName'] ?>'s Profile</title>
        <link type='text/css' rel='stylesheet' href='views/userprofile.css?<?php /* I found this piece online(stackoverflow)to help my CSS work properly */echo time(); ?>'>
    </head>

    <body>
        <header>Quebec Social Media
            <a class="buttons" href="registration.php?action=showUserProfiles">Users</a>
        </header>

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

        <div id="userCommentSection">
            <fieldset>
                <h1>Comments</h1>
                <?php echo $_SESSION['userLogin']['userName'] . ' ' . date("h:i:s"); ?>
                <?php echo $userComment ?>
            </fieldset>
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
