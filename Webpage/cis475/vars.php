<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$debug = 0;
$title = "D'Andre Johnson's php page";
$pageName = "PHP Page";
$myName = "D'Andre Johnson";
$webServer = "MAMP PRO";
$pageEditor = "Sublime";

$assignmentsArray = array(
    'CIS475 home page' => "https://bscacad3.buffalostate.edu/~johnsodj03/Webpage/index.html",
    'Setup local server' => "https://bscacad3.buffalostate.edu/~johnsodj03/Webpage/php.html",
    'First php page' => "https://bscacad3.buffalostate.edu/~johnsodj03/Webpage/cis475/index.php",
    'php page that uses arrays, functions and loops' => "https://bscacad3.buffalostate.edu/~johnsodj03/Webpage/cis475/lfa.php",
    'Create a MYSQL table' => " https://bscacad3.buffalostate.edu/~johnsodj03/Webpage/cis475/db.php"

);

$assignments = array(
    'Download vars.php' => "download.php?file=vars.php",
    'Download index.php' => "download.php?file=index.php",
    'Download php_mysql_table.php' => "download.php?file=sqlTable.php",
    'Download functions.php' => "download.php?file=functions.php"
);




$PHP_SELF = $_SERVER['PHP_SELF'];

$monthsArray = array(
    'January' => 31,
    'February' => 28,
    'March' => 31,
    'April' => 30,
    'May' => 31,
    'June' => 30,
    'July' => 31,
    'August' => 31,
    'September' => 30,
    'October' => 31,
    'November' => 30,
    'December' => 31
);

// Code to create MySQL table and insert data
$servername = "localhost";
$username = "johnsodj03";
$password = "B00847413";
$dbname = "johnsodj03";


?>