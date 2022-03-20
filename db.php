<?php
    $connection = mysqli_connect('localhost', 'root', 'root', 'loginapp');
    if(!$connection){
        echo "Database Connection failed";
    }
?>