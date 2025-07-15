<?php
$num1 = 2;
$num2 = 4;

$sum = $num1 + $num2;

if ($num2 != 0) {
    $division = $num1 / $num2;
    echo "المجموع: $sum<br>";
    echo "ناتج القسمة: $division";
} else {
    echo "لا يمكن القسمة على صفر";
}
?>
