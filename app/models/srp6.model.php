<?php

class SRP6
{
  // Its from TrinityCore/account-creator
  public static function calculateSRP6Verifier($username, $password, $salt)
  {
      // algorithm constants
      $g = gmp_init(7);
      $N = gmp_init('894B645E89E1535BBDAD5B8B290650530801B18EBFBF5E8FAB3C82872A3E9BB7', 16);

      // calculate first hash
      $h1 = sha1(strtoupper($username . ':' . $password), TRUE);

      // calculate second hash
      $h2 = sha1($salt . $h1, TRUE);

      // convert to integer (little-endian)
      $h2 = gmp_import($h2, 1, GMP_LSW_FIRST);

      // g^h2 mod N
      $verifier = gmp_powm($g, $h2, $N);

      // convert back to a byte array (little-endian)
      $verifier = gmp_export($verifier, 1, GMP_LSW_FIRST);

      // pad to 32 bytes, remember that zeros go on the end in little-endian!
      $verifier = str_pad($verifier, 32, chr(0), STR_PAD_RIGHT);

      return $verifier;
  }
  
  public static function getRegistrationData($username, $password)
  {
    // generates a random salt
    $salt = random_bytes(32);

    // calculate the verifier using the created salt
    $verifier = self::calculateSRP6Verifier($username, $password, $salt);

    return array($salt, $verifier);
  }
}

?>