<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="administracija.css"/>
        <link rel="stylesheet" href="bootstrap.css"/>
        <link href="fontawesome-free-5.15.1-web/css/all.css" rel="stylesheet"/>
        <title>Administration</title>
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
                    </div>
                </div>
            </header>
        </div>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h3 style="margin-top:20px; text-align:left;">Administration</h3>
                    </div>
                    <div class="col">
                        <p style="margin-top:20px; text-align:right;">Thursday, 16th of May</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p style="color:red; font-size: 20px;">Please login using your administrator account to proceed further:</p>
                        <form method="POST" action="">
                            <label>Username:</label><br/>
                            <input type="text" name="user" required><br/><br/>
                            <label>Password:</label><br/>
                            <input type="password" name="pass" required><br/><br/>
                            <input type="submit" name="login" value="Login">
                        </form>
                    </div>
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
    if(isset($_POST['login'])){
        $user=$_POST['user'];
        $pass=$_POST['pass'];
        
        $dbc = mysqli_connect('localhost', 'root', '', 'pwaprojekt') or 
            die('Error connecting to MySQL server ' . mysqli_connect_error());
        
        $query = "SELECT password FROM admins WHERE username = '$user'";
        
        $result = $dbc->query($query);
        
        $row = $result->fetch_assoc();
        $dbpass = $row['password'];
        
        if($pass == $dbpass){
            session_start();
            $_SESSION['user'] = $user;
            echo "<script type='text/javascript'> window.location.replace('http://localhost/PHPScripts/PWA/admin_newsManage.php');</script>";
        }
        else echo "<script>alert('Pogrešno korisničko ime ili lozinka!')</script>";
    }else{
        die();
    }
?>