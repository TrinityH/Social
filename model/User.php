<?php

class User {

    private $firstName, $lastName, $userName, $email, $pass;

    public function __construct($firstName, $lastName, $userName, $email, $pass) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->userName = $userName;
        $this->email = $email;
        $this->pass = $pass;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getUserName() {
        return $this->userName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPass() {
        return $this->pass;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

    public function getImageFile() {
        $image_file = $this->userName . '.png';
        return $image_file;
    }

    public function getImagePath() {
        $image_path = '../images/' . $this->getImageFile();
        return $image_path;
    }

    public function getImageAltText() {
        $image_alt = 'Image: ' . $this->getImageFile();
        return $image_alt;
    }
    
    public function xssafe($data,$encoding='UTF-8') {
        return htmlspecialchars($data,ENT_QUOTES | ENT_HTML401,$encoding);
    }

    public function xecho($data) {
        echo xssafe($data);
        echo "not using htmlspecialchars: ".$xssed;
        echo "\n<br>\n";
        echo "using just htmlspecialchars: ". htmlspecialchars($xssed);
        echo "\n<br>\n";
        xecho( "using just OWASP function xecho: ".$xssed);
    }
}
