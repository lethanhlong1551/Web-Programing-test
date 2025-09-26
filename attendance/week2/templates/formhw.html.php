<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Calculator</title>
</head>
<body>
  <h1>Calculator</h1>

  <form action="index homework.php" method="post">
    Value 1: <input type="text" name="val1" value=""><br><br>
    Value 2: <input type="text" name="val2" value=""><br><br>

    Calculation: <br>
    <input type="radio" name="calc" value="add"> Add
    <input type="radio" name="calc" value="sub"> Subtract
    <input type="radio" name="calc" value="mul" checked> Multiply
    <input type="radio" name="calc" value="div"> Divide
    <br><br>

    <input type="submit" value="Calculate">
    <input type="reset" value="Clear">
  </form>
</body>
</html>