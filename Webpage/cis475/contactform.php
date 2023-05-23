<!DOCTYPE html>
<?php
// includes other files into this page
require_once('vars.php');
require_once('functions.php');

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
<link rel="stylesheet" type="text/css" href="contactform.css"> 
</head>

<body>
  <nav>
    <?php
    echo ("| ");
    displayAssignments($assignmentsArray);
    ?>
  </nav>
  <br>
  <br>
<div class="container">
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
<br>
<br>
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

 



<!-- Contact form -->
<form method="post" method=post action="<?php echo ($PHP_SELF); ?>"novalidate>
 <h1 style="margin-top:25px;margin-bottom:25px; color:white;">Contact Form</h1>
	<label for="firstname">First Name:</label>
	<input type="text" id="firstname" name="firstname" required>

	<label for="lastname">Last Name:</label>
	<input type="text" id="lastname" name="lastname" required>

	<label for="address">Address:</label>
	<input type="text" id="address" name="address" required>

	<label for="city">City:</label>
	<input type="text" id="city" name="city" required>

	<label for="state">State:</label>
	<input type="text" id="state" name="state" maxlength="2" pattern="[A-Za-z]{2}" required>

	<label for="zipcode">Zip Code:</label>
	<input type="text" id="zipcode" name="zipcode" pattern="[0-9]{5}" required>

	<label for="phone">Phone:</label>
	<input type="text" id="phone" name="phone" pattern="[0-9]{10}" required>

	<label for="email">Email:</label>
	<input type="email" id="email" name="email" required>

	<label for="comments">Comments:</label>
	<textarea id="comments" name="comments"></textarea>

	<input type="submit" value="Submit">
</form>


<?php     

$servername = "localhost";
$username = "johnsodj03";
$password = "B00847413";
$dbname = "johnsodj03";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check if form is submitted
if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['zipcode']) && isset($_POST['phone']) && isset($_POST['email'])) {

	// Sanitize and validate form data
	$firstname = addslashes(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING));
	$lastname = addslashes(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING));
	$address = addslashes(filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING));
	$city = addslashes(filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING));
	$state = addslashes(filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING));
	$zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_NUMBER_INT);
	$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

	// Validate zip code, phone, and email fields using patterns
	if (!preg_match('/^[0-9]{5}$/', $zipcode)) {
		echo 'Invalid zip code. Please enter a valid 5-digit zip code.';
		exit;
	}

	if (!preg_match('/^[0-9]{10}$/', $phone)) {
		echo 'Invalid phone number. Please enter a valid 10-digit phone number.';
		exit;
	}

	if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
		echo 'Invalid email address. Please enter a valid email address.';
		exit;
	}

	// Get current date and time
	$date = date('Y-m-d H:i:s');

	// Insert data into contactsTable
	$query = "INSERT INTO contactsTable (contactFirstName, contactLastName, contactAddress, contactCity, contactState, contactZipCode, contactPhone, contactEmail, contactDate) VALUES('$firstname', '$lastname', '$address', '$city', '$state', '$zipcode', '$phone', '$email', '$date')";

// Execute query
$result = mysqli_query($conn, $query);


if ($result) {
	echo 'Thank you for submitting the form!';
} else {
	echo 'Error: ' . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
}
?>
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