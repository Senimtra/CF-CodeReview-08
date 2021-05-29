<?php
// if session is not set this will redirect to login page
if( !isset($_SESSION['adm']) && !isset ($_SESSION[ 'user']) ) {
   header("Location: ../index.php");
   exit;
  }

if (isset($_SESSION["user"])) {
  $userid = $_SESSION['user'];}
else {
  $userid = $_SESSION['adm'];
}
  $sql = "SELECT * FROM user WHERE pk_userid =".$userid;
  $result = $connect->query($sql);
  $data = $result->fetch_assoc();
  if ($result->num_rows == 1) {
    $user_type = $data['user_type'];
    if($user_type == "block") {
      unset($_SESSION['user'  ]);
    unset($_SESSION['adm' ]);
    session_unset();
    session_destroy();
    header("Location: ../error.php");
    echo 'hello';
    echo $bmessage ="<div class='container p-5'>
    <div class='danger' role='alert'>
      <p>'you have been blocked! Please Go away!'</p>
    </div>";
    exit;
    }
  }