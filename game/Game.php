<?php

namespace Game;

class Game
{
    public $doors = [false, false, false];
    public $successfulDoorIndex; // Maybe somewhat redundant, but helps make some parts more readable
    public $host;
    public $player;

    public function __construct(int $strategy)
    {
        $successfulDoorIndex = rand(0, 2);
        $this->doors[$successfulDoorIndex] = true;
        $this->successfulDoorIndex = $successfulDoorIndex;

        $this->host = new Host($this);
        $this->player = new Player($strategy);
    }

    public function play(): bool
    {
        $announcedDoor = $this->player->announce();
        $openedDoor = $this->host->openDoor($announcedDoor);

        // Return true if player has selected correct door
        return $this->player->finalDecision($openedDoor) == $this->successfulDoorIndex;
    }
}