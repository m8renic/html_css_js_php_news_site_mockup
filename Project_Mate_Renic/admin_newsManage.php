<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="admin_newsManage.css"/>
        <link rel="stylesheet" href="bootstrap.css"/>
        <link href="fontawesome-free-5.15.1-web/css/all.css" rel="stylesheet"/>
        <title>BBC</title>
    </head>
    <body>
        <div class="wrapper1">
            <header>
                <div class="container">
                    <div class="row d-flex justify-content-left">
                        <img src="imgs/BBC_logo.PNG"/>
                        <a href="index.php" class="goTemp">Home</a>
                        <a href="news.php" class="goTemp">News</a>
                        <a href="sports.php" class="goTemp">Sport</a>
                        <a href="administracija.php" class="goTemp">Administration</a>
                        <a href="logout.php" class="goTemp">Logout</a>
                    </div>
                </div>
            </header>
        </div>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <?php
                            session_start();
                            $user = $_SESSION['user'];
                            echo "<h3 style='margin-top:20px; text-align:left;'>Welcome to the Admin corner, $user</h3>";
                        ?>
                        <!-- <h3 style="margin-top:20px; text-align:left;">Welcome to the Admin corner, </h3> -->
                    </div>
                    <div class="col">
                        <p style="margin-top:20px; text-align:right;">Thursday, 16th of May</p>
                    </div>
                </div>
                <div class="row d-flex justify-content-left" style="margin-top: 20px;">
                    <a href="admin_newsAdd.php" class="goTemp" style="margin-left:15px; margin-right:5px;">Add news article</a>
                    <a href="admin_newsDelete.php" class="goTemp">Delete news article</a>
                </div>
            </div>  
        </main>
        <footer class="wrapper2" style="margin-top:40px;">
            <div class="container">
                <div class="row">
                    <hr>
                </div>
                <div class="row">
                    <p style="color:white; font-size:12px;">Copyright © 2019 BBC. The BBC is not responsible for the content of external sites. Read about our approach to external linking.</p>
                </div>
            </div>
        </footer>
    </body>
</html>

<?php
    $user = $_SESSION['user'];
    if(empty($user)){
        echo "  <script type='text/javascript'>
                    alert('You do not possess the rights to be on this site. Therefore, you will be send to the admin login page.');
                    window.location.replace('http://localhost/PHPScripts/PWA/administracija.php');
                </script>";
    }
?>