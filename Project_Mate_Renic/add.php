<?php
    if(isset($_POST['submit'])){
        $headline = $_POST['head'];
        $category = $_POST['category'];
        $image = $_POST['image'];
        $sText = $_POST['shortT'];
        $articleText = $_POST['articleText'];
        $archive = $_POST['archive'];
        
        if($archive){
            $archive = "Y";
        }else{
            $archive = "N";
        }

        $dbc = mysqli_connect('localhost', 'root', '', 'pwaprojekt') or 
            die('Error connecting to MySQL server ' . mysqli_connect_error());

        $stmt = $dbc->prepare('INSERT INTO news (category, headline, image, text, shortText, arhiva) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('ssssss', $category, $headline, $image, $articleText, $sText, $archive);
        $stmt->execute();
    }else{
        die();
    }
    echo "
            <script type='text/javascript'> 
                alert('Successfully added article to database!');
                window.location.replace('http://localhost/PHPScripts/PWA/admin_newsAdd.php');
            </script>";
?>