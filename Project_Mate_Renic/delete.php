<?php
    $articleID = $_GET['id'];
            
    $dbc = mysqli_connect('localhost', 'root', '', 'pwaprojekt') or 
    die('Error connecting to MySQL server ' . mysqli_connect_error());
    
    $query = mysqli_query($dbc, "DELETE FROM news WHERE id = '$articleID'");
    
    echo "
            <script type='text/javascript'>
                alert('Article with id = $articleID successfully deleted. Returning to article DB!');
                window.location.replace('http://localhost/PHPScripts/PWA/admin_newsDelete.php');
            </script>
         ";
    
?>