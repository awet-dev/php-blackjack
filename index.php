<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
if(!isset($_SESSION['blackJack'])) {
    $_SESSION['blackJack'] = "";
}

require "Player.php";
require "Blackjack.php";
require "./code/Card.php";
require "./code/Deck.php";
require "./code/Suit.php";

$blackJack = new Blackjack();
$player = $blackJack->getPlayer();
$dealer = $blackJack->getDealer();

if(isset($blackJack)) {
    $_SESSION['blackJack'] = $blackJack;
}
if(isset($_POST['hit'])) {
    echo "hit work";
    $player = $blackJack->getPlayer();
    var_dump($player->hit());
    // if score more than 21 lost = true
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
</head>
<body>
<form action="index.php" method="POST">
    <input name="hit" type="submit" value="hit">
    <input name="stand" type="submit" value="stand">
    <input name="surrender" type="submit" value="surrender">
</form>
</body>
</html>
