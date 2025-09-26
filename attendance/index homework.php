<?php
// Controller cho Calculator

if (!isset($_POST['val1'])) {
    include __DIR__ . '/templates/formhw.html.php';
    exit;
}

$val1 = $_POST['val1'] ?? '';
$val2 = $_POST['val2'] ?? '';
$calc = $_POST['calc'] ?? '';

if (is_numeric($val1) && is_numeric($val2)) {
    switch ($calc) {
        case 'add':
            $result = $val1 + $val2;
            break;
        case 'sub':
            $result = $val1 - $val2;
            break;
        case 'mul':
            $result = $val1 * $val2;
            break;
        case 'div':
            if ((float)$val2 == 0.0) {
                $error = 'Cannot divide by zero!';
                include __DIR__ . '/templates/error.html.php';
                exit;
            }
            $result = $val1 / $val2;
            break;
        default:
            $error = 'Unknown operation!';
            include __DIR__ . '/templates/error.html.php';
            exit;
    }

    $output = 'Result = ' . $result;
    include __DIR__ . '/templates/result.html.php';
} else {
    $error = 'Invalid input! Please enter numbers only.';
    include __DIR__ . '/templates/error.html.php';
}