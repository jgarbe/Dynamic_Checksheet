<?php
require_once('inc/startsession.php');
require_once('inc/appvars.php');  
require_once('inc/connectvars.php');
// Start the session
//session_save_path('/home/user/...');
//session_start();
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
  // Clear the error message
  $error_msg = "";

  // If the user isn't logged in, try to log them in
  if (!isset($_SESSION['user_id'])) {
    if (isset($_POST['submit'])) {
      // Connect to the database
      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

      // Grab the user-entered log-in data
      $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
      $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
      //$user_stat = mysqli_real_escape_string($dbc, trim($_POST['status']));
      if (!empty($user_username) && !empty($user_password)) {
        // Look up the username and password in the database if they're active.
        $query = "SELECT user_id, username, status FROM _user WHERE username = '$user_username' AND password = SHA('$user_password') AND status < 3";
        $data = mysqli_query($dbc, $query);

        if (mysqli_num_rows($data) == 1) {
          // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
          $row = mysqli_fetch_array($data);
          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['username'] = $row['username'];
          $_SESSION['status'] = $row['status'];
         // setcookie('user_id', $row['user_id'], time() + (60 * 60 * 1 ));    // expires in 1 hour
         // setcookie('username', $row['username'], time() + (60 * 60 * 1));  // expires in 1 hour
         // setcookie('status', $row['status'], time() + (60 * 60 * 1));  // expires in 1 hour
         $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
          header('Location: ' . $home_url);
        }
        else {
          // The username/password are incorrect so set an error message
          $error_msg = 'Sorry, you must enter a valid username and password to log in, AND you must be activated by an administrator.';
        }
      }
      else {
        // The username/password weren't entered so set an error message
        $error_msg = 'Sorry, you must enter your username and password to log in, AND you must be activated by an administrator.';
      }
    }
  }
    $Title="Login";
 include('inc/title.php');
?>


<?php

 
  // If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
  if (empty($_SESSION['user_id'])) {
    echo '<p class="error">' . $error_msg . '</p>';
?>
<div class="tblcontainer-1">
<div class="tblcontainer-2">
<table class="midtbl"><tr>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
     <td><label for="uname">Username</label><input type="text" id="uname" name="username" value="<?php if (!empty($user_username)) echo $user_username; ?>"></td>
     </tr>
     <tr>
  <td>    Password<input type="password" name="password"></td>
  </tr>
  <tr>
   <td  style="text-align:center;"> <input type="submit" value="Log In" name="submit">

  </form>
  </td>
  </tr>
  </table>
  </div>
  </div>
<?php
  }
  else {

         // $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
         // header('Location: http://checksheet.resqtronics.com');
    // Confirm the successful log-in
    echo('<p>You are logged in as ' . $_SESSION['username'] . '.</p>');
  }


print("</div>\n");

print("<div class=\"push\"></div>  \n");
print("</div>   \n");
print(" <div class=\"footer\"> \n");
include('inc/footer.inc');

print(" </div>   \n");
print("  </body>   \n");
print("  </html>   \n");
?>
