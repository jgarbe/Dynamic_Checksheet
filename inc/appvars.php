<?php

// Written by Jim Garbe
  // Define application constants
  define('MM_UPLOADPATH', 'configure/images/');
  define('MM_MAXFILESIZE', 2048000);      // 2MB
  define('MM_MAXIMGWIDTH', 2560);        // 
  define('MM_MAXIMGHEIGHT', 1024);       // 
  define('TMP', 'tmp/');
  define('CACHE_DIR', 'tmp/');
  define('MAIL_SERVER', '<your mail domain>'); 
  define('MYSQL_NUM',MYSQLI_NUM);
  
  
  //define('PORTAL', 'http://www.whatever.com/');
  define('PORTAL', '<your page with checksheet link>');    //Landing page outside of checksheet
  define('HOME', '<the HOME of your checksheet>'); //directory where checksheet is installed currently --Dynamic_Checksheet--
  define('THEME', 'css/plaintheme.php');
  
?>
