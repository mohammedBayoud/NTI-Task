<?php

$grade = 100;

if (isset($grade)) {
    if ($grade >= 50) {
        echo "ناجح";
    } 
    else{
        echo "راسب";
    }
} 
else{
    echo "لم يتم وضع درجة";
}


echo isset($grade) ? ($grade >= 50 ? "ناجح" : "راسب") :"لم يتم وضع درجة";

?>
