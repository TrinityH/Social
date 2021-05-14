<?php

class userDB {

    public static function add_user($user) {
        $db = Database::getDB();

        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();
        $userName = $user->getUserName();
        $email = $user->getEmail();
        $pass = $user->getPass();

        $query = 'INSERT INTO users
                 (firstName, lastName, userName, email, password)
              VALUES
                 (:firstName, :lastName, :userName, :email, :password)';
        $statement = $db->prepare($query);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':userName', $userName);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $pass);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function validateEmail($email) {
        $db = Database::getDB();

        $query = 'SELECT email from users
                 WHERE email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        if (!empty($results)) {
            return false;
        } else {
            return true;
        }
    }

    public static function userNameExists($userName) {
        $db = Database::getDB();

        $query = 'SELECT userName from users
                 WHERE userName = :userName';
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $userName);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        if (!empty($results)) {
            return false;
        } else {
            return true;
        }
    }

    public static function getAllUsers() {
        $db = Database::getDB();

        $query = 'SELECT * FROM users';
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }

    public static function returnHashForPassword($userName) {
        $db = Database::getDB();

        $query = 'SELECT password from users
                 WHERE userName = :userName';
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $userName);
        $statement->execute();
        $results = $statement->fetch();
        $statement->closeCursor();
        $hashValue = $results['password'];
        return $hashValue;
    }

    public static function getUserInfo($userName) {
        $db = Database::getDB();

        $query = 'SELECT * from users
                 WHERE userName = :userName';
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $userName);
        $statement->execute();
        $results = $statement->fetch();
        $statement->closeCursor();
        return $results;
    }

    public static function changeFirstName($userName, $newFirstName) {
        $db = Database::getDB();

        $query = 'UPDATE users
                 set firstName = :newFirstName
                 WHERE userName = :userName';
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $userName);
        $statement->bindValue(':newFirstName', $newFirstName);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function changeLastName($userName, $newLastName) {
        $db = Database::getDB();

        $query = 'UPDATE users
                 set lastName = :newLastName
                 WHERE userName = :userName';
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $userName);
        $statement->bindValue(':newLastName', $newLastName);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function changeUsername($userName, $newUsername) {
        $db = Database::getDB();

        $query = 'UPDATE users
                 set userName = :newUsername
                 WHERE userName = :userName';
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $userName);
        $statement->bindValue(':newUsername', $newUsername);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function changeEmail($userName, $newEmail) {
        $db = Database::getDB();

        $query = 'UPDATE users
                 set email = :newEmail
                 WHERE userName = :userName';
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $userName);
        $statement->bindValue(':newEmail', $newEmail);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function changePassword($userName, $newPassword) {
        $db = Database::getDB();

        $query = 'UPDATE users
                 set password = :newPassword
                 WHERE userName = :userName';
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $userName);
        $statement->bindValue(':newPassword', $newPassword);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function changeImage($userName, $newImage) {
        $db = Database::getDB();

        $query = 'UPDATE users
                 set image = :newImage
                 WHERE userName = :userName';
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $userName);
        $statement->bindValue(':newImage', $newImage);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function getComment($userID, $userComment) {
        $db = Database::getDB();

        $query = 'SELECT userID, userComment
                 FROM users u
                 INNER JOIN comments c
                 ON u.userID = c.userID';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->bindValue(':userComment', $userComment);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function add_comment($comment) {
        global $db;
        $userID = $comment->getUserID();
        $commentID = $comment->getCommentID();
        $userComment = $comment->getUserComment();
        $query = 'INSERT INTO comments
                 (userID, commentID, userComment)
              VALUES
                 (:userID, :commentID, :userComment)';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->bindValue(':commentID', $commentID);
        $statement->bindValue(':userComment', $userComment);
        $statement->execute();
        $statement->closeCursor();
    }

        public static function displayUser() {
        $db = Database::getDB();

        $query = 'SELECT * FROM users
                WHERE userName = :userName ';
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }
}
