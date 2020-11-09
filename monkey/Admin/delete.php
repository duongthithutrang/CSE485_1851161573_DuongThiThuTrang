<?php 
    require '../config/config.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM users_management WHERE stt = '$id'";
    $result = mysqli_query($link, $sql); 

    if ($result = mysqli_query($link, $sql)){
        header('Location: admin.php');
        exit();
    }else{
        echo "Cannot delete";
    }
?>