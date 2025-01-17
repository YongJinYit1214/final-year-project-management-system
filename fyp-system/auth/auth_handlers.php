<?php
session_start();
header('Content-Type: application/json');

try {
    require_once __DIR__ . '/../db_connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $action = $_POST['action'] ?? '';
        $response = [];

        switch ($action) {
            case 'register':
                $response = handleRegistration($_POST);
                break;
            case 'login':
                $response = handleLogin($_POST);
                break;
            case 'logout':
                $response = handleLogout();
                break;
            default:
                $response = ['success' => false, 'message' => 'Invalid action'];
        }

        echo json_encode($response);
        exit;
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'A system error occurred']);
    exit;
}

function handleRegistration($data) {
    global $conn;
    
    try {
        // Check for required fields
        $required_fields = ['email', 'password', 'name', 'student_id', 'specialization', 'country_code', 'phone_number'];
        foreach ($required_fields as $field) {
            if (!isset($data[$field]) || empty($data[$field])) {
                return ['success' => false, 'message' => "Missing required field: $field"];
            }
        }

        if (!$conn) {
            return ['success' => false, 'message' => 'Database connection failed'];
        }

        // Validate phone number format
        $phone_number = sanitize_input($data['phone_number']);
        $country_code = sanitize_input($data['country_code']);
        
        // Remove '+' from country code and combine with phone number to check total length
        $full_phone = substr($country_code, 1) . $phone_number; // Remove '+' and combine
        if (!preg_match('/^\d{8,10}$/', $full_phone)) {
            return ['success' => false, 'message' => 'Phone number including country code should be between 8-10 digits'];
        }

        // Sanitize inputs
        $email = sanitize_input($data['email']);
        $password = $data['password'];
        $full_name = sanitize_input($data['name']);
        $role = 'student';
        $student_id = sanitize_input($data['student_id']);
        $specialization = sanitize_input($data['specialization']);

        // Check if email exists
        $check_stmt = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        if ($check_stmt->get_result()->num_rows > 0) {
            return ['success' => false, 'message' => "Email already exists"];
        }
        $check_stmt->close();

        // Start transaction
        $conn->begin_transaction();

        // Insert user with phone details
        $stmt = $conn->prepare("INSERT INTO users (email, password, full_name, role, country_code, phone_number) VALUES (?, ?, ?, ?, ?, ?)");
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("ssssss", $email, $hashed_password, $full_name, $role, $country_code, $phone_number);
        $stmt->execute();
        $user_id = $conn->insert_id;
        $stmt->close();

        // Insert student
        $stmt = $conn->prepare("INSERT INTO students (student_id, matric_number, course) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $user_id, $student_id, $specialization);
        $stmt->execute();
        $stmt->close();

        $conn->commit();
        return ['success' => true, 'message' => 'Registration successful'];

    } catch (Exception $e) {
        if (isset($conn) && $conn->ping()) {
            $conn->rollback();
        }
        return ['success' => false, 'message' => 'Registration failed'];
    }
}

function handleLogin($data) {
    global $conn;
    
    try {
        if (!$conn) {
            return ['success' => false, 'message' => 'Database connection failed'];
        }

        $email = sanitize_input($data['email']);
        $password = $data['password'];

        $stmt = $conn->prepare("SELECT u.user_id, u.email, u.password, u.full_name, u.role FROM users u WHERE u.email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return ['success' => false, 'message' => 'Invalid email or password'];
        }

        $user = $result->fetch_assoc();
        $stmt->close();

        if (!password_verify($password, $user['password'])) {
            return ['success' => false, 'message' => 'Invalid email or password'];
        }

        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['full_name'] = $user['full_name'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] === 'student') {
            $stmt = $conn->prepare("SELECT matric_number, course FROM students WHERE student_id = ?");
            $stmt->bind_param("i", $user['user_id']);
            $stmt->execute();
            $student_data = $stmt->get_result()->fetch_assoc();
            if ($student_data) {
                $_SESSION['matric_number'] = $student_data['matric_number'];
                $_SESSION['course'] = $student_data['course'];
            }
            $stmt->close();
        }

        $redirect_url = '/fyp-system/';
        switch ($user['role']) {
            case 'admin':
                $redirect_url .= 'pages/admin-dashboard/admin-dashboard-page.php';
                break;
            case 'supervisor':
                $redirect_url .= 'pages/supervisor-dashboard/supervisor-dashboard-page.php';
                break;
            case 'student':
                $redirect_url .= 'index.php';
                break;
        }

        return [
            'success' => true,
            'message' => 'Login successful',
            'redirect' => $redirect_url
        ];

    } catch (Exception $e) {
        return ['success' => false, 'message' => 'Login failed'];
    }
}

function handleLogout() {
    session_destroy();
    return ['success' => true, 'message' => 'Logout successful'];
}
?> 