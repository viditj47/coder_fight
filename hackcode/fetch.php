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
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item {% block homeactive  %}{% endblock homeactive %}">
              <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {% block aboutactive  %}{% endblock aboutactive %}">
              <a class="nav-link" href="/about">About</a>
            </li>

             <li class="nav-item {% block blogactive  %}{% endblock blogactive %}">
              <a class="nav-link" href="/blog">Blog</a>
            </li>

            
            <li class="nav-item {% block contactactive  %}{% endblock contactactive %}">
              <a class="nav-link" href="/contact">Contact</a>
            </li>

           
            
          </ul>
        </div>
								
								
								</div >
								<div class="remove"><button><a href="functions.php?action=unfriend_req&id='.$row['id'].' class="req_actionBtn unfriend">Remove</a></button></div>
                            </div>';
}

?>
