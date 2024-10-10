<?php
session_start();
 $i=$_GET['post_id'];
 
function get_entity() {
    $jsonString = file_get_contents(__DIR__.'\posts.json');
    $entity_array = json_decode($jsonString, true);
    return $entity_array;
}
?>

<html>
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/journal/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</head>
  	<!--This will be the page that displays the one page that the user has clicked on-->
  	
 	<?php
 	$post = get_entity();?>
 	
	<body>
	<div class="container text-center">
		<h2><?=$post[$i]['prompt'];?></h2>
		<h3>
	  	Prompted by:
	  	<small class="text-body-secondary"><?=$post[$i]['author'];?></small>
		</h3>
	 	<h4><br /> <br /> The continuous story starts here: <br /></h4>
	
	 	<?php
		foreach ($post[$i]['story'] as $addition){
			?>
			<div background-color="lightgrey">
			<h6 vertical-align="text-top" text-align="left"><?=$addition['user']."<br />".$addition['date']?></h6>
			<p text-align="center">
			<?=$addition['text']?>
			</p>
			</div>
			<hr>
		<?php	
		}
		?>
	</div>
 	</body>
	<div class="mb-4">
		<a href="index.php" class="btn btn-primary m-4">Back to prompt index</a>
	</div>

	<?php
		if($_SESSION['username']!="guest"){ ?>
			<a href="edit.php?post_id=<?= $i ?>"" class="btn btn-primary m-4">Add To This Story!</a>
	<?php } 
		if($_SESSION['username']==$post[$i]['author']){ ?>
			<a href="delete.php" class="btn btn-primary m-4">Delete Entry</a>
	<?php }?>

</html>
