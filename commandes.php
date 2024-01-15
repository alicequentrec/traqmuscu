<?php

function ajouter($email2, $mdp2, $nom2, $age, $poids ,$taille){
    require("connexion.php"); 
 
    
    if(isset($access)) {
        
        $req = $access->prepare("INSERT INTO membres (email, mdp, nom, age, poids, taille) VALUES(:email, :mdp, :nom, :age, :poids, :taille)");
        
        $req->bindParam(':email', $email2);
        $req->bindParam(':mdp', $mdp2);
        $req->bindParam(':nom', $nom2);
        $req->bindParam(':age', $age);
        $req->bindParam(':poids', $poids);
        $req->bindParam(':taille', $taille);
        
        $req->execute();
        $req->closeCursor();
    } else {
        
        echo "Erreur de connexion à la base de données.";
    }
}
function ajouter_commandes($email, $nom, $commande){
    require("connexion.php"); 
 
    
    if(isset($access)) {
        
        $req = $access->prepare("INSERT INTO commande (email, nom, commande) VALUES(:email, :nom, :commande)");
        
        $req->bindParam(':email', $email);
        $req->bindParam(':nom', $nom);
        $req->bindParam(':commande', $commande);
        
        $req->execute();
        $req->closeCursor();
    } else {
        
        echo "Erreur de connexion à la base de données.";
    }
}
function ajouter_avis( $nom, $avis, $etoiles){
    require("connexion.php"); 
 
    
    if(isset($access)) {
        
        $req = $access->prepare("INSERT INTO avis (nom, avis, etoiles) VALUES(:nom, :avis, :etoiles)");
        
  
        $req->bindParam(':nom', $nom);
        $req->bindParam(':avis', $avis);
        $req->bindParam(':etoiles', $etoiles);
        
        $req->execute();
        $req->closeCursor();
    } else {
        
        echo "Erreur de connexion à la base de données.";
    }
}
function getMembres($email,$mdp){
    require("connexion.php");
    if(isset($access)){
        $req = $access->prepare("SELECT * FROM membres WHERE email = ? AND mdp = ?");
        $req->execute(array($email,$mdp));
        $data = $req->fetch();
        return $data;
        $req->closeCursor();
    }
}
function afficher(){
    if (require("connexion.php")){
        $req=$access->prepare("SELECT * FROM formules ORDER BY id DESC");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req->closeCursor();
    }
}
function afficher_avis(){
    if (require("connexion.php")){
        $req=$access->prepare("SELECT * FROM avis ORDER BY id DESC");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req->closeCursor();
    }
}