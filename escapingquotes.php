<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escaping quotes</title>
</head>
<body>
<?php
echo" she said, "how are you?"";
//line 9 will produce an error
echo  "she said, \"how are you?\"";
//the slashes in line 11 escape the quotes
?>
    
</body>
</html>