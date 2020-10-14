<?php
declare(strict_types=1);

class Player {

    private array $card;
    private bool $lost = false;

    function __construct(Deck $deck) {
        $this->card = [];
        array_push($this->card, $deck->drawCard(), $deck->drawCard());
    }

    function hit (Deck $deck) {
        array_push($this->card, $deck->drawCard());
        if ($this->getScore() > 21) {
            $this->lost = true;
        } else {
            return $this->card;
        }
    }
    function surrender () {
        $this->lost = true;
    }

    function getScore () {
        $score = 0;
        foreach ($this->card as $value) {
            $score += $value->getValue();
        }
        return $score;
    }

    function hasLost () {
        return $this->lost;
    }

    function getCard () {
        return $this->card;
    }
}