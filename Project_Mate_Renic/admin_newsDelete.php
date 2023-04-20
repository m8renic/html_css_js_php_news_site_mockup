<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="admin_newsDelete.css"/>
        <link rel="stylesheet" href="bootstrap.css"/>
        <link href="fontawesome-free-5.15.1-web/css/all.css" rel="stylesheet"/>
        <title>BBC</title>
        <script type="text/javascript">
            function clickHappen(variable){
                window.location.replace('http://localhost/PHPScripts/PWA/delete.php?id='+variable);    
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
                <?php
                    session_start();
                    $user = $_SESSION['user'];
                    
                    if(empty($user)){
                        echo "  <script type='text/javascript'>
                                    alert('You do not possess the rights to be on this site. Therefore, you will be send to the admin login page.');
                                    window.location.replace('http://localhost/PHPScripts/PWA/administracija.php');
                                </script>";
                    }
                
                    $dbc = mysqli_connect('localhost', 'root', '', 'pwaprojekt') or 
                    die('Error connecting to MySQL server ' . mysqli_connect_error());
                    
                    echo "  <div class='row'>
                                <div class='col'>
                                    <h3 style='margin-top:20px; text-align:left;'>Delete article</h3>
                                </div>
                                <div class='col'>
                                    <h4 style='margin-top:20px;text-alignt:center;'>Admin: $user</h4>
                                </div>
                                <div class='col'>
                                    <p style='margin-top:20px; text-align:right;'>Thursday, 16th of May</p>
                                </div>
                            </div>
                         ";
                    $query = mysqli_query($dbc, "SELECT id, category, headline, image, shortText, arhiva FROM news");    
                    
                    echo "  <div class='row'>
                                <div class='col'>
                                    <table style='border:1px solid black;margin-top:20px;'>
                                        <tr>
                                            <th class='padMeUp'>ID</th>
                                            <th class='padMeUp'>Category</th>
                                            <th class='padMeUp'>Headline</th>
                                            <th class='padMeUp'>Image</th>
                                            <th class='padMeUp'>Short text</th>
                                            <th class='padMeUp'>Archive</th>
                                        </tr>
                         ";
                    
                    while ($row = mysqli_fetch_assoc($query)) {     
                        $id = $row['id'];
                        $head = $row['headline'];
                        $cat = $row['category'];
                        $img = $row['image'];
                        $sTxt = $row['shortText'];
                        $arh = $row['arhiva'];
                        echo "
                                <tr style='border:1px solid black;' onclick='clickHappen($id)'>
                                    <td class='padMeUp'>$id</td>
                             ";
                        
                        if($cat == 'News'){
                            echo "<td class='padMeUp' style='background-color:red; color:white;'>$cat</td>";
                        }else if($cat == 'Sport'){
                            echo "<td class='padMeUp' style='background-color:#ffc800; color:black;'>$cat</td>";
                        }
                        
                        echo "
                                    <td class='padMeUp'>$head</td>
                                    <td class='padMeUp'>$img</td>
                                    <td class='padMeUp'>$sTxt</td>
                             ";
                        
                        if($arh == 'N'){
                            echo "<td class='padMeUp' style='color:green'>No</td>";
                        }else{
                            echo "<td class='padMeUp' style='color:red'>Yes</td>";
                        }
                        
                        echo "
                                </tr>
                             ";
                    }
                    
                    echo "              </table>
                                    </div>
                                </div>
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