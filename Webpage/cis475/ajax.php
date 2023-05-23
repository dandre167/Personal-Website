<?php

$answer = $_POST['answer'];

//Registration Form
$servername = "localhost";
$username = "johnsodj03";
$password = "B00847413";
$dbname = "johnsodj03";


// Check connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM monthsTable WHERE monthDays = (SELECT MAX(monthDays) FROM monthsTable)");
    $stmt->execute();
    $row = $stmt->fetch();

    if (strcasecmp($answer, $row['monthName']) == 0) {
        $response = array("correct" => true, "monthName" => $row['monthName']);
    } else {
        $response = array("correct" => false, "message" => "Try again!");
    }

    echo json_encode($response);
} catch (PDOException $e) {
    echo json_encode(array("error" => "Database error: " . $e->getMessage()));
}

?>
