<?php
/* A & X is a rock = 1
 * B & Y is a paper = 2
 * C & Z is a scissors = 3
 *
 * for losing are 0 points
 * for a tie, 3 points
 * for winning, 6 points
*/

$fileName = 'input.txt';
$content = fopen($fileName, 'r');

static $rock = 1;
static $paper = 2;
static $scissors = 3;

static $lose = 0;
static $draw = 3;
static $win = 6;

$losers = [
    'A Y',
    'B Z',
    'C X'
];

$tie = [
    'A X',
    'B Y',
    'C Z'
];

$winners = [
    'A Z',
    'B X',
    'C Y'
];

$score = 0;
while (($line = fgets($content)) !== false) {
    $needle = str_replace("\n", "", $line);
    if (in_array($needle, $winners)) {
        $score += $lose;
    } elseif (in_array($needle, $losers)) {
        $score += $win;
    } elseif (in_array($needle, $tie)) {
        $score += $draw;
    }
}

echo nl2br($score);
fclose($content);

?>
