<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('Database');
$log->pushHandler(new StreamHandler('./db.log', Logger::WARNING));

$servername = "ec2-54-246-80-237.eu-west-1.compute.amazonaws.com";
$username = "lmsgtjledifugm";
$password = "fFWP1lETYIbhyeCp4Qu7jVgRUJ";


try {
    $conn = new PDO("pgsql:host=$servername;dbname=d40g8l7kgogc0j", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    $log->addError($e->getMessage());
    echo "connexion error";
}