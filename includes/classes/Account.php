<?php
  class Account {

     private $errorArray;
     private $con;

     public function __construct($con) {
       $this->errorArray = array();
       $this->con = $con;
     }

     public function login($username, $password) {
       $encrptyedPWD = md5($password);

       $query = mysqli_query($this->con, "SELECT * FROM Users WHERE username = '$username' AND password='$encrptyedPWD'");
       if(mysqli_num_rows($query) == 1) {
         return true;
       }
       array_push($this->errorArray, Constants::$LOGINFAILED);
       return false;
     }

     public function register($username, $firstName, $lastname, $email, $confirmEmail,
     $password, $confirmPassword) {
       $this->validateUsername($username);
       $this->validateFirstName($firstName);
       $this->validateLastName($lastname);
       $this->validateEmails($email, $confirmEmail);
       $this->validatePassword($password, $confirmPassword);

       if(empty($this->errorArray)) {
         return $this->insertUserDetails($username, $firstName, $lastname, $email, $password);
       } else {
         return false;
       }
     }

     public function getError($error) {
       if(!in_array($error, $this->errorArray)) {
         $error = "";
       }
       return "<span class='errorMessage'>$error</span>";
     }

     private function insertUserDetails($username, $firstName, $lastname, $email, $password) {
       $encrptyedPWD = md5($password);
       $profilePic = "assets/images/profile-picture/head_emerald.png";
       $date = date("Y-m-d");

       $result = mysqli_query($this->con, "INSERT INTO Users VALUES (0, '$username',
         '$firstName', '$lastname', '$email', '$encrptyedPWD', '$date', '$profilePic')");
        if(!result) {
            echo("Description: " . mysqli_error($this->con));
        }
       return $result;
     }

     private function validateUsername($username) {
       if(strlen($username) > 25 || strlen($username) < 5) {
         array_push($this->errorArray, Constants::$INVALIDUSERNAMELENGTH);
         return;
       }

       $checkUsername = mysqli_query($this->con, "SELECT username FROM Users WHERE username = '$username'");
       if(mysqli_num_rows($checkUsername) != 0) {
         array_push($this->errorArray, Constants::$USERNAMETAKEN);
       }
     }

     private function validateFirstName($firstName) {
       if(strlen($firstName) > 25 || strlen($firstName) < 2) {
         array_push($this->errorArray, Constants::$INVALIDFIRSTNAMELENGTH);
         return;
       }
     }

     private function validateLastName($lastname) {
       if(strlen($lastname) > 25 || strlen($lastname) < 2) {
         array_push($this->errorArray, Constants::$INVALIDLASTNAMELENGTH);
         return;
       }
     }

     private function validateEmails($email, $confirmEmail) {
       if($email != $confirmEmail) {
         array_push($this->errorArray, Constants::$EMAILSDONOTMATCH);
         return;
       }
       if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         array_push($this->errorArray, Constants::$INVALIDEMAILFORMAT);
         return;
       }
       $checkEmail = mysqli_query($this->con, "SELECT email FROM Users WHERE email = '$email'");
       if(mysqli_num_rows($checkEmail) != 0) {
         array_push($this->errorArray, Constants::$EMAILALREADYPRESENT);
       }
     }

     private function validatePassword($password, $confirmPassword) {
       if($password != $confirmPassword) {
         array_push($this->errorArray, Constants::$PWDSDONOTMATCH);
         return;
       }
       if(preg_match('/[^A-Za-z0-9]/', $password)) {
         array_push($this->errorArray, Constants::$INVALIDPWDFORMAT);
         return;
       }
       if(strlen($password) > 30 || strlen($password) < 5) {
         array_push($this->errorArray, Constants::$INVALIDPWDLENGTH);
         return;
       }
     }
  }
?>
