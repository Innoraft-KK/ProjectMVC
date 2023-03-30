<?php
/**
  *  This script receives a POST request containing the title and description of a blog post to be edited.
  *  If the required data is present, it creates an instance of the blogPost class and calls the EditPost method to
  *  update the post in the database. If the required data is not present or if the user is not logged in,
  *  it redirects to the feed page.
  *  @return void
    */


session_start();
include '../model/postDB.php';
 if(isset($_POST['Title']) and isset($_POST['description']) and isset($_SESSION['user_id'])){
 $user= new blogPost($_POST);
 $user->EditPost();
 }
else{
   header('Location: ../view/feed.php');
 }  
?>
