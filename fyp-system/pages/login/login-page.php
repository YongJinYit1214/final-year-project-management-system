<!-- Login Form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FCI FYP System - Login</title>
    <link rel="stylesheet" href="./login-page.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
            display: none;
        }
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        .alert-error {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
    </style>
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
                    <a href="../login/login-page.php" class="nav-link active" id="loginBtn">Login</a>
                    <a href="../register/register-page.php" class="nav-link" id="registerBtn">Register</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Login Section -->
    <div class="login-container">
        <div class="form-container" id="loginForm">
            <div class="form-logo-section">
                <img src="../../assets/images/mmu-logo.png" alt="MMU Logo">
            </div>
            <h2>Welcome Back</h2>
            <p class="subtitle">Please login to your account</p>
            
            <div class="alert" id="loginAlert" style="display: none;"></div>
            
            <form id="loginFormElement">
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="password-input-group">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <button type="button" class="password-toggle" onclick="togglePassword('password')">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox" name="remember">
                        Remember me
                    </label>
                    <a href="forgot-password.php" class="forgot-password">Forgot Password?</a>
                </div>
                <button type="submit">Login</button>
                <p class="form-footer">Don't have an account? <a href="../register/register-page.php">Register here</a></p>
            </form>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Faculty of Computing and Informatics, Multimedia University. All Rights Reserved.</p>
    </footer>
    
    <script src="../../assets/js/auth.js"></script>
</body>
</html>