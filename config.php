<?php
// Database Constants
$host = ""; // Database Host
$user = ""; // Database Username
$pass = ""; // Database Password
$db = ""; // Database Name


// Initialize Models

require 'app/models/database.model.php';
require 'app/models/srp6.model.php';
require 'app/models/auth.model.php';

$database = new Database($host, $user, $pass, $db);
$srp6 = new SRP6();
$auth = new Auth($host, $user, $pass, $db);

// Website Constants
$title = "AzerothCore | Registration Page"; // Website Title
$slogan = "Create your Account"; // Website Slogan
$description = "Fill in all the inputs in the form bellow in order to register."; // Website Description
?>