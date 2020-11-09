
<?php
require_once "../config/config.php";
session_start();

// Check if the user is logged in, if not then redirect him to login page
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//     header("location: login.php");
//     exit;
// }


// Include config file


// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    

    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Vui lòng nhập email.";
    } else{
        $email = trim($_POST["email"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Vui lòng nhập password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, email, password FROM users WHERE email = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = $email;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if email exists, if yes then verify password
                // if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;

                            // Redirect user to welcome page
                            header("location: ../Admin/admin.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password was not valid.";
                        }
                    }
                // } else{
                //     // Display an error message if email doesn't exist
                //     $email_err = "No found your email.";
                // }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width= device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Sign In</title>
</head>

<body>
    <!-- <---------------------Menu------------------------------->
    <nav class="navbar navbar-expand-md navbar-light sticky-top">
        <div class="container-fluid" style="width: 300px;">
            <a class="navbar-brand" href="../Home/home.php" style="color: white;">Datamonkey</a>
        </div>
        <button class="navbar-toggler" type="button " data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../Home/home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../blog/Blog.html" style="color: white;">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../courses/Course.html">Courses</a>
                </li>
                <li>
                    <button type="button" id="buttonSignin" class="btn btn-primary"><a href="../SignIn/SignIn.php" style="color: white;">SIGN IN</a></button>
                </li>
            </ul>

        </div>
    </nav>
    <!-- <---------------------Menu------------------------------->
    <!-- <---------------------Sign In------------------------------->
    <div class="container" id="SignIn">
        <div class="row" id="SignInForm">
            <form action="SignIn.php" method="POST">
                <h1>Hello!</h1>
                <!-- <input type="text" class="form-item" placeholder="Email"><br>
                <input type="password" class="form-item" placeholder="Password"><br> -->

                <div class="wrap-input100 validate-input <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>" data-validate="Valid email is required: ex@abc.xyz">
                    <input type="text" size="40" name="email" class="form-control form-item" value="<?php echo $email; ?>" placeholder="email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    <span class="help-block"><?php echo $email_err; ?></span>
                </div>

                <div class="wrap-input100 validate-input <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>" " data-validate = "Password is required ">
                        <input type="password" size="40" name="password" class="form-control form-item" placeholder="Password">
						<span class="focus-input100 "></span>
						<span class="symbol-input100 ">
							<i class="fa fa-lock " aria-hidden="true "></i>
                        </span>
                        <span class="help-block "><?php echo $password_err; ?></span>
				</div>

                <button type="submit " class="btn btn-primary form-item ">Sign In</button>
                <!-- <button class="btn btn-danger form-item " >Sign In With G+</button> -->
                <p class="form-item " style="border-top: solid black 1px; ">Haven't account?<a href="../SignUp/SignUp.php ">Sign up here</a></p>
            </form>
        </div>
    </div>
    <!-- <---------------------Sign In------------------------------->
    <!-- <---------------------footer------------------------------->
    <div class="container-fluid" id="footer" style="background-color: #2d2a2a;">
			<div class="row" id="footIcon">
				<img src="image/mailicon.png" alt="" id="mailicon">	
			</div>
			<div class="row" id="footLink"><a href="">mail@datamonkey.pro</a></div>
			<div class="row " id="copyright"><p>Datamonkey &copy 2020</p></div>
		</div>
    <!-- <---------------------footer------------------------------->
</body>

</html>