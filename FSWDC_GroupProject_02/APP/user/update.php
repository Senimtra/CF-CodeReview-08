<?php

  # User Update page -- here a user can edit his/her account
    # also admin has the rights to edit a users' page
    # security check for id needed --- unique user id -- user can't access other users' profiles
    # Admin can block a user
    # button "go back" -- redirection to profile.php (for user) & dashboard.php (for admin)

  session_start();
  require_once '../components/db_connect.php';
  require_once '../components/file_upload.php';
  require_once '../components/sessions.php';


  $backBtn = '';
  //if it is a user it will create a back button to home.php
  if(isset($_SESSION["user"])){
      $backBtn = "profile.php";    
  }
  //if it is a adm it will create a back button to dashboard.php
  if(isset($_SESSION["adm"])){
      $backBtn = "dashboard.php";    
  }
  if(isset($_SESSION["user"])){
      $session = $_SESSION["user"];
  }else {
      $session = $_SESSION["adm"];
  }
  $sql = "SELECT * FROM user WHERE pk_userid = {$session}";
  $result = mysqli_query($connect, $sql);
  $row = $result->fetch_assoc();
  //var_dump($row);


  //fetch and populate form
  if($row["user_type"] == "adm"){
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $sql = "SELECT * FROM user WHERE pk_userid = {$id}";
      $result = $connect->query($sql);
      if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
        $f_name = $data['first_name'];
        $l_name = $data['last_name'];
        $email = $data['email'];
        $birthday = $data['birthday'];
        $picture = $data['picture'];
      }  
    }
  } else {
    $id = $_SESSION["user"];
    $sql = "SELECT * FROM user WHERE pk_userid = {$id}";
    $result = $connect->query($sql);
    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
        $f_name = $data['first_name'];
        $l_name = $data['last_name'];
        $email = $data['email'];
        $birthday = $data['birthday'];
        $picture = $data['picture'];
    }   
  }
  
  //update
  $class = 'd-none';
  if (isset($_POST["submit" ])) {
    $f_name = $_POST['first_name'];
    $l_name = $_POST['last_name' ];
    $email = $_POST[ 'email'];
    $birthday = $_POST['birthday'];
    $id = $_POST['id']; # $_SESSION["user"];

  //variable for upload pictures errors is initialized
  $uploadError = '';    
  $pictureArray = file_upload_user($_FILES['picture']); //file_upload() called
  $picture = $pictureArray->fileName;
  if ($pictureArray->error === 0) {
    ($_POST[ "picture"] == "avatar.png") ?: unlink("../pictures/user/{$_POST["picture"]}");
    $sql = "UPDATE user SET first_name = '$f_name', last_name = '$l_name', email = '$email',  birthday='$birthday', picture = '$pictureArray->fileName' WHERE pk_userid = {$id}";
  } else {
    $sql = "UPDATE user SET first_name = '$f_name', last_name = '$l_name', email = '$email', birthday='$birthday' WHERE pk_userid = {$id}";
  }
  
  if ($connect->query($sql) === true) {
    $class = "alert alert-success";
    $message = "The record was successfully updated";
    $uploadError = ($pictureArray->error != 0) ? $pictureArray->ErrorMessage : '';
    header("refresh:3;url=update.php?id={$id}");
  } else {
    $class = "alert alert-danger";
    $message = "Error while updating record : <br>" . $connect->error;
    $uploadError = ($pictureArray->error != 0) ? $pictureArray->ErrorMessage : '';
    header("refresh:3;url=update.php?id={$id}");
    }
  }
    
    
  $connect->close();
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

  <title>Update profile</title>
</head>
<body>
  <!-- navbar -->
  <?php require_once '../sections/navbar.php' ?>
  
  <!-- here is place to display a form with user's data -->
  <div class="container p-5">
    <div class="<?php echo $class; ?>" role="alert">
       <p><?php echo ($message) ?? ''; ?></p>
        <p><?php echo ($uploadError) ?? ''; ?></p>       
    </div>
    <h2 class="h2">Edit Account</h2>

   

    <form method="post" enctype="multipart/form-data">
   
    <table class="table tableColor table-hover">

     <th><img class='img-thumbnail rounded-circle' style="height: 100px" src='../pictures/user/<?php echo $data['picture'] ?>' alt="<?php echo $f_name ?>"></th>
      <tr>
        <th>First Name</th>
        <td><input class="form-control" type="text" name ="first_name" placeholder="First Name" value="<?php echo $f_name ?>" /></td>
      </tr>
      <tr>
        <th>Last Name</th>
        <td><input class= "form-control" type= "text" name="last_name" placeholder="Last Name" value="<?php echo $l_name ?>" /></td>
      </tr>
      <tr>
        <th>Email</th>
        <td><input class ="form-control" id="email" type="email" name="email" placeholder="Email" onkeyup="emailCheck(this.value)" value="<?php echo $email ?>" /></td>
        <div id="emailCheckText"></div>
      </tr>
      <tr>
        <th>Date of birth</th>
        <td><input class="form-control" type="date" name="birthday" placeholder="Date of birth" value="<?php echo $birthday ?>" /></td>
      </tr>
      <tr>
        <th>Picture</th>
        <td><input class="form-control" type="file" name="picture" /></td>
      </tr>
      <tr>
        <input type="hidden" name="id" value="<?php echo $data['pk_userid'] ?>" />
        <input type="hidden" name="picture" value="<?php echo $picture ?>" />
        <td><button name="submit" class="btn colorBtn" type="submit">Save Changes</button></td>
        <td><a href="<?php echo $backBtn?>"><button class="btn colorBtn text-warning" type="button">Back</button></a></td>
      </tr>
    </table>

    </form>

  </div>

  <!-- adding Footer -->
  <?php require_once '../sections/footer.php'; ?>

  <!-- adding JS Bootstrap to file -->
  <?php require_once '../js/JS_bootst.php'; ?>

  <script>
    function emailCheck(e) {
      //console.log(e);
      let output = '';
      let email = '';
      if(e.length == 0) {
        document.getElementById('emailCheckText').innerHTML = "";
        return;
      }
      else {
        let request = new XMLHttpRequest();
        // console.log('request works');
        request.open("GET", "email-check.php?q="+e, true);
        request.onload = function() {
          if (this.status == 200) {
            // console.log('status 200 -- everything works');
            //console.log(this.responseText);

            let emails = JSON.parse(this.responseText);
            //console.log(emails);
            console.log(e);
            if (Array.isArray(emails)) {
              for (let i = 0; i < emails.length; i++) {
                email = emails[i]['email'];
                //console.log(email);
                if(e == email) {
                  document.getElementById("emailCheckText").innerHTML =
                  `<p class="text-danger">There is already an account registered as ${email}. Please choose another email address.</p>
                  `;
                } else{
                  document.getElementById("emailCheckText").innerHTML = '';
                }
              }    
            }
          }
        };
        request.send();
      }
    }
  </script>
</body>
</html>