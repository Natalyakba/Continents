<?php
require_once 'config/connect.php';
?>

<!doctype html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="proba.css">

   <title>Version2.0</title>
   <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>
<style>
   th,
   td {
      padding: 10px;
      color: #d8d3d3;
      border: none;
   }
</style>

<body>

   <table>
      <tr>
         <th></th>
         <th>Континент</th>
         <th></th>
      </tr>
      <tr>
         <?php
         $continents = mysqli_query($connect, "SELECT * FROM continents");
         $continents = mysqli_fetch_all($continents);
         foreach ($continents as $continent) {
         ?>

      </tr>
      <tr>
         <td></td>
         <td><a href="continent.php?id=<?= $continent[0] ?>"><?= $continent[1] ?></td>
         <td></td>

      </tr>
   <?php
         }
   ?>
   </tr>
   </table>

   <?php
   $users = mysqli_query($connect, "SELECT * FROM users");
   $users = mysqli_fetch_assoc($users);
   ?>

   <!-- <form action="vendor/create_users.php" method="post" style="margin-left: 100px;">

        <input type="hidden" name="id" value="<?= $users['id'] ?>">
        <h2>Имя пользователя</h2>
        <input style=" font-size: 14pt;"type="text" name="name_user" >
        <h2>Почта пользователя</h2>
        <input style=" font-size: 14pt;"type="text" name="mail_user">
        <br><br>

        <button type="submit">Добавить меня в рассылку</button>
    </form> -->

   <h2>Заполните данные для оформления подписки</h2>
   <div style="margin-left:80px;">
      <h3>Имя пользователя</h3>
      <input style="font-size: 14pt;" type="text" name="name_user" class="name_user">
      <h3>Почта пользователя</h3>
      <input style="font-size: 14pt;" type="text" name="mail_user" class="mail_user">
      <br><br>
      <button type="submit" class="otpravka">Добавить меня в рассылку</button>
   </div>

   <script>
      $(document).ready(function() {
         $('button.otpravka').on('click', function() {
            var name_user = $('input.name_user').val();
            var mail_user = $('input.mail_user').val();
            $.ajax({
                  method: "POST",
                  url: "vendor/create_users.php",
                  data: {
                     name_user: name_user,
                     mail_user: mail_user
                  }
               })
               .done(function() {
                  alert("Вы добавлены");
               });

            $('input.name_user').val('');
            $('input.mail_user').val('')
         })
      });
   </script>

   <div align="center">
      <a href="index.html"><img src="dom.png" alt="На главную страницу кнопка" width="30" height="30" title="На главную страницу"></a>
   </div>

</body>

</html>