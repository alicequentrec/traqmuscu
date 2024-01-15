<?php 
session_start();
require("commandes.php");
require("view/header.php");
require("view/footer.php");

?>
<style>
  .texte{
    color: white;
}
</style>

<div class="login-page">
    <div class="wrapper">
        <div class="form-wrapper sign-in">
            <form action="" method="post">
                <h2>Commentaire</h2>
                <div class="input-group">
                    <input type="text" name="nom" required>  
                    <label for="">Nom</label>
                </div>
                <div class="input-group">
                    <input type="text" name="avis"required>
                    <label for="">Commentaire</label>
                </div>
                <div class="texte">
                    <div class = "select">
                    <label for="etoile">Votre note (sur 5) :</label><br>
                    <input type="number" name="etoiles" min="1" max="5" required>
                </div>
                </div>
                <br>
                <button type="submit" name="envoyer">Envoyer</button>
            </form>
        </div>
<?php

if(isset($_POST['envoyer']))
{
  if(isset($_POST['nom']) AND isset($_POST['avis']) AND isset($_POST['etoiles']) )
  {
    if(!empty($_POST['nom']) AND !empty($_POST['avis']) AND !empty($_POST['etoiles']))
    {
      $nom = htmlspecialchars(strip_tags($_POST['nom']));
      $avis = htmlspecialchars(strip_tags($_POST['avis']));
      $etoiles = htmlspecialchars(strip_tags($_POST['etoiles']));

      try 
      {
        ajouter_avis($nom, $avis, $etoiles);
      } 
      catch (Exception $e) 
      {
        var_dump($e->getMessage());
      }
    }
  }
}

?>