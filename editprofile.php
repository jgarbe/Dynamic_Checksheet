<?php
   require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
    $Title="Edit Profile";
  require_once('inc/title.php');
?>


<?php
  require_once('inc/appvars.php');
  require_once('inc/connectvars.php');

  // Make sure the user is logged in before going any further.
  if (!isset($_SESSION['user_id'])) {
    echo '<p class="login">Please <a href="login.php">log in</a> to access this page.</p>';
    exit();
  }
  elseif (isset($_SESSION['user_id']) && ($_SESSION['status'] == 3)) {
	echo '<p class="login">You are not active. Please contact an administrator.</p>';
		}	
	else	{
	    echo ' <a href="viewprofile.php">View Profile</a><br />';
	    echo ' <a href="logout.php">Log Out (' . $_SESSION['username'] . ')</a><br />';
	    echo ' <a href="index.php">Home</a><br />';
		if ($_SESSION['status'] == 1) {
	    echo ' <a href="index.php">HOME</a>';
			}
  }

  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
?>
</div>
<?php
  if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
    $first_name = mysqli_real_escape_string($dbc, trim($_POST['firstname']));
    $last_name = mysqli_real_escape_string($dbc, trim($_POST['lastname']));
    $error = false;

   

    // Update the profile data in the database
    if (!$error) {
      if (!empty($first_name) && !empty($last_name))  {
          $query = "UPDATE _user SET first_name = '$first_name', last_name = '$last_name'" .
            " WHERE user_id = '" . $_SESSION['user_id'] . "'";
        }
        mysqli_query($dbc, $query);

        // Confirm success with the user
        echo '<p>Your profile has been successfully updated. Would you like to <a href="viewprofile.php">view your profile</a>?</p>';

        mysqli_close($dbc);
        exit();
      }
      else {
        echo '<p class="error">You must enter all of the profile data.</p>';
      }
    }
  elseif (isset($_POST['chpassword'])) {
    // Grab the profile data from the POST
    $opassword = mysqli_real_escape_string($dbc, trim($_POST['opassword']));
    $npassword = mysqli_real_escape_string($dbc, trim($_POST['npassword']));
    $cpassword = mysqli_real_escape_string($dbc, trim($_POST['cpassword']));
	$error = false;


    // Update the profile data in the database
    if (!$error) {

        // Look up the password in the database.
        $query = "SELECT password FROM _user WHERE user_id = ".$_SESSION['user_id']." AND password = SHA('$opassword')";
        $data = mysqli_query($dbc, $query);

        if (mysqli_num_rows($data) == 1) {
          // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page


      if (!empty($npassword) && !empty($cpassword) && ($cpassword ==$npassword ) ) {
          $query = "UPDATE _user SET password = SHA('$npassword')" .
            " WHERE user_id = '" . $_SESSION['user_id'] . "'";
        
        mysqli_query($dbc, $query);
	}
	else { 
        echo '<p class="error">Your new passwords do not match. </p>';
				
		}
        // Confirm success with the user
        echo '<p>Your password has been successfully updated. Would you like to <a href="viewprofile.php">view your profile</a>?</p>';

        mysqli_close($dbc);
        exit();
		}
			else { 
        echo '<p class="error">Your old password is not correct. </p>';
				}
      }
      else {
        echo '<p class="error">You must fill in all of the password data. </p>';
      }
    }
   // End of check for form submission
  else {
    // Grab the profile data from the database
    $query = "SELECT first_name, last_name FROM _user WHERE user_id = '" . $_SESSION['user_id'] . "'";
    $data = mysqli_query($dbc, $query);
    $row = mysqli_fetch_array($data);

    if ($row != NULL) {
      $first_name = $row['first_name'];
      $last_name = $row['last_name'];
    }
    else {
      echo '<p class="error">There was a problem accessing your profile.</p>';
    }
  }

  mysqli_close($dbc);
?>

  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MM_MAXFILESIZE; ?>" />
    <fieldset>
      <legend>Personal Information</legend>
      <label for="firstname">First name:</label>
      <input type="text" id="firstname" name="firstname" value="<?php if (!empty($first_name)) echo $first_name; ?>" /><br />
      <label for="lastname">Last name:</label>
      <input type="text" id="lastname" name="lastname" value="<?php if (!empty($last_name)) echo $last_name; ?>" /><br />

    </fieldset>
    <input type="submit" value="Save Profile" name="submit" />
  </form>
  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MM_MAXFILESIZE; ?>" />
    <fieldset>
      <legend>Change Password</legend>
      <label for="opassword">Old Password:</label>
      <input type="password" id="opassword" name="opassword" /><br />
      <label for="npassword">New Password:</label>
      <input type="password" id="npassword" name="npassword" /><br />
      <label for="cpassword">Confirm Password:</label>
      <input type="password" id="cpassword" name="cpassword" /><br />

    </fieldset>
    <input type="submit" value="Change Password" name="chpassword" />
  </form>
</body> 
</html>
