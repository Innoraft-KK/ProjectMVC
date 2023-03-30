<?php
/**
   * This PHP script handles checking if an email exists in the user database.
   * It first starts a session, includes the userDB.php file, and checks if the email was set in the POST request.
   * If the email was set, it creates a new UserInfo object and calls the checkEmail() method.
   * The checkEmail() method checks if the email exists in the database and sets a session variable with the result.
   * */


session_start();
include '../model/userDB.php';
if(isset($_POST['email'])){
    $user= new UserInfo($_POST);
    $user->checkEmail(); 
}
?>