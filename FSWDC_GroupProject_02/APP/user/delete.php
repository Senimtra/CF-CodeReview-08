<?php

# Delete Page where the Admin can delete user's account
# check for id needed --- unique user id
# summary of user data: with picture, first_name, last_name, email, birthday
# "confirmation page" if the admin wants to delete the user
# button "yes, delete" 
# button "go back" -- redirection to profile.php (for user) & dashboard.php (for admin)

//session_start();
session_start();
require_once '../components/db_connect.php';
require_once '../components/file_upload.php';
require_once '../components/admsession.php';

//initial bootstrap class for the confirmation message
$class = 'd-none';

//the GET method will show the info from the user to be deleted
if ($_GET['id']) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM user WHERE pk_userid = {$id}";
  $result = $connect->query($sql);
  $data = $result->fetch_assoc();
  if ($result->num_rows == 1) {
    $f_name = $data['first_name'];
    $l_name = $data['last_name'];
    $email = $data['email'];
    $birthday = $data['birthday'];
    $picture = $data['picture'];
  }
}

//the POST method will actually delete the user permanently
if ($_POST) {
  $id = $_POST['id'];
  $picture = $_POST['picture'];
  ($picture == "avatar.png") ?: unlink("../pictures/user/$picture");

  $sql = "DELETE FROM user WHERE pk_userid = {$id}";
  $change = "UPDATE recipes SET fk_userid =".$_SESSION['adm'];
  $delete = "DELETE FROM weekplan WHERE fk_userid = {$id}";
  if ( $connect->query($change) === TRUE && $connect->query($delete) === TRUE && $connect->query($sql) === TRUE) {
    $class = "alert alert-success";
    $message = "Successfully Deleted! All of the users recipes got added to your profile 🥷🏻";
    header("refresh:2;url=dashboard.php");
  } else {
    $class = "alert alert-danger";
    $message = "The entry was not deleted due to: <br>" . $connect->error;
  }
  $connect->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- adding CSS, Bootstrap, Fonts & Awesome Icons to file -->
  <?php require_once '../css/CSS_bootst_fonts.php' ?>
  <style>
    <?php include '../css/style.css'; ?>
  </style>

  <title>Delete user</title>
</head>

<body>
  <!-- navbar -->
  <?php require_once '../sections/navbar.php' ?>

  <!-- here is place to display a summary of user's data & to confirm the delete request -->
  <div class="container p-5">
    <div class="<?php echo $class; ?>" role="alert">
      <p><?php echo ($message) ?? ''; ?></p>
    </div>

    <h2>Delete request</h2>

    <table class="table tableColor  table-hover">

      <thead class='table'>



        <th><img class='img-thumbnail rounded-circle' style="height: 100px" src='../pictures/user/<?php echo $picture ?>' alt="<?php echo $f_name ?>"></th>
        <th></th>
        <th></th>
        <th></th>
      </thead>

      <thead class='table  table-light'>
        <th>
          <h5>You have selected the data below:</h5>
        </th>
        <th></th>
        <th></th>
        <th></th>
      </thead>

    
      <thead class='table  table-light'>

        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Date of birth</th>
        </tr>

      </thead class='table  table-light'>

      <tbody>
        <tr>

          <td><?php echo $f_name ?></td>
          <td><?php echo $l_name ?></td>
          <td><?php echo $email ?></td>
          <td><?php echo $birthday ?></td>
        </tr>
      </tbody>

      <thead class='table'>
        <th>
          <h3 class="mb-4">Do you really want to delete this user?</h3>

        </th>
      </thead>

      <form method="post">
      <th><input type="hidden" name="id" value="<?php echo $id ?>" /></th>
      <th><input type="hidden" name="picture" value="<?php echo $picture ?>" /></th>
      <th><button class="btn colorBtn text-danger" type="submit">Yes, delete it!</button></th>
      <th><a href="dashboard.php"><button class="btn colorBtn text-warning" type="button">No, go back!</button></a></th>
    </form>
    </table>

  </div>

  <!-- adding Footer -->
  <?php require_once '../sections/footer.php'; ?>


  <!-- adding JS Bootstrap to file -->
  <?php require_once '../js/JS_bootst.php'; ?>
</body>

</html>