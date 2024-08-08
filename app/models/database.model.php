<?php

class Database
{
  private static $host;
  private static $user;
  private static $pass;
  private static $db;

  public function __construct($host, $user, $pass, $db)
  {
    self::$host = $host;
    self::$user = $user;
    self::$pass = $pass;
    self::$db = $db;
  }

  protected static function connect()
  {
    try {
      $conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db, self::$user, self::$pass); // Create a new PDO connection
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set the PDO error mode to exception
      return $conn;
    } catch (PDOException $e) {
      die("Connection failed: " . $e->getMessage());
    }
  }
}

?>