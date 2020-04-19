<?php
/*loginFormProcess.php
*/
session_start();
if (isset($_SESSION['customer_id']))
{
  header("Location: ../pages/estore.php");
}

include("connectToDatabase.php");
$query = "SELECT * FROM `my_Customers`
         WHERE login_name = '$_POST[loginName]'";
$rows_matching_login_name = mysqli_query($db, $query);

$num_records = mysqli_num_rows($rows_matching_login_name);

if ($num_records == 0)
{
  header("Location: ../pages/formLogin.php?retrying=true");
}
if ($num_records == 1)
{
  $row = mysqli_fetch_array($rows_matching_login_name, MYSQLI_ASSOC);
  if (password_verify($_POST['loginPassword'], $row['login_password']))
  {
    $_SESSION['customer_id'] = $row['customer_id'];
    $_SESSION['salutation'] = $row['salutation'];
    $_SESSION['customer_first_name'] = $row['customer_first_name'];
    $_SESSION['customer_middle_initial'] = $row['customer_middle_initial'];
    $_SESSION['customer_last_name'] = $row['customer_last_name'];
    $destination = getenv('HTTP_REFERER');
    $goto = "Location: ".$destination;
    header($goto);
  }
  else
  {
    header("Location: ../pages/formLogin.php?retrying=true");
  }
}
mysqli_close($db);
?>
