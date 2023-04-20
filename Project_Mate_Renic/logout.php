<?php
    session_destroy();
    echo "  <script type='text/javascript'>
                    alert('Logging out, redirecting!');
                    window.location.replace('http://localhost/PHPScripts/PWA/administracija.php');
            </script>";
?>