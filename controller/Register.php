<?php 
    /**
   * Registers a new user with the given first name, last name, email, and password.
   * @param string $fname The first name of the user.
   * @param string $lname The last name of the user.
   * @param string $email The email of the user.
   * @param string $password The password of the user.
   * @return void
    */
    include '../model/userDB.php';
    if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['password'])){
    $user= new UserInfo($_POST);
    $user->Register();
    }
    
?>