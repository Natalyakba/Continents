<?php

require_once 'config/connect.php';

$id_cont = $_GET['id'];
$continent = mysqli_query($connect, "SELECT * FROM continents WHERE id_cont = '$id_cont'");
$continent = mysqli_fetch_assoc($continent);

$hemisphere = mysqli_query($connect, "SELECT hemispheres.name_hem, hemispheres.id_hem 
        FROM hemispheres 
            RIGHT JOIN cont_hem 
                ON hemispheres.id_hem = cont_hem.id_hem 
            RIGHT JOIN continents  
                ON continents.id_cont = cont_hem.id_cont 
            
            WHERE cont_hem.id_cont = '$id_cont'
    ");

$hemisphere = mysqli_fetch_all($hemisphere); //all для массива

$oceans = mysqli_query($connect, "SELECT *
        FROM oceans 
            RIGHT JOIN cont_ocean 
                ON oceans.id_ocean = cont_ocean.id_ocean 
            RIGHT JOIN continents 
                ON continents.id_cont = cont_ocean.id_cont 
                
            WHERE cont_ocean.id_cont = '$id_cont'
    ");
$oceans = mysqli_fetch_all($oceans);

$zone = mysqli_query($connect, "SELECT *
    FROM
    zones RIGHT JOIN cont_zone
        ON zones.id_zone = cont_zone.id_zone
        RIGHT JOIN continents
        ON continents.id_cont = cont_zone.id_cont
        
        WHERE cont_zone.id_cont =  '$id_cont'
    ");
$zone = mysqli_fetch_all($zone);

$comments = mysqli_query($connect, "SELECT * FROM comments WHERE id_cont = '$id_cont'");
$comments = mysqli_fetch_all($comments);

$dopolnenie = mysqli_query($connect, "SELECT * FROM dopolnenie WHERE id_cont = '$id_cont'");
$dopolnenie = mysqli_fetch_all($dopolnenie);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="proba.css">
    <title>Continent</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>

<body>
    <h2>Название континента: <?= $continent['name_cont'] ?></h2>
    <h2>Расположение:</h2>
    <ul>
        <?php
        foreach ($hemisphere as $hemisphere) {
        ?>
            <li><a href="hemisphere.php?id=<?= $hemisphere[1] ?>"><?= $hemisphere[0] ?></a></li>

        <?php
        }
        ?>
    </ul>
    <h2>Площадь:</h2>
    <p><?= $continent['area_cont'] ?></p>
    <h2>Омывается океанами:</h2>
    <ul>
        <?php
        foreach ($oceans as $oceans) {
        ?>

            <li><?= $oceans[1] ?> (площадь: <?= $oceans[3] ?>) <a href="update.php?id=<?= $oceans[0] ?>&idc=<?= $id_cont ?>"><img src="red.png" alt="Правки" width="20" height="20" title="Правки"></a></li>
            <p><?= $oceans[2] ?></p>
        <?php
        }
        ?>
    </ul>

    <h2>Климатическая зона:</h2>
    <ul>
        <?php
        foreach ($zone as $zone) {
        ?>
            <li><?= $zone[1] ?> </li>
            <p><?= $zone[2] ?></p>


        <?php
        }
        ?>
    </ul>


    <h2>Свежая информация:</h2>
    <p><a href="dopolnenie.php?id=<?= $id_cont ?>">[Добавить]</a></p>
    <ul>
        <?php
        foreach ($dopolnenie as $dopolnenie) {
        ?>
            <p><?= $dopolnenie[2] ?><a href="vendor/delete_dop.php?id=<?= $dopolnenie[0] ?>"><img src="del.png" alt="Удаление" width="30" height="15" title="Удаление"></a></p>
        <?php
        }
        ?>
    </ul>

    <h2>Комментарии:</h2>
    <ul>
        <?php
        foreach ($comments as $comment) {
        ?>
            <p><?= $comment[2] ?><a href="vendor/delete_com.php?id=<?= $comment[0] ?>"><img src="del.png" alt="Удаление" width="30" height="15" title="Удаление"></a></p>
        <?php
        }
        ?>
    </ul>

    <!-- <form style="margin-left: 100px;" action="vendor/create_comment.php" method="post">
            <input type="hidden" name="id_cont" value="<?= $id_cont ?>">
            <textarea style="width:80%; height:50px; font-size: 14pt;" name= "body" class="body"></textarea><br>
            <button type="submit" class="otpravka">Добавить комментарий</button>
        </form> -->


    <input type="hidden" name="id_cont" class="id_cont" value="<?= $id_cont ?>">
    <textarea style="width:80%; height:50px; font-size: 14pt;" name="body" class="body"></textarea><br>
    <button type="submit" class="otpravka">Добавить комментарий</button>
    <script>
        $(document).ready(function() {
            $('button.otpravka').on('click', function() {
                var id_cont = $('input.id_cont').val();
                var body = $('textarea.body').val();


                $.ajax({
                        method: "POST",
                        url: "vendor/create_comment.php",
                        data: {
                            id_cont: id_cont,
                            body: body
                        }
                    })
                    .done(function() {
                        //alert( "Data Saved: " + msg );
                    });

                $('input.id_cont').val('');
                $('textarea.body').val('');


            })
        });
    </script>


    <div class="floor">
        <a href="glav.php"><img src="dom.png" alt="На главную страницу кнопка" width="30" height="30" title="На главную страницу"></a>
    </div>


</body>

</html>