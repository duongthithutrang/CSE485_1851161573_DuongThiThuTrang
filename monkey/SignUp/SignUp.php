<?php
// Include config file
require_once "../config/config.php";
 
// Define variables and initialize with empty values
$email = $password = $confirm_password = "";
$email_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($email_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_email, $param_password);
            
            // Set parameters
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: ../Home/home.php");
            } else{
                echo "Something went wrong. Please try again later.";
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
        <title>Sign Up</title>
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
                <form action="SignUp.php" method="POST">
                    <h1>Start learning now!</h1>
                    <p>Join Datamonkey!</p>
                    <div class="form-group">
                        <input type="text" class="form-control form-item" name="email" id="" aria-describedby="helpId" placeholder="Email">
                        <span class="help-block"><?php echo $email_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <input type="password" name="password" class="form-control form-item" value="<?php echo $password; ?>" placeholder="Password">
                        <span class="help-block"><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>" >
                        <input type="password" name="confirm_password" class="form-control form-item" value="<?php echo $confirm_password; ?>" placeholder="Confirmation">
                        <span class="help-block"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <!-- <input type="password" class="form-item" name="password" placeholder="Password"><br>
                    <input type="password" class="form-item" name="confirm_password" placeholder="Confirmation"><br> -->
                    <button type="submit" class="btn btn-primary form-item">Sign Up</button>
                    <!-- <button class="btn btn-danger form-item" >Sign Up With G+</button> -->
                    <p class="form-item" style="border-top: solid black 1px;">Already have an account?<a href="../SignIn/SignIn.php">Sign in here</a></p>
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
            <div class="row " id="copyright">
                <p>Datamonkey &copy 2020</p>
            </div>
        </div>
        <!-- <---------------------footer------------------------------->
    </body>

    </html>