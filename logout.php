<?php
  session_start();;
//   print_r($_SESSION);
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['user_id']);
    unset($_SESSION['loggedIn']);
    unset($_SESSION['role']);
    header('location:login.php');
  }

// print_r($_SESSION);

?>