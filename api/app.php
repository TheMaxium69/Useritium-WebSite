<?php

//DateBase
require_once "private/db.php";
$ConnectDB = mysqli_connect($host, $userDB, $passDB, $Database);

//Salt
require_once "private/salt.php";
$key = $salt;

session_start();


