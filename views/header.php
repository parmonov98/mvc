<!DOCTYPE html>
<html lang="en">

<head>
    <title>This is a layout for a task game</title>
    <link href="css/task.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
<header><img src="./imgs/banner.png"></header>
    <nav class="nav">
        <ul>
            <li><a href="#">Main</a></li>
            <li><a href="#">Play</a></li>
            <li><a href="/?page=board">Board</a></li>
            <li><a href="#">Result</a></li>
            <?php if(!empty($_COOKIE['user'])) :?>
                <li><a href="/?page=profile&action=logout">Logout</a></li>
            <?php else: ?>
                <li><a href="/?page=login">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <div class="clear"></div>