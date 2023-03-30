<?php
/**

   * This script fetches a user's profile information based on their user ID.
   * It starts the session, includes the user database model, and creates a new instance of the UserInfo class.
   * The method Profile() is then called on the instance to retrieve the user's information.
   * @param array $_GET An array of parameters passed through the GET method, which should contain the user ID.
   * @return array An associative array containing the user's profile information.
    */
session_start();
include '../model/userDB.php';
$user= new UserInfo($_GET);
$profile=$user->Profile();
?>
