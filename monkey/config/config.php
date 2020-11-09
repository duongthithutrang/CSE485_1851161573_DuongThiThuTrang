<?php 
    $link = mysqli_connect('localhost', 'root', '', 'monkey');
    if(!$link){
        die("Cannot connect").mysqli_connect_error();
    }
?>