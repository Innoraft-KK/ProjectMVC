<?php
/**

  *  Edit User function - This script allows a user to edit their bio and profession and updates the database with the changes made.
  *  This script retrieves the user's inputs from the $_POST array, creates a new instance of the UserInfo class and calls the EditUser() method to update the user's information in the database. If the $_POST array is not set or if the $_SESSION['user_id'] is not set, the script redirects the user to their profile page.
  *  @param array $_POST An associative array of user inputs.
  *  @param string $_POST['bio'] The user's bio.
  *  @param string $_POST['proff'] The user's profession.
  *  @param int $_SESSION['user_id'] The user ID of the logged-in user.
  *  @return void
    */
session_start();
include '../model/userDB.php';
if(isset($_POST['bio']) and isset($_POST['proff']) and isset($_SESSION['user_id']) ){
   
    $user= new UserInfo($_POST);
    $user->EditUser();
 }
else{
  header('Location: ../view/Profile.php?post_id='.$_GET['user_id']);
 }  
?>