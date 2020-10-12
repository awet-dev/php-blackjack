<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require "Blackjack.php";
require "Player.php";
require "./code/Deck.php";
require "./code/Suit.php";
require "./code/Card.php";

session_start();

if(!isset($_SESSION['blackjack'])) {
    $_SESSION['blackjack'] = "";
}
$blackJack = new Blackjack("awet", "computer", "21");
if(isset($blackJack)) {
    $_SESSION['blackjack'] = $blackJack;
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
    <form action=""></form>
</body>
</html>
