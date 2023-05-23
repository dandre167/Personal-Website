<?php include('vars.php'); ?>

<!DOCTYPE html>
<html lang="en" style="background-color: #0077be;">
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

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <script defer src="https://friconix.com/cdn/friconix.js"> </script>
   <link rel="stylesheet" type="text/css" href="index.css"> 
</head>

<body>
  <nav>
    <ul>
      <li><a href="https://bscacad3.buffalostate.edu/~johnsodj03/Webpage/index.html">Home</a></li>
      <li><a href="https://bscacad3.buffalostate.edu/~johnsodj03/Webpage/resume.html">Resume</a></li>
      <li> <a href="https://bscacad3.buffalostate.edu/~johnsodj03/Webpage/portfolio.html">Portfolio</a></li>
    </ul>
  </nav>


  <h1 style="margin-top:25px;">
    <?php echo $pageName; ?>
  </h1>


  <div id='clock' style='text-align:center;font-weight:bold;margin-bottom:30px; font-size:30px;'>

    <?php
    date_default_timezone_set('America/New_York');
    $today = date("m-d-Y H:i:s A");
    ?>
    <?php echo $today; ?>
  </div>

   <div class="container">
 <div class="vertical-center">
    <button onclick="myFunction()">Home Page</button>
    <button onclick="index()">Index.php</button>
    <button onclick="db_page()">DB.php</button>
    <button onclick="lfaPhp()">lfa php</button>
    <button onclick="SqlTable()">Php mysql Table</button>
    <button onclick="PSqlTable()">Populate mysql Table</button>
    <button onclick="fileIo()">FileIo</button>
    

  </div>
  
  <p style="text-align:center;margin: 50px 50px 50px 50px; font-size:35px;"> Hello my name is
    <?php echo $myName; ?> and this is my index.php page it uses buttons on the page to direct to other php pages and a
    clock is at the bottom of the page
  </p>


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
    
  </script>




  <br>
  <br>




  <br>
  <br>

  <script>
    setInterval(function () {
      // get current time
      var d = new Date();
      var hours = d.getHours();
      var minutes = d.getMinutes();
      var seconds = d.getSeconds();
      var ampm = hours >= 12 ? 'PM' : 'AM';
      hours = hours % 12;
      hours = hours ? hours : 12;
      minutes = minutes < 10 ? '0' + minutes : minutes;
      seconds = seconds < 10 ? '0' + seconds : seconds;
      var currentTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;

      // update clock with current time
      document.getElementById('clock').innerHTML = currentTime;
    }, 1000);
  </script>





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
  </div>
</body>

</html>