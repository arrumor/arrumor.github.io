<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<nav class="navbar" id="navbar">
    <link rel="stylesheet" href="assets/style.css">
    <div class="logo"><a href="index.php"> <img src="assets/logo-resto.png" alt="Logo Resto"/></a></div>
    <div class="menu" id="menu">
        <div class="home"><a href="index.php">Home</a></div>
        <div class="contact" id="contact"><a href="#">Contact</a></div>
        <div class="about" id="about"><a href="about.php">About</a></div> 
        <div class="cabang" id="cabang"><a href="cabang.php">Cabang</a></div> 
        <?php if(isset($_SESSION['login'])) : ?>
            <a href="logout.php" class="logout">
            Logout
            </a>
        <?php else : ?>
            <a href="login.php" class="login">
            Login
            </a>
        <?php endif; ?>
    </div>
    <div class="theme" id="theme"><a href="#">🌓</a></div>
    <div class="hamburger" id="hamburger">
        <i class="fa-solid fa-bars fa-lg"></i>
    </div>
</nav>