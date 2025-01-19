<?php
require_once '../../auth/auth_check.php';
require_once '../../components/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FCI FYP System - Projects</title>
    <link rel="stylesheet" href="./projects-page.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="../../assets/js/auth.js" defer></script>
</head>
<body>
    <?php echo getNavbar('projects'); ?>

    <!-- Project Management Section -->
    <div class="section" id="projectProposals">
        <!-- Project Status Overview -->
        <div class="project-status-overview">
            <div class="status-card">
                <h3>Current Project</h3>
                <p id="currentProject">Not assigned</p>
            </div>
            <div class="status-card">
                <h3>Supervisor</h3>
                <p id="supervisorName">Not assigned</p>
            </div>
            <div class="status-card">
                <h3>Project Status</h3>
                <p id="projectStatus">Ongoing</p>
            </div>
            <div class="status-card">
                <h3>Proposal Status</h3>
                <p id="projectStatus">Pending</p>
            </div>
        </div>

        <!-- Project Actions -->
        <div class="project-actions-container">
            <div class="action-card">
                <div class="action-icon">
                    <i class="fas fa-list"></i>
                </div>
                <div class="action-content">
                    <h4>View Available Projects</h4>
                    <p>Browse all available final year projects</p>
                    <button class="action-btn" id="viewProposalsBtn" onclick="window.location.href='./view-projects.php'">View Projects</button>
                </div>
            </div>

            <div class="action-card">
                <div class="action-icon">
                    <i class="fas fa-user-tie"></i>
                </div>
                <div class="action-content">
                    <h4>Submit to Supervisor</h4>
                    <p>Submit your project proposal to a supervisor</p>
                    <button class="action-btn" id="submitSupervisorProposalBtn">Submit Proposal</button>
                </div>
            </div>

            <div class="action-card">
                <div class="action-icon">
                    <i class="fas fa-university"></i>
                </div>
                <div class="action-content">
                    <h4>Submit to Admin</h4>
                    <p>Submit your project proposal for admin approval</p>
                    <button class="action-btn" id="submitAdminProposalBtn">Submit Proposal</button>
                </div>
            </div>
        </div>

        <!-- Available Projects Section -->
        <div class="available-projects" style="display: none;">
            <div class="action-panel">
                <div class="panel-header">
                    <h3>Available Projects</h3>
                    <div class="filter-controls">
                        <select id="fieldFilter">
                            <option value="">All Fields</option>
                            <option value="ai">Artificial Intelligence</option>
                            <option value="ml">Machine Learning</option>
                            <option value="web">Web Development</option>
                            <option value="mobile">Mobile Development</option>
                            <option value="security">Cybersecurity</option>
                        </select>
                        <input type="text" id="searchProject" placeholder="Search projects...">
                    </div>
                </div>
                <div class="projects-grid">
                    <!-- Project cards will be added here dynamically -->
                </div>
            </div>
        </div>

        <!-- Project Timeline Section -->
        <div class="project-timeline-view" style="display: none;">
            <div class="action-panel">
                <div class="panel-header">
                    <h3>Project Timeline</h3>
                    <div class="timeline-controls">
                        <button class="view-btn" data-view="months">Monthly View</button>
                        <button class="view-btn active" data-view="weeks">Weekly View</button>
                    </div>
                </div>
                <div class="timeline-container">
                    <div class="timeline-phases">
                        <div class="phase">
                            <div class="phase-header">
                                <h4>Requirements Analysis</h4>
                                <span class="phase-date">Mar 1 - Mar 15</span>
                            </div>
                            <div class="phase-progress">
                                <div class="progress-bar" style="width: 100%"></div>
                                <span class="status completed">Completed</span>
                            </div>
                            <ul class="phase-tasks">
                                <li class="completed">Project scope definition</li>
                                <li class="completed">Requirements gathering</li>
                                <li class="completed">Initial documentation</li>
                            </ul>
                        </div>
                        <div class="phase current">
                            <div class="phase-header">
                                <h4>Design Phase</h4>
                                <span class="phase-date">Mar 16 - Mar 31</span>
                            </div>
                            <div class="phase-progress">
                                <div class="progress-bar" style="width: 60%"></div>
                                <span class="status in-progress">In Progress</span>
                            </div>
                            <ul class="phase-tasks">
                                <li class="completed">System architecture</li>
                                <li class="in-progress">Database design</li>
                                <li>UI/UX design</li>
                            </ul>
                        </div>
                        <div class="phase">
                            <div class="phase-header">
                                <h4>Development</h4>
                                <span class="phase-date">Apr 1 - Apr 30</span>
                            </div>
                            <div class="phase-progress">
                                <div class="progress-bar" style="width: 0%"></div>
                                <span class="status pending">Pending</span>
                            </div>
                            <ul class="phase-tasks">
                                <li>Backend development</li>
                                <li>Frontend development</li>
                                <li>Integration</li>
                            </ul>
                        </div>
                    </div>
                    <div class="timeline-milestones">
                        <div class="milestone completed">
                            <span class="milestone-date">Mar 15</span>
                            <span class="milestone-label">Requirements Sign-off</span>
                        </div>
                        <div class="milestone">
                            <span class="milestone-date">Mar 31</span>
                            <span class="milestone-label">Design Review</span>
                        </div>
                        <div class="milestone">
                            <span class="milestone-date">Apr 30</span>
                            <span class="milestone-label">Development Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update the Projects Submission section -->
        <div class="action-panel">
            <div class="panel-header">
                <h3>Projects Submission</h3>
                <button class="submit-project-btn" id="submitProjectBtn">
                    <i class="fas fa-upload"></i> Submit Project
                </button>
            </div>
            <div class="submissions-list">
                <table class="submission-table">
                    <thead>
                        <tr>
                            <th>Submission Date</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Files</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="submissionTableBody">
                        <tr>
                            <td>March 20, 2024</td>
                            <td>Final Report Draft</td>
                            <td>Initial draft of project report</td>
                            <td>report_v1.pdf</td>
                            <td><span class="status-badge pending">Under Review</span></td>
                        </tr>
                        <tr>
                            <td>March 18, 2024</td>
                            <td>Source Code</td>
                            <td>Complete project source code</td>
                            <td>project_code.zip</td>
                            <td><span class="status-badge active">Approved</span></td>
                        </tr>
                        <tr>
                            <td>March 15, 2024</td>
                            <td>Presentation Slides</td>
                            <td>Final presentation slides</td>
                            <td>presentation.pptx</td>
                            <td><span class="status-badge active">Approved</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Project Submission Modal -->
        <div class="modal" id="projectSubmissionModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Submit Project</h3>
                    <button class="close-btn">&times;</button>
                </div>
                <form id="projectSubmissionForm">
                    <div class="form-group">
                        <label for="submissionTitle">Title</label>
                        <input type="text" id="submissionTitle" required placeholder="e.g., Final Report, Project Demo">
                    </div>
                    <div class="form-group">
                        <label for="submissionDescription">Description</label>
                        <textarea id="submissionDescription" rows="3" required 
                            placeholder="Describe what you are submitting..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="submissionFiles">Project Files</label>
                        <div class="file-upload-container">
                            <input type="file" id="submissionFiles" multiple class="file-input" required>
                            <div class="file-list" id="submissionFileList">
                                <!-- Selected files will be listed here -->
                            </div>
                        </div>
                        <small>Upload your project files (documents, source code, etc.)</small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="cancel-btn">Cancel</button>
                        <button type="submit" class="save-btn">Submit Project</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Add this new section inside the project management section -->
        <div class="project-planning">
            <div class="action-panel">
                <div class="panel-header">
                    <h3>Project Planning</h3>
                    <button class="add-plan-btn" id="addPlanBtn">
                        <i class="fas fa-tasks"></i> Submit Project Plan
                    </button>
                </div>
                
                <div class="plans-list">
                    <table class="plan-table">
                        <thead>
                            <tr>
                                <th>Phase</th>
                                <th>Description</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="planTableBody">
                            <tr>
                                <td>Requirements Analysis</td>
                                <td>Gather and analyze project requirements</td>
                                <td>March 1, 2024</td>
                                <td>March 15, 2024</td>
                                <td><span class="status-badge active">Completed</span></td>
                                <td>
                                    <button class="action-icon2 view-btn" title="View"><i class="fas fa-eye"></i></button>
                                    <button class="action-icon2 edit-btn" title="Edit"><i class="fas fa-edit"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Design Phase</td>
                                <td>System architecture and UI design</td>
                                <td>March 16, 2024</td>
                                <td>March 30, 2024</td>
                                <td><span class="status-badge pending">In Progress</span></td>
                                <td>
                                    <button class="action-icon2 view-btn" title="View"><i class="fas fa-eye"></i></button>
                                    <button class="action-icon2 edit-btn" title="Edit"><i class="fas fa-edit"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Development</td>
                                <td>Implementation of core features</td>
                                <td>April 1, 2024</td>
                                <td>April 30, 2024</td>
                                <td><span class="status-badge pending">Pending</span></td>
                                <td>
                                    <button class="action-icon2 view-btn" title="View"><i class="fas fa-eye"></i></button>
                                    <button class="action-icon2 edit-btn" title="Edit"><i class="fas fa-edit"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Project Plan Modal -->
            <div class="modal" id="planModal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 id="planModalTitle">Submit Project Plan</h3>
                        <button class="close-btn">&times;</button>
                    </div>
                    <form id="planForm">
                        <div class="form-group">
                            <label for="planPhase">Project Phase</label>
                            <select id="planPhase" required>
                                <option value="requirements">Requirements Analysis</option>
                                <option value="design">System Design</option>
                                <option value="development">Development</option>
                                <option value="testing">Testing</option>
                                <option value="deployment">Deployment</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="planDescription">Description</label>
                            <textarea id="planDescription" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="startDate">Start Date</label>
                            <input type="date" id="startDate" required>
                        </div>
                        <div class="form-group">
                            <label for="endDate">End Date</label>
                            <input type="date" id="endDate" required>
                        </div>
                        <div class="form-group">
                            <label for="deliverables">Deliverables</label>
                            <textarea id="deliverables" rows="2" placeholder="List the expected deliverables"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="cancel-btn">Cancel</button>
                            <button type="submit" class="save-btn">Submit Plan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="action-panel">
            <div class="panel-header">
                <h3>Presentation Slot Booking</h3>
                <button class="book-slot-btn" id="bookSlotBtn">
                    <i class="fas fa-calendar-plus"></i> Book Presentation Slot
                </button>
            </div>
            <div class="bookings-list">
                <table class="booking-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Venue</th>
                            <th>Panel Members</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="bookingTableBody">
                        <tr>
                            <td>March 25, 2024</td>
                            <td>10:00 AM</td>
                            <td>Meeting Room 1</td>
                            <td>Dr. Smith, Dr. Johnson</td>
                            <td><span class="status-badge pending">Pending</span></td>
                        </tr>
                        <tr>
                            <td>March 26, 2024</td>
                            <td>2:00 PM</td>
                            <td>Meeting Room 2</td>
                            <td>Dr. Williams, Prof. Brown</td>
                            <td><span class="status-badge active">Confirmed</span></td>
                        </tr>
                        <tr>
                            <td>March 27, 2024</td>
                            <td>11:00 AM</td>
                            <td>Meeting Room 1</td>
                            <td>Dr. Davis, Dr. Miller</td>
                            <td><span class="status-badge pending">Pending</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <footer>
            <p>&copy; 2024 Faculty of Computing and Informatics, Multimedia University. All Rights Reserved.</p>
        </footer>
        
</body>
</html>