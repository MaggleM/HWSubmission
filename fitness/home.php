<?php
session_start();
    $username = $_POST['Username'];
    $age = $_POST['Age'];
    $_SESSION['username'] = $username;
    $_SESSION['age'] = $age;
    
    if(!$username) {
        $_SESSION['message'] = "Welcome to the fitness tracker!";
    }else{
        $_SESSION['message'] = "Welcome back $username";
    }

    $message = $_SESSION['message'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap Demo</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 70px;
        }
    </style>
  </head>
  <body>
	<div class="container">
	<h1><?=$message?></h1>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="home.php">Home <span class="glyphicon glyphicon-home"></span></a></li>
						<li class="active"><a href="workout/index.php">Workouts <span class="glyphicon glyphicon-road"></span></a></li>
						<li class="active"><a href="food/index.php">Food Intake <span class="glyphicon glyphicon-cutlery"></span></a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#"><span class="glyphicon glyphicon-cog"></span></a></li>
					</ul>
					<form class="navbar-form navbar-right" role="search">
						<div class="form-group">
						    <input type="text" class="form-control" placeholder="Find on our site">
						</div>
						<button type="submit" class="btn btn-default">Search!</button>
					</form>
				</div>
			</div>
		</nav>
		<div id="signin">
    		<h3>Sign in is easy</h3>
    		<form action="home.php" method="POST">
    			<h5>Username</h5>
    			<div class="input-group">
    			  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
    			  <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1" name="Username">
    			</div>
    			
    			<h5>Email address</h5>
    			<div class="input-group">
    			  <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-inbox"></span></span>
    			  <input type="text" class="form-control" placeholder="Your email: (name@email.com)" aria-describedby="basic-addon2" name="Email">
    			</div>
    			
    			<h5>Age</h5>
    			<div class="input-group">
    			  <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-time"></span></span>
    			  <input type="number" class="form-control" placeholder="Age" aria-describedby="basic-addon2" name="Age">
    			</div>
    			
    			<br>
    			<input type="submit" class="btn submit" value="Sign in">
    		</form>
		</div>
		
		<hr>
		
		<div id="wkfoo">
		    <h3>Get Started!</h3>
		    <div class="row">
		        <div class="col-xs-6">
		            <h5>Workouts</h5>
		            <p>
		                Record your workout for today. You will be asked to input the name of the workout, what time
		                you did the workout, how many callories you burned, and how many reps
		                you did.
		            </p>
		            <a href="workout/edit.php"><button type="button" class="btn btn-default">Submit a workout</button></a>
		        </div>
		        <div class="col-xs-6">
		            <h5>Food Intake</h5>
		            <p>
		                Record your meals for today. You will be asked to input the name of your meal, what time you ate
		                , and how many callories you consumed.
		            </p>
		            <a href="food/edit.php"><button type="button" class="btn btn-default">Submit a meal</button></a>
		        </div>
		    </div>
		</div>
		
		<hr>
		
		<div class="alert alert-warning alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Record Frequently!</strong> The easiest way to stay on track is to update your progress regularly!
		</div>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <?php 
            if($username) {
                echo "<script type='text/javascript'>
                $('#signin').hide();
                </script>";
            }
        ?>
  </body>
</html>
