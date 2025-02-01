<?php
function getNavbar($active_page = '') {
    $isLoggedIn = isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
    $meetingsPage = '/fyp-system/pages/meetings/meetings-page.php';
    
    $html = '
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo-section">
                <a href="/fyp-system/index.php"><img src="/fyp-system/assets/images/mmu-logo-white.png" alt="MMU Logo"></a>
            </div>
            <div class="nav-section">
                <div class="nav-links">
                    <a href="/fyp-system/index.php" class="nav-link ' . ($active_page === 'home' ? 'active' : '') . '" id="homeLink">Home</a>
                    <a href="/fyp-system/pages/projects/projects-page.php" class="nav-link ' . ($active_page === 'projects' ? 'active' : '') . '" id="projectsLink">Projects</a>
                    <a href="'.$meetingsPage.'" class="nav-link ' . ($active_page === 'meetings' ? 'active' : '') . '" id="meetingsLink">Meetings</a>
                    <a href="/fyp-system/pages/progress/progress-page.php" class="nav-link ' . ($active_page === 'progress' ? 'active' : '') . '" id="progressLink">Progress</a>
                    <a href="/fyp-system/pages/assessment/assessment-page.php" class="nav-link ' . ($active_page === 'assessment' ? 'active' : '') . '" id="assessmentLink">Assessment</a>
                    <a href="/fyp-system/pages/support/support-page.php" class="nav-link ' . ($active_page === 'support' ? 'active' : '') . '" id="supportLink">Support</a>
                    <a href="/fyp-system/pages/communication/communication-page.php" class="nav-link ' . ($active_page === 'communication' ? 'active' : '') . '" id="communicationLink">Communication</a>
                    <a href="/fyp-system/pages/profile/profile-page.php" class="nav-link ' . ($active_page === 'profile' ? 'active' : '') . '" id="profileLink">Profile</a>';
    
    if ($isLoggedIn) {
        $html .= '<a href="javascript:void(0);" onclick="handleLogout()" class="nav-link" id="logoutBtn">Logout</a>';
    } else {
        $html .= '
            <a href="/fyp-system/pages/login/login-page.php" class="nav-link ' . ($active_page === 'login' ? 'active' : '') . '" id="loginBtn">Login</a>
            <a href="/fyp-system/pages/register/register-page.php" class="nav-link ' . ($active_page === 'register' ? 'active' : '') . '" id="registerBtn">Register</a>';
    }
    
    $html .= '
                </div>
            </div>
        </div>
    </nav>';
    
    return $html;
}
?> 