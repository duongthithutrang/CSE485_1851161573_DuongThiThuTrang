<?php
require '../config/config.php';
session_start();
$title = $userId = $image = $body = $published = $err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // $ids = $_GET['edit'];
    $userId = htmlspecialchars($_SESSION['id']);
    $title = trim(strip_tags($_POST['title']));
    $image = trim(strip_tags($_POST['image']));
    $body = trim(strip_tags($_POST['body']));
    $published = trim(strip_tags($_POST['published']));
        $push = "INSERT INTO posts(user_id,title, image, body, published) VALUES (?, ?, ?, ?, ?); ";

        if ($stmt = mysqli_prepare($link, $push)) {
            mysqli_stmt_bind_param($stmt, "sssss",$userId,  $title, $image, $body, $published);


            if (mysqli_stmt_execute($stmt)) {
                header("location: post.php");
            } else {
                echo "Thu lai xem.";
            }

            mysqli_stmt_close($stmt);
        }
    
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en-gb" xmlns="http://www.w3.org/1999/xhtml" lang="en-gb">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="robots" content="index, follow">
    <title>Welcome to the Frontpage</title>


    <link rel="stylesheet" href="home_files/template.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Menu head -->
    <link href="home_files/ja.css" rel="stylesheet" type="text/css">
    <link href="home_files/default.css" rel="stylesheet" type="text/css">
    <link href="style.css" rel="stylesheet" type="text/css">

</head>

<body id="bd" class="wide fs3">

    <div id="ja-wrapper">





        <div id="ja-containerwrap-fr">
            <div id="ja-container">
                <div id="ja-container2" class="clearfix">

                    <div id="ja-mainbody" class="clearfix">

                        <!-- BEGIN: CONTENT -->
                        <div class="title-module"><?php echo ucfirst(htmlspecialchars($_SESSION['id'])) ?> THÊM NGƯỜI DÙNG </div>
                        <form name="edit_course" method="POST" action="posts_update.php">
                            <table class="table-form-edit" align="center" >
                                <tr>
                                    <td>Title</td>
                                    <td><input type="text" name="title" value="" size="40"></td>
                                </tr>
                                <tr>
                                    <td>Image</td>
                                    <td><input type="text" name="image" value="" size="40"></td>
                                </tr>
                                <tr>
                                    <td>Body</td>
                                    <td><input type="text" name="body" value="" size="40"></td>
                                </tr>

                                
                                <tr>
                                    <td><input type="submit" value="Lưu lại" name="submit"></a>
                                </tr>
                            </table>
                        </form>
                        <!-- END: CONTENT -->

                    </div>



                </div>
            </div>
        </div>



        <!-- BEGIN: FOOTER -->
        <div class="container-fluid fixed-bottom text-center" id="footer " style="background-color: #2d2a2a; ">
            <div class="row">
                <div class="col-12">
                    <img src="images/mailicon.png " alt=" " id="mailicon ">
                </div>
                <div class="col-12">
                    <a href=" ">mail@datamonkey.pro</a>                    
                </div>
                <div class="col-12">
                 <p class="text-light">Datamonkey &copy 2020</p>
                </div>
            </div>


        </div>


    </div>
    <!-- END: FOOTER -->

    </div>



</body>

</html>