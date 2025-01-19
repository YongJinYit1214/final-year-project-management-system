<?php
require_once '../../auth/auth_check.php';
require_once '../../components/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FCI FYP System - Support</title>
    <link rel="stylesheet" href="../../index.css">
    <link rel="stylesheet" href="./support-page.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="../../assets/js/auth.js" defer></script>
</head>
<body>
<?php echo getNavbar('support'); ?>

<!-- Support Section -->
<div class="section" id="support">
    <h2>Services & Support</h2>
    <div class="support-container">
        <!-- Support Categories -->
        <div class="support-categories">
            <div class="category-card">
                <i class="fas fa-headset"></i>
                <h3>Technical Support</h3>
                <p>Get help with technical issues and system access</p>
                <button class="contact-support-btn">Contact Support</button>
            </div>
            <div class="category-card">
                <i class="fas fa-book"></i>
                <h3>Documentation</h3>
                <p>Access user guides and documentation</p>
                <a href="../guidelines/project-guidelines.php" class="documentation-btn">Guidelines</a>
            </div>
            <div class="category-card">
                <i class="fas fa-users"></i>
                <h3>Community Help</h3>
                <p>Connect with other students and share solutions</p>
                <a href="../communication/forum.php" class="community-help-btn">Join Forum</a>
            </div>
        </div>

        <!-- Previous Feedback -->
        <div class="action-panel">
            <div class="panel-header">
                <h3>Your Previous Feedback</h3>
                <button class="new-feedback-btn">
                    <i class="fas fa-plus"></i> New Feedback
                </button>
            </div>
            <div class="feedback-list">
                <div class="feedback-item">
                    <div class="feedback-header">
                        <span class="feedback-type technical">Technical Issue</span>
                        <span class="feedback-status">Resolved</span>
                    </div>
                    <h4 class="feedback-subject">Database Connection Error</h4>
                    <p class="feedback-description">Unable to connect to the project database from local environment.</p>
                    <div class="feedback-footer">
                        <span class="feedback-date">Submitted: April 2, 2024</span>
                        <span class="resolution-time">Resolved in 2 hours</span>
                    </div>
                </div>

                <div class="feedback-item">
                    <div class="feedback-header">
                        <span class="feedback-type suggestion">Suggestion</span>
                        <span class="feedback-status">Under Review</span>
                    </div>
                    <h4 class="feedback-subject">Meeting Scheduling Feature</h4>
                    <p class="feedback-description">Suggest adding calendar integration for supervisor meetings.</p>
                    <div class="feedback-footer">
                        <span class="feedback-date">Submitted: April 5, 2024</span>
                        <span class="pending">Pending Review</span>
                    </div>
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