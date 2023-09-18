# Door game test

### Stack

- PHP >= 7

### Description

This program tests the [Monty Hall Problem](https://en.wikipedia.org/wiki/Monty_Hall_problem) by running X instances of the game
and printing out the success rate of the players strategy. The higher the iterations, the clearer the success rate gets.

### Configuration

Basic configuration in the first couple of lines of the projects ````index.php````
 
 - ```$iterations``` : how many times do you want to run the game
 - ```$strategy``` : can be one of ````Player::KEEP_STRATEGY```` or ```Player::SWITCH_STRATEGY```

### Running the test

Configure index as wanted and just run in console such as:

````php index.php````