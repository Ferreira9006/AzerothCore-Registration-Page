<?php

class Auth extends Database
{
  public static function checkUsername($username)
  {
    $stmt = self::connect()->prepare("SELECT username FROM account WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      return true;
    }
    return false;
  }

  public static function Register($username, $email, $salt, $verifier)
  {
    $stmt = self::connect()->prepare("INSERT INTO account (username, email, salt, verifier) VALUES (:username, :email, :salt, :verifier)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':salt', $salt);
    $stmt->bindParam(':verifier', $verifier);
    $stmt->execute();

    echo "<div class='alert alert-success' role='alert'> Your account was created. </div>";
  }
}

?>