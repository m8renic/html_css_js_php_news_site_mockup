<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="article.css"/>
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
                    </div>
                </div>
            </header>
        </div>
        <?php
            $articleID = $_GET['id'];
            
            $dbc = mysqli_connect('localhost', 'root', '', 'pwaprojekt') or 
            die('Error connecting to MySQL server ' . mysqli_connect_error());

            $query = "SELECT category, headline, image, text, shortText  FROM news WHERE id = '$articleID'";

            $result = $dbc->query($query);
            $row = $result->fetch_assoc();
            $cat = $row['category'];
            $head = $row['headline'];
            $img = $row['image'];
            $txt = $row['text'];
            $sTxt = $row['shortText'];
        
            if($cat == "News"){
                echo "  <div class='wrapper3'>
                            <div class='container'>
                                <h4 style='text-transform:uppercase;padding-top:10px;padding-bottom:10px;color:white;'>$cat</h4>
                            </div>
                        </div>
                     ";
            }else{
                echo "  <div class='wrapper4'>
                            <div class='container'>
                                <h4 style='text-transform:uppercase;padding-top:10px;padding-bottom:10px;color:black;'>$cat</h4>
                            </div>
                        </div>
                     ";
            }    
        
            echo "
                    <main>
                        <div class='container'>
                            <div class='row'>
                                <div class='col'>
                                    <h5 style='margin-top:20px;'>$head</h5>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col'>
                                    <img src='$img'/>
                                    <p style='margin-top:20px;'><b>$sTxt</b></p>
                                    <p style='margin-top:20px;'>$txt</p>
                                </div>
                            </div>
                        </div>
                    </main>
                 ";
        ?>
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