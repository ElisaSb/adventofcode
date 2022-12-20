<?php
$fileName = 'input.txt';

$content = fopen($fileName, "r");

while (($line = fgets($content)) !== false) {
    $sum += $line;

    if ($line == 0) {
        if ($sum > $max) {
            $second = $max;
            $third = $max;
            $max = $sum;
        } elseif ($sum > $second) {
            $third = $second;
            $second = $sum;
        } elseif ($sum > $third) {
            $third = $sum;
        }
        $sum = 0;
    }
}

echo nl2br("Max: " . $max);
echo nl2br("\r\n second: " . $second);
echo nl2br("\r\n third: " . $third);
echo nl2br("\r\n_______________\r\n");
echo nl2br('suma --> ' . ($max + $second + $third));

fclose($content);
?>
