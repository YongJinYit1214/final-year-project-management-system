<?php
require_once '../../auth/auth_check.php';
require_once '../../components/navbar.php';
require_once './fetch-email.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $email = $_POST['email'];
    addEmail($subject, $message, $email);
    header("Location: /fyp-system/pages/communication/communication-page.php");
    exit(); 
}

function addEmail($subject, $message, $email) {
    require_once '../../db_connection.php';
    $conn = OpenCon();

    if (!isset($_SESSION['user_id'])) {
        die("User not logged in.");
    }

    $user_id = $_SESSION['user_id'];

    // Use prepared statements to prevent SQL injection
    $sql = "
        INSERT INTO communications (sender_id, receiver_id, subject, message) 
        VALUES (?, (SELECT user_id FROM users WHERE email = ?), ?, ?)
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $user_id, $email, $subject, $message);

    if ($stmt->execute()) {
        echo "Email sent successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    CloseCon($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FCI FYP System - Email</title>
    <!-- <link rel="stylesheet" href="../../index.css"> -->
    <!-- <link rel="stylesheet" href="./shared.css"> -->
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
                    <button class="compose-btn" id="composeBtn">
                        <i class="fas fa-pen"></i> Compose
                    </button>

                    <!-- Modal Container -->
                    <div id="emailModal" class="modal">
                        <div class="modal-content">
                            <span class="close-btn">&times;</span>
                            <div class="panel-header">
                                <h3>Compose Email</h3>
                            </div>
                            <form id="emailForm" class="email-form" method="post" action="">
                                <div class="form-group">
                                    <label for="email">To</label>
                                    <input type="email" id="email" name="email" required placeholder="Email to...">
                                </div>
                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <input type="text" id="subject" name="subject" required placeholder="Enter email subject here...">
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea id="message" name="message" rows="4" required placeholder="Please provide detailed information..."></textarea>
                                </div>
                                <button type="submit" class="submit-btn">Send Email</button>
                            </form>
                        </div>
                    </div>

                    <div class="email-folders">
                        <a href="#inbox" class="folder" id="inboxTab">
                            <i class="fas fa-inbox"></i> Inbox
                        </a>
                        <a href="#sent" class="folder" id="sentTab">
                            <i class="fas fa-paper-plane"></i> Sent
                        </a>
                    </div>
                </div>
                <div class="email-list" id="inbox">
                    <?php
                        $result = getInbox();
                        
                        while ($row = $result->fetch_assoc()) {
                            echo '<a href="#email1" class="email-item unread">';
                            echo '<div class="email-sender">'.$row['full_name'].'</div>';
                            echo '<div class="email-subject">'.$row['subject'].'</div>';
                            echo '<div class="email-preview">'.$row['message'].'</div>';
                            echo '<div class="email-date">'.$row['sent_at'].'</div>';
                            echo '</a>';
                        }
                    ?>
                </div>

                <div class="email-list" id="sent" style="display: none;">
                    <?php
                        $result = getSentEmails();
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<a href="#email2" class="email-item">';
                                echo '<div class="email-sender">'.$row['full_name'].'</div>';
                                echo '<div class="email-subject">'.$row['subject'].'</div>';
                                echo '<div class="email-preview">'.$row['message'].'</div>';
                                echo '<div class="email-date">'.$row['sent_at'].'</div>';
                                echo '</a>';
                            }
                        } else {
                            echo '<p>No sent emails found.</p>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Faculty of Computing and Informatics, Multimedia University. All Rights Reserved.</p>
    </footer>
    <script>
    console.log("Script is running!"); // Add this at the top of your script
    const modal = document.getElementById('emailModal');
    const openModalBtn = document.getElementById('composeBtn');
    const closeModalBtn = document.querySelector('.close-btn');
    const inboxTab = document.getElementById('inboxTab');
    const sentTab = document.getElementById('sentTab');
    const inboxDiv = document.getElementById('inbox');
    const sentDiv = document.getElementById('sent');

    if (openModalBtn && modal) {
        openModalBtn.addEventListener('click', () => {
            console.log('Compose button clicked'); // Debugging step
            modal.style.display = 'block';
        });
    } else {
        console.error('Compose button or modal not found'); // Debugging step
    }

    if (closeModalBtn) {
        closeModalBtn.addEventListener('click', () => {
            console.log('Close button clicked'); // Debugging step
            modal.style.display = 'none';
        });
    } else {
        console.error('Close button not found'); // Debugging step
    }

    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            console.log('Modal background clicked'); // Debugging step
            modal.style.display = 'none';
        }
    });

    // Inbox tab functionality
    if (inboxTab && inboxDiv && sentDiv) {
        inboxTab.addEventListener('click', (e) => {
            e.preventDefault(); // Prevent default link behavior
            console.log('Inbox tab clicked'); // Debugging step
            inboxDiv.style.display = 'block';
            sentDiv.style.display = 'none';
        });
    } else {
        console.error('Inbox tab or divs not found'); // Debugging step
    }

    // Sent tab functionality
    if (sentTab && inboxDiv && sentDiv) {
        sentTab.addEventListener('click', (e) => {
            e.preventDefault(); // Prevent default link behavior
            console.log('Sent tab clicked'); // Debugging step
            sentDiv.style.display = 'block';
            inboxDiv.style.display = 'none';
        });
    } else {
        console.error('Sent tab or divs not found'); // Debugging step
    }
    </script>

</body>
</html> 