<?php
    require '../config/config.php';
	$user = $ngaysinh = $sdt = $email = $khoahoc = $email_error = '';
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
		// $ids = $_GET['edit'];
        $user = trim( strip_tags( $_POST['user'] ) );
        $ngaysinh = trim( strip_tags( $_POST['ngaysinh'] ) );
        $email = trim( strip_tags( $_POST['email'] ) );
        $khoahoc = trim( strip_tags( $_POST['khoahoc'] ) );
        if(empty($email)){
			$email_error = "Chua nhap email";
        }
        else {
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($link, $sql);
            $infor = mysqli_fetch_all($result);
            foreach ($infor as $row){
                if($email == $row['1']){
                    $email_err = 'Đã tồn tại tên !!';
                }
            }
        }
        if(empty($email_err)){
			$push = "INSERT INTO users (email) VALUES (?) ";
			
            if($stmt = mysqli_prepare($link, $push)){
				mysqli_stmt_bind_param($stmt, "s", $email);
				

                if(mysqli_stmt_execute($stmt)){
                    // header("location: update.php".$id);
                } else{
                    echo "Thu lai xem.";
                }

                mysqli_stmt_close($stmt);
			}

			$sql = "SELECT * FROM users WHERE email = '$email'";
			$result = mysqli_query($link, $sql);
			$show = mysqli_fetch_all($result);
			$id = $show['0']['0'];

			$push1 = "INSERT INTO users_management(hoten, khoahoc, userId) VALUES (?, ?, ?); ";
			if($stmt = mysqli_prepare($link, $push1)){
				mysqli_stmt_bind_param($stmt, "sss",$user, $khoahoc,$id);
				

                if(mysqli_stmt_execute($stmt)){
                    header("location: admin.php");
                } else{
                    echo "Thu lai xem.";
                }

                mysqli_stmt_close($stmt);
            }
        }

    }
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en-gb" xmlns="http://www.w3.org/1999/xhtml" lang="en-gb"><head>
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
				<div class="title-module">THÊM NGƯỜI DÙNG </div>
					<form name="edit_course" method="POST" action="update.php">
						<table class="table-form-edit" align="center" bgcolor="#FFFFFF">
							
							
							 <tr>
                                    <td>Tên người dùng</td>
                                    <td><input name="user" type="text"  size="40"></td>
                                </tr>
                                

							
							<tr>
								<td>Khóa học</td>
								<td><select name="khoahoc">
									<option  selected disabled>------Chọn khóa học-------</option>
									<option >SQL</option>
									<option >Spreadsheets</option>
									<option >Descriptive statistics</option>
									<option >Khóa học khác</option>
								
								</select></td>
							</tr>
							<tr>
								<td align="center" ></td>
								<td><input type="submit" value="Lưu lại" name="submit"></td>
							</tr>
						</table>
					</form>
<!-- END: CONTENT -->
 		
</div>
		

	
</div></div></div>



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
<!-- END: FOOTER -->

</div>



</body></html>