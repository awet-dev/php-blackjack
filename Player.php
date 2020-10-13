<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class Player {

    private array $cards = [];
    private bool $lost = false;

    function __construct(Deck $deck) {
        $this->cards [] = $deck->drawCard();
        $this->cards [] = $deck->drawCard();
    }

    function hit () {
        return $this->cards;
    }
    function surrender ($status) {
        return $this->lost;
    }
    function getScore () {
        // loop over all the card and display the total value
    }
    function hasLost () {}

}