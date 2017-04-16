<br><br><hr><br>

<?php
	//require_once('../admin/phpscripts/init.php"');
	//ini_set('display_errors',1);
    //error_reporting(E_ALL);
	
	$tbl = "tel_rec";
	$recQuery = getAll($tbl);

	if(isset($_POST['submit'])) {
		$name = $_POST['rec_name'];
		$type = $_POST['rec_type'];
		$year = $_POST['rec_year'];
		$reason= $_POST['rec_reason'];
		
		$wantMovie = wantMovie($name, $type, $year, $reason);
		
		$message = $wantMovie;
		
	}

?>

<div class="row">
<div class="large-6 small-12 columns">
<h3>Nothing you want to watch?</h3>
<h4>Leave a comment for the name of the movie you desire the most, we would update it soon!</h4>
<?php if(!empty($message)){echo $message;} ?>

    <form action="includes/recMovie.php" method="post" enctype="multipart/form-data">
    
    <label>Movie Name:</label><br>
    <input type="text" name="name" value="">
    <br>
    
    <label>Movie Type:</label><br>
    <input type="text" name="type" value="">
    <br>
    
     <label>Movie Year:</label><br>
    <input type="text" name="year" value="">
    <br>
    
     <label>Reasons:</label><br>
    <input type="text" name="reason" value="">
    <br>
    
    <button >I want to watch</button>
	</form></div>


<div class="large-6 small-12 columns">
<h3>Suggestions?</h3>
<h4>How do you feel about our site? <br>Leave your thoughts here for the imporovements you think we should go for</h4><br>

<?php if(!empty($message)){echo $message;} ?>
<form id="form"  action="index.php" method="post"  enctype="multipart/form-data">

	<label>Your Name:</label><br>
    <input type="text" name="name" value="">
    <br>
    
    <label>Your Thoughts:</label><br>
    <textarea type="text" name="name" value="Suggestions?"></textarea>
    <br> 
    
    <button id="post">Post</button> 
    <button id="clear">Clear</button>
          
</form>
</div></div>
