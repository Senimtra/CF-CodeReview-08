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
    nav.shift ul li a {
      position: relative;
      z-index: 1;
    }
  
   

    nav.shift ul li a:after {
      display: block;
      position: absolute;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      margin: auto;
      width: 100%;
      height: 1px;
      content: '.';
      color: transparent;
      background: #34caf7;
      visibility: none;
      opacity: 0;
      z-index: -1;
    }

    /* X-Small devices (portrait phones, less than 576px) */
    @media (max-width: 576px) {


      a {
        font-size: 15px !important;

        z-index: 1 !important;
        display: block;
        position: relative;
        z-index: 1;
        color: wheat !important;
      }

      img {
        width: 30px;

      }

      nav.shift ul li a {
        position: relative;
        z-index: 1;
      }

      nav.shift ul li a:after {
        display: block;
        position: absolute;
        z-index: 1;
      }




      .navSizeTextright {

        font-size: 20px !important;
        position: relative;
        z-index: 6;


      }

      button,
      .navbar-toggler {
        padding: 0px !important;
        font-size: 20px !important;

      }
    }

    /* Medium devices (tablets, less than 992px) */
     @media (max-width: 1024px) {
      a {
        font-size: 15px !important;

        z-index: 1 !important;
        display: block;
        position: relative;

        color: #f59622 !important;
      }

      .navSizeTextright {

        font-size: 10px !important;
        padding: 0;
        color: #f59622 !important;


      }
      .login-wrap {
        border-radius: 5%;
        top: 1rem!important;
        margin: auto;
        max-width: 325px !important;
        min-height: 510px!important;
        position: relative;
        /* background: url(https://i.pinimg.com/564x/eb/65/1a/eb651aa95ce0570434e510f6ce2c41f0.jpg) no-repeat center; */
        box-shadow: 0 12px 15px 0 rgb(180, 172, 165), 0 17px 50px 0 rgba(3, 3, 3, 0.19);
      } 
     .tab{
        font-size: 20px!important;
        
      }
     label{
        font-size: 10px!important;
        
      }
      #user.input {
        padding:5px 10px!important;
        font-size: 10px;
      }
      #pass.input,button{
        padding:5px 10px!important;
        font-size: 10px;
      }
      input.button{
        padding:5px 10px!important;
       
        font-size: 15px;
      }
   
      .label{
       padding: 0px!important;
      }



    } 

    /* Large devices (desktops, less than 1200px) */
    /* @media (max-width: 1199.98px) {
     

    } */
  </style>

  <title>Welcome to ... </title>

</head>

<body>

 <nav class="navbar navbar-expand-lg navbar-expand-md shift navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img class="iconSize" src="https://img.icons8.com/wired/64/000000/omlette.png" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link navStyle active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link navStyle" href="#">How it works</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link navStyle dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item navStyle" href="#">About us</a></li>
              <li><a class="dropdown-item navStyle" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item navStyle" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled navStyle" href="#" tabindex="-1" aria-disabled="true">About Us</a>
          </li>
        </ul>
        <form class="d-flex">
          <div><a class="btn navSizeTextright btn-sm" type="submit" href="login.php?action=signin">Already a member? Sign in.</a></div>
          <div><a class="btn btn-outline-dark navSizeTextright" type="submit" href="login.php?action=signup">Sign Up</a></div>
        </form>
      </div>
    </div>
  </nav>

</body>

</html>