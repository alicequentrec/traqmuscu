<?php
   session_start();
   require("commandes.php");
   require("view/header.php");
   require("view/footer.php");
?>
<style>
  .texte{
    color : white;
}
</style>
<div class="login-page">
    <div class="wrapper">
        <div class="form-wrapper sign-in">
            <form action="" method="post">
                <h2>Commender</h2>
                <div class="input-group">
                    <input type="text" name="nom" required>  
                    <label for="">Nom</label>
                </div>
                <div class="input-group">
                    <input type="email" name="email"required>
                    <label for="">Email</label>
                </div>
                <label for="formules">Selectionner une formule  </label>

                <br>
                <div class="texte">
                  <select id="formules" name="commande">

                    <option value="1">diete</option>
                    <option value="2">premium</option>
                    <option value="2">muscu</option>

                  </select>
                </div>
                <br>
                <br>

                <button type="submit" name="envoyer">Envoyer</button>
            </form>
        </div>
        <?php

if(isset($_POST['envoyer']))
{
  if(isset($_POST['email']) AND isset($_POST['nom']) AND isset($_POST['commande']) )
  {
    if(!empty($_POST['email']) AND !empty($_POST['nom']) AND !empty($_POST['commande']))
    {
      $email = htmlspecialchars(strip_tags($_POST['email']));
      $nom = htmlspecialchars(strip_tags($_POST['nom']));
      $commande = htmlspecialchars(strip_tags($_POST['commande']));
      
      try 
      {
        ajouter_commandes($email, $nom, $commande);
      } 
      catch (Exception $e) 
      {
        var_dump($e->getMessage());
      }
    }
  }
}

?>