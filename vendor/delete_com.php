<?php

require_once '../config/connect.php';

$id = $_GET['id'];

$id_cont = mysqli_query($connect, "SELECT * FROM comments WHERE `comments`.`id` = '$id'");
$id_cont = mysqli_fetch_assoc($id_cont); 

mysqli_query($connect, "DELETE FROM comments WHERE `comments`.`id` = '$id'");

header('Location: /continent.php?id='.$id_cont['id_cont']);