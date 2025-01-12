<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <!-- Header -->
    <header class="navbar">
        <h1>Student Dashboard</h1>
    </header>

    <!-- Main Content -->
    <div class="dashboard-container">
        <div class="info-section">
            
            <p><h2>Explore a variety of courses to enhance your skills and knowledge.</h2></p>
        </div>
        
        <div class="dashboard-grid">
            <div class="card">
                <h3>Enroll in Courses</h3>
                <a href="enrol.php" class="action-link">Enroll Now</a>
            </div>
            <div class="card">
                <h3>View Attendance</h3>
                <a href="#" class="action-link">Check Attendance</a>
            </div>
            <div class="card">
                <h3>View Class Schedule</h3>
                <a href="schedule.html" class="action-link">View Schedule</a>
            </div>
            <div class="card">
                <h3>Feedback</h3>
                <a href="feedback.php" class="action-link">Give Feedback</a>
            </div>
            <div class="card logout-card">
                <a href="logout.php" class="logout-link">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>
