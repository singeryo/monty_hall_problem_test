<?php

namespace Game;

class Player
{
    const SWITCH_STRATEGY = 0;
    const KEEP_STRATEGY = 1;

    private int $announcedDoor;

    private int $strategy;

    public function __construct(int $strategy)
    {
        $this->strategy = $strategy;
    }

    public function announce(): int
    {
        $this->announcedDoor = rand(0, 2);
        return $this->announcedDoor;
    }

    public function finalDecision(int $openedByHost): int
    {
        if ($this->strategy == self::KEEP_STRATEGY)
            return $this->announcedDoor;

        // If strategy is to switch, remove initially announced door and door opened by host and return
        // the last remaining door index
        $remainingChoice = array_values(array_filter([0, 1, 2], function ($item) use ($openedByHost) {
            return ($item !== $openedByHost) && ($item !== $this->announcedDoor);
        }));

        return $remainingChoice[0];
    }

}