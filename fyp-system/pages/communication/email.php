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
    <title>FCI FYP System - Email</title>
    <link rel="stylesheet" href="../../index.css">
    <link rel="stylesheet" href="./shared.css">
    <link rel="stylesheet" href="./email.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="../../assets/js/auth.js" defer></script>
</head>
<body>
<?php echo getNavbar('communication'); ?>

    <!-- Email Section -->
    <div class="section" id="communication">
        <h2>Communication Center</h2>
        <div class="communication-container">
            <!-- Communication Tabs -->
            <div class="comm-tabs">
                <a href="communication-page.php" class="tab-btn">
                    <i class="fas fa-comments"></i> Chat Room
                </a>
                <a href="email.php" class="tab-btn active">
                    <i class="fas fa-envelope"></i> Email
                </a>
                <a href="forum.php" class="tab-btn">
                    <i class="fas fa-users"></i> Forum
                </a>
            </div>

            <!-- Email Content -->
            <div class="email-container">
                <div class="email-sidebar">
                    <a href="#compose" class="compose-btn">
                        <i class="fas fa-pen"></i> Compose
                    </a>
                    <div class="email-folders">
                        <a href="#inbox" class="folder active">
                            <i class="fas fa-inbox"></i> Inbox
                        </a>
                        <a href="#sent" class="folder">
                            <i class="fas fa-paper-plane"></i> Sent
                        </a>
                    </div>
                </div>
                <div class="email-list">
                    <a href="#email1" class="email-item unread">
                        <div class="email-sender">Dr. Sarah Johnson</div>
                        <div class="email-subject">Project Review Meeting</div>
                        <div class="email-preview">Let's schedule a meeting to discuss your progress on the database implementation. I've reviewed your initial design and have some suggestions.</div>
                        <div class="email-date">10:30 AM</div>
                    </a>
                    <a href="#email2" class="email-item unread">
                        <div class="email-sender">System Admin</div>
                        <div class="email-subject">Server Access Credentials</div>
                        <div class="email-preview">Your development server credentials have been updated. Please use the following details to access the server: Username: dev_user123...</div>
                        <div class="email-date">Yesterday</div>
                    </a>
                    <a href="#email3" class="email-item">
                        <div class="email-sender">Tech Support</div>
                        <div class="email-subject">RE: Database Connection Issue</div>
                        <div class="email-preview">We've resolved the connection issue you reported. Please try connecting again and let us know if you face any problems.</div>
                        <div class="email-date">Apr 5</div>
                    </a>
                    <a href="#email4" class="email-item">
                        <div class="email-sender">Project Coordinator</div>
                        <div class="email-subject">Upcoming Workshop: Git & Version Control</div>
                        <div class="email-preview">We're organizing a workshop on Git basics and version control best practices. Date: April 15, 2024, Time: 2:00 PM</div>
                        <div class="email-date">Apr 4</div>
                    </a>
                    <a href="#email5" class="email-item">
                        <div class="email-sender">Library Services</div>
                        <div class="email-subject">Research Resources Access</div>
                        <div class="email-preview">Your request for access to the IEEE Digital Library has been approved. You can now access the resources using your student credentials.</div>
                        <div class="email-date">Apr 3</div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Faculty of Computing and Informatics, Multimedia University. All Rights Reserved.</p>
    </footer>
    
</body>
</html> 