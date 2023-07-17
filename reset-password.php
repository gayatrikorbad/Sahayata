<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
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
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link href="https://fonts.googleapis.com/css?family=Mansalva|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
          body{ 
            font: 14px sans-serif;
            align-content: center; 
            background-image: url(images/5.jpg);
            background-repeat: no-repeat;
             background-size:100% 100vh;
            }
            .followus{
                margin left: 480px;
                flex:4;
                align-items: center;
              }
            .followus img{
              width: 40px;
              margin-left:20px;
              cursor: pointer;
            }
            .wrapper{ 
                        width: 350px; 
                        padding: 40px;
                        margin-top: 0px; 
                        margin-left:1000px;
                        text-align:center; 
                    }
             .logo{
                    flex-basis: 15%;
                    }
                    .logo img{
                   margin:20px 40px;
                    width:120px;
                    cursor: pointer;
                    }
            .slidemenu{
                    position: fixed;
                    top:0px;
                    right: 0px;
                    height: 100%;
                    width: 0px;
                    background-color: #222;
                    z-index: 1;
                    padding-top: 100px;
                    overflow-x: hidden; 
                    transition: all.6s;
                }

                #mainbox{
                    color:black;
                    margin-top: -180px;
                    margin-left:80px;
                    font-size: 24px;
                    cursor:pointer;
                    transition: all.6s;
                    display: inline block;
                }
                .slidemenu a{
                    padding: 8px 8px 8px 64px;
                    text-decoration: none;
                    font size: 20px;
                    color: #999;
                    display: block;
                }
                .slidemenu a:hover{
                    color:white;
                }
                .slidemenu .closebtn{
                    position :absolute;
                    top:0px;
                    left: -15px;
                    font-size: 36px;
                    margin-right: 62px;
                }
                .menu-icons{
                            display: flex;
                            margin-left: 1320px;
                            flex:4;
                            align-items: center;
                        }
                        .menu-icons img{
                            margin-left:20px;
                            cursor: pointer;
                        }
    </style>
</head>
<body>
    <div class="logo">
                        <img src="images/logo(1).png">
                    </div>
                    <div class= "menu-icons">
                        <div id="menu" class="slidemenu">
                                <a href="homepage1.php">Home</a>
                            <a href="aboutus.html">About us</a>
                            <a href="events.php">Events</a>
                            <a href="impact.html">Impact</a>
                            <a href="covid.html">Covid-19</a>
                            <a href="contact.php">Contact Us</a>
                            <a href="volunteer.php">To Be Volunteer</a>
                            <a href="logout.php">Logout</a> 
                                <a href="#" class="closebtn" onclick="closefunction()">&times;</a>
                            </div>
                            <div id="mainbox" onclick="openfunction()">&#9776; </div>
                    </div>          

    <div class="wrapper">
        <font color="white"><h2>Reset Password</h2>
        <p>Please fill out this form to reset your password.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <label>New Password</label>
                <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                <span class="help-block"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-link" href="welcome.php">Cancel</a>
            </div>
        </form>
    </div>   
    </font> 
   

</body>
</html>