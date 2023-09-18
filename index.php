<?php

include 'game/Game.php';
include 'game/Host.php';
include 'game/Player.php';

use Game\Game;
use Game\Player;

$iterations = 100000;
$strategy = Player::KEEP_STRATEGY;
$successfulIterations = 0;

for ($i = 0; $i<=$iterations; $i++) {
    $game = new Game($strategy);

    // If true, player has selected the correct door as final decision
    if ($game->play()) {
        $successfulIterations++;
    }
}

$successRate = ($successfulIterations / $iterations) * 100;

echo "Success rate : {$successRate}%";