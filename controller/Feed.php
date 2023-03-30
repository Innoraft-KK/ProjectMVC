<?php
    /**

    *This script retrieves all the posts from the database and displays them on the feed page.
    */
    include '../model/postDB.php';
    $user= new blogPost();
    $posts=$user->feed();

?>