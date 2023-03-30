<?php
    /** 
    *Starting the session and including the userDB file.
    *Checking if the OTP entered by the user is wrong or not matching.
    *If OTP entered is wrong, redirecting to the ChangePassword page with a status message.
    *If OTP entered is correct, updating the user's password and redirecting to the Login page.
    * @return void
    */
session_start();
include '../model/userDB.php';
if($_POST['OTP']!=$_SESSION['OTP'])
{ 
    $_SESSION['status']='Wrong OTP';
    header('Location: ../view/ChangePassword.php');
}
elseif(isset($_POST['OTP']) && isset($_POST['OTP']) && isset($_POST['OTP']) && $_POST['OTP']==$_SESSION['OTP'] && $_POST['email']==$_SESSION['email']){
    $user= new UserInfo($_POST);
    $user->changePassword();
}
?>