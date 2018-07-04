<?php
    require_once('init.php');
    $user = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            To-do List
        </title>
        <link href="style.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container">
            <center><h1 id="head">To Do List</h1></center>
            <ul class="items">
                <?php 
                    $tasks = mysqli_query($db, "SELECT * FROM items WHERE USER='$user'");
                    if (!$tasks) {
                        printf("Error: %s\n", mysqli_error($db));
                        exit();
                    }
                    $rowcount=mysqli_num_rows($tasks);
                    if($rowcount == 0){
                        ?><p>The List is Empty</p><?php
                    }
                    while ($row = mysqli_fetch_array($tasks)) { ?>
                <li>
                    <span class="item<?php echo $row['done'] ? ' done' : '' ?>"><?php echo $row['description']?></span>
                    <?php if(!$row['done']){?>
                    <a href="done.php?task=<?php echo $row['id'] ?>" class="done-button">Done</a>
                    <?php } ?>
                    <span class="delete">
                        <a href="del.php?task=<?php echo $row['id'] ?>">X</a>
                    </span>
                </li>
                <?php } ?>
            </ul>
            <form action="add.php" method="post" class="item-add">
                <input type="text" name="newItem" class="input" placeholder="Add a new task" autocomplete="off" autofocus required/>
                <input type="submit" class="submit" value="Add" name="submit"/>
            </form>
        </div>
    </body>
</html>