<?php 
session_start();
require("commandes.php");
require("view/header.php");
require("view/footer.php");

?>


<div class="login-page">
    <div class="wrapper">
        <div class="form-wrapper sign-in">
            <form action="" method="post">
                <h2>Connexion</h2>
                <div class="input-group">
                    <input type="email" name="email" required>  
                    <label for="">Email</label>
                </div>
                <div class="input-group">
                    <input type="password" name="mdp"required>
                    <label for="">Mot de passe</label>
                </div>
                <button type="submit" name="envoyer">Me connecter</button>
                <div class="signUp-link">
                    <p>Pas encore de compte ?<a href="#" class="signUpBtn-link"> Inscrit toi ici</a></p>
                </div>
            </form>
        </div>
        <?php

if(isset($_POST['envoyer'])){
    if(!empty($_POST['email']) AND !empty($_POST['mdp'])){
        $email = htmlspecialchars($_POST['email']);
        $mdp =htmlspecialchars($_POST['mdp']);
        $membres = getMembres($email, $mdp);
        
        if($membres){
            
            $_SESSION['dhdTbzzoP5654'] = $membres;
            header("Location: ../traqmuscu2/index.php");

        }
       else
        {
            echo " Probleme de connection !";
        }
    }
}

?>
        <div class="form-wrapper sign-up">
            <form action="" method="post">
                <h2>Inscription</h2>
                <div class="input-group">
                    <input type="text"  required>
                    <label for="">Prénom</label>
                </div>
                <div class="input-group">
                    <input type="text" name="nom2" required>
                    <label for="">Nom</label>
                </div>
                <div class="input-group">
                    <input type="email" name="email2" required>
                    <label for="">Email</label>
                </div>
                <div class="input-group">
                    <input type="password" name="mdp2" required>
                    <label for="">Mot de passe</label>
                </div>
                <div class="input-group">
                    <input type="number" name="age" required>
                    <label for="">Âge</label>
                </div>
                <div class="input-group">
                    <input type="number" name="poids" required>
                    <label for="">Poids (kg)</label>
                </div>
                <div class="input-group">
                    <input type="number" name="taille" required>
                    <label for="">Taille (cm)</label>
                </div>
                <button type="submit" name="envoyer2">M'inscrire</button>
                <div class="signUp-link">
                    <p>Vous avez déjâ un compte ?<a href="#" class="signInBtn-link"> Se connecter</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const signUpBtnlink = document.querySelector('.signUpBtn-link');
    const signInBtnlink = document.querySelector('.signInBtn-link');
    const wrapper = document.querySelector('.wrapper');
    
    signUpBtnlink.addEventListener('click', () => {
        wrapper.classList.toggle('active');
    });
    
    signInBtnlink.addEventListener('click', () => {
        wrapper.classList.toggle('active');
    });
</script>
<?php

if(isset($_POST['envoyer2']))
{
  if(isset($_POST['email2']) AND isset($_POST['mdp2']) AND isset($_POST['nom2']) AND isset($_POST['age']) AND isset($_POST['poids']) AND isset($_POST['taille']))
  {
    if(!empty($_POST['email2']) AND !empty($_POST['mdp2']) AND !empty($_POST['nom2']) AND !empty($_POST['age']) AND !empty($_POST['poids']) AND !empty($_POST['taille']))
    {
      $email2 = htmlspecialchars(strip_tags($_POST['email2']));
      $mdp2 = htmlspecialchars(strip_tags($_POST['mdp2']));
      $nom2 = htmlspecialchars(strip_tags($_POST['nom2']));
      $age = htmlspecialchars(strip_tags($_POST['age']));
      $poids = htmlspecialchars(strip_tags($_POST['poids']));
      $taille = htmlspecialchars(strip_tags($_POST['taille']));
    

      try 
      {
        ajouter($email2, $mdp2, $nom2, $age, $poids, $taille);
      } 
      catch (Exception $e) 
      {
        var_dump($e->getMessage());
      }
    }
  }
}

?>

