<?php

require_once'model/database.php';
require_once'model/userDB.php';
require_once'model/User.php';
require_once'model/Comment.php';

session_start();
if (empty($_SESSION['userLogin'])) {
    $_SESSION['userLogin'] = array();
}

$action = filter_input(INPUT_GET, 'action');
if ($action == null) {
    $action = filter_input(INPUT_POST, 'action');
    if ($action == null) {
        $action = 'showRegistration';
    }
}


switch ($action) {
    case 'showRegistration':
        include 'views/viewRegistration.php';
        die();
        break;

    case 'showUserProfile':
        include 'views/viewUserProfile.php';
        die();
        break;
    case 'postComment':
        $userComment = filter_input(INPUT_POST, 'userComment');
        $addedComment = new Comment($userID, $commentID, $userComment);
        userDB::add_comment($addedComment);
        $getComment = userDB::getComment();
        include 'views/viewUserProfile.php';
        die();
        break;
    case 'showUserProfiles':
        $allUsers = userDB::getAllUsers();
        include 'views/viewUserProfiles.php';
        die();
        break;

    case 'showConfirmation':
        $firstName = filter_input(INPUT_POST, 'firstName');
        $errorFName = '';

        $lastName = filter_input(INPUT_POST, 'lastName');
        $errorLName = '';

        $userName = filter_input(INPUT_POST, 'userName');
        $errorUserName = '';

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $errorEmail = '';

        $pass = filter_input(INPUT_POST, 'password');
        $errorPass = '';

        $validUserName = true;
        $validEmail = true;

        $validEmail = userDB::validateEmail($email);

        $validUserName = userDB::userNameExists($userName);




        if ($firstName == '') {
            $errorFName = "A first name is required.";
        } else {
            $errorFName = '';
        }

        if ($lastName == '') {
            $errorLName = "A last name is required.";
        } else {
            $errorLName = '';
        }



        if ($userName == '') {
            $errorUserName = "Please enter a valid Username.";
        } else if (!$validUserName) {
            $errorUserName = "That Username is already taken.  Please choose a different Username.";
        } else {
            $errorUserName = '';
        }

        if (strlen($userName) < 4) {
            $errorUserName = "Username must be at least 4 characters.";
        } else if (strlen($userName) > 30) {
            $errorUserName = "Username must be less than 30 characters.";
        } else {
            $errorUserName = '';
        }

        if ($email == '') {
            $errorEmail = 'Please enter a valid email';
        } else if (!$validEmail) {
            $errorEmail = "That Email address is already in use.  Please choose a different email.";
        } else {
            $errorEmail = '';
        }

        if ($pass == '') {
            $errorPass = 'Please enter a password';
        } else {
            $errorPass = '';
        }
        $pattern1 = '/[A-Z]/';
        $pattern2 = '/[a-z]/';
        $pattern3 = '/[0-9]/';
        $pattern4 = '/\W/';
        $passRequirementsCount = 0;

        if (strlen($pass) < 12) {
            $errorPass .= '<br>Password must be at least 12 characters long';
            $passRequirementsCount = -4;
//          Minused 4 so that this cannot pass the later requirements if pass is not 12 chars long
        }
        if (!preg_match($pattern1, $pass)) {
            $errorPass .= '<br>Password must have a capital letter';
        } else {
            $passRequirementsCount++;
        }
        if (!preg_match($pattern2, $pass)) {
            $errorPass .= '<br>Password must have a lowercase letter';
        } else {
            $passRequirementsCount++;
        }
        if (!preg_match($pattern3, $pass)) {
            $errorPass .= '<br>Password must have a number';
        } else {
            $passRequirementsCount++;
        }
        if (!preg_match($pattern4, $pass)) {
            $errorPass .= '<br>Password must have a special character';
        } else {
            $passRequirementsCount++;
        }

        if ($passRequirementsCount >= 3) {
            $errorPass = '';
        }


        if ($errorFName != '' || $errorLName != '' || $errorUserName != '' || $errorEmail != '' || $errorPass != '') {
            include('views/viewRegistration.php');
            exit();
        }

        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $addedUser = new User($firstName, $lastName, $userName, $email, $pass);
        userDB::add_user($addedUser);
        include 'views/viewConfirmation.php';
        die();
        break;

    case'displayUsers':
        $allUsers = userDB::getAllUsers();
        include 'views/displayUsers.php';
        die();

        break;

    case'showLoginPage':
        include'views/viewLogin.php';
        die();
        break;

    case'showLoginAttempt':
        $firstName = filter_input(INPUT_POST, 'firstName');
        $errorFName = '';

        $lastName = filter_input(INPUT_POST, 'lastName');
        $errorLName = '';

        $userName = filter_input(INPUT_POST, 'userName');
        $errorUserName = '';

        $pass = filter_input(INPUT_POST, 'pass');
        $errorPass = '';

        $validUserName = true;
        $validUserName = !(userDB::userNameExists($userName));

        $hashValueForPassword = '';
        $correctPassForUserName = true;

        if ($validUserName == false) {
            $errorUserName = 'That Username is not registered';
        } else {
            $errorUserName = '';

            $hashValueForPassword = userDB::returnHashForPassword($userName);
        }

        $correctPassForUserName = password_verify($pass, $hashValueForPassword);

        if ($correctPassForUserName == false) {
            $errorPass = 'Password does not match';
        } else {
            $errorPass = '';
        }

        if ($errorUserName != '' || $errorPass != '') {
            include 'views/viewLogin.php';
        } else {

            $_SESSION['userLogin']['userName'] = $userName;
            $userInfo = userDB::getUserInfo($_SESSION['userLogin']['userName']);
            $_SESSION['userLogin']['firstName'] = $userInfo['firstName'];
            $_SESSION['userLogin']['lastName'] = $userInfo['lastName'];
            $_SESSION['userLogin']['email'] = $userInfo['email'];
            $_SESSION['userLogin']['image'] = $userInfo['image'];
            include 'views/viewUserProfile.php';
        }

        break;

    case'changeFirstname':
        include 'views/viewChangeFirstName.php';
        die();
        break;

    case'showChangeFirstName';
        $newFirstName = filter_input(INPUT_POST, 'newFirstName');
        $errorFName = '';

        if ($newFirstName == '') {
            $errorFName = 'First Name cannot be blank';
            include 'views/viewChangeFirstName.php';
        } else if (trim($newFirstName) == '') {
            $errorFName = 'First Name cannot be an empty string';
            include 'views/viewChangeFirstName.php';
        }

        if ($errorFName == '') {
            userDB::changeFirstName($_SESSION['userLogin']['userName'], $newFirstName);
            $userInfo = userDB::getUserInfo($_SESSION['userLogin']['userName']);
            $_SESSION['userLogin']['firstName'] = $userInfo['firstName'];
            include 'views/viewUserProfile.php';
            die();
        }
        break;

    case'changeLastname':
        include 'views/viewChangeLastName.php';
        die();
        break;

    case'showChangeLastName':
        $newLastName = filter_input(INPUT_POST, 'newLastName');
        $errorLName = '';

        if ($newLastName == '') {
            $errorLName = 'Last Name cannot be blank';
            include 'views/viewChangeLastName.php';
        } else if (trim($newLastName) == '') {
            $errorLName = 'Last Name cannot be an empty string';
            include 'views/viewChangeLastName.php';
        }

        if ($errorLName == '') {
            userDB::changeLastName($_SESSION['userLogin']['userName'], $newLastName);
            $userInfo = userDB::getUserInfo($_SESSION['userLogin']['userName']);
            $_SESSION['userLogin']['lastName'] = $userInfo['lastName'];
            include 'views/viewUserProfile.php';
            die();
        }
        break;

    case'changeUsername';
        include 'views/viewChangeUsername.php';
        die();
        break;

    case'showChangeUsername':
        $newUsername = filter_input(INPUT_POST, 'newUsername');
        $errorUserName = '';
        $validUserName = true;
        $validUserName = userDB::userNameExists($newUsername);

        if ($newUsername == '') {
            $errorUserName = 'Username cannot be blank';
            include 'views/viewChangeUsername.php';
        } else if (trim($newUsername) == '') {
            $errorUserName = 'Username cannot be an empty string';
            include 'views/viewChangeUsername.php';
        } else if (!$validUserName) {
            $errorUserName = "That Username is already taken.  Please choose a different Username.";
            include 'views/viewChangeUsername.php';
        }

        if ($errorUserName == '') {
            userDB::changeUsername($_SESSION['userLogin']['userName'], $newUsername);
            $_SESSION['userLogin']['userName'] = $newUsername;
            include 'views/viewUserProfile.php';
            die();
        }
        break;

    case'changeEmail':
        include 'views/viewChangeEmail.php';
        die();
        break;

    case'showChangeEmail':
        $newEmail = filter_input(INPUT_POST, 'newEmail', FILTER_VALIDATE_EMAIL);
        $errorEmail = '';
        $validEmail = true;
        $validEmail = userDB::validateEmail($newEmail);

        if ($newEmail == '') {
            $errorEmail = 'Email cannot be blank';
            include 'views/viewChangeEmail.php';
        } else if (!$validEmail) {
            $errorEmail = "That Email address is already in use.  Please choose a different email.";
            include 'views/viewChangeEmail.php';
        }

        if ($errorEmail == '') {
            userDB::changeEmail($_SESSION['userLogin']['userName'], $newEmail);
            $userInfo = userDB::getUserInfo($_SESSION['userLogin']['userName']);
            $_SESSION['userLogin']['email'] = $userInfo['email'];
            include 'views/viewUserProfile.php';
            die();
        }
        break;

    case'changePassword':
        include 'views/viewChangePassword.php';
        die();
        break;

    case'showChangePassword':
        $pass1 = filter_input(INPUT_POST, 'newPass');
        $pass2 = filter_input(INPUT_POST, 'newPass1');
        $errorPass = '';

        if ($pass1 == '' || $pass2 == '') {
            $errorPass = 'Neither Password field can be blank';
            include 'views/viewChangePassword.php';
            die();
        }

        if ($pass1 != $pass2) {
            $errorPass = 'Passwords do not match';
            include 'views/viewChangePassword.php';
            die();
        }
        $pattern1 = '/[A-Z]/';
        $pattern2 = '/[a-z]/';
        $pattern3 = '/[0-9]/';
        $pattern4 = '/\W/';
        $passRequirementsCount = 0;

        if (strlen($pass1) < 12 || strlen($pass2) < 12) {
            $errorPass .= '<br>Password must be at least 12 characters long';
            $passRequirementsCount = -4;
//          Minused 4 so that this cannot pass the later requirements if pass is not 12 chars long
        }
        if (!preg_match($pattern1, $pass1) || !preg_match($pattern1, $pass2)) {
            $errorPass .= '<br>Password must have a capital letter';
        } else {
            $passRequirementsCount++;
        }
        if (!preg_match($pattern2, $pass1) || !preg_match($pattern2, $pass2)) {
            $errorPass .= '<br>Password must have a lowercase letter';
        } else {
            $passRequirementsCount++;
        }
        if (!preg_match($pattern3, $pass1) || !preg_match($pattern3, $pass2)) {
            $errorPass .= '<br>Password must have a number';
        } else {
            $passRequirementsCount++;
        }
        if (!preg_match($pattern4, $pass1) || !preg_match($pattern4, $pass2)) {
            $errorPass .= '<br>Password must have a special character';
        } else {
            $passRequirementsCount++;
        }

        if ($passRequirementsCount >= 3) {
            $errorPass = '';
        }

        if (!($errorPass == '')) {
            include 'views/viewChangePassword.php';
            die();
        }

        if ($errorPass == '') {
            $newPassword = password_hash($pass2, PASSWORD_DEFAULT);
            userDB::changePassword($_SESSION['userLogin']['userName'], $newPassword);
            $userInfo = userDB::getUserInfo($_SESSION['userLogin']['userName']);
            include 'views/viewUserProfile.php';
            die();
        }
        break;

    case'logout':
        $_SESSION['userLogin']['userName'] = '';
        $_SESSION['userLogin']['firstName'] = '';
        $_SESSION['userLogin']['lastName'] = '';
        $_SESSION['userLogin']['email'] = '';
        $_SESSION['userLogin']['image'] = '';
        include 'views/viewRegistration.php';
        die();
        break;

    case'uploadImage':
        include 'views/uploadImage.php';
        die();
        break;
    
    case'visitUserProfile':
        $userInfo = userDB::displayUser();
        include 'views/viewVisitUserProfile.php';
        die();
        break;

    case'uploadNewImage':
        if (isset($_FILES['image'])) {
            $errors = array();
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $temp = $_FILES['image']['name'];
            $temp = explode('.', $temp);
            $temp = end($temp);
            $file_ext = strtolower($temp);

            //var_dump($_FILES);

            $extensions = array("jpeg", "jpg", "png", "gif");

            if (in_array($file_ext, $extensions) === false) {
                $errors[] = "file extension not in whitelist: " . join(',', $extensions);
            }

            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "images/" . $file_name);
                //echo "Success";
                userDB::changeImage($_SESSION['userLogin']['userName'], $file_name);
                $userInfo = userDB::getUserInfo($_SESSION['userLogin']['userName']);
                $_SESSION['userLogin']['image'] = $userInfo['image'];

                include 'views/viewUserProfile.php';
                die();
            } else {
                var_dump($errors);
                include 'views/viewUserProfile.php';
            }
        }
        break;

    default:
        break;
}
