<?php

$number1 = 12;  
$number2 = 25;  
$number3 = 18;  


if ($number1 >= $number2 && $number1 >= $number3) {
    echo $number1 . " is the largest number.";
} elseif ($number2 >= $number1 && $number2 >= $number3) {
    echo $number2 . " is the largest number.";
} else {
    echo $number3 . " is the largest number.";
}
?>