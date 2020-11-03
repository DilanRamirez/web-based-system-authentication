<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./src/scss/main.css" />
    <title>Document</title>
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
                        <a class="nav-link" href="./mainpage.php">Main</a>
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

        $userCard = "<div class='card' style='width: 18rem;'>
                        <img class='card-img-top' src='' alt='Card image cap'>
                        <div class='card-body'>
                        <h5 class='card-title'>".$row["firstname"].$row["lastname"]."</h5>
                        <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href='#' class='btn btn-primary'>Go somewhere</a>
                        </div>
                    </div>";
                    
        require_once 'db-config.php';

        session_start();
        // echo "<h3> PHP List All Session Variables</h3>";
        // foreach ($_SESSION as $key=>$val)
        // echo $key." ".$val."<br/>";

        if($_SESSION["role"] !== 'admin') {
            header("location: forbidden.php");
        }
        if ($conn->connect_error) die("Fatal Error");

        $query  = "SELECT * FROM users";
        $result = $conn->query($query);
        if (!$result) die("Fatal Error");

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
    ?>
    </div>
</body>
</html> 