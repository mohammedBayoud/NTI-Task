<!-- task 5 -->
<?php

$tools = ["VS Code", "Git", "GitHub", "Figma", "Postman"];

echo "total count : " . count($tools) . "<br>";
if (in_array("GitHub", $tools)) {
    echo "GitHub is in the list <br>";
}

$all_tools = array_values($tools);
echo "All tools is: ";
print_r(array_values($tools));

array_push($tools, "MYSQL");   
array_unshift($tools, "Git");   
array_shift($tools);         

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<!-- task 6 -->
<body class="bg-success">
    <div class="container mt-5">
        <h1 class="text-info">Available Courses</h1>
        <ul class="list-group">
            <?php
            foreach ($tools as $tool) {
                echo "<li class='list-group-item'>$tool</li>";
            }
            ?>
        </ul>
    </div>



    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
