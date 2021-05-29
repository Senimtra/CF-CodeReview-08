<!-- this just copy from login -->

<?php
# Login page -- for admin & users
# if user logged in -- redirected to: 
# admin -- dashboard.php
# user -- user/profile.php OR home.php

# after log-in -- user redirected to:
# admin -- dashboard.php
# user -- user/profile.php OR home.php

session_start(); // start a new session or continues the previous
if ( isset($_SESSION['user']) != "") {
   header("Location: ../home.php" ); // redirects to home.php
}
if (isset($_SESSION[ 'adm' ]) != "") {
   header("Location: dashboard.php"); // redirects to home.php
}

require_once '../components/db_connect.php';
require_once '../components/file_upload.php' ;


// user login 
$error = false;
$email = $password = $emailError = $passError = '';

if (isset($_POST['btn-login'])) {

  // prevent sql injections/ clear user invalid inputs
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // prevent sql injections / clear user invalid inputs

  if (empty($email)) {
    $error = true;
    $emailError = "Please enter your email address.";
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = true;
    $emailError = "Please enter valid email address.";
  }

  if (empty($pass)) {
    $error = true;
    $passError = "Please enter your password.";
  }

  // if there's no error, continue to login
  if (!$error) {

    $password = hash('sha256', $pass); //password hashing with encoding sha256

    $sqlSelect = "SELECT pk_userid, first_name, password, user_type FROM user WHERE email = ? ";
    $stmt = $connect->prepare($sqlSelect);
    $stmt->bind_param("s", $email);
    $work = $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $count = $result->num_rows;
    if ($count == 1 && $row['password'] == $password) {
      if ($row['user_type'] == 'adm') {
        $_SESSION['adm'] = $row['pk_userid'];
        header("Location: dashboard.php");
      } else {
        $_SESSION['user'] = $row['pk_userid'];
        header("Location: ../home.php");
      }
    } else {
      $errMSG = '<p class="alert alert-danger p-2">Incorrect Credentials, Try again...</p>';
    }
  }
}

// user registration 
$error = false;
$first_name = $last_name = $email = $birthday = $pass = $picture = '';
$first_nameError = $last_nameError = $emailError = $dateError = $passError = $picError = '';
if (isset($_POST[ 'btn-signup'])) {

  // sanitize user input to prevent sql injection
  $first_name = trim($_POST['first_name']);

    //trim - strips whitespace (or other characters) from the beginning and end of a string
  $first_name = strip_tags($first_name);

  // strip_tags -- strips HTML and PHP tags from a string

  $first_name = htmlspecialchars($first_name);
  // htmlspecialchars converts special characters to HTML entities
  
  $last_name = trim($_POST['last_name']);
  $last_name = strip_tags($last_name);
  $last_name = htmlspecialchars($last_name);    

  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $birthday = trim($_POST['birthday']);
  $birthday = strip_tags($birthday);
  $birthday = htmlspecialchars($birthday);

  $pass = trim($_POST['password']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  $uploadError = '';
  $picture = file_upload_user($_FILES['picture']);

  // basic first name validation
  if (empty($first_name)) {
      $error = true;
      $first_nameError = "Please enter your first name";
  } else if (strlen($first_name) < 3 ) {
      $error = true;
      $first_nameError = "First name must have at least 3 characters.";
  } else if (!preg_match("/^[a-zA-Z]+$/", $first_name) ) {
      $error = true;
      $first_nameError = "First name must contain only letters and no spaces.";
  }


  // basic last name validation
  if (empty($last_name)) {
    $error = true;
    $last_nameError = "Please enter your last name";
  } else if (strlen($last_name) < 3) {
    $error = true;
    $last_nameError = "Last name must have at least 3 characters.";
  } else if (!preg_match("/^[a-zA-Z]+$/", $last_name)) {
      $error = true;
      $last_nameError = "Last name must contain only letters and no spaces.";
  }
  //basic email validation
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = true;
      $emailError = "Please enter valid email address.";
  }

  //checks if the date input was left empty
  if (empty($birthday)) {
      $error = true;
      $dateError = "Please enter your date of birth.";
  }
  // password validation
  if (empty($pass)) {
      $error = true;
      $passError = "Please enter password.";
  } else if (strlen($pass) < 6 ) {
      $error = true;
      $passError = "Password must have at least 6 characters." ;
  }

  // password hashing for security
  $password = hash('sha256', $pass);
  // if there's no error, continue to signup
  if (!$error) {
    $query = "INSERT INTO user(first_name, last_name, password, birthday, email, picture) VALUES('$first_name', '$last_name', '$password', '$birthday', '$email', '$picture->fileName')";
    $res = mysqli_query($connect, $query);

  if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
    header("refresh:3;url=login.php?action=signin");

  } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..." ;
    $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
    header("refresh:3;url=login.php?action=signup");
    }
  }
}

$connect->close();
# Login page -- for admin & users

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

  <title>Sign-in & Sign-up</title>
</head>

<body>
  <!-- navbar -->
  <?php require_once '../sections/navbar.php' ?>

  <div class="container containerLogin">
    <div class="row text-center">
      <h1 id="title" class="title mt-5">WELCOME BACK</h1>

      <div><img class="ownColor" src="https://img.icons8.com/wired/64/000000/omlette.png" /></div>
    </div>


    <div class="login-wrap">

      <div class="login-html">

        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
        <div class="login-form">

          <!-- Log in -->
          <div class="sign-in-htm">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
              <?php
              if (isset($errMSG)) {
                echo $errMSG;
              }
              ?>

              <div class="group">
                <label for="user" class="label">Username</label>
                <input type="email" autocomplete="off" name="email" class="input" placeholder="Your Email" value="<?php echo $email; ?>" />
                <span class="text-danger"><?php echo $emailError; ?></span>
              </div>

              <div class="group">
                <label for="pass" class="label">Password</label>
                <input name="pass" type="password" class="input pass" placeholder="Your Password" data-type="password">
                <span class="text-danger"><?php echo $passError; ?></span>
              </div>
              <div class="group">

                <!--	<input id="check" type="checkbox" class="check" checked>
              <label for="check"><span class="icon"></span> Keep me Signed in</label></a> -->

              </div>
              <div class="group">
                <input type="submit" name="btn-login" class="button" value="Sign In">
              </div>
              <div class="hr"></div>
              <div class="foot-lnk">
                <!--<a href="#forgot">?</a> -->
              </div>
            </form>
          </div>

          <!-- Sign up -->
          <div class="sign-up-htm">
            <form method="post"  autocomplete="off" enctype="multipart/form-data">
              <?php
                if(isset($errMSG)) { ?> 
                <div class="alert alert-<?php echo $errTyp ?>" >
                  <p><?php echo $errMSG; ?></p>
                  <p><?php echo $uploadError; ?></p>
                </div>
              <?php
                } 
              ;?>

              <div class="group">
                <label for="first_name" class="label">First Name</label>
                <input type="text" name="first_name" class="input form-control" placeholder="First name" maxlength="50" value="<?php echo $first_name ?>" />
                <span class="text-danger"> <?php echo $first_nameError; ?> </span>
              </div>

              <div class="group">
                <label for="last_name" class="label">Last Name</label>
                <input type="text" name="last_name" class="input form-control" placeholder="Last Name" maxlength="50" value="<?php echo $last_name ?>" />
                <span class="text-danger"> <?php echo $last_nameError; ?> </span>
              </div>

              <div class="group">
                <label for="email" class="label">Email</label>
                <input type="email" name="email" id="email" class="input form-control" placeholder="Enter Your Email" data-type="email" onkeyup="emailCheck(this.value)" value="<?php echo $email ?>" />
                <span class="text-danger"> <?php echo $emailError; ?> </span>
                <div id="emailCheckText"></div>
              </div>

              <div class="group">
                <label for="birthday" class="label">Date of birth</label>
                <input class="form-control input" data-type="date" type="date" name="birthday" id="birthday" value="<?php echo $birthday ?>" />
                <span class="text-danger"> <?php echo $dateError; ?> </span>
              </div>

              <div class="group">
                <label for="pass" class="label" aria-label="Upload">Picture</label>
                <input class="input form-control" id="pictureUpload" type="file" name="picture" />
                <span class="text-danger"> <?php echo $picError; ?> </span>
              </div>

              <div class="group">
                <label for="password" class="label">Password</label>
                <input type="password" id="password" name="password" class="input pass form-control" placeholder="Enter Password" maxlength="15" onkeyup="check();" />
                <span class="text-danger"> <?php echo $passError; ?> </span>
              </div>

              <div class="group">
                <label for="password" class="label">Repeat Password</label>
                <input type="password" name="password" class="input pass form-control" placeholder="Enter Password" name="confirm_password" id="confirm_password" onkeyup="check();" />
                <span class="text-danger"> <?php echo $passError; ?> </span>
                <div id="message" class="mt-1 mt-2"></div>
              </div>

              <div class="group">
                <input type="submit" class="button" name="btn-signup" value="Sign Up">
              </div>
            </form>

            <div class="foot-lnk m-3">
              <!--<label for="tab-1">Already Member?</> -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<script>
function getParameterByName(name, url = window.location.href) {
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
  
}
var action=getParameterByName('action');
if (action=='signup'){
  var elem = document.getElementById("tab-2").click();
  
document.getElementById('title').innerHTML='<h1>WELCOME</h1>';
}
// console.log(getParameterByName('action')); 

//email check with AJAX
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
      request.open("GET", "user/email-check.php?q="+e, true);request.onload = function() {
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
                `<p class="text-danger mt-1 mt-2">is already taken. Do you want to <a href="login.php?action=signin" class=" text-decoration-underline text-sm text-danger">log in</a>?</p>
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

var check = function() {
  let pwOne ='';
  let pwTwo ='';

  pwOne = document.getElementById('password').value;
  pwTwo = document.getElementById('confirm_password').value;

  if(pwOne.length == 0 || pwTwo.length == 0) {
    console.log('hi');
    document.getElementById('message').innerHTML = '';
  } else if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').classList.add('text-success');
    document.getElementById('message').classList.remove('text-danger');
    document.getElementById('message').innerHTML = 'matching';
    
  } else if (document.getElementById('password').value !=
    document.getElementById('confirm_password').value){
    document.getElementById('message').classList.add('text-danger');
    document.getElementById('message').classList.remove('text-success');
    document.getElementById('message').innerHTML = 'not matching';
  }
}
</script>

  <!-- adding JS Bootstrap to file -->
  <?php require_once '../js/JS_bootst.php'; ?>


  <!-- Footer Start -->
    <?php require_once '../sections/footer.php'; ?>
  <!-- Footer End -->


</body>

</html>