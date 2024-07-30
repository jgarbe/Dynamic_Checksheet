 <?php

  // If the session vars aren't set, try to set them with a cookie
  if (!isset($_SESSION['user_id'])) {
    if (isset($_COOKIE['user_id']) && isset($_COOKIE['username']) && isset($_COOKIE['status'])) {
      $_SESSION['user_id'] = $_COOKIE['user_id'];
      $_SESSION['username'] = $_COOKIE['username'];
      $_SESSION['status'] = $_COOKIE['status'];
    }
  }

/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
?>

