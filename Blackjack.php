<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class Blackjack {
    private  $player;
    private  $dealer;
    private $deck;


    public function getPlayer() {}
    public function getDealer() {}

    public function __construct ($player, $dealer, $deck) {
        $this->player = new Player();
        $this->dealer = new Player();
        $this->deck = new Deck();
        $this->deck->shuffle();
    }
}

session_start();

if(!isset($_SESSION['blackjack'])) {
    $_SESSION['blackjack'] = "";
}
$blackJack = new Blackjack();
if(isset($blackJack)) {
    $_SESSION['blackjack'] = $blackJack;
}