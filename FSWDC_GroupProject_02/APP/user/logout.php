<?php

  # logout funtionality -- for admin & users -- to be included in the navbar?

  session_start();
  #require_once '../components/sessions.php';

  if( isset($_GET['logout'])) {
    unset($_SESSION['user'  ]);
    unset($_SESSION['adm' ]);
    session_unset();
    session_destroy();
    header("Location: ../index.php");
    exit;
    }
