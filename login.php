<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: homepage1.php");
  exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

	$password = $_POST["password"];
	$username = $_POST["username"];

	if($username=="admin123" && $password=="pass123"){
		header('Location:admin.php');
	} 
	else{
		echo '<script>alert("INVALID ADMIN LOGIN CREDENTIALS")</script>';
	}

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: homepage1.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
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
    <title>Login</title>
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
	        background-image: url(images/login.jpg);
	        background-repeat: no-repeat;
	        background-size:100% 100vh;
	        margin-top: 20px;
	    		}
        .wrapper{ width: 350px; 
        	padding: 40px;
        	margin-top: 0px; 
        	margin-left:1000px;
        	text-align:center; }

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
		    			<img src="images/logo.png">
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
       <font color="black"> <h2><font color="white">Login</font></h2>

        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php"><font color="white">Sign up now</a>.</font></p>
        </font>
        </form>
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