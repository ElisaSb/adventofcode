<?php
/* A & X is a rock = 1
 * B & Y is a paper = 2
 * C & Z is a scissors = 3
 *
 * X means you need to lose,
 * Y means you need to end the round in a draw and
 * Z means you need to win
 *
 * for losing are 0 points
 * for a tie, 3 points
 * for winning, 6 points
*/

$fileName = 'input.txt';
$content = fopen($fileName, 'r');

static $valueSecondColumn = [
    'X' => 0,
    'Y' => 3,
    'Z' => 6
];

static $valueShape = [
    'A' => 1,
    'B' => 2,
    'C' => 3
];

$clashes = [
    'X' => [
        'A' => 'C',
        'B' => 'A',
        'C' => 'B'
    ],
    'Y' => [
        'A' => 'A',
        'B' => 'B',
        'C' => 'C'
    ],
    'Z' => [
        'A' => 'B',
        'B' => 'C',
        'C' => 'A'
    ]
];

$score = 0;
while (($line = fgets($content)) !== false) {
    $needle = str_replace("\n", "", $line);
    $result = substr($needle, -1);
    $opponent = substr($needle, -3, 1);

    $myShape = $clashes[$result][$opponent];
    $score += $valueShape[$myShape];
    $score += $valueSecondColumn[$result];
}

echo nl2br($score);
fclose($content);

?>
