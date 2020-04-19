<?php

//connection constants
include($_SERVER["CONTEXT_DOCUMENT_ROOT"] . '/../htpasswd/mysqldb.inc');
//create connection
$conn = new mysqli(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//get information from fields in the "tell us what you think" fields.
$salutation = $_POST["salutation"];
$fname = $_POST["firstName"];
$lname = $_POST["lastName"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$subject = $_POST["subject"];
$message = $_POST["message"];

//insert information into gameTable on the MySQL database
$query = (
    "INSERT INTO ABOUT_US(SAL, FIRST, LAST, EMAIL, PHONE, SUBJECT, COMMENT)"
  . " VALUES('$salutation', '$fname', '$lname', '$email', '$phone',"
  . " '$subject', '$message')"
);
$result = mysqli_query($conn,$query)
	or die ("Couldn't execute query.");
//header information
$headers = (
  'From: u06@mail.cs.smu.ca'
  . "\r\n"
  . 'Reply-To: u06@mail.cs.smu.ca'
  . "\r\n"
  . 'X-Mailer: PHP/'
  . phpversion()
);
$email_message = (
    "Dear " . $salutation . " " . $lname
  . "\n"
  . "The following message was received from you by JustACoupleOfTools:"
  . "\n"
  . "============================"
  . "\n"
  . "From: " . $salutation. " " . $fname . " " . $lname
  . "\n"
  . "E-mail address: " . $email
  . "\n"
  . "Phone number: " . $phone
  . "\n"
  . "----------------------------"
  . "\n"
  . "Subject: " . $subject
  . "\n"
  . "----------------------------"
  . "\n"
  . $message
  . "\n"
  . "============================"
  . "\n"
  . "Thank you for your interest and your feedback."
  . "\n"
  . "From the guys at JustACoupleOfTools"
  . "\n"
  . "============================"
);
echo "Dear " . $salutation . " " . $lname
  . "<br>"
  . "The following message was received from you by JustACoupleOfTools:"
  . "<br>"
  . "============================="
  . "<br>"
  . "From: " . $salutation . " " . $fname . " " . $lname
  . "<br>"
  . "Phone Number: " . $phone
  . "<br>"
  . "-----------------------------"
  . "<br>"
  . "Subject: " . " " . $subject
  . "<br>"
  . "-----------------------------"
  . "<br>"
  . $message
  . "<br>"
  . "============================="
  . "<br>"
  . "Thank you for your interest and your feedback."
  . "<br>"
  . "From the guys at JustACoupleOfTools"
  . "<br>"
  . "=============================";

file_put_contents(
  dirname(__DIR__)."/data/feedback.txt",
  $email_message,
  FILE_APPEND | LOCK_EX
);

mail($email, $subject, $email_message, $headers);
mail('u06@mail.cs.smu.ca', $subject, $email_message, $headers);
