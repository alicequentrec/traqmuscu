<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <nav class = "navbar">
        <a href="index.php" class="logo">Traq Muscu</a>
        <div class="nav-links">
            <ul>
                <li><a href="formules.php">Formules</a></li>
                <li><a href="avis.php">Avis</a></li>
                <li><a href="login.php">Se connecter</a></li>
            </ul>
        </div>
        <img src="Hamburger-menu.png" alt="Menu" class="menu-hamburger">
    </nav>
    <header></header>

<script>
    const menuHamburger = document.querySelector(".menu-hamburger")
    const navLinks = document.querySelector(".nav-links")
 
    menuHamburger.addEventListener('click',()=>{
    navLinks.classList.toggle('mobile-menu')
    })
</script>
