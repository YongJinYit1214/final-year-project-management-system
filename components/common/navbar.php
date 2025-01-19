<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FCI FYP System</title>
    <link rel="stylesheet" href="/fyp-system/components/common/navbar.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo-section">
                <a href="../../index.php"><img src="../../assets/images/mmu-logo-white.png"></a>
            </div>
            <div class="nav-section">
                <div class="nav-links">
                    <a href="../../index.php" class="nav-link" id="homeLink">Home</a>
                    <a href="../../pages/projects/projects-page.php" class="nav-link" id="projectsLink">Projects</a>
                    <a href="../../pages/meetings/meetings-page.php" class="nav-link" id="meetingsLink">Meetings</a>
                    <a href="../../pages/progress/progress-page.php" class="nav-link" id="progressLink">Progress</a>
                    <a href="../../pages/assessment/assessment-page.php" class="nav-link" id="assessmentLink">Assessment</a>
                    <a href="../../pages/support/support-page.php" class="nav-link" id="supportLink">Support</a>
                    <a href="../../pages/communication/communication-page.php" class="nav-link" id="communicationLink">
                        <i class="fas fa-comments"></i> Communication
                    </a>
                </div>
            </div>
            <div class="profile-menu">
                <button class="profile-btn" id="profileBtn">
                    <i class="fas fa-user-circle"></i>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="profile-dropdown" id="profileDropdown">
                    <a href="../../pages/profile/profile-page.php" id="profileLink">
                        <i class="fas fa-user"></i> My Profile
                    </a>
                    <a href="../../pages/login/login-page.php" id="loginBtn">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                    <a href="../../pages/register/register-page.php" id="registerBtn">
                        <i class="fas fa-user-plus"></i> Register
                    </a>
                    <a href="../../pages/login/login-page.php" id="logoutBtn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <script src="/fyp-system/components/common/navbar.js"></script>
</body>
</html>