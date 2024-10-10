<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit();
}

function save_entity($entity) {
    $jsonString = file_get_contents(__DIR__ . '/../posts.json');
    $entity_array = json_decode($jsonString, true);
    $entity_array[] = $entity;
    file_put_contents(__DIR__ . '/../posts.json', json_encode($entity_array));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $entity = [
        'prompt' => $_POST['entity_name'],
        'user' => $_SESSION['username'],
        'text' => $_POST['entity_description']
    ];
    save_entity($entity);
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Entity</title>
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/journal/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Create New Entity</h1>
        <form action="create.php" method="post">
            <div class="form-group">
                <label for="entity_name">Name</label>
                <input type="text" class="form-control" id="entity_name" name="entity_name" required>
            </div>
            <div class="form-group">
                <label for="entity_description">Description</label>
                <textarea class="form-control" id="entity_description" name="entity_description" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</body>
</html>
