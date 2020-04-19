<?php
/*welcome.php
A script for generating the welcome message.
*/

  // NOTE(nclowes): If a script requires the $_SESSION array, why
  //   not add a conditional statement to ensure that it is set each
  //   time the dependent script runs?
  if (session_status() !== PHP_SESSION_ACTIVE)
  {
    session_start();
  }

  $logged_in = isset($_SESSION['customer_id']) ? true : false;
  if (isset($_SESSION['customer_id']))
  {
    $customer_id = $_SESSION['customer_id'];
  }
  if (isset($_SESSION['salutation']))
  {
    $salutation = $_SESSION['salutation'];
  }
  if (isset($_SESSION['customer_first_name']))
  {
    $customer_first_name = $_SESSION['customer_first_name'];
  }
  if (isset($_SESSION['customer_middle_initial']))
  {
    $customer_middle_initial = $_SESSION['customer_middle_initial'];
  }
  if (isset($_SESSION['customer_last_name']))
  {
    $customer_last_name = $_SESSION['customer_last_name'];
  }

  if (!$logged_in)
  {
    echo "<h6>Welcome!</h6>";
  }
  else
  {
    echo "<h6>Welcome, $salutation $customer_first_name
          $customer_middle_initial $customer_last_name!</h6>";
  }
?>
