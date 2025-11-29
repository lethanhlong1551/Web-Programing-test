<?php
session_start();
if ($_SESSION['Authorised'] != "Y") {
    header("Location: notauthorised.php");
}
?>