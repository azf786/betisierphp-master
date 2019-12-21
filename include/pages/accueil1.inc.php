
<?php session_destroy();

  echo '<p><img src="image\valid.png" alt="tick" > Vous avez bien été deconnecté:</p>';
  header("refresh:2;http://localhost/betisierphp-master/index.php?page=0");
?>
