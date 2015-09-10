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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
		body { 
				padding-top: 70px; 
				background-color: black;
				color: #800000;
			 }
		.navbar {
				background-color: #000066;
			 }
		.nav > li > a {
				background-color: #800000;
			 }
	</style>
  </head>
  <body>
	<div class="container">
	<h1>Welcome to our site!</h1>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Home <span class="glyphicon glyphicon-home"></span></a></li>
						<li class="active"><a href="#">About Us <span class="glyphicon glyphicon-tree-conifer"></span></a></li>
						<li class="active"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Our Music <span class="glyphicon glyphicon-music"></span> <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Bands on Our Label</a></li>
								<li><a href="#">Song Catalogue</a></li>
								<li><a href="#">Release Timeline</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Discover</a></li>
							</ul>
						</li>
						<li class="active"><a href="#">Merchandise <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
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
		<div class="btn-group btn-group-justified" role="group" aria-label="...">
		  <div class="btn-group" role="group">
			<button type="button" class="btn btn-default">On tour</button>
		  </div>
		  <div class="btn-group" role="group">
			<button type="button" class="btn btn-default">In the studio</button>
		  </div>
		  <div class="btn-group" role="group">
			<button type="button" class="btn btn-default">Now in stores</button>
		  </div>
		</div><br>
		<h3>Sign up for our newsletter!</h3>
		<form>
			<h5>Username</h5>
			<div class="input-group">
			  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
			  <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
			</div>
			
			<h5>Email address</h5>
			<div class="input-group">
			  <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-inbox"></span></span>
			  <input type="text" class="form-control" placeholder="Your email: (name@email.com)" aria-describedby="basic-addon2">
			</div>
			
			<h5>Additional Offers</h5>
			<div class="row">
				<div class="col-sm-4">
					<div class="input-group">
					  <span class="input-group-addon">
					    Check for monthly emails &nbsp;
						<input type="checkbox" aria-label="...">
					  </span>
					</div><!-- /input-group -->
				</div>
				<div class="col-sm-4">
					<div class="input-group">
					  <span class="input-group-addon">
					    Email me when something is happening near me &nbsp;
						<input type="checkbox" aria-label="...">
					  </span>
					</div><!-- /input-group -->
				</div>
			</div>
			
			<br>
			<input type="submit" class="btn submit" value="Sign up">
		</form>
		
		<hr>
		<div class="panel panel-danger">
			<div class="panel-heading">Recent events</div>
			<div class="panel-body">
				<p>
					3 September 2015
					<br>
					Show at Cooperstown, NY (Night 3)
				</p>
				<p>
					2 September 2015
					<br>
					Show at Cooperstown, NY (Night 2)
				</p>
				<p>
					1 September 2015
					<br>
					Show at Cooperstown, NY (Night 1)
				</p>
				<br>
				<p>
					24 August 2015
					<br>
					Show at Chicago, IL (Night 3)
				</p>
				<p>
					23 August 2015
					<br>
					Show at Chicago, IL (Night 2)
				</p>
				<p>
					22 August 2015
					<br>
					Show at Chicago, IL (Night 1)
				</p>
			</div>
		</div>
		<h3>Tour Progress</h3>
		<div class="progress">
		  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 35%;">
			<span class="sr-only">60% Complete</span>
		  </div>
		</div>
		<div class="alert alert-warning alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Act Fast!</strong> Only 10 shows left!
		</div>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>