<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require "./code/Card.php";
require "./code/Deck.php";
require "./code/Suit.php";
require "Player.php";
require "Blackjack.php";

session_start();

if (isset($_POST['start'])) {
    session_unset();
}

if (!isset($_SESSION['blackJack'])) {
    $_SESSION['blackJack'] = new Blackjack();
}

$player = $_SESSION['blackJack']->getPlayer();
$dealer = $_SESSION['blackJack']->getDealer();
$deck = $_SESSION['blackJack']->getDeck();

if (isset($_POST['hit'])) {
    $player->hit($deck);
}

if (isset($_POST['surrender'])) {
    $player->surrender();
}

if (isset($_POST['stand'])) {
    $dealer->hit($deck);
    if ($dealer->getScore() < 21 && $dealer->getScore() > 15) {
        if ($dealer->getScore() >= $player->getScore()) {
            $player->setLost();
        } else {
            $dealer->setLost();
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
</head>
<body>
<div class="score">
    <p class="playerScore"><?php echo "playerScore: ".$player->getScore()?></p>
    <p class="dealerScore"><?php echo "dealerScore: ".$dealer->getScore()?></p>
</div>
<div class="card-display">
    <p><?php foreach($player->getCard($deck) AS $card) {
            echo $card->getUnicodeCharacter(true);
        }?></p>
    <p> <?php foreach($dealer->getCard($deck) AS $card) {
            echo $card->getUnicodeCharacter(true);
        }?></p>
</div>
<div class="result"><?php if($player->hasLost()) { echo "player has lost";}
    if($dealer->hasLost()) {echo "dealer has lost";}
?></div>
<form action="" method="post">
    <?php if($player->hasLost() || $dealer->hasLost()) :?>
        <input name="start" type="submit" value="Start">
    <?php else :?>
        <input name="hit" type="submit" value="Hit">
        <input name="stand" type="submit" value="Stand">
        <input name="surrender" type="submit" value="Surrender">
    <?php endif; ?>
</form>
</body>
</html>

