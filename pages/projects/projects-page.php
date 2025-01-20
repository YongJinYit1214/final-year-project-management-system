<?php
require_once '../../auth/auth_check.php';
require_once '../../components/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects - FCI FYP</title>
    <link rel="stylesheet" href="../../index.css">
    <link rel="stylesheet" href="./projects-page.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="../../assets/js/auth.js" defer></script>
</head>
<body>
    <?php echo getNavbar('projects'); ?>

    <div class="section">
        <h2>Project Management</h2>
        
        <div class="project-actions-container">
            <!-- Submit to Supervisor Card -->
            <div class="action-card">
                <div class="action-icon">
                    <i class="fas fa-user-tie"></i>
                </div>
                <h4>Submit to Supervisor</h4>
                <p>Submit your project proposal directly to a supervisor for review.</p>
                <button class="action-btn" onclick="openModal('supervisorModal')">
                    Submit Proposal
                </button>
            </div>

            <!-- Submit to Admin Card -->
            <div class="action-card">
                <div class="action-icon">
                    <i class="fas fa-user-shield"></i>
                </div>
                <h4>Submit to Admin</h4>
                <p>Submit your project proposal to admin.</p>
                <button class="action-btn" onclick="openModal('adminModal')">
                    Submit Proposal
                </button>
            </div>

            <!-- View Available Projects Card -->
            <div class="action-card">
                <div class="action-icon">
                    <i class="fas fa-list"></i>
                </div>
                <h4>Available Project proposals</h4>
                <p>View the list of available project proposals.</p>
                <button class="action-btn" onclick="window.location.href='view-projects.php'">
                    View Proposals
                </button>
            </div>
        </div>

        <!-- Project Submissions -->
        <div class="panel-header">
            <h3>Project Submissions</h3>
            <button class="submit-project-btn">
                <i class="fas fa-plus"></i> Submit Project
            </button>
        </div>
        <table class="submission-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Submission Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Add your submission data here -->
            </tbody>
        </table>

        <!-- Project Planning -->
        <div class="panel-header">
            <h3>Project Planning</h3>
            <button class="add-plan-btn">
                <i class="fas fa-plus"></i> Add Plan
            </button>
        </div>
        <table class="plan-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Add your planning data here -->
            </tbody>
        </table>

        <!-- Presentation Slot Booking -->
        <div class="panel-header">
            <h3>Presentation Slot Booking</h3>
            <button class="book-slot-btn">
                <i class="fas fa-plus"></i> Book Slot
            </button>
        </div>
        <table class="booking-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Venue</th>
                    <th>Supervisor</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Add your booking data here -->
            </tbody>
        </table>
    </div>

    <!-- Supervisor Submission Modal -->
    <div id="supervisorModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Submit Proposal to Supervisor</h3>
                <span class="close" onclick="closeModal('supervisorModal')">&times;</span>
            </div>
            <form action="submit-proposal.php" method="POST">
                <input type="hidden" name="submission_type" value="supervisor">
                
                <div class="form-group">
                    <label for="supervisor">Select Supervisor</label>
                    <select id="supervisor" name="supervisor_id" required>
                        <option value="">Choose a supervisor</option>
                        <?php
                        require_once "../../db_connection.php";
                        $conn = OpenCon();
                        $sql = "SELECT u.user_id, u.full_name, u.email 
                               FROM users u 
                               JOIN supervisors s ON u.user_id = s.supervisor_id 
                               WHERE u.role = 'supervisor'";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='".$row['user_id']."'>".$row['full_name']." (".$row['email'].")</option>";
                        }
                        CloseCon($conn);
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="title">Project Title</label>
                    <input type="text" id="title" name="title" required>
                </div>

                <div class="form-group">
                    <label for="description">Project Description</label>
                    <textarea id="description" name="description" rows="4" required></textarea>
                </div>

                <div class="form-buttons">
                    <button type="submit" class="submit-btn">Submit Proposal</button>
                    <button type="button" class="cancel-btn" onclick="closeModal('supervisorModal')">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Admin Submission Modal -->
    <div id="adminModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Submit Proposal to Admin</h3>
                <span class="close" onclick="closeModal('adminModal')">&times;</span>
            </div>
            <form action="submit-proposal.php" method="POST">
                <input type="hidden" name="submission_type" value="admin">
                
                <div class="form-group">
                    <label for="admin_supervisor">Preferred Supervisor</label>
                    <select id="admin_supervisor" name="supervisor_id" required>
                        <option value="">Choose a supervisor</option>
                        <?php
                        $conn = OpenCon();
                        $sql = "SELECT u.user_id, u.full_name, u.email 
                               FROM users u 
                               JOIN supervisors s ON u.user_id = s.supervisor_id 
                               WHERE u.role = 'supervisor'";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='".$row['user_id']."'>".$row['full_name']." (".$row['email'].")</option>";
                        }
                        CloseCon($conn);
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="admin_title">Project Title</label>
                    <input type="text" id="admin_title" name="title" required>
                </div>

                <div class="form-group">
                    <label for="admin_description">Project Description</label>
                    <textarea id="admin_description" name="description" rows="4" required></textarea>
                </div>

                <div class="form-buttons">
                    <button type="submit" class="submit-btn">Submit Proposal</button>
                    <button type="button" class="cancel-btn" onclick="closeModal('adminModal')">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    function openModal(modalId) {
        document.getElementById(modalId).style.display = "block";
    }

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = "none";
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        if (event.target.className === 'modal') {
            event.target.style.display = "none";
        }
    }
    </script>
</body>
</html>