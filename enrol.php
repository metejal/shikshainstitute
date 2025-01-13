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
    $name = trim($_POST['name']);
    $address = trim($_POST['address']);
    $dob = trim($_POST['dob']);
    $age = trim($_POST['age']);
    $phone = trim($_POST['phone']);
    $course_name = trim($_POST['course']);
    $payment = trim($_POST['payment']);

    // Validation
    if (empty($name) || empty($address) || empty($dob) || empty($age) || empty($phone) || empty($course_name) || empty($payment)) {
        $message = "All fields are required.";
    } else {
        // Insert data into the database
        $stmt = $conn->prepare("INSERT INTO students (name, address, dob, age, phone, course_name, payment) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssissd', $name, $address, $dob, $age, $phone, $course_name, $payment);

        if ($stmt->execute()) {
            $message = "Enrollment successful!";
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
    <title>Enroll in Course</title>
    <link rel="stylesheet" href="enrol.css">
</head>
<body>
    <div class="form-container">
        <h1>Enroll in Course</h1>
        <?php if (!empty($message)): ?>
            <p class="message"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>
        <form action="" method="POST">
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="address" placeholder="Address" required>
            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" id="dob" required>
            <input type="number" name="age" placeholder="Age" required>
            <input type="text" name="phone" placeholder="Phone Number" required>
            <label for="course">Select Course:</label>
            <select name="course" id="course" required>
                <option value="Web Development">Web Development</option>
                <option value="Data Science">Data Science</option>
                <option value="Graphic Design">Graphic Design</option>
            </select>
            <input type="number" step="0.01" name="payment" placeholder="Payment Amount" required>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
