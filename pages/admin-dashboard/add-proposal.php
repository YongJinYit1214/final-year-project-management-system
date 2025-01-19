<?php
require_once '../../auth/auth_check.php';
require_once '../../components/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FCI FYP System - Add Proposal</title>
    <link rel="stylesheet" href="../../index.css">
    <link rel="stylesheet" href="./admin-dashboard-page.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <?php echo getNavbar('admin'); ?>

    <div class="section">
        <h2>Add New Proposal</h2>
        
        <?php
        // Display error message if exists
        if (isset($_SESSION['error_message'])) {
            echo '<div class="alert alert-error">' . htmlspecialchars($_SESSION['error_message']) . '</div>';
            unset($_SESSION['error_message']);
        }
        ?>

        <div class="dashboard-container">
            <div class="action-panel">
                <form method="POST" action="save-proposal.php">
                    <div class="form-group">
                        <label for="title">Project Title</label>
                        <input type="text" id="title" name="title" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Project Description</label>
                        <textarea id="description" name="description" rows="4" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="student_id">Student</label>
                        <select id="student_id" name="student_id" required>
                            <option value="">Select Student</option>
                            <?php
                            require_once "../../db_connection.php";
                            $conn = OpenCon();
                            $sql = "SELECT user_id, full_name, email FROM users WHERE role = 'student'";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='".$row['user_id']."'>".$row['full_name']." (".$row['email'].")</option>";
                            }
                            CloseCon($conn);
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="supervisor_id">Supervisor</label>
                        <select id="supervisor_id" name="supervisor_id" required>
                            <option value="">Select Supervisor</option>
                            <?php
                            $conn = OpenCon();
                            $sql = "SELECT user_id, full_name, email FROM users WHERE role = 'supervisor'";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='".$row['user_id']."'>".$row['full_name']." (".$row['email'].")</option>";
                            }
                            CloseCon($conn);
                            ?>
                        </select>
                    </div>

                    <div class="form-buttons">
                        <button type="submit" class="save-btn">Submit Proposal</button>
                        <a href="manage-projects.php" class="cancel-btn">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Faculty of Computing and Informatics, Multimedia University. All Rights Reserved.</p>
    </footer>
</body>
</html> 