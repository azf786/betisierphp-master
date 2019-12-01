
<div class="titre"><h2>Pour vous connecter</h2></div>
<?php if(empty($_POST["login"]) && empty($_SESSION["connect"])) {?>
  <form action ="index.php?page=14" method = "post" id = "formConst">
    <label for="login">Nom d'Utilisateur</label>
    <input type="text" name="login">
    <br />
    <label for="pwd">Mot de passe</label>
    <input type="password" name="pwd">
    <br />
    <?php
      $img1 = rand(1,9);
      $img2 = rand(1,9);
      $_SESSION["sum"] = $img1 + $img2;
      switch ($img1) {
        case 1:
          $image1 = '"image\nb\1.jpg"';
          break;
        case 2:
          $image1 = '"image\nb\2.jpg"';
          break;
        case 3:
          $image1 = '"image\nb\3.jpg"';
          break;
        case 4:
          $image1 = '"image\nb\4.jpg"';
          break;
        case 5:
          $image1 = '"image\nb\5.jpg"';
          break;
        case 6:
          $image1 = '"image\nb\6.jpg"';
          break;
        case 7:
          $image1 = '"image\nb\7.jpg"';
          break;
        case 8:
          $image1 = '"image\nb\8.jpg"';
          break;
        case 9:
          $image1 = '"image\nb\9.jpg"';
          break;
        default:
          // code...
          break;
      }

      switch ($img2) {
        case 1:
          $image2 = '"image\nb\1.jpg"';
          break;
        case 2:
          $image2 = '"image\nb\2.jpg"';
          break;
        case 3:
          $image2 = '"image\nb\3.jpg"';
          break;
        case 4:
          $image2 = '"image\nb\4.jpg"';
          break;
        case 5:
          $image2 = '"image\nb\5.jpg"';
          break;
        case 6:
          $image2 = '"image\nb\6.jpg"';
          break;
        case 7:
          $image2 = '"image\nb\7.jpg"';
          break;
        case 8:
          $image2 = '"image\nb\8.jpg"';
          break;
        case 9:
          $image2 = '"image\nb\9.jpg"';
          break;
        default:
          // code...
          break;
      }

     ?>
    <label for="confirmation"><img src=<?php echo $image1; ?> height="42" width="42" > + <img src=<?php echo $image2; ?> height="42" width="42"></label>
    <input type="text" name="confirmation">
    <br />
    <button type="submit" name="button">Valider</button>
  </form>
<?php }  ?>
<?php
set_time_limit(0);
?>
<br />
