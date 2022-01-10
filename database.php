<?php

$host = "ec2-3-221-42-108.compute-1.amazonaws.com";
$user = "vlxgjidmxyrjjh";
$password = "a7f77dded4d432573db59c2bded2e68cf43dd31d26b13c04503b98e44af33cee";
$dbname = "ddt5jdo5s8kmqj";
$port = "5432";

try {
  //Set DSN data source name
  $dsn = "pgsql:host=" . $host . ";port=" . $port . ";dbname=" . $dbname . ";sslmode=require;";


  //create a pdo instance
  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}