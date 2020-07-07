<?php

require 'includes/init.php';

if(isset($_SESSION['user_id']) && isset($_SESSION['email'])){
	
	$user_data = $user_obj->find_user_by_id($_SESSION['user_id']);
	
	if($user_data==false){
		
		header('Location: logout.php');
		exit;
		
	}
	
	$all_users = $user_obj->all_users($_SESSION['user_id']);
}
else{
	
	header('Location: logout.php');
	exit;
	
}
//REQUEST NOTIFICATION NUMBER
$get_req_num = $frnd_obj->request_notification($_SESSION['user_id'],false);
// TOTLA FRIENDS
$get_frnd_num = $frnd_obj->get_all_friends($_SESSION['user_id'], false);
// GET MY($_SESSION['user_id']) ALL FRIENDS
$get_all_friends = $frnd_obj->get_all_friends($_SESSION['user_id'], true);

// TOTAL REQUESTS
$get_req_num = $frnd_obj->request_notification($_SESSION['user_id'], false);

$get_all_req_sender = $frnd_obj->request_notification($_SESSION['user_id'], true);

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style1.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
  
  $(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"fetch.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
  
  </script>

</head>
<body>

<ul>
	<li class="nav">HackCode</li>
 
  <li class="nav">News</li>
  <li class="nav">Contact</li>
  <li style="float:right" ><a href="logout.php" class="nav"><?php echo $user_data->username;?> <i class="fa fa-power-off" style="font-size:17px"></i></a></li>
  
  <li style="float:right" class="nav" onclick="document.getElementById('bellicon').style.display='block'"><i class="fa fa-bell" style="font-size:18px;color:white" ></i><span class="badge badge-primary"><?php $get_req_num ?></span></li>
  
  
  
  
  <li style="float:right" class="nav" ><a  onclick="document.getElementById('invite1').style.display='block'" >
invite</a></li>
</ul>
<!-- pop up the invite box-->

<div id="invite1" class="modal">
  
  <form class="modal-content animate" action="/action_page.php">
        
    

    <div class="container">
      <div style="display:flex"><input type="text" id="search_text" placeholder="Search Username....." name="search"/><button class="search-btn">Search</button> </div>
	  
	   
   <div class="all_users">
            
            <div class="usersWrapper" id="result">
               
                    
					
					
					
				
            </div>
        </div>
	  
	  
    </div>
    
  </form>
  
</div>
<!--/////////////////////bell icon ////////////////////// -->

<div id="bellicon" class="modal">
  
  <form class="modal-content animate" action="/action_page.php">
        
    

    <div class="container" >
      <center><h4>Notifications</h4></center> 
	  
	   <div class="all_users">
            
            <div class="usersWrapper">
               
                    
					
					<?php
                if($get_req_num > 0){
                    foreach($get_all_req_sender as $row){
                        echo '<div class="user_box">
                                <div class="user_img"><img src="profile_images/'.$row->user_image.'" alt="Profile image"></div>
                                <div class="user_info"><span>'.$row->username.'</span>
                                <span><a href="user_profile.php?id='.$row->id.' " class="see_profileBtn">See profile</a></span>
								
								
								</div >
								<div class="remove"><button>Accept</button></div>
                            </div>';
                    }
                }
                else{
                    echo '<h4>There is no request!</h4>';
                }
                ?>
					
				
            </div>
        </div>
	  
    </div>
    
  </form>
  
</div>


<!-- //////////////main body/////////// -->
<div class="container">
	<div class="users-box"><center><h3>All Coder</h3></center>
	
	
	
	
	
   <div class="all_users">
            
            <div class="usersWrapper">
               
                    
					
					<?php
                if($get_frnd_num > 0){
                    foreach($get_all_friends as $row){
                        echo '<div class="user_box">
                                <div class="user_img"><img src="profile_images/'.$row->user_image.'" alt="Profile image"></div>
                                <div class="user_info"><span>'.$row->username.'</span>
                                <span><a href="user_profile.php?id='.$row->id.' " class="see_profileBtn">See profile</a>
								
								
								</div >
								<div class="remove"><button><a href="functions.php?action=unfriend_req&id='.$row->id.' class="req_actionBtn unfriend">Remove</a></button></div>
                            </div>';
                    }
                }
                else{
                    echo '<h4>There is no user!</h4>';
                }
                ?>
					
				
            </div>
        </div>
	</div>
</div>

<script>
// If user clicks anywhere outside of the modal, Modal will close

var modal = document.getElementById('bellicon');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

//If user clicks anywhere outside of the modal, Modal will close
var modal = document.getElementById('invite1');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


</script>
</body>
</html>


