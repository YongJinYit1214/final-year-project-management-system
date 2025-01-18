<?php
session_start();
require_once '../../auth/role_check.php';
$hasAccess = checkAdminRole(); // Store the result of the role check
require_once '../../auth/auth_check.php';
require_once '../../components/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FCI FYP System - Admin Dashboard</title>
    <link rel="stylesheet" href="../../index.css">
    <link rel="stylesheet" href="./admin-dashboard-page.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="../../assets/js/auth.js" defer></script>
    <style>
        .alert {
            padding: 15px;
            margin: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .alert-error {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
    </style>
</head>
<body>
<?php echo getNavbar('admin'); ?>

<?php
// Display error message if exists
if (isset($_SESSION['error_message'])) {
    echo '<div class="alert alert-error">' . htmlspecialchars($_SESSION['error_message']) . '</div>';
    unset($_SESSION['error_message']); // Clear the message after displaying
}
?>

<?php if ($hasAccess): ?>
<!-- Admin Dashboard -->
<div class="section" id="adminDashboard">
    <h2>Admin Dashboard</h2>
    <div class="dashboard-overview">
        <div class="dashboard-stats">
            <div class="stat-card">
                <h3>Total Projects</h3>
                <div class="stat-number">45</div>
                <p>Active Projects</p>
            </div>
            <div class="stat-card">
                <h3>Total Students</h3>
                <div class="stat-number">150</div>
                <p>Registered</p>
            </div>
            <div class="stat-card">
                <h3>Total Supervisors</h3>
                <div class="stat-number">15</div>
                <p>Active</p>
            </div>
        </div>
        
        <div class="admin-actions">
            <div class="action-panel">
                <h3>System Management</h3>
                <div class="admin-controls">
                    <button class="admin-btn" id="manageUsersBtn"><i class="fas fa-user-plus"></i> Manage Users</button>
                    <button class="admin-btn"><i class="fas fa-project-diagram"></i> Manage Projects</button>
                    <button class="admin-btn"><i class="fas fa-cog"></i> System Settings</button>
                    <button class="admin-btn"><i class="fas fa-file-export"></i> Generate Reports</button>
                </div>
            </div>
        </div>

        <!-- Add this new section for user management -->
        <div class="user-management-panel" style="display: none;">
            <div class="action-panel">
                <div class="panel-header">
                    <h3>User Management</h3>
                    <button class="add-user-btn" id="addUserBtn">
                        <i class="fas fa-plus"></i> Add New User
                    </button>
                </div>
                
                <!-- User Table -->
                <div class="table-container">
                    <table class="user-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="userTableBody">
                            <tr>
                                <td>John Doe</td>
                                <td>john@example.com</td>
                                <td>Student</td>
                                <td><span class="status-badge active">Active</span></td>
                                <td>
                                    <button class="action-icon edit-btn"><i class="fas fa-edit"></i></button>
                                    <button class="action-icon delete-btn"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Jane Smith</td>
                                <td>jane@example.com</td>
                                <td>Supervisor</td>
                                <td><span class="status-badge active">Active</span></td>
                                <td>
                                    <button class="action-icon edit-btn"><i class="fas fa-edit"></i></button>
                                    <button class="action-icon delete-btn"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Add/Edit User Modal -->
            <div class="modal" id="userModal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 id="modalTitle">Add New User</h3>
                        <button class="close-btn">&times;</button>
                    </div>
                    <form id="userForm">
                        <div class="form-group">
                            <label for="userName">Full Name</label>
                            <input type="text" id="userName" required>
                        </div>
                        <div class="form-group">
                            <label for="userEmail">Email</label>
                            <input type="email" id="userEmail" required>
                        </div>
                        <div class="form-group">
                            <label for="userRole">Role</label>
                            <select id="userRole" required>
                                <option value="student">Student</option>
                                <option value="supervisor">Supervisor</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="userStatus">Status</label>
                            <select id="userStatus" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="userPassword">Password</label>
                            <input type="password" id="userPassword" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="cancel-btn">Cancel</button>
                            <button type="submit" class="save-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Project Proposals Management -->
        <div class="action-panel">
            <div class="panel-header">
                <h3>Project Proposals Management</h3>
            </div>
            <div class="proposals-list">
                <table class="proposal-table">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Project Title</th>
                            <th>Field</th>
                            <th>Submission Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="adminProposalsTableBody">
                        <tr>
                            <td>John Doe</td>
                            <td>AI-Powered Learning System</td>
                            <td>Artificial Intelligence</td>
                            <td>March 15, 2024</td>
                            <td><span class="status-badge pending">Pending</span></td>
                            <td>
                                <button class="action-icon view-btn" title="View"><i class="fas fa-eye"></i></button>
                                <button class="action-icon edit-btn" title="Edit"><i class="fas fa-edit"></i></button>
                                <button class="action-icon delete-btn" title="Delete"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Jane Smith</td>
                            <td>Smart Home Automation System</td>
                            <td>IoT</td>
                            <td>March 14, 2024</td>
                            <td><span class="status-badge active">Approved</span></td>
                            <td>
                                <button class="action-icon view-btn" title="View"><i class="fas fa-eye"></i></button>
                                <button class="action-icon edit-btn" title="Edit"><i class="fas fa-edit"></i></button>
                                <button class="action-icon delete-btn" title="Delete"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Mike Johnson</td>
                            <td>Blockchain-based Voting System</td>
                            <td>Blockchain</td>
                            <td>March 13, 2024</td>
                            <td><span class="status-badge pending">Pending</span></td>
                            <td>
                                <button class="action-icon view-btn" title="View"><i class="fas fa-eye"></i></button>
                                <button class="action-icon edit-btn" title="Edit"><i class="fas fa-edit"></i></button>
                                <button class="action-icon delete-btn" title="Delete"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Announcements Management -->
        <div class="action-panel">
            <div class="panel-header">
                <h3>Announcements Management</h3>
                <button class="add-announcement-btn" id="addAnnouncementBtn">
                    <i class="fas fa-bullhorn"></i> Add Announcement
                </button>
            </div>
            <div class="announcements-list">
                <table class="announcement-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Posted Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="announcementTableBody">
                        <tr>
                            <td>FYP Registration Deadline</td>
                            <td>Registration closes on March 30, 2024</td>
                            <td>March 15, 2024</td>
                            <td><span class="status-badge active">Active</span></td>
                            <td>
                                <button class="action-icon edit-btn" title="Edit"><i class="fas fa-edit"></i></button>
                                <button class="action-icon delete-btn" title="Delete"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<footer>
    <p>&copy; 2024 Faculty of Computing and Informatics, Multimedia University. All Rights Reserved.</p>
</footer>
</body>
</html>