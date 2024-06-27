<?php 
session_start();
require './php/db.php';
if(isset($_SESSION['user_id'])){
    $userLogin = select('SELECT login FROM users WHERE id = :id', ['id' => $_SESSION['user_id']]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game</title>
    
    <link rel="stylesheet" href="./assets/style/style.css">
    <script src="./scripts/script.js" defer></script>
</head>
<body>
    <div class="error">
        <span>to get started, write a nickname</span>
    </div>
    <div class="main-page">
        <h1 class="title">Space Shooter</h1>
        <form method='post' name='log' action="">
            <input name='name' type="text" placeholder='nickname'>
        </form>
        <button class='startBtn'>Play</button>
    </div>
    <div class="lose">
        <h2>YOU LOSE</h2>
        score: <span class="loseSpan"></span>
        <form method='post' action='./php/top.php'>
            <input id='topScore' name='score' type="number" style='display: none;'>
            <input id='topUsername' name='username' type="text" style='display: none;'>
            <button class='loseBtn' type="submit">AGAIN</button>  
        </form>
    </div>
    <div class="userInfo">
        <img class="heart" src="./assets/images/heart.png" alt="">
        <div class="">
            <span class="score"></span>
            <span class="ok"></span>
            <img src="./assets/images/hearts.png" alt="">
        </div>
    </div>
    
        <?php if(isset($_SESSION['user_id'])){
            echo "<div class='user' ><img class='ava' src='../assets/images/avatar.svg'>", "@",$userLogin[0]['login'], "</div>";
        }else{ ?>
            <a class='btn' href="./pages/login.php">login</a>
        <?php }; ?>
    
    <canvas class='game' name='game' width='500px' height='500px'></canvas>
</body>
</html>