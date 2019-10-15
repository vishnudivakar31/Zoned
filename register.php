<!DOCTYPE html>
<?php
  include("includes/config.php");
  include("includes/classes/Constants.php");
  include("includes/classes/Account.php");
  $account = new Account($con);
  include("includes/handlers/register-handler.php");
  include("includes/handlers/login-handler.php");

  function getInputValue($name) {
    if(isset($_POST[$name])) {
      echo $_POST[$name];
    }
  }

?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/register.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/register.js"/>

    </script>
  </head>
  <body>
    <?php
      if(isset($_POST["signUpButton"])) {
        echo '<script>
                $(document).ready(function () {
                  $(".loginForm").hide();
                  $(".registerForm").show();
                });
              </script>';
      } else {
        echo '<script>
                $(document).ready(function () {
                  $(".loginForm").show();
                  $(".registerForm").hide();
                });
              </script>';
      }
    ?>

    <div class="registerContainer">
      <div class="loginContainer">
        <div class="inputContainer">
          <form class="loginForm" action="register.php" method="post">
            <h2>Login to your Zone account</h2>

            <p>
              <?php echo $account->getError(Constants::$LOGINFAILED); ?>
              <label for="loginUsername">Username</label>
              <input type="text" id="loginUsername" name="loginUsername" placeholder="e.g. micheal" value="<?php getInputValue('loginUsername'); ?>" required>
            </p>

            <p>
              <label for="loginPassword">Password</label>
              <input type="password" id="loginPassword" name="loginPassword" placeholder="your password" required>
            </p>

            <button type="submit" name="loginButton">LOG IN</button>

            <div class="hasAccountText">
              <span id="hideLogin">Don't have an account yet? Signup here.</span>
            </div>
          </form>

          <form class="registerForm" action="register.php" method="post">
            <h2>Create Your Free Account.</h2>

            <p>
              <?php echo $account->getError(Constants::$INVALIDUSERNAMELENGTH); ?>
              <?php echo $account->getError(Constants::$USERNAMETAKEN); ?>
              <label for="registerUsername">Username</label>
              <input type="text" id="registerUsername" name="registerUsername" placeholder="e.g. micheal" value="<?php getInputValue("registerUsername"); ?>" required>
            </p>

            <p>
              <?php echo $account->getError(Constants::$INVALIDFIRSTNAMELENGTH); ?>
              <label for="registerFirstName">First Name</label>
              <input type="text" id="registerFirstName" name="registerFirstName" placeholder="e.g. micheal" value="<?php getInputValue("registerFirstName"); ?>" required>
            </p>

            <p>
              <?php echo $account->getError(Constants::$INVALIDLASTNAMELENGTH); ?>
              <label for="registerLastName">Last Name</label>
              <input type="text" id="registerLastName" name="registerLastName" placeholder="e.g. brown" value="<?php getInputValue("registerLastName"); ?>" required>
            </p>

            <p>
              <?php echo $account->getError(Constants::$EMAILSDONOTMATCH); ?>
              <?php echo $account->getError(Constants::$INVALIDEMAILFORMAT); ?>
              <?php echo $account->getError(Constants::$EMAILALREADYPRESENT); ?>
              <label for="registerEmail">Email</label>
              <input type="email" id="registerEmail" name="registerEmail" placeholder="e.g. michealbrown@xyzmail.com" value="<?php getInputValue("registerEmail"); ?>" required>
            </p>

            <p>
              <label for="registerConfirmEmail">Confirm Email</label>
              <input type="email" id="registerConfirmEmail" name="registerConfirmEmail" placeholder="e.g. michealbrown@xyzmail.com" required>
            </p>

            <p>
              <?php echo $account->getError(Constants::$INVALIDPWDFORMAT); ?>
              <?php echo $account->getError(Constants::$INVALIDPWDLENGTH); ?>
              <?php echo $account->getError(Constants::$PWDSDONOTMATCH); ?>
              <label for="registerPassword">Password</label>
              <input type="password" id="registerPassword" name="registerPassword" value="<?php getInputValue("registerPassword"); ?>" placeholder="your password" required>
            </p>

            <p>
              <label for="registerConfirmPassword">Confirm Password</label>
              <input type="password" id="registerConfirmPassword" name="registerConfirmPassword" placeholder="your password" required>
            </p>

            <button type="submit" name="signUpButton">SIGN UP</button>
            <div class="hasAccountText">
              <span id="hideRegister">Already have an account? Login here.</span>
            </div>
          </form>
        </div>

        <div class="loginTxt">
          <h1>Get great music.</h1>
          <h2>Listen to loads of songs for free</h2>
          <ul>
            <li>Discover music that you'll fall in love with</li>
            <li>Create your own playlists</li>
            <li>Follow artists to keep up to date</li>
          </ul>
        </div>

      </div>
    </div>
  </body>
</html>
