<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="admin_newsAdd.css"/>
        <link rel="stylesheet" href="bootstrap.css"/>
        <link href="fontawesome-free-5.15.1-web/css/all.css" rel="stylesheet"/>
        <title>Add article</title>
        
        <script type="text/javascript">
            function validateForm(){
                var slanje_forme = true;
                var headline = document.forms["articleForm"]["head"].value;
                var category = document.forms["articleForm"]["category"].value;
                var image = document.forms["articleForm"]["image"].value;
                var st = document.forms["articleForm"]["shortT"].value;
                var text = document.forms["articleForm"]["articleText"].value;
                
                if(headline.length < 5 || headline.length > 100){
                    slanje_forme = false;
                    document.getElementById("HIssue").style.visibility = "visible";
                }
                if(category.length == 0){
                    slanje_forme = false;
                    document.getElementById("CIssue").style.visibility = "visible";
                }
                if(image.length == 0){
                    slanje_forme = false;
                    document.getElementById("ImgIssue").style.visibility = "visible";
                }
                if(st.length == 0 || st.length > 150){
                    slanje_forme = false;
                    document.getElementById("STIssue").style.visibility = "visible";
                }
                if(text.length == 0){
                    slanje_forme = false;
                    document.getElementById("TIssue").style.visibility = "visible";
                }
                if (slanje_forme != true){
                    event.preventDefault();
                }
                document.getElementByClassName("error").style.visibility = "visible";
            }
        </script>
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
                        <h3 style="margin-top:20px; text-align:left;">Add article</h3>
                    </div>
                    <div class="col">
                        <?php
                            session_start();
                            $user = $_SESSION['user'];
                            echo "<h4 style='margin-top:20px;text-alignt:center;'>Admin: $user</h4>";
                        ?>
                    </div>
                    <div class="col">
                        <p style="margin-top:20px; text-align:right;">Thursday, 16th of May</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <form name="articleForm" method="POST" action="add.php" onsubmit="return validateForm()">
                            <br/><label class="Ladd">Headline:</label><br/>
                            <input type="text" style="width:50%;" name="head">
                            <br/>
                            <span id="HIssue" class="error">Headline cannot be empty, smaller than 5 nor larger than 100 characters!</span>
                            <br/>
                            <label class="Ladd">Category:</label><br/>
                            <select name="category">
                                <option value="News">News</option>  
                                <option value="Sport">Sport</option>
                            </select><br/><br/>
                            <span id="CIssue" class="error">Category cannot be empty!</span><br/>
                            <label class="Ladd">Image link/file path:</label><br/>
                            <input type="text" style="width:50%;" name="image">
                            <br/>
                            <span id="ImgIssue" class="error">Image cannot be empty!</span>
                            <br/>
                            <label class="Ladd">Short description:</label><br/>
                            <input type="text" style="width:50%;" name="shortT">
                            <br/>
                            <span id="STIssue" class="error">Short description cannot be empty not larger than 150 characters!</span>
                            <br/>
                            <label class="Ladd">Article text:</label><br/>
                            <textarea style="width:75%; height:400px; margin-bottom:20px;" name="articleText"></textarea><br/>
                            <span id="TIssue" class="error">Article text cannot be empty!</span>
                            <br/>
                            <input type="checkbox" name="archive"><label class="Ladd" style="margin-left:5px;">Archive article?</label>
                            <br/>
                            <br/>
                            <input type="submit" name="submit" Value="Submit article">
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
    $user = $_SESSION['user'];
    if(empty($user)){
        echo "  <script type='text/javascript'>
                    alert('You do not possess the rights to be on this site. Therefore, you will be send to the admin login page.');
                    window.location.replace('http://localhost/PHPScripts/PWA/administracija.php');
                </script>";
    }
?>