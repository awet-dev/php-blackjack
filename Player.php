<?php
declare(strict_types=1);

class Player {

    private array $cards;
    private bool $lost = false;

    function __construct(Deck $deck) {
        $this->cards = [];
        array_push($this->cards, $deck->drawCard());
        array_push($this->cards, $deck->drawCard());
    }

    function hit () {
        return $this->cards;
    }
    function surrender () {
        $this->lost = true;
    }
    function getScore () {
        $score = 0;
        foreach ($this->cards as $value) {
            $score += $value->getValue();
        }
        return $score;
    }
    function hasLost () {}

}