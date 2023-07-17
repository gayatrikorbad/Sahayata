<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
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
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
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
    <title>Sign Up</title>
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
            background-image: url(images/8.jpg);
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
        <font color="black">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <font color="white"><p>Already have an account? <a href="login.php">Login here</a>.</p></font>
        </form>
    </font>
    </div>    
   

   <script>
        function openfunction(){
                document.getElementById("menu").style.width="300px";
                document.getElementById("mainbox").style.marginright="300px";
                document.getElementById("mainbox").innerHTML="";
            }
            function closefunction(){
                    document.getElementById("menu").style.width="0px";
                    document.getElementById("mainbox").style.marginright="0px";
                    document.getElementById("mainbox").innerHTML="&#9776";;
            }

</script>


</body>
</html>