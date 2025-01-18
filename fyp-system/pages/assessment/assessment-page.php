<?php
session_start();
require_once '../../auth/auth_check.php';
require_once '../../components/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FCI FYP System - Assessment</title>
    <!-- <link rel="stylesheet" href="../../index.css"> -->
    <link rel="stylesheet" href="./assessment-page.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="../../assets/js/auth.js" defer></script>
</head>
<body>
<?php echo getNavbar('assessment'); ?>

<!-- Assessment Section -->
<div class="section" id="assessment">
    <h2>Assessment Dashboard</h2>
    <div class="assessment-overview">
        <!-- Assessment Summary Cards -->
        <div class="assessment-cards">
            <div class="assessment-card">
                <h3>Midterm Evaluation</h3>
                <div class="score-display">
                    <span class="score">85</span>/100
                </div>
                <div class="assessment-details">
                    <p class="assessment-date">Submitted: March 15, 2024</p>
                    <p class="assessment-status completed">Completed</p>
                </div>
                <button class="view-details-btn">View Details</button>
            </div>
            
            <div class="assessment-card">
                <h3>Final Evaluation</h3>
                <div class="score-display">
                    <span class="score pending">Pending</span>
                </div>
                <div class="assessment-details">
                    <p class="assessment-date">Due: May 30, 2024</p>
                    <p class="assessment-status upcoming">Upcoming</p>
                </div>
                <button class="view-details-btn">View Requirements</button>
            </div>

            <div class="assessment-card">
                <h3>Project Documentation</h3>
                <div class="score-display">
                    <span class="score">92</span>/100
                </div>
                <div class="assessment-details">
                    <p class="assessment-date">Submitted: April 1, 2024</p>
                    <p class="assessment-status completed">Completed</p>
                </div>
                <button class="view-details-btn">View Details</button>
            </div>
        </div>

        <!-- Detailed Rubric Section -->
        <div class="rubric-container">
            <h3>Midterm Evaluation Breakdown</h3>
            <div class="rubric-section">
                <div class="rubric-item">
                    <div class="criteria">
                        <h4>Project Planning</h4>
                        <p>Clear objectives, timeline, and methodology</p>
                    </div>
                    <div class="score-breakdown">
                        <span class="points">18/20</span>
                    </div>
                </div>

                <div class="rubric-item">
                    <div class="criteria">
                        <h4>Technical Implementation</h4>
                        <p>Code quality, architecture, and functionality</p>
                    </div>
                    <div class="score-breakdown">
                        <span class="points">25/30</span>
                    </div>
                </div>

                <div class="rubric-item">
                    <div class="criteria">
                        <h4>Documentation</h4>
                        <p>Clear and comprehensive documentation</p>
                    </div>
                    <div class="score-breakdown">
                        <span class="points">22/25</span>
                    </div>
                </div>

                <div class="rubric-item">
                    <div class="criteria">
                        <h4>Presentation</h4>
                        <p>Communication and demonstration skills</p>
                    </div>
                    <div class="score-breakdown">
                        <span class="points">20/25</span>
                    </div>
                </div>

                <div class="total-marks">
                    <h4>Total Score: 85/100</h4>
                </div>
            </div>

            <!-- Feedback Section -->
            <div class="feedback-section">
                <h3>Supervisor Feedback</h3>
                <div class="feedback-content">
                    <p class="feedback-text">
                        "Excellent project planning and implementation. Documentation is thorough and well-structured. 
                        Consider improving the user interface design and adding more test cases. Overall, strong progress 
                        and good understanding of the project requirements."
                    </p>
                    <p class="feedback-author">- Dr. Sarah Johnson</p>
                    <p class="feedback-date">March 16, 2024</p>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <p>&copy; 2024 Faculty of Computing and Informatics, Multimedia University. All Rights Reserved.</p>
</footer>

</body>
</html>