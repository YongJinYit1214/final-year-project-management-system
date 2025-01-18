-- Create the database
CREATE DATABASE IF NOT EXISTS fyp_system;
USE fyp_system;

-- Users table (base table for all user types)
CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    role ENUM('student', 'supervisor', 'admin') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    phone_number VARCHAR(20) NOT NULL,
    country_code VARCHAR(10) NOT NULL
);

-- Students table
CREATE TABLE students (
    student_id INT PRIMARY KEY,
    matric_number VARCHAR(20) UNIQUE NOT NULL,
    course VARCHAR(100) NOT NULL,
    FOREIGN KEY (student_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Supervisors table
CREATE TABLE supervisors (
    supervisor_id INT PRIMARY KEY,
    department VARCHAR(100) NOT NULL,
    expertise TEXT,
    max_students INT DEFAULT 5,
    FOREIGN KEY (supervisor_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Admin table
CREATE TABLE admins (
    admin_id INT PRIMARY KEY,
    department VARCHAR(100) NOT NULL,
    FOREIGN KEY (admin_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Project proposals table
CREATE TABLE project_proposals (
    proposal_id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT,
    supervisor_id INT,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
    feedback TEXT,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES students(student_id) ON DELETE SET NULL,
    FOREIGN KEY (supervisor_id) REFERENCES supervisors(supervisor_id) ON DELETE SET NULL
);

-- Projects table (approved proposals become projects)
CREATE TABLE projects (
    project_id INT PRIMARY KEY AUTO_INCREMENT,
    proposal_id INT UNIQUE,
    student_id INT,
    supervisor_id INT,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    start_date DATE,
    end_date DATE,
    status ENUM('ongoing', 'completed', 'failed') DEFAULT 'ongoing',
    FOREIGN KEY (proposal_id) REFERENCES project_proposals(proposal_id),
    FOREIGN KEY (student_id) REFERENCES students(student_id) ON DELETE SET NULL,
    FOREIGN KEY (supervisor_id) REFERENCES supervisors(supervisor_id) ON DELETE SET NULL
);

-- Assessments table
CREATE TABLE assessments (
    assessment_id INT PRIMARY KEY AUTO_INCREMENT,
    project_id INT,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    due_date DATE,
    weight DECIMAL(5,2),
    FOREIGN KEY (project_id) REFERENCES projects(project_id) ON DELETE CASCADE
);

-- Assessment submissions table
CREATE TABLE assessment_submissions (
    submission_id INT PRIMARY KEY AUTO_INCREMENT,
    assessment_id INT,
    student_id INT,
    submission_file VARCHAR(255),
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    marks DECIMAL(5,2),
    feedback TEXT,
    FOREIGN KEY (assessment_id) REFERENCES assessments(assessment_id) ON DELETE CASCADE,
    FOREIGN KEY (student_id) REFERENCES students(student_id) ON DELETE CASCADE
);

-- Communications table (for emails and messages)
CREATE TABLE communications (
    communication_id INT PRIMARY KEY AUTO_INCREMENT,
    sender_id INT,
    receiver_id INT,
    subject VARCHAR(255),
    message TEXT NOT NULL,
    sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    read_status BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (sender_id) REFERENCES users(user_id) ON DELETE SET NULL,
    FOREIGN KEY (receiver_id) REFERENCES users(user_id) ON DELETE SET NULL
);

-- Important dates table
CREATE TABLE important_dates (
    date_id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    date DATE NOT NULL,
    created_by INT,
    FOREIGN KEY (created_by) REFERENCES users(user_id) ON DELETE SET NULL
);

-- FAQ table
CREATE TABLE faqs (
    faq_id INT PRIMARY KEY AUTO_INCREMENT,
    question TEXT NOT NULL,
    answer TEXT NOT NULL,
    category VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Project guidelines table
CREATE TABLE guidelines (
    guideline_id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    category VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Password reset tokens table
CREATE TABLE password_reset_tokens (
    token_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    token VARCHAR(255) NOT NULL,
    expires_at TIMESTAMP NOT NULL,
    used BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Create indexes for better performance
CREATE INDEX idx_user_email ON users(email);
CREATE INDEX idx_student_matric ON students(matric_number);
CREATE INDEX idx_proposal_status ON project_proposals(status);
CREATE INDEX idx_project_status ON projects(status);
CREATE INDEX idx_assessment_due_date ON assessments(due_date);
CREATE INDEX idx_communication_date ON communications(sent_at); 
