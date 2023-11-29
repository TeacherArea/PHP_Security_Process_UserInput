<?php
  date_default_timezone_set('Europe/Stockholm');
  include ('../resources/globals.php');
?>
<!DOCTYPE html>
<html>

<head>
  <title><?php echo TITLE ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>

<body onload="startTime()">
  <div class="header">
    <h1>Welcome to a security lesson</h1>
    <h2>How to handle user inputs</h2>
  </div>
  <div class="init-backgroundimage init-display-container init-text-white">