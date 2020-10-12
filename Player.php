<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require "./code/Deck.php";

class Player {
    private array $cards;
    private bool $lost = false;

    public function __construct(Deck $deck) {
        $deck->drawCard();
        $deck->drawCard();

    }

    function hit() {}
    function surrender() {}
    function getScore() {}
    function hasLost() {}
}

