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
                        <a class="nav-link" href="./signin.php">Sign In</a>
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
                    <li class="nav-item">
                        <a class="nav-link" href="./logout.php">Sign Out</a>
                    </li>
                </ul>
            </div>
        </nav>
        
        <?php 
            include("db-config.php");
            session_start();
            
            if(strlen($_SESSION["myusername"]) > 0){

                $username = $_SESSION["myusername"];

                if ($conn->connect_error) die("Fatal Error");

                $query  = "SELECT * FROM users where username = '$username'";
                $result = $conn->query($query);
                if (!$result) die("Fatal Error");

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $profilePic = $row["picture"];
                        $_SESSION["role"] = $row["role"];
                    }
                    // echo $profilePic;
                } else {
                    echo "0 results";
                }
                $conn->close();
                echo '<h1 class="title">Welcome '.$username.'</h1>';
                echo "<img class='figure-img profilePic img-fluid rounded'  width='100' height='100' src='$profilePic'>";
                
            }
            else{
                header("location: signin.php");
            }
        ?>
        
        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur enim est, 
            hendrerit at elit in, iaculis porttitor augue. Quisque lobortis nunc in tellus commodo,
            in porttitor erat vehicula. Pellentesque fermentum id odio vel vestibulum. Duis ac odio ut 
            diam euismod tincidunt quis sollicitudin libero. Integer commodo ante sit amet eros rhoncus, 
            a egestas urna luctus. Mauris sed sodales tellus, non rutrum ligula. Mauris ipsum libero, varius
            id tincidunt ac, gravida ac diam.</p>

            <p class="text-justify">In molestie sollicitudin nunc vitae pretium. Sed ut massa accumsan, efficitur diam eget, euismod neque. 
            Phasellus at placerat ligula, quis dapibus sem. Ut mi neque, dignissim quis elit at, tristique aliquam odio.
            Ut ac congue sapien. Suspendisse ac tempor orci. Proin egestas lectus arcu, sit
            amet tristique nulla ullamcorper at. Proin urna nibh, imperdiet id accumsan in, ultrices at ipsum.
            Vivamus dignissim ipsum facilisis diam vehicula, eu fringilla sapien sodales. Proin tempor ipsum eget
            tortor commodo convallis. </p>

            <p class="text-justify"> Nulla lacinia sollicitudin mauris id blandit. Integer vulputate dapibus risus, in malesuada sem molestie 
            sit amet. Morbi velit nibh, sodales ut accumsan id, porta vel urna. Nulla iaculis, orci at vestibulum 
            eleifend, arcu ligula rhoncus dolor, at rutrum ante ex ac erat. Fusce ut purus eget tellus sollicitudin
             lobortis nec id ligula. Curabitur in varius ex. Integer congue sit amet dui eu eleifend.</p>
    </div>
</body>
</html>