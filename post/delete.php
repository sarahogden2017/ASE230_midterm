<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit();
}

function delete_entity($id) {
    $jsonString = file_get_contents(__DIR__ . '/../posts.json');
    $entity_array = json_decode($jsonString, true);
    unset($entity_array[$id]);
    file_put_contents(__DIR__ . '/../posts.json', json_encode(array_values($entity_array)));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $entity_id = $_POST['id'];
    $jsonString = file_get_contents(__DIR__ . '/../posts.json');
    $entity_array = json_decode($jsonString, true);

    if ($_SESSION['username'] == $entity_array[$entity_id]['author']) {
        delete_entity($entity_id);
        header('Location: index.php');
        exit();
    } else {
        echo "You do not have permission to delete this post.";
    }
} else {
    echo "Invalid request.";
}
?>
