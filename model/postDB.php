<?php
session_start();
/**
 * Class blogPost
 */
class blogPost{
    public $user_id;
    /**
     * Constructor for the blogPost class
     *
     * @param array $data The data used to initialize the object
     */
    function __construct($data=[]){
        foreach ($data as $key=>$value){
            $this->$key=$value;
        }
    }

      /**
     * Creates a new post in the database
     */

    function CreatePost(){
        require_once '../model/conn.php';
        include('currentTime.php');
        $date=currentTime();
        $author_id=(int)$_SESSION['user_id'];
        $sql="INSERT INTO Post(Title,user_id,description,post_date) VALUES ('$this->Title',$author_id,'$this->description', '$date');";
        $result = mysqli_query($connect, $sql);
    }

     /**
     * Retrieves all posts from the database and returns them in an array
     *
     * @return array An array of all posts
     */

    function feed(){
        require_once '../model/conn.php';
        $sql="SELECT User.fname, User.lname, Post.post_id,Post.Title,Post.user_id,Post.description,Post.post_date FROM Post,User WHERE Post.user_id=User.user_id ORDER BY post_id;";
        $result = mysqli_query($connect, $sql);
        $arr=[];
        while($row = mysqli_fetch_assoc($result)){
        $arr[]=$row;
        }
        return $arr;
    }

     /**
     * Retrieves a specific post from the database and returns it as an associative array
     *
     * @return array The post specified by the post_id parameter
     */

    function ViewPost(){
        require_once '../model/conn.php';
        $sql="SELECT User.fname, User.lname, Post.post_id,Post.Title,Post.user_id,Post.description,Post.post_date FROM Post JOIN User on Post.user_id=User.user_id WHERE Post.post_id=$this->post_id;";

        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    
    /**
     * Edits an existing post in the database
     */

    function EditPost(){
        require_once '../model/conn.php';
        include('currentTime.php');
        $date=currentTime();
        $post_id=$_GET['post_id'];
        $sql="UPDATE Post SET Title='$this->Title',description='$this->description',post_date='$date' where post_id='$post_id'";
        echo $sql; 
        $result = mysqli_query($connect, $sql);
        header('Location: ../view/ViewPost.php?post_id='.$post_id);
    }
    
    /**
     * Retrieves all posts belonging to a specific user from the database and returns them in an array
     *
     * @return array An array of all posts belonging to the specified user
     */

    function UserPost(){
        require_once '../model/conn.php';
        $sql="SELECT * FROM Post where user_id=$this->user_id;";
        $result = mysqli_query($connect, $sql);
        $arr=[];
        while($row = mysqli_fetch_assoc($result)){
        $arr[]=$row;
        }
        return $arr;
    }

    /**
     * Deletes a specific post from the database
     */
    
    function DeletePost(){
        require_once '../model/conn.php';
        $sql="SELECT user_id from Post where post_id='$this->post_id'";
        $result = mysqli_query($connect, $sql);
        $user = mysqli_fetch_assoc($result);
        var_dump($_SESSION['user_id']);
        var_dump($user);
        if($_SESSION['user_id'] === $user['user_id']){
            $sql="DELETE FROM Post WHERE post_id='$this->post_id'";
        
            $result = mysqli_query($connect, $sql);
                if($result){
                    $_SESSION['status'] = 'Post Deleted Successfully';
                    header('Location: ../view/feed.php');
                }
            
                else{
                        header('Location: ../view/feed.php');
                    }
        }
    }
}
?>