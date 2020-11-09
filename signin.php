<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./src/scss/main.css" />
    <title>System Authentication</title>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" >System Authentication</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="./index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./mainpage.php">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./signup.php">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./user.php">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./admin.php">Admin</a>
                </li>
                </ul>
            </div>
        </nav>

        <div class="sign-form">
            <h1 class="title">Sign In</h1>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="password" name="password"  placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <?php
        include("db-config.php");
        
        
        session_start();
        
        if(strlen($_SESSION["myusername"]) === 0){
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                // username and password sent from form 
                
                $myusername = mysqli_real_escape_string($conn,$_POST['username']);
                $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 

                $time = date('Y-m-d')." ".date("h:i:sa");

                $query  = "SELECT * FROM users where username = '$myusername'";
                $result = $conn->query($query);
                if (!$result) die("Fatal Error");

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $hashed_password = $row["password"];
                    }
                } else {
                    echo "0 results";
                }               

            
                if(password_verify($mypassword, $hashed_password)) {
                    
                    $queryLoginInTime = "UPDATE users SET lastlogin = '$time' WHERE username = '$myusername';";

                    if (mysqli_query($conn, $queryLoginInTime)) {
                        echo "New login time added";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    mysqli_close($conn);

                    $count = mysqli_num_rows($result);
                    if($count == 1) {
                        $_SESSION['myusername'] = $myusername;

                        $_SESSION['login_user'] = $myusername;
                        echo "login In";
                        
                        header("location: user.php");
                    }else {
                        $error = "<h2 class='text-center'>Your Login Name or Password is invalid </h2>";
                        echo $error;
                    }
                
                }
                else {
                    echo "<h3 class='text-center'>Data not found, please try again!</h3>";
                }
            }
        }else{
            header("location: user.php");
        }
        
    ?>
</body>
</html>