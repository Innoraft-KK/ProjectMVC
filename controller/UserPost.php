<?php
/**

   * PHP script for retrieving posts of a specific user using their user_id.
   * This script includes the postDB.php file which contains the blogPost class. It then instantiates an object of
   * the class using $_GET['user_id'] as an argument, and calls the UserPost method to retrieve all posts of
   * the specified user. The posts are then stored in the $posts variable.
   * @uses ../model/postDB.php
   * @uses blogPost
    */


include '../model/postDB.php';
$blog= new blogPost($_GET);
$posts=$blog->UserPost();
?>
