<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Super Page</title>

    <!-- Bootstrap -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">The Page</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Feed <span class="sr-only">(current)</span></a></li>
        <li><a href="#">My Tweets</a></li>
        <ul class="nav navbar-nav navbar-left">
        <li><a href="#">My Profile</a></li>
        
          </ul>
        </li>
      </ul>
        
      </ul>
      <div class="navbar-form navbar-right"><?php print_r($_SESSION); 

      if (isset($_COOKIES)) {
        print_r($_COOKIES); 
      }
      ?>

      	<?php

      		if(isset($_SESSION['logged'])) { ?>

      			<a class='btn btn-default' href='?action=logout'>Logout</a>
      		   	
      		<?php   } else { ?>

      		   	<button type="button" class='btn btn-default' data-toggle='modal' data-target='#myModal'>Login/Signup</button>
      		<?php   }  ?>


      	      
       <!-- <button class="btn btn-default" data-toggle="modal" data-target="#myModal" id="login">Login/Signup</button>-->


        
      </div>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
