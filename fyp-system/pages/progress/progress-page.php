<?php
require_once '../../auth/auth_check.php';
require_once '../../components/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FCI FYP System - Progress</title>
    <link rel="stylesheet" href="../../index.css">
    <link rel="stylesheet" href="./progress-page.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="../../assets/js/auth.js" defer></script>
</head>

<body>
<?php echo getNavbar('progress'); ?>

<!-- Progress Section -->
<div class="section" id="progress">
    <h2>Progress Tracking</h2>
    <div class="progress-overview">
        <div class="progress-stats">
            <div class="stat-card">
                <h3>Overall Progress</h3>
                <div class="progress-circle" data-progress="65">
                    <span class="progress-text">65%</span>
                </div>
            </div>
            <div class="stat-card">
                <h3>Completed Tasks</h3>
                <p class="stat-number">13/20</p>
                <p class="stat-subtitle">Tasks Completed</p>
            </div>
            <div class="stat-card">
                <h3>Next Milestone</h3>
                <p class="milestone-date">May 15, 2024</p>
                <p class="milestone-title">Project Presentation</p>
            </div>
        </div>
        <div class="project-timeline">
            <h3>Project Timeline</h3>
        </div>
    </div>

    <div class="weekly-goals">
        <div class="section-header">
            <h3>Weekly Goals</h3>
            <button class="add-goal-btn" id="addGoalBtn">
                <i class="fas fa-plus"></i> Add New Goal
            </button>
        </div>
        
        <div class="goals-container">
            <div class="current-week">
                <h4>Current Week Goals (Week of April 8, 2024)</h4>
                <div class="goals-list" id="currentWeekGoals">
                    <div class="goal-item high">
                        <div class="goal-header">
                            <h5>Complete Database Design</h5>
                            <span class="goal-priority priority-high">High Priority</span>
                        </div>
                        <p class="goal-description">Finalize ERD and implement database schema</p>
                        <div class="goal-footer">
                            <span class="goal-deadline"><i class="fas fa-calendar"></i> Due: April 12, 2024</span>
                            <span class="goal-progress">Progress: 75%</span>
                        </div>
                    </div>

                    <div class="goal-item medium">
                        <div class="goal-header">
                            <h5>User Interface Testing</h5>
                            <span class="goal-priority priority-medium">Medium Priority</span>
                        </div>
                        <p class="goal-description">Conduct usability testing with 5 participants</p>
                        <div class="goal-footer">
                            <span class="goal-deadline"><i class="fas fa-calendar"></i> Due: April 14, 2024</span>
                            <span class="goal-progress">Progress: 30%</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="previous-goals">
                <h4>Previous Weeks</h4>
                <div class="goals-list" id="previousWeekGoals">
                    <div class="goal-item completed">
                        <div class="goal-header">
                            <h5>Requirements Analysis</h5>
                            <span class="goal-priority priority-high">Completed</span>
                        </div>
                        <p class="goal-description">Document all functional and non-functional requirements</p>
                        <div class="goal-footer">
                            <span class="goal-deadline"><i class="fas fa-calendar-check"></i> Completed: April 5, 2024</span>
                            <span class="goal-progress">Progress: 100%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Goal Setting Modal -->
        <div class="modal" id="goalModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Set Weekly Goal</h3>
                    <button class="close-btn">&times;</button>
                </div>
                <form id="goalForm">
                    <div class="form-group">
                        <label for="goalTitle">Goal Title</label>
                        <input type="text" id="goalTitle" required placeholder="Enter goal title">
                    </div>
                    <div class="form-group">
                        <label for="goalDescription">Description</label>
                        <textarea id="goalDescription" rows="3" placeholder="Describe your goal"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="goalDeadline">Deadline</label>
                        <input type="date" id="goalDeadline" required>
                    </div>
                    <div class="form-group">
                        <label for="goalPriority">Priority</label>
                        <select id="goalPriority" required>
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="cancel-btn">Cancel</button>
                        <button type="submit" class="save-btn">Save Goal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<footer>
    <p>&copy; 2024 Faculty of Computing and Informatics, Multimedia University. All Rights Reserved.</p>
</footer>
</html>