<?php
/*connectToDatabase.php
Handles the connection to the JaCoT database.
Values for MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, and
MYSQL_DATABASE are assigned in the file mysql.inc, which
must be included from a "safe" (but readable) location
which is outside public_html, for security reasons.
*/

require(dirname(__DIR__)."/../../../htpasswd/mysqldb.inc");

if (MYSQL_SERVER == null)
{
    echo "Database location is missing.<br>
          Connection script now terminating.";
    exit(0);
}

if (MYSQL_USERNAME == null)
{
    echo "Database username is missing.<br>
          Connection script now terminating.";
    exit(0);
}

if (MYSQL_PASSWORD == null)
{
    echo "Database password is missing.<br>
          Connection script now terminating.";
    exit(0);
}

if (MYSQL_DATABASE == null)
{
    echo "Database name is missing.<br>
          Connection script now terminating.";
    exit(0);
}

$db = mysqli_connect(MYSQL_SERVER,
                     MYSQL_USERNAME,
                     MYSQL_PASSWORD,
                     MYSQL_DATABASE);
if (mysqli_connect_errno() || ($db == null))
{
    printf("Database connection failed: %s<br>
           Connection script now terminating.",
           mysqli_connect_error());
    exit(0);
}
/*
else
{
    echo "Connected!<br>";
    mysqli_close($db);
    echo "Database closed!";
}
*/
?>
