<?php
$user='database username';
$pass ="database password";

$master = new PDO('mysql:dbname=database;host=127.0.0.2', $user, $pass); //set up master
$master->exec('update users set bills += 1'); //do INsert, Update and Delete with the master server

$slave = new PDO('mysql:dbname=database;host=127.0.0.3', $user, $pass); //set up slave from master
$results = $slave->query('select id from bills where user_id = 42'); //perform read operations alone with slave server