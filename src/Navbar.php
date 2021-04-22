<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</head>
	<div class = "container">
		<div class = "jumbotron">
			<h2>Lucid Shop (Insert some stock Image here)</h2>
		</div>
	</div>
	<div class = "container">
		<nav class="navbar navbar-default">
  			<div class="container-fluid">

  				<a class="navbar-brand" href="Index.php"> Lucid Shop </a>

  				<form class="navbar-form navbar-left">
  					<div class="form-group">
  						<input type="text" class="form-control" placeholder="Search">
  					</div>
  					<button type="submit" class="btn btn-default"> Submit </button>
  				</form>
  				
  				<ul class = "nav navbar-nav navbar-right">
  					<li> 
  						<a> Welcome 
                <?php
                  if(isset($_COOKIE["user"])){
                    echo $_COOKIE["user"];
                  } else {
                    echo "Guest";
                  }
                ?>    
              </a>
  						
  					</li>
  					<li><a href="Login.php"> Login </a></li>
  					<li><a href="SignUp.php"> Sign Up </a></li>
  					<li><a href="#">Log Out</a></li>
  				</ul>


  			</div>
  		</nav>
	</div>
<body>
</body>
</html>