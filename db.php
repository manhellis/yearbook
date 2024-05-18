
<?php

define('_HOST_NAME', 'localhost:8889');
define('_DATABASE_USER_NAME', 'root');
define('_DATABASE_PASSWORD', 'root');
define('_DATABASE_NAME', 'classlist');

$mySQLiconn = new MySQLi(_HOST_NAME, _DATABASE_USER_NAME, _DATABASE_PASSWORD, _DATABASE_NAME);

if ($mySQLiconn->connect_errno) {
    die("ERROR : -> " . $mySQLiconn->connect_error);
}
