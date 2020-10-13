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
require "view-form.php";

session_start();
if(!isset($_SESSION['blackJack'])) {
    $_SESSION['blackJack'] = new Blackjack();
}

$player = $_SESSION['blackJack']->getPlayer();
$dealer = $_SESSION['blackJack']->getDealer();

if(isset($_POST['hit'])) {
    play($player);
}

if (isset($_POST['surrender'])) {
    $player->surrender();
}

if (isset($_POST['stand'])) {
    play($dealer);
}


function play($gamer) {
    var_dump($gamer->hit());
    var_dump($gamer->getScore());

    // if the card value is more than 21 set lost to true
    if($gamer->getScore() > 21) {
        $gamer->surrender(true);
    }

    // total score of the cards
    foreach($gamer->hit() AS $card) {
        echo $card->getUnicodeCharacter(true);
        echo '<br>';
    }
}