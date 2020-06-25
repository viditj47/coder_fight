<?phpinclude_once "connection.php";?>
<?php 
	if(isset($_GET['id'])){
		$main_id = $_GET['id'];
		$sql_update = mysqli_query($con, "UPDATE message SET status=1 WHERE id='$main_id' ");
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
			
			<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">Name</th>
      <th scope="col">Message</th>
      <th scope="col">Date</th>
	  <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php
	$sr_no=1;
    $sql_get = mysqli_query($con,"ELECT * FROM message WHERE status=1"); 
	while($main_result = mysqli_fetch_assoc($sql_get))
  ?>
    <tr>
      <th scope="row"><?php $sr_no++; ?></th>
      <td><?php echo $main_result['name']; ?></td>
      <td><?php echo $main_result['message']; ?></td>
      <td><?php echo $main_result['date']; ?></td>
    </tr>
	<?php endwhile ?>
		</tbody>
		</table>
		</div>
	</div>

	

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>