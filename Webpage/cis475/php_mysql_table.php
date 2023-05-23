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
  <link rel="stylesheet" type="text/css" href="sql.css"> 
</head>

<body>
  <nav>
    <?php
    echo ("| ");
    displayAssignments($assignmentsArray);
    ?>

  </nav>



  <?php
  date_default_timezone_set('America/New_York');
  $today = date("m/d/Y");


  ?>


<div class="container">



  <h1 style="margin-top:25px;margin-bottom:25px;">Php mysql Table</h1>

  <p style="font-size:20px;"> Todays is
    <?php echo $today; ?>
  </p>


  <div class="vertical-center">
    <button onclick="myFunction()">Home Page</button>
    <button onclick="index()">Index.php</button>
    <button onclick="db_page()">DB.php</button>
    <button onclick="lfaPhp()">lfa php</button>
    <button onclick="SqlTable()">Php mysql Table</button>
    <button onclick="PSqlTable()">Populate mysql Table</button>
    <button onclick="fileIo()">FileIo</button>
    

  </div>

  <p style="font-size:25px;text-align:center;margin: 50px 50px 50px 50px;">
    This page shows when the this assignment is due or overdue and shows imports the sql table from myphpadmin
  </p>

  <p style=" font-size:20px;">
    <?php
    $dueDate = '2023-04-16';
    displayDate($dueDate);
    ?>
  </p>
  <p style="font-size:30px;">
    <?php displayMonthsTable(); ?>
  </p>





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
    
  </script>
  <br>
  <br>
  <br>



  <!-- makes the files downloadable on the page  -->
  <div class="alignLinks" style="margin-bottom:25px;margin-top:25px;">
    <a href="download.php?file=vars.php" title="download">Download vars.php</a>;
    <a href="download.php?file=lfa.php" title="download">Download lfa.php</a>;
    <a href="download.php?file=functions.php" title="download">Download functions.php</a>;
    <a href="download.php?file=index.php" title="download">Download index.php</a>;
    <a href="download.php?file=php_mysql_table.php" title="download">Download php_mysql_table</a>;
  </div>

  </div>

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