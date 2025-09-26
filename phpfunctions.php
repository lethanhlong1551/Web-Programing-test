<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Functions</title>
</head>
<body>
<?php
function tester()
{
    echo "This is my first function which i am going to call twice";
}
tester();
<p> ******** Here is some HTMl ******** </p>
<p> *** And now I will use PHP function again *** </p>
<?php tester(); ?>
</body>
</html>