<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
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
          </ul>
        </div>
      </nav>

      <div class="container">
        <h1 style="text-align: center; margin-top: 5rem; margin-bottom: 3rem" class="news-title">
          News Feed
        </h1>
        <hr />
        <br />
        <div class="row">
          <div class="col">
            <div>
              <h4 class="news-title">UTEP Educators See Need to Teach, Understand Mexican-American Studies</h4>
              <p class="text-justify">Recent discussions about schools and statues in the Paso del Norte region named
                after Confederate soldiers and a 16th-century Spanish explorer raised the issue
                of how much Latino history is understood and The University of Texas at El Paso’s
                role in how it is taught. </p>
                <a href="https://www.utep.edu/newsfeed/campus/utep-educators-see-need-to-teach-understand-mexican-american-studies.html">Read More</a>
            </div>
          </div>
          <div class="col">
            <img src="https://www.utep.edu/newsfeed/campus/101220_Hispanic_Heritage_lt_3131.jpg" class="news-pic" alt="news-pic"/>
          </div>
          
          <div class="w-100"></div>
          <hr />
          <br /><br/>
          <div class="col">
            <img src="https://www.utep.edu/newsfeed/campus/OSHA_3.jpg" class="news-pic" alt="news-pic"/>
          </div>
          <div class="col">
          <div>
              <h4 class="news-title">UTEP Awarded Prestigious OSHA Grant to Help Keep Construction Workers Safe</h4>
              <p class="text-justify">The University of Texas at El Paso is one of 80 U.S. institutions awarded a prestigious Susan
                  Harwood federal safety and health training grant from the U.S. Department of Labor’s Occupational
                  Safety and Health Administration (OSHA) to train hard-to-reach Hispanic workers in El Paso and 
                  neighboring areas for the seventh consecutive year.</p>
                <a href="https://www.utep.edu/newsfeed/campus/utep-awarded-prestigious-osha-grant-to-help-keep-construction-workers-safe.html">Read More</a>
            </div>
          </div>
        </div>
      </div>
      <hr />
    </div>
  </body>
</html>
