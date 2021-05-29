<!-- error page -- for admin & users
    when something goes wrong -- the user/admin will be redirected to this page -->
<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- adding CSS, Bootstrap, Fonts & Awesome Icons to file -->
  <?php require_once 'css/CSS_bootst_fonts.php' ?>
  <style>
    <?php include 'css/style.css'; ?>
  </style>

  <title>Error. Upps, something went wrong!</title>
</head>
<body>
  <!-- here is place to display an error message -->

<h1>Something went wrong - You are not allowed to enter this page!</h1>

  <!-- adding JS Bootstrap to file -->
  <?php require_once 'js/JS_bootst.php'; ?>
</body>
</html>