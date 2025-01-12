<?php
// Start output buffering
ob_start();

// Database connection details
$host = 'localhost';
$db_name = 'management';
$db_user = 'root';
$db_password = '';

$conn = new mysqli($host, $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $feedback = trim($_POST['feedback']);

    // Validation
    if (empty($feedback)) {
        $message = "Feedback cannot be empty.";
    } else {
        // Insert feedback into the database
        $stmt = $conn->prepare("INSERT INTO feedback (feedback_text) VALUES (?)");
        $stmt->bind_param('s', $feedback);

        if ($stmt->execute()) {
            $message = "Thank you for your feedback!";
        } else {
            $message = "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback - Shiksha Computer Classes</title>
    <link rel="stylesheet" href="feedback.css">
</head>
<body>
    <div class="form-container">
        <h1>Feedback</h1>
        <?php if (!empty($message)): ?>
            <p class="message"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>
        <form action="" method="POST">
            <textarea name="feedback" placeholder="Write your feedback here..." required></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
