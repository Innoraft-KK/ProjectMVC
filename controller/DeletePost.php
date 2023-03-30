<?php
    /**
    *This script is responsible for deleting a blog post from the database.
    *It checks if the user is logged in and then calls the DeletePost method of the blogPost class
    *to delete the post from the database. If the user is not logged in, it redirects to the feed page.
    *@uses session_start()
    *@uses include
    *@uses blogPost
    *@return void This script redirects the user to the feed page after deleting the post or if the user is not logged in.
    */
    
    session_start();
    include '../model/postDB.php';
    
    if(isset($_SESSION['user_id'])){
    $user= new blogPost($_GET);
    $post =$user->DeletePost();
    }
    else{
        header('Location: ../view/feed.php');
    }  
?>