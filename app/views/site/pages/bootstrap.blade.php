
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Grid Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <!-- <link href="../bootstrap/css/bootstrap.css" rel="stylesheet"> -->

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="grid.css" rel="stylesheet">
    <style>
    div{
      background-color: rgba(50,50,50,.1);
      }
      </style>
  </head>
  <body>

   <!-- JavaScript plugins (requires jQuery) -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bs3/js/bootstrap.min.js"></script>

    <!-- Enable responsive features in IE8 with Respond.js (https://github.com/scottjehl/Respond) -->
    <script src="bs3/js/respond.js"></script>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Project name</a>
        <div class="nav-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="nav-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <form class="navbar-form form-inline pull-right">
            <input type="text" placeholder="Email">
            <input type="password" placeholder="Password">
            <button type="submit" class="btn">Sign in</button>
          </form>
        </div><!--/.nav-collapse -->
      </div>
    </div>


    <div class="container">

      <h1>Bootstrap 3 Demo</h1>

      <h2>Bootstrap grids</h2>
      <p class="lead">Basic grid layouts to get you familiar with building within the Bootstrap grid system.</p>

      <h4>Three equal columns</h4>
      <div class="row">
        <div class="col-lg-4">.col-lg-4</div>
        <div class="col-lg-4">.col-lg-4</div>
        <div class="col-lg-4">.col-lg-4</div>
      </div>

      <h4>Three unequal columns</h4>
      <div class="row">
        <div class="col-lg-3">.col-lg-3</div>
        <div class="col-lg-6">.col-lg-6</div>
        <div class="col-lg-3">.col-lg-3</div>
      </div>

      <h4>Two columns</h4>
      <div class="row">
        <div class="col-lg-8">.col-lg-8</div>
        <div class="col-lg-4">.col-lg-4</div>
      </div>

      <h4>Full width, single column</h4>
      <p class="text-warning">No grid classes are necessary for full-width elements.</p>

      <h4>Two columns with two nested columns</h4>
      <div class="row">
        <div class="col-lg-8">
          .col-lg-8
          <div class="row">
            <div class="col-lg-6">.col-lg-6</div>
            <div class="col-lg-6">.col-lg-6</div>
          </div>
        </div>
        <div class="col-lg-4">.col-lg-4</div>
      </div>

      <h4>Mixed: mobile and desktop</h4>
      <div class="row">
        <div class="col-12 col-lg-8">.col-12 .col-lg-8</div>
        <div class="col-6 col-lg-4">.col-6 .col-lg-4</div>
      </div>
      <div class="row">
        <div class="col-6 col-lg-4">.col-6 .col-lg-4</div>
        <div class="col-6 col-lg-4">.col-6 .col-lg-4</div>
        <div class="col-6 col-lg-4">.col-6 .col-lg-4</div>
      </div>
      <div class="row">
        <div class="col-6 col-lg-6">.col-6 .col-lg-6</div>
        <div class="col-6 col-lg-6">.col-6 .col-lg-6</div>
      </div>

      <h4>Mixed: mobile, tablet, and desktop</h4>
      <div class="row">
        <div class="col-12 col-sm-8 col-lg-8">.col-12 .col-lg-8</div>
        <div class="col-6 col-sm-4 col-lg-4">.col-6 .col-lg-4</div>
      </div>
      <div class="row">
        <div class="col-6 col-sm-4 col-lg-4">.col-6 .col-lg-4</div>
        <div class="col-6 col-sm-4 col-lg-4">.col-6 .col-lg-4</div>
        <div class="col-6 col-sm-4 col-lg-4">.col-6 .col-lg-4</div>
      </div>
      <div class="row">
        <div class="col-6 col-sm-6 col-lg-6">.col-6 .col-lg-6</div>
        <div class="col-6 col-sm-6 col-lg-6">.col-6 .col-lg-6</div>
      </div>




      <div class="jumbotron">
        <h1>Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>
      </div>


      <div class="body-content">

        <!-- Example row of columns -->
        <div class="row">
          <div class="col-lg-4">
            <h2>Heading</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
          </div>
          <div class="col-lg-4">
            <h2>Heading</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
         </div>
          <div class="col-lg-4">
            <h2>Heading</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
          </div>
        </div>




    </div> <!-- /container -->

  </body>
</html>
