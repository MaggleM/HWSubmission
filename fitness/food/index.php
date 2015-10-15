<?php
session_start();
    $username = $_SESSION['username'];
    $age = $_SESSION['age'];
    $message = "Here is the food intake so far for $username";
    
    $person = array( 'Name' => $username, 'Age' => $age, CallorieGoal => 2000);
    
    $food = $_SESSION['food'];
    
    $total = 0;
    if(count($food) != 0){
        foreach ($food as $meal) {
            $total += $meal['Callories'];
        }
    }
    
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Food Intake</title>

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
            <h1>Food Intake</h1>
            <h2><?=$message?></h2>
        <?php
            
            if($person['CallorieGoal'] == $total){
                echo "<div class='alert alert-success'>
                        <button type='button' class='close' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                        <b>Good Job!</b> You've met your goal!
                      </div>";
            }
        ?>
            <div class="panel panel-success">
                <div class="panel-heading">Your data</div>
                <div class="panel-body">
                    <dl class="dl-horizontal">
                        <dt>Name</dt>
                        <dd><?=$person['Name']?></dd>
                        <dt>Age</dt>
                        <dd><?=$person['Age']?></dd>
                        <dt>Goal</dt>
                        <dd><?=$person['CallorieGoal']?></dd>
                        <dt>Today's Intake</dt>
                        <dd><?=$total?></dd>
                    </dl>
                </div>
            </div>
      <div class="row">
        <div class="col-md-8 col-xs-10">
            <a href="edit.php" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i>
                New Record
            </a>
            <a href="delete.php?id=ALL" class="btn btn-danger">
                <i class="glyphicon glyphicon-trash"></i>
                Delete All
                <span class="badge"><?=count($food)?></span>
            </a>
            <table class="table table-condensed table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Time</th>
                  <th>Callories</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                    if(count($food) != 0){
                      foreach($food as $i => $meal):
                  ?>
                <tr>
                  <th scope="row">
                    <div class="btn-group" role="group" aria-label="...">
                      <a href="view.php?id=<?=$i?>" title="View" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
                      <a href="edit.php?id=<?=$i?>" title="Edit" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                      <a href="delete.php?id=<?=$i?>" title="Delete" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                    </div>
                  </th>
                  <td><?=$meal['Name']?></td>
                  <td><?=date("M d Y h:i:sa"), $meal['Time']?></td>
                  <td><?=$meal['Callories']?></td>
                </tr>
                  <?php
                      endforeach;
                    }
                  ?>
              </tbody>
            </table>  
          
        </div>
      </div>
      
            
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
  </body>
  
  
</html>
