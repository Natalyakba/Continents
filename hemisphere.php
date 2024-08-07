<?php
    require_once 'config/connect.php';

    $id_hem = $_GET['id'];
    $hemisphere = mysqli_query($connect, "SELECT *FROM hemispheres WHERE id_hem = '$id_hem'");
    $hemisphere = mysqli_fetch_assoc($hemisphere);
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="proba.css">
        <title>Hemisphere</title>
    </head>
    <body>
        <h1><?= $hemisphere['name_hem'] ?></h1> 
        <p><?= $hemisphere['info_hem'] ?></p>
        <div align="center" ><img width="40%" src="<?= $hemisphere['pic_hem'] ?>" alt="hemisphere"></div>

        <div align="center" >
        <a href="glav.php"><img src="dom.png" alt="На главную страницу кнопка" width="30" height="30" title="На главную страницу"></a>
        </div>  
        
    </body>
</html>