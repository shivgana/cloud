<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if grno is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
        header("location: login.php?message=<div class='alert'>Please enter email.</div>");
        exit;
    } else{
        $email = trim($_POST["email"]);
        if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$",$email) ) {
            $email_err = "Your email is Invalid";
            header("location: login.php?message=<div class='alert'>Please ,Enter proper Email Id</div>");
            exit;
        } 

         else{
            $sql = "SELECT  det_1 FROM alumni WHERE email = ?";
                
                if($stmt = mysqli_prepare($link, $sql)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "s", $param_uname);
                    
                    // Set parameters
                    $param_uname = $email;
                    
                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                        // Store result
                        mysqli_stmt_store_result($stmt);
                        
                        // Check if grno exists, if yes then verify password
                        if(mysqli_stmt_num_rows($stmt) == 1){                    
                            // Bind result variables
                            mysqli_stmt_bind_result($stmt, $det_1);
                            if(mysqli_stmt_fetch($stmt)){
                                if(!empty($det_1)){
                                    // Password is correct, so start a new session
                                    $username_err = "Already given the feedback";
                                    // Display an error message if password is not valid
                                   // $password_err = "The password you entered was not valid.";
                                    header("location: login.php?message=<div class='alert alert-success'>Already given the feedback</div>");
                                    exit;
                                }
                            }
                        } /*else{
                            // Display an error message if grno doesn't exist
                            $email_err = "No account found with that email.";
                            header("location: pelogin.php?message=<div class='alert alert-success'>No account found with that username.</div>");
                            exit;
                        }*/
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                        header("location: login.php?message=<div class='alert alert-success'>Oops! Something went wrong. Please try again later.</div>");
                        exit;
                    }       
                }
        } 
    }
    
        
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
        header("location: login.php?message=<div class='alert'>Please enter your password</div>");
        exit;
    } else{
        $password = trim($_POST["password"]);
        if (strlen($password) < 6) {
            $password_err="error";
             header("location: login.php?message=<div class='alert'>Password Length should be > 6</div>");
             exit;
        }
        //$password = password_hash($password, PASSWORD_DEFAULT);
    }
    
    // Validate credentials
    if(empty($grno_err) && empty($password_err)){
        // Prepare a select statementl) or die(mysqli_error($link))){
			$sql = "SELECT  id,name,email, password FROM data1 WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if grno exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id,$name, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;
                            $_SESSION["name"] = $name;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                            header("location: login.php?message=<div class='alert'>The password you entered was not valid</div>");
                            exit;
                        }
                    }
                } else{
                    // Display an error message if grno doesn't exist
                    $email_err = "No account found with that email.";
                    header("location: login.php?message=<div class='alert alert-success'>No account found with that email.</div>");
                    exit;
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
                header("location: login.php?message=<div class='alert'>Oops! Something went wrong. Please try again later.</div>");
                exit;
            }
        }
        else{
            
            header("location: login.php?message=<div class='alert'>Fill the empty fields</div>");
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width ,initial-scale=1.0" >
    <link  rel="icon" type="image/jpg" href="icon.jpg">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="lo.css">
    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <center class="logo">
            <img src="Header.jpg" width="60%" height="auto" alt=""/><br>
        </center>
        <div class="bg-image"></div>
        <div class="form-box">
            <div class="head"> Welcome </div> 
            <center>
                    <div id="mesg" style="width:300px; text-align: center; ">
                        <?php 
                        if (isset($_GET['message'])) {
                            $message = $_GET['message'];
                            echo $message;
                        }
                        ?>
                    </div>
                </center> 
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="login-form" method="post">
                <div class="form-group <?php echo (!empty($grno_err)) ? 'has-error' : ''; ?>">
                    <label class="label-control">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="text" name="email" class="form-control" autocomplete="off">
                </div>
                <div class="form-group">
                    <label class="label-control <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <span class="label-text">Password</span>
                    </label>
                    <input type="password" name="password" class="form-control" >
                </div>
                <input type="submit" value="Sign In" class="btn">
                <p class="text-p">Don't have an account? <a href="register.php">Sign Up</a></p>
            </form>     
            <script type="text/javascript">
                $(function(){
                    $('#mesg').delay(3000).fadeOut();
                });
            </script>
        </div>
    </div>
</body>
</html>

