<!DOCTYPE html>
<?php
// includes other files into this page
require_once('vars.php');
require_once('functions.php');

  ?>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script defer src="https://friconix.com/cdn/friconix.js"> </script>
<link rel="stylesheet" href="Registration.css">

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

  <!-- <link rel="stylesheet" type="text/css" href="includes/php_layout2.css"> -->
  

</head>

<body>
  <nav>
    <?php
    echo ("| ");
    displayAssignments($assignmentsArray);
    ?>
  </nav>



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
<br>
<br>
  <?php
  display_assignment_due_dates($assignmentsArray, $dateDue);
  ?>
<br>
  <h1 style="margin-top:25px;margin-bottom:25px;">Contact Form</h1>

  <br>
<br>
<!-- Contact form -->

<?php 


//Registration Form
$servername = "localhost";
$username = "johnsodj03";
$password = "B00847413";
$dbname = "johnsodj03";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table
$sql = "CREATE TABLE IF NOT EXISTS Regis (
  accID INT AUTO_INCREMENT PRIMARY KEY,
  accFirstName CHAR(15) NOT NULL,
  accLastName VARCHAR(30) NOT NULL,
  accAddress VARCHAR(255) NOT NULL,
  accCity VARCHAR(30) NOT NULL,
  accState VARCHAR(2) NOT NULL,
  accZipCode VARCHAR(10) NOT NULL,
  accPhone VARCHAR(20) NOT NULL,
  accEmail VARCHAR(255) NOT NULL UNIQUE,
  accPassword VARCHAR(50) NOT NULL,
  SecurityQues VARCHAR(255) NOT NULL,
  SecurityAnswer VARCHAR(255) NOT NULL,
  lastlogin TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
 
if (mysqli_query($conn, $sql)) {
  echo "Table Regis created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);

?>

<form method="post">
		<label for="firstname">First Name:</label>
		<input type="text" name="firstname" id="firstname" required><br><br>
		
		<label for="lastname">Last Name:</label>
		<input type="text" name="lastname" id="lastname" required><br><br>
		
		<label for="address">Address:</label>
		<input type="text" name="address" id="address" required><br><br>
		
		<label for="city">City:</label>
		<input type="text" name="city" id="city" required><br><br>
		
		<label for="state">State:</label>
		<input type="text" name="state" id="state" required maxlength="2"><br><br>
		
		<label for="zipcode">Zip Code:</label>
		<input type="text" name="zipcode" id="zipcode" required maxlength="5"><br><br>
		
		<label for="phone">Phone:</label>
		<input type="tel" name="phone" id="phone" required maxlength="10"><br><br>
		
		<label for="email">Email:</label>
		<input type="email" name="email" id="email" required><br><br>
		
		<label for="password">Password:</label>
		<input type="password" name="password" id="password" required><br><br>
		
		<label for="SecurityQues">Security Question:</label>
		<input type="text" name="SecurityQues" id="SecurityQues" required><br><br>
		
		<label for="securityanswer">Security Answer:</label>
		<input type="text" name="securityanswer" id="securityanswer" required><br><br>
		
		<input type="submit" value="Register">

	</form>
    <?php    
$servername = "localhost";
$username = "johnsodj03";
$password = "B00847413";
$dbname = "johnsodj03";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Sanitize and validate form data
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
    $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_NUMBER_INT);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST,'password', FILTER_SANITIZE_STRING);
    $SecurityQues = filter_input(INPUT_POST,'SecurityQues', FILTER_SANITIZE_STRING);
    $Securityanswer = filter_input(INPUT_POST,'securityanswer', FILTER_SANITIZE_STRING);

    // Check if all required fields are filled out
    if (empty($firstname) || empty($lastname) || empty($address) || empty($city) || empty($state) || empty($zipcode) 
    || empty($phone) || empty($email) || empty($password)|| empty($SecurityQues)|| empty($Securityanswer)) {
        echo 'Please fill out all required fields.';
    } else {

        // Check if the email or name already exist in the Regis table
        $query = "SELECT * FROM Regis WHERE AccFirstName='$firstname' AND AccEmail='$email'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo 'An account with that email already exists. Please use a different email.';
        } else {


  // Insert data into Regis table
// Hash the password using password_hash()
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare the SQL statement using a parameterized query to avoid SQL injection
$stmt = $conn->prepare("INSERT INTO Regis (accFirstName, accLastName, accAddress, accCity, accState, accZipCode, accPhone, accEmail, accPassword, SecurityQues, SecurityAnswer) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssss", $firstname, $lastname, $address, $city, $state, $zipcode, $phone, $email, $hashed_password, $SecurityQues, $Securityanswer);
if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
}
}
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