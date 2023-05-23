<?php
include('vars.php');

$assignmentsArray = array(
  'Home page' => "https://bscacad3.buffalostate.edu/~johnsodj03/Webpage/index.html",
  'Setup local server' => "https://bscacad3.buffalostate.edu/~johnsodj03/Webpage/php.html",
  'First php page' => "https://bscacad3.buffalostate.edu/~johnsodj03/Webpage/cis475/index.php",
  'Arrays & Functions' => "https://bscacad3.buffalostate.edu/~johnsodj03/Webpage/cis475/lfa.php",
  'Create MYSQL table' => "https://bscacad3.buffalostate.edu/~johnsodj03/Webpage/cis475/db.php",
  'PHP_MYSQL_TABLE' => "https://bscacad3.buffalostate.edu/~johnsodj03/Webpage/cis475/php_mysql_table.php",
  'Populting sql table' => "https://bscacad3.buffalostate.edu/~johnsodj03/Webpage/cis475/contactform.php",
  'Reads and Writes a File'=>"https://bscacad3.buffalostate.edu/~johnsodj03/Webpage/cis475/fileio.php",
  'Registration Form' => "https://bscacad3.buffalostate.edu/~johnsodj03/Webpage/cis475/Registration.php",
  'User Login' =>"https://bscacad3.buffalostate.edu/~johnsodj03/Webpage/cis475/Login.php",
  'Admin page' =>"https://bscacad3.buffalostate.edu/~johnsodj03/Webpage/cis475/admin.php",
  'Ajax'=>"https://bscacad3.buffalostate.edu/~johnsodj03/Webpage/cis475/ajaxForm.html"
);

// displays each assignment in the navigation bar
function displayAssignments($assignmentsArray)
{
  foreach ($assignmentsArray as $assignmentName => $assignmentLink) {
    echo ("<a href=\"$assignmentLink\" title=\"$assignmentName\">$assignmentName</a> | ");
  }
}

// displays the due date for an assignment
function displayDueDate($dueDate)
{
  $dueDate = strtotime($dueDate);
  $today = strtotime(date('m/d/Y'));
  $daysLeft = round(($dueDate - $today) / (60 * 60 * 24));

  if ($daysLeft > 0) {
    echo "<p style='text-align:center'>This assignment is due in $daysLeft day(s).</p>";
  } elseif ($daysLeft < 0) {
    $days_overdue = abs($daysLeft);
    echo "<p style='text-align:center'>This assignment is $days_overdue day(s) overdue.</p>";
  } else {
    echo "<p style='text-align:center'>This assignment is due today.</p>";
  }
}
// displays all assignments with their due dates
function display_assignment_due_dates($assignmentsArray, $dateDue)
{
  // loop through assignments array and display message for each assignment
  foreach ($assignmentsArray as $assignment => $url) {
    // display the assignment name and url in a small box
    echo "<div class=' box' style='border: 1px solid black;
                               padding: 10px; display: inline-block;
                                margin: 10px; margin-bottom:20px; '>
                                <h2 style='text-align:center'><a href='$url'>$assignment</a></h2>";

    // check if there is a due date for this assignment
    if (isset($dateDue[$assignment])) {
      // display the due date and number of days left
      displayDueDate($dateDue[$assignment]);
    } else {
      // display a message if there is no due date for this assignment
      echo "<p>No due date has been set for this assignment.</p>";
    }

    // close the box div
    echo "</div>";
  }
}

// due dates for each assignment
$dateDue = array(
  'Home page' => '02/05/2023',
  'Setup local server' => '02/12/2023',
  'First php page' => '02/19/2023',
  'Arrays & Functions' => '02/26/2023',
  'Create MYSQL table' => '04/09/2023',
  'PHP_MYSQL_TABLE' => '04/16/2023',
  'Ajax'=>'04/16/2023',
  'Reads and Writes a File'=>'04/30/2023',
  'Populting sql table'=>'04/23/2023',
  'Registration Form' => '04/30/2023',
  'User Login' =>'05/07/2023',
  'Admin page' =>'05/07/2023'
);


//Function to display the month table
function displayMonthsTable()
{
  $servername = "localhost";
  $username = "johnsodj03";
  $password = "B00847413";
  $dbname = "johnsodj03";


  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Retrieve all records from monthsTable
  $sql = "SELECT * FROM monthsTable";
  $result = mysqli_query($conn, $sql);

  // Generate HTML table
  echo "<table style='margin: auto;'>";
  echo "<tr><th>Month</th><th>Days</th></tr>";
  $rowNum = 0;
  while ($row = mysqli_fetch_assoc($result)) {
    $rowNum++;
    if ($rowNum % 2 == 0) {
      echo "<tr class='even'>";
    } else {
      echo "<tr class='odd'>";
    }
    echo "<td>" . $row["monthName"] . "</td>";
    echo "<td>" . $row["monthDays"] . "</td>";
    echo "</tr>";
  }
  echo "</table>";

  mysqli_close($conn);
}



//display contacts table 
function displaycontactTable(){

  $servername = "localhost";
  $username = "johnsodj03";
  $password = "B00847413";
  $dbname = "johnsodj03";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create the contactsTable with the specified fields
$sql = "CREATE TABLE contactsTable (
  contactID INT AUTO_INCREMENT PRIMARY KEY,
  contactFirstName CHAR(15),
  contactLastName VARCHAR(30),
  contactAddress VARCHAR(30),
  contactCity VARCHAR(30),
  contactState VARCHAR(2),
  contactZipCode VARCHAR(10),
  contactPhone VARCHAR(10),
  contactEmail VARCHAR(60),
  contactComments LONGTEXT,
  contactDate DATE
)";

if ($conn->query($sql) === TRUE) {
  echo "Table contactsTable created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
}


function displayDate($dueDate)
{

  $today = date('Y-m-d');
  $daysLeft = (strtotime($dueDate) - strtotime($today)) / (60 * 60 * 24);
  if ($daysLeft < 0) {
    echo "This assignment was due on " . date('F j, Y', strtotime($dueDate)) . ". It is " . abs($daysLeft) . " days overdue.";
  } elseif ($daysLeft == 0) {
    echo "This assignment is due today!";
  } else {
    echo "This assignment is due on " . date('F j, Y', strtotime($dueDate)) . ". You have " . $daysLeft . " days left to complete it.";
  }
}


function display_month_table_from_file() {
  $filename = 'cis475_io.txt';

  // Read the file contents into an array
  $file_lines = file($filename);

  // Initialize an array to store the reversed data
  $reversed_data = array();

  // Reverse the order of the lines
  foreach ($file_lines as $line) {
      array_unshift($reversed_data, $line);
  }

  // Generate HTML table
  echo '<table style="border-collapse: collapse; margin: auto; text-align: center;">';
  echo '<thead>';
  echo '<tr><th>Month Number</th><th>Month Name</th><th>Days in Month</th></tr>';
  echo '</thead>';
  echo '<tbody>';
  foreach ($reversed_data as $data) {
      $data_parts = explode(',', $data);
      $month_number = $data_parts[0];
      $month_name = $data_parts[1];
      $days_in_month = trim($data_parts[2]);

      // Generate row with month number, name, and days
      echo '<tr>';
      echo '<td>' . $month_number . '</td>';
      echo '<td>' . $month_name . '</td>';
      echo '<td>' . $days_in_month . '</td>';
      echo '</tr>';
  }
  echo '</tbody>';
  echo '</table>';

  // Add CSS styles to the table
  echo '<style>';
   echo 'th, td { border: 1px solid black; padding: 5px; }';
  echo '</style>';
}


?>