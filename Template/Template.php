<?php
   include("CheckSession.php");
?>
	<style>
        footer{
        	clear:both;
        }
  </style>

	<link href="AWSsite/main.css" rel="stylesheet" type="text/css" /> 
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		
	</head>

	<body>
		<header class="navbar-inverse" role="banner">
		<div class="container">
			
			  <nav role="navigation">
			  <!-- <div class="container-fluid"> -->
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" >
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="../index.php"><?php echo("Welcome"." ".$_SESSION['username']);?></a>

			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <li><a href="../LoopingGame/MinionPage.php">JS Game <span class="sr-only">(current)</span></a></li>
			        <li><a href="../SiteVisitors/SiteVisitors.php">Number of Visitors</a></li>
			      </ul>
			      <!-- <form class="navbar-form navbar-left">
			        <div class="form-group">
			          <input type="text" class="form-control" placeholder="Search">
			        </div>
			        <button type="submit" class="btn btn-default">Submit</button>
			      </form> -->
			      <ul class="nav navbar-nav navbar-right">
			        <li><a href="#">About Creator</a></li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="../Login/ChangePassword.php">change password</a></li>
			            <li><a href="../Login/ChangeUsername.php">change username</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="../Login/signout.php">sign out</a></li>
			          </ul>
			        </li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
		
		</div>
	</header>


		

		