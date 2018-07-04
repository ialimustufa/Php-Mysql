<?php
require_once('init.php');   
if (isset($_GET['task'])) {
	$id = $_GET['task'];
	$sql = mysqli_query($db, "UPDATE items SET done=1 WHERE id=".$id);
    if (!$sql) {
        printf("Error: %s\n", mysqli_error($db));
        exit();
    }
    mysqli_query($db, $sql);
	header('location: index.php');
}

?>