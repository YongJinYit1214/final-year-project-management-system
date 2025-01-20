<?php
session_start();
require_once '../../auth/role_check.php';
$hasAccess = checkSupervisorRole(); // Store the result of the role check
require_once '../../auth/auth_check.php';
require_once '../../components/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FCI FYP System - Supervisor Dashboard</title>
    <link rel="stylesheet" href="../../index.css">
    <link rel="stylesheet" href="./supervisor-dashboard-page.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="../../assets/js/auth.js" defer></script>
</head>
<body>
<?php echo getNavbar('supervisor'); ?>

<?php
// Display error message if exists
if (isset($_SESSION['error_message'])) {
    echo '<div class="alert alert-error">' . htmlspecialchars($_SESSION['error_message']) . '</div>';
    unset($_SESSION['error_message']);
}
?>

<?php if ($hasAccess): ?>
<!-- Supervisor Dashboard -->
<div class="section" id="supervisorDashboard">
    <h2>Supervisor Dashboard</h2>
    <button style="background-color: #0066cc; color: white; border: none; padding: 12px 30px; border-radius: 6px; cursor: pointer; font-size: 16px; margin: 20px 0 30px 0; display: inline-flex; align-items: center; gap: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);" onmouseover="this.style.backgroundColor='#0052a3'" onmouseout="this.style.backgroundColor='#0066cc'" onclick="window.location.href='manage-proposals.php'">
        <i class="fas fa-tasks" style="font-size: 18px;"></i> Manage Student Proposals
    </button>
    <div class="dashboard-overview">
        <div class="dashboard-stats">
            <div class="stat-card">
                <h3>Assigned Students</h3>
                <div class="stat-number">12</div>
                <p>Active Projects</p>
            </div>
            <div class="stat-card">
                <h3>Pending Reviews</h3>
                <div class="stat-number">5</div>
                <p>Submissions</p>
            </div>
            <div class="stat-card">
                <h3>Upcoming Meetings</h3>
                <div class="stat-number">3</div>
                <p>This Week</p>
            </div>
        </div>
        
        <div class="supervisor-actions">
            <div class="action-panel">
                <h3>Student Projects</h3>
                <div class="project-list">
                    <div class="project-item">
                        <h4>John Doe - AI Project</h4>
                        <p>Progress: 75%</p>
                        <button class="view-details-btn">View Details</button>
                    </div>
                    <div class="project-item">
                        <h4>Jane Smith - ML Project</h4>
                        <p>Progress: 60%</p>
                        <button class="view-details-btn">View Details</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>