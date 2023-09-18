<?php

namespace Game;

class Host
{
    private Game $doorGame;

    public function __construct($doorGame)
    {
        $this->doorGame = $doorGame;
    }

    public function openDoor(int $playersChoice): int
    {
        // Remove successful doors index and players choice index from 0, 1 and 2
        $remainingDoorIndexes = array_filter([0, 1, 2], function ($item) use ($playersChoice) {
            return ($item !== $playersChoice) && ($item !== $this->doorGame->successfulDoorIndex);
        });

        // End up with an array of either 1 or 2 indexes. Either way, shuffle it and pick first one
        shuffle($remainingDoorIndexes);
        $remainingDoorIndexes = array_values($remainingDoorIndexes);

        return $remainingDoorIndexes[0];
    }
}