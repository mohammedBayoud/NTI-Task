<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>from 1 to 20</title>
</head>

<body>
    <?php
    for ($i = 0; $i <= 20; $i += 5) {
        echo $i . "<br>";
    }
    echo "<hr>";

    for ($i = 0; $i <= 20; $i += 5) {
        if ($i % 5 == 0) {
            echo $i . "<br>";
        }
    }
    echo "<hr>";
    $i = 0;
    while ($i <= 20) {
        echo $i . "<br>";
        $i += 5;
    }
    ?>
</body>

</html>