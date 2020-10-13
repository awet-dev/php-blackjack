<?php
declare(strict_types=1);

class Player {

    private array $cards;
    private bool $lost = false;
    private bool $gameStart = false;

    function __construct(Deck $deck) {
        $this->cards = [];
        array_push($this->cards, $deck->drawCard(), $deck->drawCard());
    }

    function hit (Deck $deck) {
        array_push($this->cards, $deck->drawCard());
        if ($this->getScore() > 21) {
            return $this->hasLost();
        }
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
    function hasLost () {
        return $this->lost = true;
    }

    function getCard () {
        return $this->cards;
    }
}