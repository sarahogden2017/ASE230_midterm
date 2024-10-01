<?php
  function get_entity() {
      $jsonString = file_get_contents('posts.json');
      $entity_array = json_decode($jsonString, true);
      return $entity_array;
  }

  function display_entity($entity_array) {
    for($i=0;$i<count($entity_array);$i++) { ?>
      <div class="container border py-3 my-3">
        <h2><?=$entity_array[$i]['title'] ?></h2>
        <p><a href="detail.php?post_id=<?= $i ?>" class="btn btn-info" role="button">Go to entity</a></p>
      </div>
    <?php }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>


<body>
  <h1 class="text-center">Index</h1>
  <?php 
    $entity_array = get_entity();
    display_entity($entity_array); 
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
