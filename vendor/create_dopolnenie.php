<?php

require_once '../config/connect.php';

$id_cont = $_POST['id_cont'];
$body = $_POST['body'];

print_r($id_cont);

mysqli_query($connect, "INSERT INTO `dopolnenie` (`id`, `id_cont`, `body`) VALUES (NULL, '$id_cont', '$body')");

header('Location: /continent.php?id='.$id_cont);
