<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FCI FYP System - Communication</title>
    <!-- <link rel="stylesheet" href="../../index.css"> -->
    <link rel="stylesheet" href="./shared.css">
    <link rel="stylesheet" href="./communication-page.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<!-- Navbar at the top -->
<nav class="navbar">
    <div class="nav-container">
        <div class="logo-section">
            <a href="../../index.php"><img src="../../assets/images/mmu-logo-white.png" alt="MMU Logo"></a>
        </div>
        <div class="nav-section">
            <div class="nav-links">
                <a href="../../index.php" class="nav-link" id="homeLink">Home</a>
                <a href="../projects/projects-page.php" class="nav-link" id="projectsLink">Projects</a>
                <a href="../meetings/meetings-page.php" class="nav-link" id="meetingsLink">Meetings</a>
                <a href="../progress/progress-page.php" class="nav-link" id="progressLink">Progress</a>
                <a href="../assessment/assessment-page.php" class="nav-link" id="assessmentLink">Assessment</a>
                <a href="../support/support-page.php" class="nav-link" id="supportLink">Support</a>
                <a href="../communication/communication-page.php" class="nav-link active" id="communicationLink">Communication</a>
                <a href="../profile/profile-page.php" class="nav-link" id="profileLink">Profile</a>
                <a href="../login/login-page.php" class="nav-link" id="loginBtn">Login</a>
                <a href="../register/register-page.php" class="nav-link" id="registerBtn">Register</a>
            </div>
        </div>
    </div>
</nav>

<!-- Communication Section -->
<div class="section" id="communication">
    <h2>Communication Center</h2>
    <div class="communication-container">
        <!-- Communication Tabs -->
        <div class="comm-tabs">
            <a href="communication-page.php" class="tab-btn active">
                <i class="fas fa-comments"></i> Chat Room
            </a>
            <a href="email.php" class="tab-btn">
                <i class="fas fa-envelope"></i> Email
            </a>
            <a href="forum.php" class="tab-btn">
                <i class="fas fa-users"></i> Forum
            </a>
        </div>

        <!-- Chat Room Section -->
        <div class="comm-content chat-section active" id="chatSection">
            <div class="chat-container">
                <div class="chat-sidebar">
                    <div class="chat-header">
                        <h3>Active Users</h3>
                    </div>
                    <div class="users-list">
                        <div class="user-item online">
                            <span class="user-status"></span>
                            <div class="user-info">
                                <span class="user-name">Dr. Sarah Johnson</span>
                                <span class="user-role">Supervisor</span>
                            </div>
                        </div>
                        <div class="user-item online">
                            <span class="user-status"></span>
                            <div class="user-info">
                                <span class="user-name">John Doe</span>
                                <span class="user-role">Student</span>
                            </div>
                        </div>
                        <div class="user-item">
                            <span class="user-status"></span>
                            <div class="user-info">
                                <span class="user-name">Emma Wilson</span>
                                <span class="user-role">Student</span>
                            </div>
                        </div>
                        <div class="user-item online">
                            <span class="user-status"></span>
                            <div class="user-info">
                                <span class="user-name">Prof. Michael Chen</span>
                                <span class="user-role">Coordinator</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chat-main">
                    <div class="chat-messages">
                        <div class="message received">
                            <div class="message-info">
                                <span class="sender">Dr. Sarah Johnson</span>
                                <span class="time">10:30 AM</span>
                            </div>
                            <div class="message-content">
                                How is the database implementation coming along?
                            </div>
                        </div>
                        <div class="message sent">
                            <div class="message-info">
                                <span class="sender">You</span>
                                <span class="time">10:32 AM</span>
                            </div>
                            <div class="message-content">
                                I've completed the basic structure. Would you like to review the ERD?
                            </div>
                        </div>
                        <div class="message received">
                            <div class="message-info">
                                <span class="sender">Dr. Sarah Johnson</span>
                                <span class="time">10:33 AM</span>
                            </div>
                            <div class="message-content">
                                Yes, please share it. We can discuss it in our next meeting.
                            </div>
                        </div>
                        <div class="message sent">
                            <div class="message-info">
                                <span class="sender">You</span>
                                <span class="time">10:34 AM</span>
                            </div>
                            <div class="message-content">
                                I'll prepare a detailed document with the ERD and relationships explanation.
                            </div>
                        </div>
                    </div>
                    <div class="chat-input">
                        <input type="text" placeholder="Type your message..." id="messageInput">
                        <button class="send-btn">
                            <i class="fas fa-paper-plane"></i>
                        </button>
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
