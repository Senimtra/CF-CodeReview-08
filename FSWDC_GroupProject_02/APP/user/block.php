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
    $user_type = $data['user_type'];
    if($user_type=='block') {
      $btn_name = 'btn-unblock';
      $btn_action = 'Yes, Unblock!';
    } else {
       $btn_name = 'btn-block';
      $btn_action = 'Yes, Block!';
    }
  }
}

//the POST method will actually delete the user permanently
if(isset($_POST[ 'btn-block'])) {
  $id = $_POST['id'];
  $block = "UPDATE user SET user_type ='block' WHERE pk_userid = {$id}";
  if ( $connect->query($block) === TRUE) {
    $class = "alert alert-success";
    $message = "Successfully Blocked!";
    header("refresh:2;url=dashboard.php");
  } else {
    $class = "alert alert-danger";
    $message = "The entry was not deleted due to: <br>" . $connect->error;
  }
  $connect->close();
}
if(isset($_POST[ 'btn-unblock'])) {
  $id = $_POST['id'];
 $block = "UPDATE user SET user_type ='user' WHERE pk_userid = {$id}";
  if ( $connect->query($block) === TRUE) {
    $class = "alert alert-success";
    $message = "Successfully Blocked!";
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

  <title>Block user</title>
</head>

<body>
  <!-- navbar -->
  <?php require_once '../sections/navbar.php' ?>

  <!-- here is place to display a summary of user's data & to confirm the delete request -->
  <div class="container p-5">
    <div class="<?php echo $class; ?>" role="alert">
      <p><?php echo ($message) ?? ''; ?></p>
    </div>

    <h2>Block request</h2>




    <table class="table tableColor  table-hover">

      <thead class='table'>



        <th><img class='img-thumbnail rounded-circle' style="height: 100px" src='../pictures/user/<?php echo $picture ?>' alt="<?php echo $f_name ?>"></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
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
        <th></th>
        <th></th>
        <th></th>
        <th></th>
      </thead>

    
      <thead class='table  table-light'>

        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th></th>
          <th>Email</th>
          <th></th>
          <th>Date of birth</th>
          <th></th>
          <th></th>
        </tr>

      </thead class='table  table-light'>

      <tbody>
        <tr>

          <td><?php echo $f_name ?></td>
          <td><?php echo $l_name ?></td>
          <th></th>
          <td><?php echo $email ?></td>
          <th></th>
          <th><?php echo $birthday ?></th>
          <th></th>
          <th></th>
        </tr>
      </tbody>

      <thead class='table'>
        <th>
          <h3 class="mb-4">Do you really want to Block this user? They won't be able to access anymore. They can be reactivated later</h3>

        </th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
      </thead>

      <form method="post">
      <thead>
   
      <th><input type="hidden" name="id" value="<?php echo $id ?>" />
  
    <button class="btn  colorBtn text-danger" name='<?=$btn_name?>' type="submit"><?= $btn_action?></button>
      
      <a href="dashboard.php"><button class="btn  colorBtn text-warning btn-block" type="button" >No, go back!</button></a>
      </th>
   
     </thead>
    
     
   
    </form>
    </table>

  </div>

  <!-- adding Footer -->
  <?php require_once '../sections/footer.php'; ?>

  <!-- adding JS Bootstrap to file -->
  <?php require_once '../js/JS_bootst.php'; ?>
</body>

</html>