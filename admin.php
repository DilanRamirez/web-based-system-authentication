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
    <title>Admin</title>
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

        <h1 class="title">Welcome Admin</h1>
    
    <?php 
                    
        require_once 'db-config.php';

        session_start();
    
        if(empty($_SESSION)){
            header("location: forbidden.php");
        }

        if(!empty($_SESSION)){
            
            if($_SESSION["role"] !== 'admin') {
                header("location: forbidden.php");
            }
            if ($conn->connect_error) {
                die("Fatal Error");
            }

            $query  = "SELECT * FROM users";
            $result = $conn->query($query);
            if (!$result) {
                die("Fatal Error");
            }
            if ($result->num_rows > 0) {
                // output data of each row
                ?>
                <div class='container'>
                    <div class='row'>
                        <?php
                            while($row = $result->fetch_assoc()) {
                                echo "
                                <div class='card' style='width: 18rem; margin-right: 3rem; margin-top: 2rem;'>
                                    <img class='card-img-top' src='".$row["picture"]."' alt='Card image cap'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>".$row["firstname"]." ".$row["lastname"]."</h5>
                                        <p class='card-text'><strong>Username: </strong>".$row["username"]."</p>
                                        <p class='card-text'><strong>Role: </strong>".$row["role"]."</p>
                                        <p class='card-text'><strong>Last login: </strong>".$row["lastlogin"]."</p>
                                    </div>
                                </div>";
                        }?>
                    </div>
                </div>
                <?php
            } else {
                echo "0 results";
            }
            $conn->close();
        }
    ?>
    </div>
</body>
</html> 