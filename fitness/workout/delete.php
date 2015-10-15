<?php
session_start();

  $wkout = $_SESSION['wkout'];
  if($_POST['id'] == "ALL"){
      unset($wkout);
      $_SESSION['wkout'] = $wkout;
      header('Location: ./');
  }else{
      if($_POST) {
        unset($wkout[$_POST['id']]);
        $_SESSION['wkout'] = $wkout;
        header('Location: ./');
      }
      $exer = $wkout[$_REQUEST['id']];
  }
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Workout Log: Delete</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
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
						<li class="active"><a href="index.php">Workouts <span class="glyphicon glyphicon-road"></span></a></li>
						<li class="active"><a href="../food/index.php">Food Intake <span class="glyphicon glyphicon-cutlery"></span></a></li>
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
        <div class="page-header">
          <h1>Workout Log <small>Delete a workout</small></h1>
        </div>
        <form class="form-horizontal" action="" method="post">
          <div class="alert alert-danger alert-block">
            <!--Yay you did it-->
        <?php
            if($_POST['id'] == "ALL"){
                echo "<h3>Are you sure you want to delete ALL workouts?</h3>";
            }else{
                echo "<h3>Are you sure you want to delete ".$exer['Name']."</h3>";
            }
        ?>
            <input type="submit" value="Delete" class="btn btn-danger">
            <input type="hidden" name="id" value="<?=$_REQUEST['id']?>">
          </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  </body>
</html>
