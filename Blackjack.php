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

    public function __construct (){
        $player = new Player();
        $dealer = new Player();
        $deck = new Deck();
        $deck->shuffle();
    }
}

