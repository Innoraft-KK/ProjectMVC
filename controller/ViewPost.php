<?php
/**

   * This script loads the blogPost class from the postDB.php file
   * and retrieves a specific post using the post ID passed through the GET method.
   * It also starts a session to ensure that the user is logged in before viewing the post.
   * @uses session_start()
   * @uses blogPost
   * @param int $_GET['id'] - The post ID of the post to be retrieved
   * @return array $post - An array containing the post details such as title, description, and author
    */


session_start();
include '../model/postDB.php';
$user= new blogPost($_GET);
$post =$user->ViewPost();
?>