<?php
declare(strict_types=1);

class Blackjack {
    private Player $player;
    private Player $dealer;
    private Deck $deck;

    function __construct () {
        $deck = new Deck();
        $this->deck = $deck;
        $this->deck->shuffle();
        $this->player = new Player($this->deck);
        $this->dealer = new Player($this->deck);
    }

    function getPlayer () {
        return $this->player;
    }
    function getDealer () {
        return $this->dealer;
    }

}
