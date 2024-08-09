<?php
// Database Constants
$host = "127.0.0.1"; // Database Host
$user = "root"; // Database Username
$pass = "ascent"; // Database Password
$db = "acore_auth"; // Database Name

// Website Constants
$title = "AzerothCore | Registration Page"; // Website Title
$slogan = "Create your Account"; // Website Slogan
$description = "Fill in all the inputs in the form bellow in order to register."; // Website Description

// Check if required extensions are enabled (see GitHub README.md)
if (!extension_loaded('gmp')) 
{
  die('Please enable the GMP extension in your PHP configuration.');
}

if (!extension_loaded('mbstring')) 
{
  die('Please enable the MBString extension in your PHP configuration.');
}

if (!extension_loaded('pdo') || !extension_loaded('pdo_mysql')) 
{
  die('Please enable the PDO-MySQL extension in your PHP configuration.');
}

// Check if PHP version is 7.4 or higher
if (version_compare(PHP_VERSION, '7.4.0', '<')) 
{
  die('Please upgrade to PHP 7.4 or higher.');
}

// Initialize Models
require 'app/models/database.model.php';
require 'app/models/srp6.model.php';
require 'app/models/auth.model.php';

$database = new Database($host, $user, $pass, $db);
$srp6 = new SRP6();
$auth = new Auth($host, $user, $pass, $db);
?>