<!DOCTYPE html>
<?php
  include("includes/config.php");

  // session_destroy();

  if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
  } else {
    header("Location: register.php");
  }
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Zoned</title>
  </head>
  <body>

    <div class="nowPlayingBarContainer">
      <div class="nowPlayingBar">
        <div class="nowPlayingBarLeft">
          <div class="content">

            <span class="albumLink">
              <img src="http://clipart-library.com/img/1250259.png" alt="album" class="albumArtwork">
            </span>

            <div class="trackInfo">

              <span class="trackName">
                <span>Happy Birthday</span>
              </span>

              <span class="artistName">
                <span>Vishnu Divakar</span>
              </span>

            </div>

          </div>
        </div>
        <div class="nowPlayingBarCenter">
          <div class="content playerControls">

            <div class="buttons">

              <button class="controlButton shuffle" title="shuffle">
                <img src="assets/images/icons/shuffle.png" alt="shuffle" />
              </button>

              <button class="controlButton previous" title="previous">
                <img src="assets/images/icons/previous.png" alt="previous" />
              </button>

              <button class="controlButton play" title="play">
                <img src="assets/images/icons/play.png" alt="play" />
              </button>

              <button class="controlButton pause" title="pause" style="display: none;">
                <img src="assets/images/icons/pause.png" alt="pause" />
              </button>

              <button class="controlButton next" title="next">
                <img src="assets/images/icons/next.png" alt="next" />
              </button>

              <button class="controlButton repeat" title="repeat">
                <img src="assets/images/icons/repeat.png" alt="repeat" />
              </button>

            </div>

            <div class="playbackBar">

              <span class="progressTime current">0:00</span>
              <div class="progressBar">
                <div class="progressBarBg">
                  <div class="progress"></div>
                </div>
              </div>
              <span class="progressTime remaining">0:00</span>

            </div>

          </div>
        </div>
        <div class="nowPlayingBarRight">
          <div class="volumeBar">

            <button class="controlButton volume" title="volume">
              <img src="assets/images/icons/volume.png" alt="volume">
            </button>

            <div class="progressBar">
              <div class="progressBarBg">
                <div class="progress"></div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </body>
</html>
