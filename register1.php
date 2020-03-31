<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$email = $password = $confirm_password = $name = $address = $dob = $branch = $post = $jyear = $pyear = $cname = "";
$email_err = $password_err = $confirm_password_err = $name_err = $address_err = $dob_err = $branch_err = $post_err = $jyear_err = $pyear_err = $c_name_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate grno
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM data1 WHERE email = ?";
        
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
                    $email_err = "This eamil is already used.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
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
	
	//======
	// Validate name
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter a name";
    } else{
        // Prepare a select statement
        /*$sql = "SELECT id FROM data1 WHERE name = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_name);
            
            // Set parameters
            $param_name = trim($_POST["name"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // store result *
                mysqli_stmt_store_result($stmt);
                */
                    $name = trim($_POST["name"]);
               /*
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);*/
    }
	
	// Validate address
    if(empty(trim($_POST["address"]))){
        $name_err = "Please enter a address";
    } else{
        /*
        // Prepare a select statement
        $sql = "SELECT id FROM data1 WHERE address = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_address);
            
            // Set parameters
            $param_address = trim($_POST["address"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result 
                  mysqli_stmt_store_result($stmt);
                */
                    $address = trim($_POST["address"]);
           /*  
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);*/
    }
	
	// Validate dob
    if(empty(trim($_POST["dob"]))){
        $dob_err = "Please enter a dob";
    } else{
        /*
        // Prepare a select statement
        $sql = "SELECT id FROM data1 WHERE dob = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_dob);
            
            // Set parameters
            $param_dob = trim($_POST["dob"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result *
                mysqli_stmt_store_result($stmt);
            */  
                    $dob = trim($_POST["dob"]);
                    //echo $dob;
            /* 
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);*/
    }
	
	// Validate branch
    if(empty(trim($_POST["branch"]))){
        $age_err = "Please enter a branch";
    } else{
        /*
        // Prepare a select statement
        $sql = "SELECT id FROM data1 WHERE branch = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_branch);
            
            // Set parameters
            $param_branch = trim($_POST["branch"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result *
                mysqli_stmt_store_result($stmt);
            */  
                    $branch = trim($_POST["branch"]);
            /* 
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);*/
    }
	
	// Validate post
    if(empty(trim($_POST["post"]))){
        $post_err = "Please enter a post";
    } else{
        /*
        // Prepare a select statement
        $sql = "SELECT id FROM data1 WHERE post = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_post);
            
            // Set parameters
            $param_post = trim($_POST["post"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result *
                mysqli_stmt_store_result($stmt);
            */  
                    $post = trim($_POST["post"]);
            /* 
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);*/
    }
	
	// Validate jyear
    if(empty(trim($_POST["jyear"]))){
        $jyear_err = "Please enter a jyear";
    } else{
        /*
        // Prepare a select statement
        $sql = "SELECT id FROM data1 WHERE jyear = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_jyear);
            
            // Set parameters
            $param_jyear = trim($_POST["jyear"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result *
                mysqli_stmt_store_result($stmt);
            */  
                    $jyear = trim($_POST["jyear"]);
            /*
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);*/
    }
	
	// Validate pyear
    if(empty(trim($_POST["pyear"]))){
        $pyear_err = "Please enter a pyear";
    } else{
        /*
        // Prepare a select statement
        $sql = "SELECT id FROM data1 WHERE pyear = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_pyear);
            
            // Set parameters
            $param_pyear = trim($_POST["pyear"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
            * store result *
                mysqli_stmt_store_result($stmt);
            */ 
                
             
                    $pyear = trim($_POST["pyear"]);
          /*   
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);*/
    }
	
	// Validate c_name
    if(empty(trim($_POST["cname"]))){
        $c_name_err = "Please enter a c_name";
    } else{
        /*
        // Prepare a select statement
        $sql = "SELECT id FROM data1 WHERE cname = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_cname);
            
            // Set parameters
            $param_cname = trim($_POST["cname"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result 
                mysqli_stmt_store_result($stmt);
            */  
                    $cname = trim($_POST["cname"]);
        /*    
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }*/
         
	}
	//======
	
    
    // Check input errors before inserting in database
    if(empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($name_err) && empty($address_err) && empty($dob_err) && empty($branch_err) && empty($post_err) && empty($jyear_err) && empty($pyear_err) && empty($c_name_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO data1 (name,email, password,address,branch,pyear,dob,post,cname,jyear) VALUES (?, ?, ?,?,?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssss",$param_name, $param_email, $param_password,  $param_address, $param_branch,$param_pyear, $param_dob, $param_post, $param_cname, $param_jyear);
            
            // Set parameters
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
			$param_name = $name;
            $param_address = $address;
			$param_branch = $branch;
            $param_pyear = $pyear;
            $param_dob = $dob;
            $param_post = $post;
            $param_cname = $cname;
			$param_jyear = $jyear;

			
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
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
    <title>Sign Up</title>
    <link  rel="icon" type="image/jpg" href="icon.jpg">
    <meta name="viewport" content="width=device-width ,initial-scale=1.0" >
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="lo.css">
    
</head>
<body style="text-align:center">
    <div class="container">
    	<center class="logo">
    	   <img src="Header.jpg" width="60%" height="8%" alt=""/><br>
    	</center>
        <div class="bg-image"></div>  
        <div class="form-box"> 
            <div class="head"> 
                <h2><b>Sign Up</b></h2>
                <marquee>Please fill this form to create an account.</marquee>
            </div>
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="login-form" method="post">
    			
    			<div class="form-group <?php echo (!empty($grno_err) && !empty($password_err) && !empty($confirm_password_err) && !empty($name_err) && !empty($address_err) && !empty($dob_err) && !empty($age_err) && !empty($branch_err) && !empty($year_err)) ? 'has-error' : ''; ?>">
    			     
                    <div class="form-group">
        				<label class="label-control">
                            <span class="label-text">Full Name <?php echo $name_err; ?></span>
                        </label>
                        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                        
                    </div>
    				
                    <div class="form-group">
        				<label class="label-control">
                            <span class="label-text">Email Id<?php echo $email_err; ?></span>  
                        </label>
                        <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                        
    				</div>

                    <div class="form-group">
    				<label class="label-control">
                        <span class="label-text">Password<?php echo $password_err; ?></span>
                    </label>
                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                    
    				</div>

                    <div class="form-group">
    				<label class="label-control">
                        <span class="label-text">Confirm Password<?php echo $confirm_password_err; ?></span>
                    </label>
                    <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                    
    				</div>

                    <div class="form-group">
    				<label class="label-control">Address</label>
                    <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
                    <span class="label-text"><?php echo $address_err; ?></span>
    				</div>

                    <div class="form-group">
    				<label class="label-control">Branch</label>
                    <input type="text" name="branch" class="form-control" value="<?php echo $branch; ?>">
                    <span class="label-text"><?php echo $branch_err; ?></span>
    				</div>

                    <div class="form-group">
    				<label class="label-control">Degree Passing Year</label>
                    <input type="text" name="pyear" class="form-control" value="<?php echo $pyear; ?>">
                    <span class="label-text"><?php echo $pyear_err; ?></span>
    				</div>

                    <div class="form-group">
    				<label class="label-control">Date of Birth</label>
                    <input type="date" name="dob" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"  class="form-control"  value="<?php echo $dob; ?>">
                    <span class="label-text"><?php echo $dob_err; ?></span>
                    </div>
    				
                    <div class="form-group">
    				<label class="label-control">Current Post</label>
                    <input type="text" name="post" class="form-control" value="<?php echo $post; ?>">
                    <span class="label-text"><?php echo $post_err; ?></span>
    				</div>

                    <div class="form-group">
    				<label class="label-control">Company Name</label>
                    <input type="text" name="cname" class="form-control" value="<?php echo $cname ?>">
                    <span class="label-text"><?php echo $c_name_err; ?></span>
    				</div>

                    <div class="form-group">
    				<label class="label-control">Company Joining year</label>
                    <input type="text" name="jyear" class="form-control" value="<?php echo $jyear; ?>">
                    <span class="label-text"><?php echo $jyear_err; ?></span>
                    </div>
                </div>
    			
    			<div style="text-align:center;padding-top: 10px;padding-bottom: 20px;">
                    <input type="submit"  value=" Submit " style="font-size:15pt;color:white;background-color:green;border:2px solid #336606;padding:3px">
    			</div>
    			
                <p style="text-align:center;padding-bottom: 30px">Already have an account? <a href="login.php">Login here</a>. </p>
            </form>
    </div> 
    </div>   
</body>
</html>