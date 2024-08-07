<?php
    require_once 'config/connect.php';

    $id_ocean = $_GET['id'];
    $id_cont = $_GET['idc'];
    $oceans = mysqli_query($connect, "SELECT * FROM oceans WHERE id_ocean = $id_ocean");
    $oceans = mysqli_fetch_assoc($oceans);
?>

<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="proba.css">
   <title>Update</title>
</head>
<body>
    <h2>Изменить информацию</h2>
    <form action="vendor/update_oceans.php" method="post" style="margin-left: 100px;">

        <input type="hidden" name="id_ocean" value="<?= $id_ocean?>">
        <input type="hidden" name="id_cont" value="<?= $id_cont?>">
        <h2>Название океана</h2>
        <input style=" font-size: 14pt;"type="text" name="name_ocean" value=" <?= $oceans['name_ocean'] ?>">
        <h2>Информация об океане</h2>
        <textarea style="width:80%; height:200px; font-size: 14pt;" name="info_ocean"><?= $oceans['info_ocean'] ?> </textarea>
        <h2>Площадь океана</h2>
        <input style=" font-size: 14pt;"type="text" name="area_ocean" value=" <?= $oceans['area_ocean'] ?>">
        <br><br>

        <button type="submit">Внести правки</button>
    </form>
</body>
</html>


