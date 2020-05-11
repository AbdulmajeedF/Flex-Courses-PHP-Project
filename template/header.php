<?php
session_start();

require_once __DIR__.'/../config/app.php';
require 'config/app.php';
require 'config/db_connection.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<!DOCTYPE html>
<html lang="<?php echo $config['lang']?>" dir="<?php echo $config['dir'] ?>">
<head>
  <title><?php  echo $config['app_name'] . ' | ' . $title ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="template/style.css">
</head>
<body>
<div class="container">
  <!-- header-->
    <div class="row">
      <div class="col-sm">
        <h1 class="align-middle"><?php echo $title ?></h1>
      </div>
      <div class="col-sm"></div>
      <div class="col-sm">
        <!-- navbar -->
        <ul class="nav justify-content-end">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact me</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="messages.php">Forms</a>
          </li>
        </ul>
      </div>
    </div>
  <hr>
  <?php if($mysqli->connect_error){ ?>
  <?php die('
    <div class="sql_not_connected">
      <p> ⬤ Not connnected to server</p>
    </div>
  ');}else{ ?>
    <div class="sql_connected">
      <p> ⬤ Connected to server</p>
    </div>
    <hr>
  <?php } ?>
