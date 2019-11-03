<?php include("includes/header.php");
  if(isset($_GET['id'])) {
    $albumID = $_GET['id'];
  } else {
    header("Location: index.php");
  }


  $album = new Album($con, $albumID);
  $artist = $album->getArtist();
?>

<div class="entityInfo">
  <div class="leftSection">
    <img src="<?php echo $album->getArtworkPath(); ?>" alt="Album Artwork">
  </div>
  <div class="rightSection">
    <h2><?php echo $album->getTitle(); ?></h2>
    <p>By <?php echo $artist->getName(); ?></p>
    <p><?php echo $album->getNumberOfSongs(); ?> songs</p>
  </div>
</div>

<div class="tracklistContainer">
  <ul class="tracklist">
    <?php
      $songIds = $album->getSongIds();
      $i = 1;
      foreach ($songIds as $songId) {
        $albumSong = new Song($con, $songId);
        $albumArtist = $albumSong->getArtist();

        echo "<li class='trackListRow'>
                <div class='trackCount'>
                  <img class='play' src='assets/images/icons/play-white.png'>
                  <span class='trackNumber'>$i</span>
                </div>

                <div class='trackInfo'>
                  <span class='trackName'>". $albumSong->getTitle() . "</span>
                  <span class='artistName'>". $albumArtist->getName() . "</span>
                </div>

                <div class='trackOptions'>
                  <img class='optionsButton' src='assets/images/icons/more.png'>
                </div>

                <div class='trackDuration'>
                  <span class='duration'>". $albumSong->getDuration() ."</span>
                </div>
             </li>";
        $i++;
      }
    ?>
  </ul>
</div>

<?php include("includes/footer.php"); ?>
