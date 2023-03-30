<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Mynerve&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="profile.css" />
    <link rel="stylesheet" href="login_reg.css">
    <title>View Post</title>
  </head>
  <body>
    <header>
      <div class="container flexme">
        <div class='logo'><a href="../view/feed.php"><img src="./WebImages/logo.png" alt=""></a></div>
        <nav>
          <ul class="flexme">
           
           
            <?php
            $user_id=$_SESSION['user_id'];
            if( !empty($_SESSION['mail']) && !empty($_SESSION['user_id']))
            { 
              echo "<li><a href='../view/Profile.php?user_id=".$_SESSION['user_id']."'>My Profile</a></li>";
              echo "<li><a href='../view/CreatePost.php'><i class='fa-solid fa-pen-to-square'></i> </a></li>";
              echo "<li><a href='../controller/Logout.php'><i class='fa-solid fa-arrow-right-from-bracket'></i></a></li>";
            }
            else{
              echo "<li><a href='../view/Login.php'>Login</a></li>";
              echo "<li><a href='../view/RegistrationPage.php'>SignUP</a></li>";
            }
            ?>
            
          </ul>
        </nav>
      </div>
    </header>
    <section class="container">
      <?php
        include '../controller/ViewPost.php';
        echo "<div class='post'>
               <h4>". $post['Title'] ."</h4><br>
               <div class='flexme'><span>By <a href='../view/Profile.php?user_id=".$post['user_id']."'>". $post['fname'] ." " . $post['lname'] . "</a> on " . $post['post_date'] . "</span></div><br>
               <p>" . $post['description'] . "</p>
           </div>"; 
        if($_SESSION['user_id'] == $post['user_id']){
        echo "<div class='edel-btn'>
          <form action='../controller/DeletePost.php?post_id=".$post['post_id']."' method='post'>
            <input type='submit' value='Delete'>
          </form>
          <br>
          <form action='../view/EditPost.php?post_id=".$post['post_id']."' method='post'>
            <input type='submit' value='Edit'>
          </form>
        </div>";}
      ?>
      
    </section>
</body>
</html>