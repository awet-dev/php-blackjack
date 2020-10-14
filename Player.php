<?php
declare(strict_types=1);

class Player {

    private array $card;
    private bool $lost = false;
    private int $counter = 0;
    private int $chips = 100;

    function __construct(Deck $deck) {
        $this->card = [];
        array_push($this->card, $deck->drawCard(), $deck->drawCard());
    }

    function hit (Deck $deck) {
        $this->counter ++;
        array_push($this->card, $deck->drawCard());
        if ($this->getScore() == 21 && $this->counter == 1) {
            $this->lost = true;
        }
        if ($this->getScore() > 21) {
            $this->lost = true;
        } else {
            return $this->card;
        }
    }
    function surrender () {
        $this->lost = true;
        $this->hasLost();
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
    function setLost () {
        $this->lost = true;
    }
    function eatChips($chip) {
        $this->chips -= $chip;
        return $this->chips;
    }
    function addChips($prize) {
        $this->chips += $prize;
    }
}

class Dealer extends Player {
    function hit(Deck $deck) {
        while ($this->getScore() < 15) {
            return parent::hit($deck); // TODO: Change the autogenerated stub
        }
    }
}