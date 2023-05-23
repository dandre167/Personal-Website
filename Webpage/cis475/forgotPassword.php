<?php
// includes other files into this page
require_once('vars.php');
require_once('functions.php');
  ?>

<link rel="stylesheet" href="forgot.css">

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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_input(INPUT_POST, 'forgot_email', FILTER_SANITIZE_EMAIL);
    $security_question = trim($_POST['SecurityQues']);
    $security_answer = trim($_POST['securityanswer']);
    
    if (empty($email)) {
        echo 'Please enter your email.';
    } else {
        // Check if email exists in database
        $stmt = $conn->prepare("SELECT * FROM Regis WHERE accEmail = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $user_id = $row['accID'];
            $db_security_question = $row['SecurityQues'];
            $db_security_answer = $row['SecurityAnswer'];
            if ($security_question != $db_security_question) {
                echo 'Incorrect security question.';
            }
            if ($security_answer != $db_security_answer) {
                echo 'Incorrect security answer.';
            }
            if ($security_question == $db_security_question && $security_answer == $db_security_answer) {
                // Generate unique token
                $token = bin2hex(random_bytes(32));
                // Store token in database
                $stmt = $conn->prepare("INSERT INTO password_reset (user_id, token) VALUES (?, ?)");
                $stmt->bind_param("is", $user_id, $token);
                $stmt->execute();
                // Send email with reset link
                $reset_link = 'https://example.com/reset_password.php?token=' . $token;
  
                // Send email using mail() function
                $subject = 'Reset your password';
                $message = 'Click the following link to reset your password: ' . $reset_link;
                $headers = 'From: noreply@example.com' . "\r\n" .
                           'Reply-To: noreply@example.com' . "\r\n" .
                           'X-Mailer: PHP/' . phpversion();
  
                if (mail($email, $subject, $message, $headers)) {
                    echo 'Email sent successfully.';
                } else {
                    echo 'Error sending email.';
                }
            }
          } else {
            echo 'User not found.';
        }
    }
  }
?>

<div class="container">
  <div class="form">
    <h2>Forgot Password</h2>
    <form action="" method="POST">
      <div class="form-group">
        <label for="forgot_email">Email:</label>
        <input type="email" name="forgot_email" id="forgot_email" required />
      </div>
      <div class="form-group">
        <label for="SecurityQues">Security Question:</label>
        <input type="text" name="SecurityQues" id="SecurityQues" required />
      </div>
      <div class="form-group">
        <label for="securityanswer">Security Answer:</label>
        <input type="text" name="securityanswer" id="securityanswer" required />
      </div>
      <div class="form-group">
        <input type="submit" value="Submit" />
        <button class="sudmit "><a href="Login.php">Back to Login</a></button>

      </div>
    </form>
  </div>
</div>
