<!DOCTYPE html>
<?php
// includes other files into this page
require_once('vars.php');
require_once('functions.php')
  ?>
<html lang="en" style="background-color: #0077be;">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script defer src="https://friconix.com/cdn/friconix.js"> </script>

<head>

  <title>
    <?php echo $title; ?>
  </title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="myName" content="<?php echo $myName; ?>">
  <meta name="Sublime" content="<?php echo $pageEditor ?>">
  <meta name="MAMP PRO" content=" <?php echo $webServer ?>">
  <meta name="D'Andre Johnson's php page" content=" <?php echo $title ?>">
  <meta name="PHP Page" content=" <?php echo $pageName ?>">
<link rel="stylesheet" type="text/css" href="db.css"> 


</head>

<body>
  <nav>
    <?php
    echo ("| ");
    displayAssignments($assignmentsArray);
    ?>

  </nav>
  <h1 style="margin-top:25px;margin-bottom:25px;">DB php</h1>


  <!-- Clock -->
  <?php
  date_default_timezone_set('America/New_York');
  $today = date("m/d/y");
  ?>


  <h4 style='text-align:center;font-weight:bold; font-size:20px;'>
    <?php echo $today; ?>
  </h4>
  <!-- buttons on page to other php pages -->
  
  <div class="vertical-center">
    <button onclick="myFunction()">Home Page</button>
    <button onclick="index()">Index.php</button>
    <button onclick="db_page()">DB.php</button>
    <button onclick="lfaPhp()">lfa php</button>
    <button onclick="SqlTable()">Php mysql Table</button>
    <button onclick="PSqlTable()">Populate mysql Table</button>
    <button onclick="fileIo()">FileIo</button>
    <button onclick="Login()">Login</button>
 </div>
    <script>
    function myFunction() {
      location.href = "https://bscacad3.buffalostate.edu/~johnsodj03/Webpage/index.html";
    }

    function index() {
      location.href = "https://bscacad3.buffalostate.edu/~johnsodj03/Webpage/cis475/index.php";
    }

    function db_page() {
      location.href = "https://bscacad3.buffalostate.edu/~johnsodj03/Webpage/cis475/db.php";
    }

    function lfaPhp() {
      location.href = "https://bscacad3.buffalostate.edu/~johnsodj03/Webpage/cis475/lfa.php";
    }

    function SqlTable() {
      location.href = "https://bscacad3.buffalostate.edu/~johnsodj03/Webpage/cis475/php_mysql_table.php";
    }

    function PSqlTable() {
      location.href = "https://bscacad3.buffalostate.edu/~johnsodj03/Webpage/cis475/contactform.php";
    }

    function fileIo() {
      location.href = "https://bscacad3.buffalostate.edu/~johnsodj03/Webpage/cis475/fileio.php";
    }

    function Login() {
      location.href = "https://bscacad3.buffalostate.edu/~johnsodj03/Webpage/cis475/Login.php";
    }
    
  </script>



  <p style="font-size:25px;text-align:center;margin: 50px 50px 50px 50px;"> This is a php page that shows how many days
    an assignment is due and creates a sql table in myphpadmin.</p>


  <!-- Create amy sql table -->
  <form method="post" action="db.php" class="btn">
    <input type="submit" name="createTable" value="Create MonthsTable">
  </form>


  <img src='admin.jpeg' height="700px" width="960px"></img>


  <!--- Displays due dates with boxes around them---->
  <h2 style='text-align:center;margin-top:20px;'> Assignments Due </h2>
  <?php
  display_assignment_due_dates($assignmentsArray, $dateDue);
  ?>


  <?php
  // connects to myphpadmin to create a sql table 
  if (isset($_POST['import_months'])) {
    if ($debug) {
      echo ("<p>\$_POST['import_months'] = " . $_POST['import_months'] . "</p>");
    }

    // Connect to the MySQL server
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    //  commands to create the monthsTable
    $sql = "DROP TABLE IF EXISTS monthsTable;
          CREATE TABLE monthsTable (
            monthID INT PRIMARY KEY AUTO_INCREMENT,
            monthName CHAR(10),
            monthDays INT(2)
          )";

    // Execute the CREATE TABLE command and check for errors
    if ($conn->multi_query($sql) === TRUE) {
      $msg = "Table created successfully<br>";
    } else {
      $msg = "Error creating table: " . $conn->error . "<br>";
    }

    // Walk through the $monthsArray andcommands to insert each item
    foreach ($monthsArray as $month) {
      $monthName = $month['monthName'];
      $monthDays = $month['monthDays'];
      $sql = "INSERT INTO monthsTable (monthName, monthDays) VALUES ('$monthName', '$monthDays')";
      if ($conn->query($sql) !== TRUE) {
        $msg .= "Error inserting data: " . $conn->error . "<br>";
      }
    }

    // Close the  connection
    $conn->close();

    // Display success or failure message
    if (strpos($msg, "Error") !== FALSE) {
      echo $msg;
    } else {
      echo "Import successful";
    }
  }
  ?>












  <!-- makes the files downloadable on the page  -->
  <div class="alignLinks" style="margin-bottom:25px;margin-top:25px;">
    <a href="download.php?file=vars.php" title="download">Download vars.php</a>;
    <a href="download.php?file=lfa.php" title="download">Download lfa.php</a>;
    <a href="download.php?file=functions.php" title="download">Download functions.php</a>;
    <a href="download.php?file=index.php" title="download">Download index.php</a>;
    <a href="download.php?file=php_mysql_table.php" title="download">Download php_mysql_table</a>;

  </div>


  <!-- footer-->


  <footer class="transition_color" style="padding-top: 25px;padding-bottom: 75px;">

<div class="icon-row">
  <a href="https://www.instagram.com/dre_the_don_/" target="_blank"><i class="fi-xnsuxl-instagram"></i></a>
  <a href="https://www.linkedin.com/in/dandre-johnson---/" target="_blank"> <i class="fi-snsuxl-linkedin"></i></i></a>
  <a href="mailto:dandre.johnson1221@gmail.com" target="_blank"><i class="fi-xwsuxl-envelope-solid"></i></a>
</div>
<div class="copy-right">
  &copy; Thank you for visiting my Website
</div>


</footer>
</body>

</html>