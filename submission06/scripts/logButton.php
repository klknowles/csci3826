<?php
/*logButton.php
  Displays either the login or logout button based on the session.
*/

$logged_in = isset($_SESSION['customer_id']);
if ($logged_in)
{
  echo '<a class="w3-button w3-teal w3-round w3-small"
       href="pages/logout.php">Click here to log out</a>';
}
else
{
  echo '<a class="w3-button w3-teal w3-round w3-small"
       href="pages/formLogin.php">Click here to log in</a>';
}
