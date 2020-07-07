<?php 

//Artworks of scanhead HNU 2017
require 'includes/init.php';// create a new object, class_db()

//$conn = $mydb->connect();

if(isset($_POST["query"])){
	
	$q = $_POST["query"];
	
	$results = $db_connection->prepare("SELECT * FROM users WHERE username LIKE '%".$q."%' ");
	
}
else{
	$results = $db_connection->prepare("SELECT * FROM users"); 
}

$results->execute();
	
while($row = $results->fetch(PDO::FETCH_ASSOC))
{
	echo '<div class="user_box">
                                <div class="user_img"><img src="profile_images/'.$row['user_image'].'" alt="Profile image"></div>
                                <div class="user_info"><span>'.$row['username'].'</span>
                                <span><a href="user_profile.php?id='.$row['id'].' " class="see_profileBtn">See profile</a>
								
								
								</div >
								<div class="remove"><button><a href="functions.php?action=unfriend_req&id='.$row['id'].' class="req_actionBtn unfriend">Remove</a></button></div>
                            </div>';
}

?>