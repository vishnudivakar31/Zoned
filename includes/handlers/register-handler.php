<?php

function santizeFormUsername($inputText) {
  $inputText = strip_tags($inputText);
  $inputText = str_replace(" ", "", $inputText);
  return $inputText;
}

function santizeFormString($inputText) {
  $inputText = strip_tags($inputText);
  $inputText = str_replace(" ", "", $inputText);
  $inputText = ucfirst(strtolower($inputText));
  return $inputText;
}

function santizeFormPassword($inputText) {
  $inputText = strip_tags($inputText);
  return $inputText;
}

if(isset($_POST['signUpButton'])) {
  // Register Routine
  $username = santizeFormUsername($_POST['registerUsername']);
  $firstName = santizeFormString($_POST['registerFirstName']);
  $lastname = santizeFormString($_POST['registerLastName']);
  $email = santizeFormUsername($_POST['registerEmail']);
  $confirmEmail = santizeFormUsername($_POST['registerConfirmEmail']);
  $password = santizeFormPassword($_POST['registerPassword']);
  $confirmPassword = santizeFormPassword($_POST['registerConfirmPassword']);

  $wasSuccessful = $account->register($username, $firstName, $lastname, $email, $confirmEmail,
  $password, $confirmPassword);
  if($wasSuccessful) {
    $_SESSION['userLoggedIn'] = $username;
    header("Location: index.php");
  }
}

?>
