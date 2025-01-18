<?php
session_start();
require_once '../../auth/auth_check.php';
require_once '../../components/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FCI FYP System - Meetings</title>
    <!-- <link rel="stylesheet" href="../../index.css"> -->
    <link rel="stylesheet" href="./meetings-page.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="../../assets/js/auth.js" defer></script>
</head>
<body>
<?php echo getNavbar('meetings'); ?>
    <!-- Meetings Section -->
    <div class="section content-section" id="meetings">
        <h2>Meetings Management</h2>
        <div class="meetings-container">
            <div class="upcoming-meetings">
                <h3>Upcoming Meetings</h3>
                <button class="schedule-btn" id="scheduleNewMeeting">
                    <i class="fas fa-plus"></i> Schedule Meeting
                </button>
                <div class="meetings-list">
                    <div class="meeting-item">
                        <div class="meeting-info">
                            
                            <h4>Project Review Meeting</h4>
                            <p><i class="fas fa-user"></i> Dr. Sarah Johnson</p>
                            <p><i class="fas fa-calendar"></i> April 15, 2024 - 2:00 PM</p>
                            <p><i class="fas fa-map-marker-alt"></i> Online (Google Meet)</p>
                        </div>
                        <div class="meeting-actions">
                            <span class="meeting-status upcoming">Upcoming</span>
                            <button class="action-btn join-btn">Join Meeting</button>
                        </div>
                    </div>

                    <div class="meeting-item">
                        <div class="meeting-info">
                            <h4>Database Design Discussion</h4>
                            <p><i class="fas fa-user"></i> Prof. Michael Chen</p>
                            <p><i class="fas fa-calendar"></i> April 18, 2024 - 10:30 AM</p>
                            <p><i class="fas fa-map-marker-alt"></i> FCI Meeting Room 2</p>
                        </div>
                        <div class="meeting-actions">
                            <span class="meeting-status scheduled">Scheduled</span>
                            <button class="action-btn reschedule-btn">Reschedule</button>
                        </div>
                    </div>

                    <div class="meeting-item">
                        <div class="meeting-info">
                            <h4>Weekly Progress Update</h4>
                            <p><i class="fas fa-user"></i> Dr. Sarah Johnson</p>
                            <p><i class="fas fa-calendar"></i> April 22, 2024 - 3:00 PM</p>
                            <p><i class="fas fa-map-marker-alt"></i> Online (Zoom)</p>
                        </div>
                        <div class="meeting-actions">
                            <span class="meeting-status scheduled">Scheduled</span>
                            <button class="action-btn reschedule-btn">Reschedule</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="meeting-logs">
                <h3>Meeting Logs</h3>
                <div class="logs-list">
                    <div class="meeting-item completed">
                        <div class="meeting-info">
                            <h4>Initial Project Discussion</h4>
                            <p><i class="fas fa-user"></i> Dr. Sarah Johnson</p>
                            <p><i class="fas fa-calendar"></i> April 1, 2024 - 2:00 PM</p>
                            <p><i class="fas fa-clock"></i> Duration: 45 minutes</p>
                        </div>
                        <div class="meeting-actions">
                            <span class="meeting-status completed">Completed</span>
                            <button class="action-btn view-notes-btn">View Notes</button>
                        </div>
                    </div>

                    <div class="meeting-item completed">
                        <div class="meeting-info">
                            <h4>Requirements Analysis</h4>
                            <p><i class="fas fa-user"></i> Prof. Michael Chen</p>
                            <p><i class="fas fa-calendar"></i> April 5, 2024 - 11:00 AM</p>
                            <p><i class="fas fa-clock"></i> Duration: 60 minutes</p>
                        </div>
                        <div class="meeting-actions">
                            <span class="meeting-status completed">Completed</span>
                            <button class="action-btn view-notes-btn">View Notes</button>
                        </div>
                    </div>

                    <div class="meeting-item cancelled">
                        <div class="meeting-info">
                            <h4>Technical Review</h4>
                            <p><i class="fas fa-user"></i> Dr. Sarah Johnson</p>
                            <p><i class="fas fa-calendar"></i> April 8, 2024 - 3:30 PM</p>
                            <p><i class="fas fa-info-circle"></i> Rescheduled to April 15</p>
                        </div>
                        <div class="meeting-actions">
                            <span class="meeting-status cancelled">Cancelled</span>
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