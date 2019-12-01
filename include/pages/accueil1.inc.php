<img class="centreImage" src="image/logo.gif" alt="Covoiturage IUT" title="Covoiturage IUT Limousin"/>
<?php session_destroy();

  echo '<p><img src="C:\wamp64\www\betisierphp-master\image\valid.png" alt="tick" > Vous avez bien été deconnecté:</p>';
  sleep(2);
  header("Location: index.php?page=0");
?>
