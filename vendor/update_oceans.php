<?php
require_once '../config/connect.php';

$id_ocean = $_POST['id_ocean'];
$id_cont = $_POST['id_cont'];
$name_ocean = $_POST['name_ocean'];
$info_ocean = $_POST['info_ocean'];
$area_ocean = $_POST['area_ocean'];

mysqli_query($connect, "UPDATE `oceans` SET `name_ocean` = '$name_ocean', `info_ocean` = '$info_ocean',`area_ocean` = '$area_ocean' WHERE `oceans`.`id_ocean` = '$id_ocean'");

header('Location: /continent.php?id='.$id_cont);

//mysqli_query($connect, "UPDATE `oceans` SET `name_ocean` = '$name_ocean' WHERE `oceans`.`id_ocean` = 1");

