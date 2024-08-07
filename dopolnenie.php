<?php
    require_once 'config/connect.php';
    $id_cont = $_GET['id'];
    
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="proba.css">
        <title>New Information</title>
    </head>
    <body>

    <h2>Добавить новую информацию</h2>

    <style> form { margin-left: 100px;} </style>
    <form action="vendor/create_dopolnenie.php" method="post">
        <input type="hidden" name="id_cont" value="<?= $id_cont ?>">
        <textarea style="width:80%; height:150px; font-size: 14pt;" name="body"></textarea>
        <br><br>
        <button type="submit">Сохранить дополнение</button>
    </form>
        
    </body>
</html>

