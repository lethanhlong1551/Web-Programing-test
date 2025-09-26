<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task3</title>
</head>
<body>
<?php
    function rectangleArea($w, $h) {
    $area = $w * $h;
    return "A rectangle of width $w and height $h has an area of $area.";
}

echo rectangleArea(5, 10);
?>
</body>
</html>