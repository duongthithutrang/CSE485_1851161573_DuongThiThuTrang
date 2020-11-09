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
<?php 
require '../config/config.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $ids = $_GET['edit'];
        $user = trim( strip_tags( $_POST['user'] ) );
        $ngaysinh = trim( strip_tags( $_POST['ngaysinh'] ) );
        $email = trim( strip_tags( $_POST['email'] ) );
        $khoahoc = trim( strip_tags( $_POST['khoahoc'] ) );
        $sql = "UPDATE users SET email = '$email' where id ='$ids'";
        $sql1 = "UPDATE users_management SET hoten = '$user' , khoahoc='$khoahoc' where userId ='$ids'";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        $stmt = $link->prepare($sql1);
        $stmt->execute();
        header('Location: admin.php');
        exit();
      }
?>

<body id="bd" class="wide fs3">

    <div id="ja-wrapper">





        <div id="ja-containerwrap-fr">
            <div id="ja-container">
                <div id="ja-container2" class="clearfix">

                    <div id="ja-mainbody" class="clearfix">

                                <?php 
                                    
                                    $id = $_GET['id'];
                                    $sql = "SELECT * FROM users_management JOIN users ON `users_management`.userID = `users`.id WHERE stt = '$id'";
                                    $query = mysqli_query($link, $sql);
                                    $result = mysqli_fetch_all($query);
                                    foreach($result as $row){
                                    
                            ?>
                        <!-- BEGIN: CONTENT -->
                        <div class="title-module">SỬA THÔNG TIN NGƯỜI DÙNG </div>
                      
                        <form name="edit_course" action="edit.php?edit=<?php echo $row['3'] ?>" method="POST">
                            <table class="table-form-edit" align="center" bgcolor="#FFFFFF">


                                <tr>
                                    <td>Tên người dùng</td>
                                    <td><input name="user" type="text" value="<?php echo $row['1'] ?>" size="40"></td>
                                </tr>
                                

                                <tr>
                                    <td>Khóa học</td>
                                    <td><select name="khoahoc">
									<option selected="selected"><?php echo $row['2'] ?></option>
									<option value = "SQL">SQL</option>
									<option value = "Spreadsheets">Spreadsheets</option>
									<option  value="Descriptive statistics">Descriptive statistics</option>
									<option >Khóa học khác</option>
								
								</select></td>
                                </tr>
                                <tr>
                                    <td align="center"></td>
                                    <td><a href="admin.php"><input type="submit" value="Lưu lại" name="submit"></a>
                                    </td>
                                </tr>
                            </table>
                                    <?php } ?>
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


