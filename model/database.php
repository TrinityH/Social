<?php

class Database {

    private static $dsn = 'mysql:host=localhost;dbname=groupproject';
    private static $username = 'root';
    private static $password = '';
    private static $db;

    private function __construct() {
        
    }

    public static function getDB() {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn, self::$username, self::$password);
                //you should set the error mode here or you won't see exceptions
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('../errors/database_error.php');
                exit();
            }
        }
        return self::$db;
    }

    public static function add_user($firstName, $lastName, $userName, $email, $pass) {
        $db = self::getDB();
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

}
?>



<?php

function add_user($firstName, $lastName, $userName, $email, $pass) {
    global $db;
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

function select_all() {
    global $db;

    $query = 'SELECT * FROM users';
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function select_username() {
    global $db;

    $query = 'SELECT userName FROM users';
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function select_email() {
    global $db;

    $query = 'SELECT email FROM users';
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}


?>
