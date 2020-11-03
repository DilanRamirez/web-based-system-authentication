<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
        <a class="navbar-brand">System Authentication</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="./index.html"
                >Home <span class="sr-only">(current)</span></a
              >
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
          </ul>
        </div>
      </nav>

      <div class="container-home">
        <img
          src="https://ouch-cdn.icons8.com/preview/476/c28972cc-3bcd-444e-9908-eac6a233f1ac.png"
          class="home-pic"
        />

        <h3 class="text-center home-sigIn">
          <a href="./signin.php">Sign In here!</a>
        </h3>
      </div>
    </div>
  </body>
</html>
