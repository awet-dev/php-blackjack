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
            $this->hasLost();
        } else {
            echo "player lost";
            return $this->card;
        }
    }
    function surrender () {
        $this->lost = true;
        echo "player lost";
    }

    function getScore () {
        $score = 0;
        foreach ($this->card  as $value) {
            $score += $value->getValue();
        }
        return $score;
    }

    function hasLost () {
        $this->lost = true;
    }

    function getCard () {
        return $this->card;
    }

}