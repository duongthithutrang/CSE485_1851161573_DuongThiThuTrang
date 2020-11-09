<?php
// Initialize the session
require_once "../config/config.php";
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../SignIn/SignIn.php");
    exit;
}
	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en-gb" xmlns="http://www.w3.org/1999/xhtml" lang="en-gb">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="robots" content="index, follow">
    <title>Welcome to the Frontpage</title>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="home_files/template.css" type="text/css">

    <!-- Menu head -->
    <link href="home_files/ja.css" rel="stylesheet" type="text/css">
    <link href="home_files/default.css" rel="stylesheet" type="text/css">
</head>

<body id="bd" class="wide fs3">

    <div id="ja-wrapper">

        <!-- BEGIN: HEADER -->
        
        <!-- END: HEADER -->

        <!-- BEGIN: MAIN NAVIGATION -->
        <div id="ja-mainnavwrap">

            <div class="container bg-light">
                <nav class="navbar navbar-expand-sm navbar-light">
                    <a class="navbar-brand" href="../Home/home.php">Monkey</a>
                    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" href="admin.php">Quản lý người dùng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="post.php">Quản lý bài viết</a>
                            </li>
                            <li class="nav-item">
                                <a name="" id="" class="btn btn-primary" href="../SignIn/logout.php" role="button">Sign Out</a>
                            </li>

                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
            </div>


            <!-- <div id="ja-search">
                <form action="../New Folder/theme1/index.php" method="post">
                    <div class="search">
                        <input name="searchword" id="mod_search_searchword" maxlength="20" alt="Search" class="inputbox" size="20" value="search..." onblur="if(this.value=='') this.value='search...';" onfocus="if(this.value=='search...') this.value='';" type="text">                        </div>
                    <input name="task" value="search" type="hidden">
                    <input name="option" value="com_search" type="hidden">
                </form>
            </div> -->

        </div>

        <!-- END: MAIN NAVIGATION -->



        <div id="ja-containerwrap-fr">
            <div id="ja-container">
                <div id="ja-container2" class="clearfix">

                    <div id="ja-mainbody" class="clearfix">

                        <div class="title-module">DANH SÁCH NGƯỜI DÙNG</div>

                        </div>
                        <div class="container">
                            <table class="list-course table" >
                                <thead>
                                    <tr class="row-first">
                                        <td width="30">Sửa</td>
                                        <td width="30">Xóa</td>
                                        <td width="30">STT</td>
                                        <td width="150">Họ tên</td>
                                        <td width="150">Khóa học</td>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                <?php 
                                    require '../config/config.php';
                                    $sql = "SELECT * FROM users_management";
                                    $query = mysqli_query($link, $sql);
                                    $result = mysqli_fetch_all($query);
                                    foreach($result as $row){
                                ?>
                                    <tr>
                                        <td class="text-center"><a href="edit.php?id=<?php echo $row['0']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                        <td class="text-center"><a href="delete.php?id=<?php echo $row['0']; ?>"><i class="fa fa-trash"></i></a></td>
                                        <td class="text-center"><?php echo $row['0']; ?></td>
                                        <td><?php echo $row['1']; ?></td>
                                        <td><?php echo $row['2']; ?></td>

                                    </tr>
                                    <?php } ?>
                                </tbody>
                                

                            </table>
                            <div class="task">
                                <a href="update.php"><input type="button" value="Thêm mới" name="Thêm mới"></a>
                                <!-- <input type="button" name="Xóa" value="Xóa">
                                <a href="sualophoc.html"><input type="button" name="Cập nhật" value="Cập nhật"></a> -->
                            </div>
                        </div>
                        <!-- END: CONTENT -->

                    </div>

                    <!-- BEGIN: LEFT COLUMN -->

                    <!-- END: LEFT COLUMN -->

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
        <!--<small><a href="http://www.joomla.org">Joomla!</a> is Free Software released under the <a href="http://www.gnu.org/licenses/gpl-2.0.html">GNU/GPL License.</a></small> -->


    </div>
    <!-- END: FOOTER -->

    </div>



</body>

</html>