<?php
session_start();
    $username = $_SESSION['username'];
    $message = "Here is $username's selected meal";
    
    $food = $_SESSION['food'];
    if($_POST) {
        $food[] = $_POST;
        $_SESSION['food'] = $food;
        header('Location: ./');
    }
  
  if(isset($_GET['id'])) {
    $meal = $food[$_GET['id']];
  }
    
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Food Intake: View</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 70px;
        }
    </style>
  </head>
  <body>
    <div class="container">
        <nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="../home.php">Home <span class="glyphicon glyphicon-home"></span></a></li>
						<li class="active"><a href="../workout/index.php">Workouts <span class="glyphicon glyphicon-road"></span></a></li>
						<li class="active"><a href="index.php">Food Intake <span class="glyphicon glyphicon-cutlery"></span></a></li>
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
            <h1>Food Intake: View</h1>
            <h2><?=$message?></h2>
            <div class="panel panel-success">
                <div class="panel-heading">Your data</div>
                <div class="panel-body">
                    <dl class="dl-horizontal">
                        <dt>Name</dt>
                        <dd><?=$meal['Name']?></dd>
                        <dt>Time</dt>
                        <dd><?=$meal['Time']?></dd>
                        <dt>Callories</dt>
                        <dd><?=$meal['Callories']?></dd>
                    </dl>
                </div>
            </div>
            <a href="index.php"><button type="button" class="btn btn-success">Go back</button></a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
  </body>
  
  
</html>
