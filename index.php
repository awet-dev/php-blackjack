<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require "Player.php";
require "Blackjack.php";
require "./code/Card.php";
require "./code/Deck.php";
require "./code/Suit.php";

session_start();
if(!isset($_SESSION['blackJack'])) {
    $blackJack = new Blackjack();
    $_SESSION['blackJack'] = $blackJack;
} else {
    $blackJack = $_SESSION['blackJack'];
}

$player = $_SESSION['blackJack']->getPlayer();
$dealer = $_SESSION['blackJack']->getDealer();
$deck = $_SESSION['blackJack']->getDeck();

if (isset($_POST['action'])){
    if ($_POST['action'] == 'hit') {
        if ($player->hit($deck) == "true") {
            echo "lost";
        }
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .bigCard {
            font-size: 600%;
        }
    </style>
</head>
<body>
<p class="bigCard"><?php foreach($player->getCard ($deck) AS $card) {
        echo $card->getUnicodeCharacter(true);
    }?></p>
<form method="post">
    <input type="submit" name="action" value="hit">
    <input type="submit" name="action" value="stand">
    <input type="submit" name="action" value="surrender">
</form>
</body>
</html>
