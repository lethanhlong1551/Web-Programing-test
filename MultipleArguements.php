<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Arguments</title>
</head>
<body>
    <?php
    function addNumber ($a, $b, $c) {
        $sum = $a + $b + $c;
        echo ("$a + $b + $c = $sum");
    }
addNumber(5, 12, 15);
    ?>
    
</body>
</html>