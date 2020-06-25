<?php
include_once "connection.php";

if(isset($_POST['send'])){
	$name=$_POST['name'];
	$msg = $_POST['msg'];
	$date = date('y-m-d h:i:s');

	$sql_insert = mysqli_query($con,"INSERT INTO message(name,message,date) VALUES('$name','$msg','$date')");
	if($sql_insert){
		echo "<script>alert('message send successfully')</script>";
	}
	else{
		echo mysqli_error($con);
		exit;
	}
}
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
	
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
		
			
					<form method="post">
					  <div class="form-group">
						<label for="exampleInputEmail1">Name</label>
						<input type="text" class="form-control" name = "name" id="exampleInputEmail1" aria-describedby="emailHelp">
						
					  </div>
										   <div class="form-group">
						<label for="exampleFormControlTextarea1">Enter message</label>
						<textarea class="form-control" id="exampleFormControlTextarea1" name="msg" rows="3"></textarea>
					  </div>
										 
					  <button type="submit" class="btn btn-primary" name="send">Submit</button>
					</form>
			
			
			</div>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>