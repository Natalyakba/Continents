<?php

require_once '../config/connect.php';

$id_cont = $_POST['id_cont'];
$body = $_POST['body'];

mysqli_query($connect, "INSERT INTO `comments` (`id`, `id_cont`, `body`) VALUES (NULL, '$id_cont', '$body')");
