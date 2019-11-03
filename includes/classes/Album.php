<?php
  class Album {

     private $id;
     private $con;
     private $title;
     private $artistID;
     private $genre;
     private $artworkPath;

     public function __construct($con, $id) {
       $this->con = $con;
       $this->id = $id;
       $query = mysqli_query($this->con, "SELECT * FROM Albums WHERE id='$this->id'");
       $album = mysqli_fetch_array($query);

       $this->title = $album['title'];
       $this->artistID = $album['artist'];
       $this->genre = $album['genre'];
       $this->artworkPath = $album['artworkPath'];

     }

     public function getTitle() {
       return $this->title;
     }

     public function getArtworkPath() {
       return $this->artworkPath;
     }

     public function getArtist() {
       return new Artist($this->con, $this->artistID);
     }

     public function getGenre() {
       return $this->genre;
     }

  }
?>
