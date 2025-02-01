<?php
session_start();
require_once '../../auth/role_check.php';
$hasAccess = checkStudentRole();
require_once '../../auth/auth_check.php';
require_once '../../components/navbar.php';
require_once '../../db_connection.php';
$conn = OpenCon();

$student_id = $_SESSION['user_id'];

// Get student's project and assessment details
$query = "SELECT p.title as project_title, 
                 a.total_marks, 
                 a.project_planning, 
                 a.technical_implementation, 
                 a.documentation, 
                 a.presentation, 
                 a.feedback,
                 u.full_name as supervisor_name
          FROM projects p
          JOIN users u ON p.supervisor_id = u.user_id
          LEFT JOIN assessments a ON p.project_id = a.project_id
          WHERE p.student_id = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();
$assessment = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assessment Results - FYP System</title>
    <link rel="stylesheet" href="../../index.css">
    <link rel="stylesheet" href="./projects-page.css">
</head>
<body>
    <?php echo getNavbar('student'); ?>
    
    <?php if ($hasAccess): ?>
    <div class="section">
        <h2>Project Assessment Results</h2>
        
        <?php if ($assessment): ?>
            <div class="assessment-results">
                <div class="project-info">
                    <h3><?php echo htmlspecialchars($assessment['project_title']); ?></h3>
                    <p>Supervisor: <?php echo htmlspecialchars($assessment['supervisor_name']); ?></p>
                </div>
                
                <?php if ($assessment['total_marks']): ?>
                    <div class="marks-breakdown">
                        <h4>Marks Breakdown</h4>
                        <div class="marks-grid">
                            <div class="mark-item">
                                <label>Project Planning:</label>
                                <span><?php echo number_format($assessment['project_planning'], 1); ?>/25</span>
                            </div>
                            <div class="mark-item">
                                <label>Technical Implementation:</label>
                                <span><?php echo number_format($assessment['technical_implementation'], 1); ?>/25</span>
                            </div>
                            <div class="mark-item">
                                <label>Documentation:</label>
                                <span><?php echo number_format($assessment['documentation'], 1); ?>/25</span>
                            </div>
                            <div class="mark-item">
                                <label>Presentation:</label>
                                <span><?php echo number_format($assessment['presentation'], 1); ?>/25</span>
                            </div>
                            <div class="mark-item total">
                                <label>Total Marks:</label>
                                <span><?php echo number_format($assessment['total_marks'], 1); ?>/100</span>
                            </div>
                        </div>
                        
                        <div class="feedback-section">
                            <h4>Supervisor's Feedback</h4>
                            <p><?php echo nl2br(htmlspecialchars($assessment['feedback'])); ?></p>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="no-assessment">
                        <p>Your project has not been assessed yet.</p>
                    </div>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <div class="no-project">
                <p>No project found. Please submit a project first.</p>
                <a href="submit-project.php" class="btn">Submit Project</a>
            </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>

    <style>
        .assessment-results {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .project-info {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }

        .marks-breakdown {
            margin-top: 20px;
        }

        .marks-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin: 20px 0;
        }

        .mark-item {
            padding: 15px;
            background: #f8f9fa;
            border-radius: 6px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .mark-item.total {
            grid-column: 1 / -1;
            background: #e9ecef;
            font-weight: bold;
        }

        .feedback-section {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .no-assessment,
        .no-project {
            text-align: center;
            padding: 40px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 15px;
        }

        .btn:hover {
            background: #0056b3;
        }
    </style>
</body>
</html> 