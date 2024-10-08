<?php
function get_entity() {
    $jsonString = file_get_contents(__DIR__.'\posts.json');
    $entity_array = json_decode($jsonString, true);
    return $entity_array;
}
function display_entity($entity_array) {
	// MAKE MULTIPLE COLUMNS & MAKE THEM EVEN
	//$half_point = round(count($entity_array)/2);
	//$col_1_array=array_slice($entity_array,0,$half_point);
	//$col_2_array=array_slice($entity_array, $half_point);
    for($i=0;$i<count($entity_array);$i++) { ?>
		<div class="col">
		<div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
			<div class="card-body">
				<h4 class="card-title"><?=$entity_array[$i]['prompt'] ?></h4>
				<h6 class="card-subtitle mb-2 text-muted"><?=$entity_array[$i]['user'] ?></h6>
				<p><a href="detail.php?post_id=<?= $i ?>" class="btn btn-light">Go to prompt</a></p>
			</div>
		</div>
		</div>
	<?php }
	/*
	for($i=0;$i<count($col_2_array);$i++) { ?>
		<div class="card-group">
			<div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
				<div class="card-body">
				<h4 class="card-title"><?=$col_2_array[$i]['prompt'] ?></h4>
				<h6 class="card-subtitle mb-2 text-muted"><?=$col_2_array[$i]['user'] ?></h6>
				<p><a href="detail.php?post_id=<?= $i ?>" class="btn btn-primary">Go to prompt</a></p>
				</div>
			</div>
		</div>
	<?php } */
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prompt Index</title>
	<link rel="stylesheet" href="bootstrap.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>


<body>
  <h1 class="text-center">Welcome to the Prompt Index</h1>
  <div class="container text-center">
  <div class="row">
  <?php 
    $entity_array = get_entity();
    display_entity($entity_array); 
  ?>
  </div>
  </div>
</body>
</html>
