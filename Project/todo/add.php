<?php

require_once('init.php');
$user = $_SESSION['user_id'];
if (isset($_POST['submit'])) {
    $task = $_POST['newItem'];
    $sql = "INSERT INTO items (done, description, user) VALUES (0, '$task', '$user')";
    if (!$sql) {
        printf("Error: %s\n", mysqli_error($db));
        exit();
    }
    mysqli_query($db, $sql);
    header('location:index.php');
}
else{
    printf("Error: ");
}
?>