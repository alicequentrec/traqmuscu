<?php
   
    require("./view/header.php");
    require("./view/footer.php");
    session_start();

    if (!isset($_SESSION['dhdTbzzoP5654'])) {
        header("Location: login.php");
        exit();
    }
    
    if (empty($_SESSION['dhdTbzzoP5654'])) {
        header("Location:login.php");
        exit(); 
    }
    require("commandes.php");
    $Produits= afficher_avis();
?>
<style>
  .button {
  text-decoration: none;
}
a{
  color:white;
}
</style>


<section id="testimonials">
    <div class="testimonial-heading">
        <h1>Avis</h1>
    </div>
    <div class="testimonial-box-container">
    <?php foreach($Produits as $produit): ?>
      <div class="testimonial-box">
        <div class="box-top">
          <div class="profile">
            <div class="name-user">
              <strong><?= $produit->nom ?></strong>
              <span><?= $produit->date ?></span>
            </div>
          </div>
          <div class="reviews">
            <i class="fas fas-star"><?= $produit->etoiles ?></i>
          </div>
        </div>
        <div class="client-comment">
          <p><?= substr($produit->avis,0,200); ?></p>
        </div>
      </div>
    </div>

<?php endforeach; ?>
</section>
<div class="button">
    <button><a href="commentaire.php">Ecrire un commentaire</a></button>
  </div>