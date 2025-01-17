<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FCI FYP System - Supervisor Dashboard</title>
    <link rel="stylesheet" href="../../index.css">
    <link rel="stylesheet" href="./supervisor-dashboard-page.css">
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
                <a href="../communication/communication-page.php" class="nav-link" id="communicationLink">Communication</a>
                <a href="../profile/profile-page.php" class="nav-link" id="profileLink">Profile</a>
                <a href="../supervisor-dashboard/supervisor-dashboard-page.php" class="nav-link active" id="supervisorLink">
                    <i class="fas fa-chalkboard-teacher"></i> Supervisor
                </a>
                <a href="../login/login-page.php" class="nav-link" id="loginBtn">Login</a>
                <a href="../register/register-page.php" class="nav-link" id="registerBtn">Register</a>
            </div>
        </div>
    </div>
</nav>

<!-- Supervisor Dashboard -->
<div class="section" id="supervisorDashboard">
    <h2>Supervisor Dashboard</h2>
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

            <!-- Add this new section for pending plans -->
            <div class="action-panel">
                <div class="panel-header">
                    <h3>Project Plans Pending Approval</h3>
                </div>
                <div class="pending-plans">
                    <table class="plan-table">
                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>Phase</th>
                                <th>Description</th>
                                <th>Timeline</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="pendingPlansTableBody">
                            <tr>
                                <td>John Doe</td>
                                <td>Requirements Analysis</td>
                                <td>Initial project scope and requirements gathering</td>
                                <td>March 1 - March 15</td>
                                <td>
                                    <button class="action-icon approve-btn" title="Approve"><i class="fas fa-check"></i></button>
                                    <button class="action-icon reject-btn" title="Reject"><i class="fas fa-times"></i></button>
                                    <button class="action-icon comment-btn" title="Comment"><i class="fas fa-comment"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Jane Smith</td>
                                <td>Design Phase</td>
                                <td>System architecture and database design</td>
                                <td>March 16 - March 30</td>
                                <td>
                                    <button class="action-icon approve-btn" title="Approve"><i class="fas fa-check"></i></button>
                                    <button class="action-icon reject-btn" title="Reject"><i class="fas fa-times"></i></button>
                                    <button class="action-icon comment-btn" title="Comment"><i class="fas fa-comment"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Existing proposal submission panel -->
            <div class="action-panel">
                <div class="panel-header">
                    <h3>Project Proposals</h3>
                    <button class="add-proposal-btn" id="addProposalBtn">
                        <i class="fas fa-plus"></i> Submit New Proposal
                    </button>
                </div>
                
                <div class="proposals-list">
                    <table class="proposal-table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Field</th>
                                <th>Max Students</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>AI-Powered Learning System</td>
                                <td>Artificial Intelligence</td>
                                <td>3</td>
                                <td><span class="status-badge pending">Pending</span></td>
                                <td>
                                    <button class="action-icon view-btn" title="View"><i class="fas fa-eye"></i></button>
                                    <button class="action-icon edit-btn" title="Edit"><i class="fas fa-edit"></i></button>
                                    <button class="action-icon delete-btn" title="Delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Blockchain Voting Platform</td>
                                <td>Blockchain</td>
                                <td>2</td>
                                <td><span class="status-badge active">Approved</span></td>
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

            <!-- Add Proposal Modal -->
            <div class="modal" id="proposalModal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 id="proposalModalTitle">Submit New Proposal</h3>
                        <button class="close-btn">&times;</button>
                    </div>
                    <form id="proposalForm">
                        <div class="form-group">
                            <label for="proposalTitle">Project Title</label>
                            <input type="text" id="proposalTitle" required>
                        </div>
                        <div class="form-group">
                            <label for="proposalField">Field of Study</label>
                            <select id="proposalField" required>
                                <option value="ai">Artificial Intelligence</option>
                                <option value="ml">Machine Learning</option>
                                <option value="web">Web Development</option>
                                <option value="mobile">Mobile Development</option>
                                <option value="security">Cybersecurity</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="proposalDescription">Project Description</label>
                            <textarea id="proposalDescription" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="maxStudents">Maximum Students</label>
                            <input type="number" id="maxStudents" min="1" max="3" value="1" required>
                        </div>
                        <div class="form-group">
                            <label for="requirements">Requirements</label>
                            <textarea id="requirements" rows="3" placeholder="List the prerequisites and requirements"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="cancel-btn">Cancel</button>
                            <button type="submit" class="save-btn">Submit Proposal</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Add this after the proposal modal in the supervisor dashboard section -->
            <div class="modal" id="assignProjectModal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Assign Project to Student</h3>
                        <button class="close-btn">&times;</button>
                    </div>
                    <form id="assignProjectForm">
                        <div class="form-group">
                            <label for="projectSelect">Select Project</label>
                            <select id="projectSelect" required>
                                <!-- Will be populated dynamically with available projects -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="studentSelect">Select Student</label>
                            <select id="studentSelect" required>
                                <option value="">Select a student...</option>
                                <option value="1">John Doe - TP123456</option>
                                <option value="2">Jane Smith - TP789012</option>
                                <option value="3">Alex Johnson - TP345678</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="cancel-btn">Cancel</button>
                            <button type="submit" class="save-btn">Assign Project</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Add this inside the supervisor-actions div in the supervisor dashboard -->
            <div class="action-panel">
                <div class="panel-header">
                    <h3>Project Evaluations</h3>
                </div>
                <div class="evaluations-list">
                    <table class="evaluation-table">
                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>Project</th>
                                <th>Current Phase</th>
                                <th>Last Submission</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John Doe</td>
                                <td>AI Learning System</td>
                                <td>Development</td>
                                <td>March 20, 2024</td>
                                <td>
                                    <button class="action-icon evaluate-btn" title="Evaluate"><i class="fas fa-star"></i></button>
                                    <button class="action-icon comment-btn" title="Add Comment"><i class="fas fa-comment"></i></button>
                                    <button class="action-icon history-btn" title="View History"><i class="fas fa-history"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Jane Smith</td>
                                <td>Blockchain Voting</td>
                                <td>Testing</td>
                                <td>March 18, 2024</td>
                                <td>
                                    <button class="action-icon evaluate-btn" title="Evaluate"><i class="fas fa-star"></i></button>
                                    <button class="action-icon comment-btn" title="Add Comment"><i class="fas fa-comment"></i></button>
                                    <button class="action-icon history-btn" title="View History"><i class="fas fa-history"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Evaluation Modal -->
                <div class="modal" id="evaluationModal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Project Evaluation</h3>
                            <button class="close-btn">&times;</button>
                        </div>
                        <form id="evaluationForm">
                            <div class="student-info">
                                <h4 id="studentName">Student: John Doe</h4>
                                <p id="projectTitle">Project: AI Project</p>
                            </div>
                            <div class="evaluation-criteria">
                                <div class="form-group">
                                    <label>Technical Achievement (40%)</label>
                                    <input type="number" min="0" max="40" required>
                                </div>
                                <div class="form-group">
                                    <label>Project Management (20%)</label>
                                    <input type="number" min="0" max="20" required>
                                </div>
                                <div class="form-group">
                                    <label>Documentation (20%)</label>
                                    <input type="number" min="0" max="20" required>
                                </div>
                                <div class="form-group">
                                    <label>Presentation (20%)</label>
                                    <input type="number" min="0" max="20" required>
                                </div>
                                <div class="total-score">
                                    Total Score: <span id="totalScore">0</span>/100
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Feedback/Comments</label>
                                <textarea rows="4" placeholder="Provide detailed feedback..." required></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="cancel-btn">Cancel</button>
                                <button type="submit" class="save-btn">Submit Evaluation</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Comments Modal -->
                <div class="modal" id="commentsModal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Project Comments</h3>
                            <button class="close-btn">&times;</button>
                        </div>
                        <div class="comments-section">
                            <div class="comments-list">
                                <!-- Previous comments will be listed here -->
                            </div>
                            <form id="commentForm">
                                <div class="form-group">
                                    <label>Add New Comment</label>
                                    <textarea rows="3" placeholder="Type your comment..." required></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="cancel-btn">Cancel</button>
                                    <button type="submit" class="save-btn">Post Comment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add this inside the supervisor-actions div, after the Project Proposals panel -->
            <div class="action-panel">
                <div class="panel-header">
                    <h3>Student Project Submissions</h3>
                </div>
                <div class="student-submissions">
                    <table class="submission-table">
                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>Project Title</th>
                                <th>Submission Date</th>
                                <th>Files</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="supervisorSubmissionsTableBody">
                            <tr>
                                <td>John Doe</td>
                                <td>AI Learning System</td>
                                <td>March 25, 2024</td>
                                <td>
                                    <div class="submission-files">
                                        <span class="file-chip">
                                            <i class="fas fa-file-pdf"></i> Project_Report.pdf
                                        </span>
                                        <span class="file-chip">
                                            <i class="fas fa-file-code"></i> source_code.zip
                                        </span>
                                    </div>
                                </td>
                                <td><span class="status-badge pending">Under Review</span></td>
                                <td>
                                    <button class="action-icon view-btn" title="View"><i class="fas fa-eye"></i></button>
                                    <button class="action-icon download-btn" title="Download"><i class="fas fa-download"></i></button>
                                    <button class="action-icon feedback-btn" title="Feedback"><i class="fas fa-comment"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Jane Smith</td>
                                <td>Blockchain Voting</td>
                                <td>March 23, 2024</td>
                                <td>
                                    <div class="submission-files">
                                        <span class="file-chip">
                                            <i class="fas fa-file-pdf"></i> Documentation.pdf
                                        </span>
                                        <span class="file-chip">
                                            <i class="fas fa-file-archive"></i> project_files.zip
                                        </span>
                                    </div>
                                </td>
                                <td><span class="status-badge active">Approved</span></td>
                                <td>
                                    <button class="action-icon view-btn" title="View"><i class="fas fa-eye"></i></button>
                                    <button class="action-icon download-btn" title="Download"><i class="fas fa-download"></i></button>
                                    <button class="action-icon feedback-btn" title="Feedback"><i class="fas fa-comment"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Submission Details Modal -->
            <div class="modal" id="submissionDetailsModal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Submission Details</h3>
                        <button class="close-btn">&times;</button>
                    </div>
                    <div class="submission-details">
                        <div class="student-info">
                            <h4>Student: John Doe</h4>
                            <p>Project: AI Learning System</p>
                        </div>
                        <div class="submission-files-list">
                            <h4>Submitted Files</h4>
                            <div class="file-list">
                                <!-- Files will be listed here -->
                            </div>
                        </div>
                        <div class="submission-feedback">
                            <h4>Feedback</h4>
                            <form id="feedbackForm">
                                <div class="form-group">
                                    <label>Comments</label>
                                    <textarea rows="4" placeholder="Add your feedback here..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select>
                                        <option value="approved">Approve</option>
                                        <option value="revision">Needs Revision</option>
                                        <option value="rejected">Reject</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="cancel-btn">Close</button>
                                    <button type="submit" class="save-btn">Submit Feedback</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add this inside the supervisor-actions div in the supervisor dashboard -->
            <div class="action-panel">
                <div class="panel-header">
                    <h3>Presentation Slot Management</h3>
                </div>
                <div class="presentation-slots">
                    <table class="booking-table">
                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>Project Title</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Venue</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="presentationSlotsTableBody">
                            <!-- Example slot -->
                            <tr>
                                <td>John Doe</td>
                                <td>AI Learning System</td>
                                <td>Mar 30, 2024</td>
                                <td>10:00 AM</td>
                                <td>Meeting Room 1</td>
                                <td><span class="booking-status pending">Pending</span></td>
                                <td>
                                    <div class="booking-actions">
                                        <button class="action-icon approve-booking-btn" title="Approve">
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <button class="action-icon reject-booking-btn" title="Reject">
                                            <i class="fas fa-times"></i>
                                        </button>
                                        <button class="action-icon reschedule-btn" title="Suggest Reschedule">
                                            <i class="fas fa-calendar-alt"></i>
                                        </button>
                                        <button class="action-icon view-detail-btn" title="View Detail">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Presentation Details Modal -->
            <div class="modal" id="presentationDetailsModal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Presentation Details</h3>
                        <button class="close-btn">&times;</button>
                    </div>
                    <div class="presentation-details">
                        <div class="student-info">
                            <h4>Student Information</h4>
                            <p><strong>Name:</strong> <span id="studentName"></span></p>
                            <p><strong>Project:</strong> <span id="projectTitle"></span></p>
                        </div>
                        <div class="slot-info">
                            <h4>Slot Information</h4>
                            <p><strong>Date:</strong> <span id="presentationDate"></span></p>
                            <p><strong>Time:</strong> <span id="presentationTime"></span></p>
                            <p><strong>Venue:</strong> <span id="presentationVenue"></span></p>
                            <p><strong>Status:</strong> <span id="presentationStatus"></span></p>
                        </div>
                        <div class="panel-members">
                            <h4>Panel Members</h4>
                            <ul id="panelMembersList">
                                <li>Dr. Smith (Chair)</li>
                                <li>Dr. Johnson</li>
                                <li>Prof. Williams</li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="cancel-btn">Close</button>
                            <button type="button" class="save-btn" id="updateSlotBtn">Update Slot</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add this modal before the closing div of supervisor-actions -->
            <div class="modal" id="rejectReasonModal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Rejection Reason</h3>
                        <button class="close-btn">&times;</button>
                    </div>
                    <form id="rejectReasonForm">
                        <div class="form-group">
                            <label for="rejectReason">Please provide a reason for rejection:</label>
                            <textarea id="rejectReason" name="rejectReason" rows="4" required 
                                placeholder="Enter the reason for rejecting this presentation slot..."></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="cancel-btn">Cancel</button>
                            <button type="submit" class="save-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <p>&copy; 2024 Faculty of Computing and Informatics, Multimedia University. All Rights Reserved.</p>
</footer>

    </body>
</>

<!-- Add this script at the bottom of the body -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const rejectBtns = document.querySelectorAll('.reject-booking-btn');
    const rejectModal = document.getElementById('rejectReasonModal');
    const closeBtn = rejectModal.querySelector('.close-btn');
    const cancelBtn = rejectModal.querySelector('.cancel-btn');
    const rejectForm = document.getElementById('rejectReasonForm');
    
    // Open modal when reject button is clicked
    rejectBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            rejectModal.style.display = 'block';
        });
    });
    
    // Close modal functions
    function closeModal() {
        rejectModal.style.display = 'none';
        rejectForm.reset();
    }
    
    closeBtn.addEventListener('click', closeModal);
    cancelBtn.addEventListener('click', closeModal);
    
    // Close modal when clicking outside
    window.addEventListener('click', function(event) {
        if (event.target === rejectModal) {
            closeModal();
        }
    });
    
    // Handle form submission
    rejectForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const reason = document.getElementById('rejectReason').value;
        if (reason.trim()) {
            // Here you would typically send this to your backend
            console.log('Rejection reason:', reason);
            // Update the status in the table (for demo purposes)
            const statusCell = document.querySelector('.booking-status.pending');
            if (statusCell) {
                statusCell.textContent = 'Rejected';
                statusCell.className = 'booking-status rejected';
            }
            closeModal();
        }
    });
});
</script>