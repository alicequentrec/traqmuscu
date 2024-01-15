<?php
   
    require("./view/header.php");
    require("./view/footer.php");
    require("commandes.php");
    $Produits= afficher();
    
    session_start();

    if (!isset($_SESSION['dhdTbzzoP5654'])) {
        header("Location: login.php");
        exit();
    }
    
    if (empty($_SESSION['dhdTbzzoP5654'])) {
        header("Location:login.php");
        exit(); 
    }
    
?>

<style>
  .product-container {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap; 
  flex-direction: row; 
}

.product {
  background-color: white;
  border: 1px solid #ccc;
  padding: 20px;
  text-align: center;
  max-width: 300px;
  margin: 10px; 
}

.product img {
  width: 100%;
  max-height: 200px;
  object-fit: cover;
  border: 1px solid #ddd;
  border-radius: 5px;
}

.product h2 {
  margin-top: 10px;
  margin-bottom: 5px;
}

.product p {
  margin-bottom: 15px;
}

.price {
  font-weight: bold;
  color: #333;
}

.buy-button {
  background-color: red;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}

.buy-button:hover {
  background-color: #E8114B;
}
</style>
<div class="testimonial-heading"><h1>Formules:</h1></div>

<?php foreach($Produits as $produit): ?>
  <div class="product-container">
        <div class="product">
            <img src="<?= $produit->image ?>">
            <h2><?= $produit->nom ?></h2>
            <p><?= substr($produit->description,0,200);?></p>
            <div class="price">
              <p><?= $produit->prix ?>€</p>
            </div>
            <button class="buy-button"><a href="achat.php">Acheter</a></button>
        </div>
</div>

<?php endforeach; ?>
