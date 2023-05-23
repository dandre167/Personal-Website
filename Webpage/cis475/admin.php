<?php
// includes other files into this page
require_once('vars.php');
require_once('functions.php');
  ?>
<style>
#userTable {
  font-family: Arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin-top: 20px;
}

#usertable th, #usertable td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

#usertable th {
  background-color: #4CAF50;
  color: white;
}

#usertable tr.evenRow {
  background-color: #f2f2f2;
}

#usertable tr.oddRow {
  background-color: #ffffff;
}

#usertable a {
  color: #4CAF50;
  text-decoration: none;
}

#usertable a:hover {
  color: #ffffff;
  background-color: #4CAF50;
}

#usertable td:nth-child(5),
#usertable th:nth-child(5) {
  text-align: center;
}
</style>

<?php

$servername = "localhost";
$username = "johnsodj03";
$password = "B00847413";
$dbname = "johnsodj03";

$conn = new mysqli($servername, $username, $password, $dbname);

if(isset($_POST['add'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipcode = $_POST['zipcode'];
    $phone = $_POST['phone'];
    $isadmin = isset($_POST['isadmin']) ? 1 : 0;
  
    $insertQuery = "INSERT INTO Regis (accFirstName, accLastName, accEmail, accAddress, accCity, accState, accZipCode, accPhone, isadmin) VALUES ('$firstname', '$lastname', '$email', '$address', '$city', '$state', '$zipcode', '$phone', '$isadmin')";
  
    if (mysqli_query($conn, $insertQuery)) {
      $msg = "User added successfully!";
    } else {
      $msg = "Error adding user: " . mysqli_error($conn);
    }
  }

  if(isset($_GET['action']) && $_GET['action'] == 'del' && isset($_GET['userid'])) {
    $userid = $_GET['userid'];
  
    $deleteQuery = "DELETE FROM Regis WHERE accID='$userid'";
  
    if (mysqli_query($conn, $deleteQuery)) {
      $msg = "User deleted successfully!";
      header("Location: $PHP_SELF"); // redirect to update the table
      exit();
    } else {
      $msg = "Error deleting user: " . mysqli_error($conn);
    }
  }

  if (isset($_GET['action']) && $_GET['action'] == 'mod' && isset($_GET['userid'])) {
    $userid = $_GET['userid'];
    $selectQuery = "SELECT * FROM Regis WHERE accID='$userid'";
    $result = mysqli_query($conn, $selectQuery);
    if ($result && mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      $firstname = $row['accFirstName'];
      $lastname = $row['accLastName'];
      $email = $row['accEmail'];
      $address = $row['accAddress'];
      $city = $row['accCity'];
      $state = $row['accState'];
      $zipcode = $row['accZipCode'];
      $phone = $row['accPhone'];
      $isadmin = $row['isAdmin'];
    } else {
      $msg = "Error: User not found!";
    }
  }


echo("<div id='userTable'>\n");
echo("<p><a href='Registration.php'>Add</a> a new user. <a href='$PHP_SELF?action=exp'>Export</a> (users.csv)</p>\n");

if (isset($_GET['action']) && $_GET['action'] == 'exp') {
    // code for exporting user table as CSV file
    $sql = "SELECT * FROM Regis";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $csv_data = "ID,First Name,Last Name,Email,Address,City,State,Zip Code,Phone,Is Admin\n";
      while ($row = $result->fetch_assoc()) {
        $csv_data .= $row['accID'] . ",";
        $csv_data .= '"' . $row['accFirstName'] . '",';
        $csv_data .= '"' . $row['accLastName'] . '",';
        $csv_data .= '"' . $row['accEmail'] . '",';
        $csv_data .= '"' . $row['accAddress'] . '",';
        $csv_data .= '"' . $row['accCity'] . '",';
        $csv_data .= '"' . $row['accState'] . '",';
        $csv_data .= '"' . $row['accZipCode'] . '",';
        $csv_data .= '"' . $row['accPhone'] . '",';
        $csv_data .= '"' . ($row['isAdmin'] ? 'Yes' : 'No') . '"' . "\n";
      }
      header("Content-type: text/csv");
      header("Content-Disposition: attachment; filename=users.csv");
      header("Pragma: no-cache");
      header("Expires: 0");
      echo $csv_data;
      exit();
    }
  }

  
  

$selectQuery = "SELECT * FROM Regis";

if ($debug) { echo("$selectQuery<br>"); }
//Fetch Data 

// Define SQL query to select all users from the Regis table
$sql = "SELECT * FROM Regis";

// Execute SQL query
$result = $conn->query($sql);

// Check if any users were found
if ($result->num_rows == 0) {
  $msg = "Sorry, no users found!";
} else {
  echo("<table id='usertable' class='sortable'>\n");
  echo("<thead>\n");
  echo("<tr>\n");
  echo("<th>Action</th>\n");
  echo("<th>Name</th>\n");
  echo("<th>Address</th>\n");
  echo("<th>Email</th>\n");
  echo("<th>Phone</th>\n ");  
  echo("<th>Last Login</th>\n");
  echo("<th>Reg Date</th>\n");
  echo("<th>Is Admin</th>\n");
  echo("</tr>\n");
  echo(" </thead>\n");

  $row = 0;

  while ($selectRow = mysqli_fetch_assoc($result)) {
    $userid = $selectRow['accID'];
    $firstname = stripslashes($selectRow["accFirstName"]);
    $lastname = stripslashes($selectRow["accLastName"]);
    $email = html_entity_decode($selectRow["accEmail"]);
    $lastlogin = $selectRow['lastlogin'];
    $address = stripslashes($selectRow['accAddress']);
    $city = stripslashes($selectRow['accCity']);
    $state = stripslashes($selectRow['accState']);
    $zip = stripslashes($selectRow['accZipCode']);
    $phone = $selectRow['accPhone'];
    $regdate = $selectRow['lastlogin'];
    $isadmin = $selectRow['isAdmin'];

    if ($isadmin) 
    { $isadmin = "Yes"; }
     else
      { $isadmin = "No"; }

    echo("  <tr");
    
    if (++$row % 2) {
      echo(" class='evenRow'");
    } else {
      echo(" class='oddRow'");
    }

    echo(">\n");
    echo("    <td><a href='$PHP_SELF?action=mod&userid=$userid'>mod</a><br/>\n");
    echo("         <a href='$PHP_SELF?action=del&userid=$userid'>del</a> </td>\n");
    echo("    <td>$lastname, $firstname</td>\n    <td>$address<br>$city, $state $zip</td>\n");
    echo("    <td>$email</td>\n    <td style=\"text-align: center;\">$phone</td>\n    <td style=\"text-align: center;\">$lastlogin</td>\n    <td style=\"text-align: center;\">$regdate</td>\n");
    echo("    <td style=\"text-align: center;\">$isadmin</td>\n");
    echo("  </tr>\n");

  }
  echo("  </tbody>\n");
  echo("</table>\n");
}
echo("</div> <!-- end id='userTable' -->\n");

?>









