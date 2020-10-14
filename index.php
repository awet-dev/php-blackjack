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
    if ($dealer->getScore() < 21 && $dealer->getScore() > 15) {
        if ($dealer->getScore() >= $player->getScore()) {
            $player->setLost();
        } else {
            $dealer->setLost();
        }
    } else {
        $dealer->hit($deck);
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <?php if ($player->hasLost()) :?>
        <div class="alert alert-danger" role="alert">
            <strong>Oh sorry!</strong> You lost. the dealer has won the game</div>
    <?php elseif ($dealer->hasLost()) :?>
        <div class="alert alert-success" role="alert">
            <strong>Well done!</strong> You won the game super.</div>
    <?php endif;?>
    <div class="row">
        <div class="col">
            <p class="text-capitalize"><?php echo "playerScore: ".$player->getScore()?></p>
            <p class="display-1"><?php foreach($player->getCard($deck) AS $card) {
                    echo $card->getUnicodeCharacter(true);
                }?></p>
        </div>
        <div class="col">
            <p class="text-capitalize"><?php echo "dealerScore: ".$dealer->getScore()?></p>
            <p class="display-1"> <?php foreach($dealer->getCard($deck) AS $card) {
                    echo $card->getUnicodeCharacter(true);
                }?></p>
        </div>
    </div>
    <form action="" method="post" class="form">
        <?php if($player->hasLost() || $dealer->hasLost()) :?>
            <input name="start" type="submit" value="Start">
        <?php else :?>
            <input name="hit" type="submit" value="Hit">
            <input name="stand" type="submit" value="Stand">
            <input name="surrender" type="submit" value="Surrender">
        <?php endif; ?>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>

