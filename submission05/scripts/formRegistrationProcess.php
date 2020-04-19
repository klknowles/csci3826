<?php
/*registrationFormProcess.php
  Registers a customer's given information and creates an account.
*/
if ($_POST['gender'] == "Female")
{
  $gender = "F";
}
else if ($_POST['gender'] == "Male")
{
  $gender = "M";
}
else
{
  $gender = "O";
}

if (emailAlreadyExists($db, $_POST['email']))
{
  echo "<h3>Sorry, but the given e-mail address is already registered.</h3>";
}
else
{
  $result = "";
  $unique_login = getUniqueID($db, $_POST['loginName']);
  if ($unique_login != $_POST['loginName'])
  {
    $result .= "<h3>Your chosen login name already exists.<br>
               You have been assigned $unique_login, instead.</h3>";
  }
  else
  {
    $result .= "<h3>Your login name is $unique_login.</h3>";
  }

  // Escape input because the Internet said it was the smart thing to do.
  $salutation = mysqli_real_escape_string($db, $_POST['salutation']);
  $first_name = mysqli_real_escape_string($db, $_POST['firstName']);
  $middle_initial = mysqli_real_escape_string($db, $_POST['middleInitial']);
  $last_name = mysqli_real_escape_string($db, $_POST['lastName']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $region = mysqli_real_escape_string($db, $_POST['region']);
  $postal_code = mysqli_real_escape_string($db, $_POST['postalCode']);
  $login_name = mysqli_real_escape_string($db, $_POST['loginName']);

  // Encrypt the password.
  $hashed_password = password_hash($_POST['password1'], PASSWORD_BCRYPT);
  
  $query = "INSERT INTO `my_Customers`(
    customer_id,
    salutation,
    customer_first_name,
    customer_middle_initial,
    customer_last_name,
    gender,
    email_address,
    phone_number,
    street_address,
    city,
    region,
    postal_code,
    login_name,
    login_password
  ) VALUES (
    NULL,
    '$salutation',
    '$first_name',
    '$middle_initial',
    '$last_name',
    '$gender',
    '$email',
    '$phone',
    '$address',
    '$city',
    '$region',
    '$postal_code',
    '$unique_login',
    '$hashed_password');";
  $success = mysqli_query($db, $query);

  if ($success)
  {
    $result .= "<h3>Thank you for registering with our community.</h3>";
    $result .= "<h3>To log in and start shopping, please
               <a href='pages/formLogin.php'>click here</a>.";
    echo $result;
  }
  else
  {
    echo "<h3>There was an error during registration.</h3>";
    echo "<h3>Please try again later.</h3>";
  }
}
mysqli_close($db);

function emailAlreadyExists($db, $email)
{
  $query =
    "SELECT *
    FROM my_Customers
    WHERE email_address = '$email'";
  $customers = mysqli_query($db, $query);
  $num_records = mysqli_num_rows($customers);

  return $num_records > 0;
}

function getUniqueID($db, $login_name)
{
  $unique_login = $login_name;
  $query =
    "SELECT *
    FROM my_Customers
    WHERE login_name = '$unique_login'";
  $customers = mysqli_query($db, $query);
  $num_records = mysqli_num_rows($customers);
  if ($num_records != 0)
  {
    $suffix = 1;
    do
    {
      $unique_login = $login_name.$suffix;
      $query =
        "SELECT *
        FROM my_Customers
        WHERE login_name = '$unique_login'";
      $customers = mysqli_query($db, $query);
      $num_records = mysqli_num_rows($customers);
    }
    while ($num_records != 0);
  }
  return $unique_login;
}
?>
