<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "config.php";

$det_1 = $det_2 = $det_3 = $det_4 = $det_5 = $appreciation = $suggestions = "";
$det_1err = $det_2err = $det_3err = $det_4err = $det_5err = $appreciationerr = $suggestionserr = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    //det_1
    if(!isset($_POST["det_1"])){
        echo "him";
        $det_1err = "Please select Yes/No.";
    } else{
        // Prepare a select statement
        $sql = "SELECT al_id FROM alumni WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $_SESSION["email"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt) or die("Something went wrong ! 1")){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1 ){
                    $det_1err = "Your Alumni form already submitted.";
                    header("location: welcome.php?message=<div class='alert alert-success'>Your Alumni form already submited.</div>");
                    exit;
                } else{
                    $det_1 = htmlentities($_POST["det_1"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    //det_2
    if(!isset($_POST["det_2"])){
        $det_2err = "Please select Yes/No.";
    } else{
        // Prepare a select statement
        $sql = "SELECT al_id FROM alumni WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $_SESSION["email"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt) or die("Something went wrong !3")){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $det_2err = "Your Alumni form already submited.";
                    header("location: welcome.php?message=<div class='alert alert-success'>Your Alumni form already submited.</div>");
                    exit;
                } else{
                    $det_2 = htmlentities($_POST["det_2"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

        //det_3
    if(!isset($_POST["det_3"])){
        $det_3err = "Please select Yes/No.";
    } else{
        // Prepare a select statement
        $sql = "SELECT al_id FROM alumni WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $_SESSION["email"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt) or die("Something went wrong !4")){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $det_3err = "Your Alumni form already submited.";
                    header("location: welcome.php?message=<div class='alert alert-success'>Your Alumni form already submited.</div>");
                    exit;
                } else{
                    $det_3 = $_POST["det_3"];
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }


        // Close statement
        mysqli_stmt_close($stmt);
    }

    //det_4
    if(!isset($_POST["det_4"])){
        $det_4err = "Please select Yes/No.";
    } else{
        // Prepare a select statement
        $sql = "SELECT al_id FROM alumni WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $_SESSION["email"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt) or die("Something went wrong !5")){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $det_4err = "Your Alumni form already submited.";
                    header("location: welcome.php?message=<div class='alert alert-success'>Your Alumni form already submited.</div>");
                    exit;
                } else{
                    $det_4 = htmlentities($_POST["det_4"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    //det_5
    if(!isset($_POST["det_5"])){
        $det_5err = "Please select Yes/No.";
    } else{
        // Prepare a select statement
        $sql = "SELECT al_id FROM alumni WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $_SESSION["email"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt) or die("Something went wrong !6")){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $det_5err = "Your Alumni form already submited.";
                    header("location: welcome.php?message=<div class='alert alert-success'>Your Alumni form already submited.</div>");
                    exit;
                } else{
                    $det_5 = htmlentities($_POST["det_5"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }


    //appreciation
    if(empty(trim($_POST["appreciation"]))){
        $appreciationerr = "Appreciate Us.";
    } else{
        // Prepare a select statement
        $sql = "SELECT al_id FROM alumni WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $_SESSION["email"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt) or die("Something went wrong !7")){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $appreciationerr = "Your Alumni form already submited.";
                } else{
                    $appreciation = trim($_POST["appreciation"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    //suggestions
    if(empty(trim($_POST["suggestions"]))){
        $suggestionserr = "Give any  suggestion.";
    } else{
        // Prepare a select statement
        $sql = "SELECT al_id FROM alumni WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $_SESSION["email"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt) or die("Something went wrong !8")){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $suggestionserr = "Your Alumni form already submited.";
                } else{
                    $suggestions = trim($_POST["suggestions"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }


    if(empty($det_1err) && empty($det_2err) && empty($det_3err) && empty($det_4err) && empty($det_5err) && empty($appreciationerr) && empty($suggestionserr)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO alumni (det_1,det_2,det_3,det_4,det_5,appreciation,suggestion,email) VALUES (?,?,?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql) or die("sw")){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss",$param_det_1, $param_det_2, $param_det_3, $param_det_4, $param_det_5, 
            $param_appreciation, $param_suggestions , $param_email);
            
            // Set parameters
            $param_det_1 = $det_1;
            $param_det_2 = $det_2;
            $param_det_3 = $det_3;
            $param_det_4 = $det_4;
            $param_det_5 = $det_5;
            $param_appreciation = $appreciation;
            $param_suggestions = $suggestions;
            $param_email = $_SESSION["email"];

            

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt) or die("Something went wrong !9") ){ //or die("improper query!")
                // Redirect to login page
                header("location: welcome.php?message=<div class='alert alert-success'>Successfully submitted your Alumni</div>");
            } else{
                
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link  rel="icon" type="image/jpg" href="icon.jpg">
    <link rel="stylesheet" type="text/css" href="lo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <style type="text/css">
        body{ font: 13px sans-serif; }
        h2{
            text-align: center;
        }
    </style>
</head>
<body>
    <center>
        <img style='margin-left' src="Header.jpg" alt="logo" width=60% height=auto > 
    </center>
                <br><h2 style="margin-left: 10vh">Hi, <b><?php echo htmlspecialchars($_SESSION["name"]); ?></b>. Complete your feedback.</h2><br> 
    <div >
        <a  style="float: left;margin-left: 20px" href="reset-password.php" class="Sout">Reset Your Password</a>
        <a  style="float: right;margin-top: 10px" href="logout.php" class="Sout">Sign Out</a>
    </div>
    <center><div id="mesg" style="width:300px; text-align: center; ">
                <?php 
                    if (isset($_GET['message'])) {
                        $message = $_GET['message'];
                        echo $message;
                    }
                    ?>
            </div>
    </center>
    <div class="container">
        <div class="rb-box">
            <div class="head" style="font-size: 20px;background: none; ">
                <p ><center><b>Department Of Computer Engineering</b></center></p>
                <p><center><b>Alumni Feedback Form</b></center></p> 
            </div><br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($det_1err) && !empty($det_2err) && !empty($det_3err) && !empty($det_4err) && !empty($det_5err) && !empty($appreciationerr) && !empty($suggestionserr)) ? 'has-error' : ''; ?>" >    
                        <table class="table" style="margin: 10px 40px; font-size: 14px">
                            <tr>
                                <th>Sr.No</th>
                                <th>Details</th>
                                <th>Y/N</th>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>Do you feel proud to be associated with SCOE as Alumni?</td>
                                <td><input id="toggle-on-det1" class="toggle toggle-left" name="det_1" value="YES" type="radio" checked>
                                    <label for="toggle-on-det1" class="btn">Yes</label>
                                    <input id="toggle-off-det1" class="toggle toggle-right" name="det_1" value="NO" type="radio">
                                    <label for="toggle-off-det1" class="btn">No</label>
                                <span class="help-block"><?php echo $det_1err; ?></span>
                                </td>
                            </tr>

                            <tr>
                                <td>2.</td>
                                <td>Are you willing to contribute to the development of the college?</td>
                                <td><input id="toggle-on-det2" class="toggle toggle-left" name="det_2" value="YES" type="radio" checked>
                                    <label for="toggle-on-det2" class="btn">Yes</label>
                                    <input id="toggle-off-det2" class="toggle toggle-right" name="det_2" value="NO" type="radio">
                                    <label for="toggle-off-det2" class="btn">No</label>
                                <span class="help-block"><?php echo $det_2err; ?></span>
                            </td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Are theory and practicals inline with Industries?</td>
                                <td><input id="toggle-on-det3" class="toggle toggle-left" name="det_3" value="YES" type="radio" checked>
                                    <label for="toggle-on-det3" class="btn">Yes</label>
                                    <input id="toggle-off-det3" class="toggle toggle-right" name="det_3" value="NO" type="radio">
                                    <label for="toggle-off-det3" class="btn">No</label>
                                <span class="help-block"><?php echo $det_3err; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Is the education imparted at SCOE useful and relevant in your present job?</td>
                                <td><input id="toggle-on-det4" class="toggle toggle-left" name="det_4" value="YES" type="radio" checked>
                                    <label for="toggle-on-det4" class="btn">Yes</label>
                                    <input id="toggle-off-det4" class="toggle toggle-right" name="det_4" value="NO" type="radio">
                                    <label for="toggle-off-det4" class="btn">No</label>
                                <span class="help-block"><?php echo $det_4err; ?></span>
                            </td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td>Are you willing to share your knowledge and resources with SCOE students?</td>
                                <td><input id="toggle-on-det5" class="toggle toggle-left" name="det_5" value="YES" type="radio" checked>
                                    <label for="toggle-on-det5" class="btn">Yes</label>
                                    <input id="toggle-off-det5" class="toggle toggle-right" name="det_5" value="NO" type="radio">
                                    <label for="toggle-off-det5" class="btn">No</label>
                                <span class="help-block"><?php echo $det_5err; ?></span>
                            </td>
                            </tr>
                        </table>
                        <br>
                        <table>
                            <tr>
                                <td>
                                    <label style="padding-left: 20px;" for="appreciation">What aspect of college do you appreciate?</label>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 20px;">
                                    <!-- <input  type="text" name="appreciation" size="50" /> -->
                                    <textarea name="appreciation" cols="50" rows="4" placeholder="<?php echo $appreciationerr; ?>"></textarea>
                                </td>
                            </tr>
                        </table>

                        <table>
                            <tr>
                                <td style="padding-left: 20px;">
                                    <label for="suggestions">Suggestion for improvement in theory Lecture and practicals ?</label>
                                </td>
                            </tr>
                            <br><br>
                            <tr>
                                <td style="padding-left: 20px;">
                                    <!-- <input type="text" name="suggestions" size="50" /> -->
                                    <textarea name="suggestions" cols="50" rows="4" placeholder="<?php echo $suggestionserr; ?>"></textarea>
                                    <span class="help-block"></span>
                                </td>
                            </tr>
                        </table>
                        <div class="button-box">
                            <input type="Submit"  value=" Submit " class="button" >
                        </div>
                    </div>
                </div>
            </form> 
            <script type="text/javascript">
                $(function(){
                    $('#mesg').delay(3000).fadeOut();
                });
            </script>   
</body>
</html>
