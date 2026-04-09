<?php
session_start();

$public_pages = ['login.php', 'register.php', 'about_public.php'];

if(!in_array(basename($_SERVER['PHP_SELF']), $public_pages)) {
    if(!isset($_SESSION['Active']) || $_SESSION['Active'] == false) {
        header("location: login.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
    <!-- rest of your head -->