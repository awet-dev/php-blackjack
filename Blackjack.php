<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class Blackjack {
    private Player $player;
    private Player $dealer;
    private Deck $deck;

    function __construct () {
        $deck = new Deck();
        $this->deck = $deck;
        $this->deck->shuffle();
        $this->player = new Player($deck);
        $this->dealer = new Player($deck);
    }

    function getPlayer () {
        return $this->player;
    }
    function getDealer () {
        return $this->dealer;
    }

}
