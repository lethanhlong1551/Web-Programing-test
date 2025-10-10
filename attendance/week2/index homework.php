<?php
if (!isset($_POST['val1'])) {
    include 'templates/formhw.html.php';
} else {

    $val1 = $_POST['val1'];
    $val2 = $_POST['val2'];
    $calc = $_POST['calc'];


    if (is_numeric($val1) && is_numeric($val2)) {
        switch ($calc) {
            case "add":
                $result = $val1 + $val2;
                break;
            case "sub":
                $result = $val1 - $val2;
                break;
            case "mul":
                $result = $val1 * $val2;
                break;
            case "div":
                if ($val2 != 0) {
                    $result = $val1 / $val2;
                } else {
                    $error = "Cannot divide by zero!";
                    include 'templates/error.html.php';
                    exit();
                }
                break;
            default:
                $error = "Unknown operation!";
                include 'templates/error.html.php';
                exit();
        }


        $output = "Result = " . $result;
        include 'templates/result.html.php';

    } else {
        $error = "Invalid input! Please enter numbers only.";
        include 'templates/error.html.php';
    }
}
?>
