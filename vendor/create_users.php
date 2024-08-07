<?php
require_once '../config/connect.php';

$name_user = $_POST['name_user'];
$mail_user = $_POST['mail_user'];

mysqli_query($connect, "INSERT INTO `users` (`id`, `name_user`, `mail_user`) VALUES (NULL, '$name_user', '$mail_user')");

