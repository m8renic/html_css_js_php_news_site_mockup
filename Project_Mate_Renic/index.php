<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="index.css"/>
        <link rel="stylesheet" href="bootstrap.css"/>
        <link href="fontawesome-free-5.15.1-web/css/all.css" rel="stylesheet"/>
        <title>BBC</title>
        <script type="text/javascript">
            function clickHappen(variable){
                window.location.replace('http://localhost/PHPScripts/PWA/article.php?id='+variable);    
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
                    </div>
                </div>
            </header>
        </div>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h3 style="margin-top:20px; text-align:left;">Welcome to BBC.com</h3>
                    </div>
                    <div class="col">
                        <p style="margin-top:20px; text-align:right;">Thursday, 16th of May</p>
                    </div>
                </div>
                <?php
                    $dbc = mysqli_connect('localhost', 'root', '', 'pwaprojekt') or 
                    die('Error connecting to MySQL server ' . mysqli_connect_error());
                    
                    echo "  <div class='row''>
                                <a href='news.php'><img src='imgs/news.PNG' style='margin-top: 20px; margin-left: 10px;'/></a>
                            </div>
                            <div class='row'>
                         ";
                    $query = mysqli_query($dbc, "SELECT id, headline, image, shortText FROM news WHERE category='News' AND arhiva='N'");
                    
                    $i=0;
                    
                    while ($row = mysqli_fetch_assoc($query)) {     
                        $id = $row['id'];
                        $head = $row['headline'];
                        $img = $row['image'];
                        $sTxt = $row['shortText'];
                        echo "
                                <div class='col-sm-4 col-md-4 col-lg-4 col-xl-4'>
                                    <div class='backgroundBox' id='$id' onclick='clickHappen($id)'>
                                        <img src='$img' style='width:100%'/>
                                        <h5 class='mt'>$head</h5>
                                        <p class='psize'>$sTxt</p>
                                    </div>
                                </div>
                                ";
                        $i++;
                        if($i >= 3){
                            break;
                        }
                    }
                    
                    echo "
                            </div>
                         ";
                    
                    echo "  <div class='row''>
                                <a href='sports.php'><img src='imgs/sport.PNG' style='margin-top: 20px; margin-left: 10px;'/></a>
                            </div>
                            <div class='row'>
                         ";
                    $query = mysqli_query($dbc, "SELECT id, headline, image, shortText FROM news WHERE category='Sport' AND arhiva='N'");

                    while ($row = mysqli_fetch_assoc($query)) {     
                        $id = $row['id'];
                        $head = $row['headline'];
                        $img = $row['image'];
                        $sTxt = $row['shortText'];
                        echo "
                                <div class='col-sm-4 col-md-4 col-lg-4 col-xl-4'>
                                    <div class='backgroundBox' id='$id' onclick='clickHappen($id)'>
                                        <img src='$img' style='width:100%'/>
                                        <h5 class='mt'>$head</h5>
                                        <p class='psize'>$sTxt</p>
                                    </div>
                                </div>
                                ";
                        $i++;
                        if($i <= 2){
                            break;
                        }
                    }
                    
                    echo "
                            </div>
                         ";
                ?>
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