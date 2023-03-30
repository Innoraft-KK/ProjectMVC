
<?php
  /**
  *  This script creates a new blog post.
  *  It checks if the required parameters (Title, description, mail, user_id) are set in the POST request.
  *  If they are set, it creates a new instance of the blogPost class with the POST data,
  *  and calls the CreatePost() function to create a new post.
  *  If they are not set, it redirects the user back to the feed page.
  *  @param none
  *  @return none
    */
  session_start();
  include '../model/postDB.php';
  
  if(isset($_POST['Title']) and isset($_POST['description']) and isset($_SESSION['mail']) and isset($_SESSION['user_id'])){ 
  $user= new blogPost($_POST);
  $user->CreatePost();
  header('Location: ../view/feed.php');
  }
  else{ 
    header('Location: ../view/feed.php');
  }
?>