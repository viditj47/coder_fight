<?php

	include_once "connection.php";

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <!--********************************************************* -->
	
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container">
	
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
	
	
	<?php
	
		$sql_get = mysqli_query($con, "SELECT * FROM message WHERE status=0");
		$count = mysqli_num_rows($sql_get);
	
	?>
	
	
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-bell" style="font-size:24px"></i><span class="badge badge-primary"><?php echo $count; ?></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			<?php
				$sql_get1 = mysqli_query($con, "SELECT * FROM message WHERE status=0");
				if(mysqli_num_rows($sql_get1)>0){
					
					while($result = mysqli_fetch_assoc($sql_get1)){
						echo '<a class="dropdown-item text-primary" href="#">'.$result['message'].'</a>';
						echo '<div class="dropdown-divider"></div>';

					}
					
				}
				else{
					echo '<a class="dropdown-item text-danger font-weight-bold" href="#">Sorry! No mssage here</a>';
				}
			?>
          
          
        </div>
      </li>
      
    </ul>
  
  </div>
  </div>
</nav>
	

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>