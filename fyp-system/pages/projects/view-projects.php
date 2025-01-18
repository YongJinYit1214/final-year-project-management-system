<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FCI FYP System - Available Projects</title>
    <link rel="stylesheet" href="./view-projects.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="home-button">
        <a href="../projects/projects-page.php" title="Back to Home">
            <i class="fas fa-home"></i>
        </a>
    </div>

    <div class="section">
        <h2>Available Projects</h2>
        
        <div class="filters-section">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search projects...">
            </div>
            <div class="filter-options">
                <select class="filter-select">
                    <option value="">All Categories</option>
                    <option value="ai">Artificial Intelligence</option>
                    <option value="web">Web Development</option>
                    <option value="mobile">Mobile Development</option>
                    <option value="security">Cybersecurity</option>
                </select>
                <select class="filter-select">
                    <option value="">All Supervisors</option>
                    <option value="dr-smith">Dr. Smith</option>
                    <option value="dr-jones">Dr. Jones</option>
                    <option value="prof-wilson">Prof. Wilson</option>
                </select>
            </div>
        </div>

        <div class="projects-grid">
            <!-- Project Card 1 -->
            <div class="project-card">
                <div class="project-header">
                    <span class="project-category">Artificial Intelligence</span>
                    <span class="project-status available">Available</span>
                </div>
                <h3>AI-Powered Healthcare Diagnosis System</h3>
                <p class="project-description">
                    Development of a machine learning model for early disease detection using patient symptoms and medical history.
                </p>
                <div class="project-details">
                    <div class="detail-item">
                        <i class="fas fa-user-tie"></i>
                        <span>Dr. Sarah Johnson</span>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-clock"></i>
                        <span>8 months duration</span>
                    </div>
                </div>
                <div class="project-skills">
                    <span class="skill-tag">Python</span>
                    <span class="skill-tag">TensorFlow</span>
                    <span class="skill-tag">Healthcare</span>
                </div>
                <button class="apply-btn">Apply for Project</button>
            </div>

            <!-- Project Card 2 -->
            <div class="project-card">
                <div class="project-header">
                    <span class="project-category">Web Development</span>
                    <span class="project-status available">Available</span>
                </div>
                <h3>E-Learning Platform with Real-time Collaboration</h3>
                <p class="project-description">
                    Building an interactive learning platform with video conferencing and collaborative tools.
                </p>
                <div class="project-details">
                    <div class="detail-item">
                        <i class="fas fa-user-tie"></i>
                        <span>Dr. Michael Brown</span>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-clock"></i>
                        <span>6 months duration</span>
                    </div>
                </div>
                <div class="project-skills">
                    <span class="skill-tag">React</span>
                    <span class="skill-tag">Node.js</span>
                    <span class="skill-tag">WebRTC</span>
                </div>
                <button class="apply-btn">Apply for Project</button>
            </div>

            <!-- Add more project cards as needed -->
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Faculty of Computing and Informatics, Multimedia University. All Rights Reserved.</p>
    </footer>
</body>
</html> 