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
    <title>Profile</title>
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
    <main>
      <section class='container'>
        <div class='user-intro'>
          <?php
      include '../controller/Profile.php';
      echo "<h2>" . $profile['fname'] . " " . $profile['lname'] . "</h2>
            <div class='flexme proff'>
              <h3>" . $profile['proff'] . "</h3>
            
            </div>
          </div>
          <div class='user-desc flexme'>
            <div class='user-img'>
              <img src='./WebImages/user_img.png' alt='' />
            </div>
            <div class='user-info'>
              <div><h4> About Me  &nbsp; &nbsp;";
              if($_SESSION['user_id'] == $_GET['user_id'])
              { 
                echo "<a href='../view/EditUser.php?user_id=".$_GET['user_id']."'><i class='fa-solid fa-pen-to-square'></i></a>";
              }
              echo "</h4></div>
              <p>" . $profile['bio'] . "</p>
              <br>
              <p><b>Email: </b>" . $profile['email'] . "</p>
            </div>
          </div>"; 
        ?>
          </div>
        </div>
      </section>
      <section class='container'>
        <div>
        <?php
        /* include '../controller/UserPost.php';
        foreach($posts as $post){ 
               echo "<div class='feed'>
               <h4>
                 <a href='../view/ViewPost.php?post_id=" . $post['post_id'] . "'>" . $post['Title'] . "</a>
               </h4>
               <div class='flexme'><span>By " . $post['fname'] . " " . $post['lname'] . " on " . $post['post_date'] . "</span></div>
               <p>" . $post['description'] . "</p>
           </div>"; 
        }  */
        ?>
        </div>
      </section>
    </main>
  </body>
</html>
