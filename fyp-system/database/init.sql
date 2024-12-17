-- Create Database
CREATE DATABASE UniversityDB;
USE UniversityDB;

-- Create USERS Table
CREATE TABLE USERS (
    id VARCHAR(255) NOT NULL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20),
    created_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    role ENUM('student', 'supervisor', 'admin') NOT NULL,
    status ENUM('active', 'inactive') DEFAULT 'active',
    isEmailNotified BOOLEAN DEFAULT FALSE,
    isSystemNotified BOOLEAN DEFAULT FALSE
);

-- Create FACULTIES Table
CREATE TABLE FACULTIES (
    id VARCHAR(255) PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE
);

-- Create COURSES Table
CREATE TABLE COURSES (
    id VARCHAR(255) PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE
);

-- Create STUDENTS Table
CREATE TABLE STUDENTS (
    id VARCHAR(255) PRIMARY KEY,
    faculty_id VARCHAR(255),
    course_id VARCHAR(255),
    FOREIGN KEY (id) REFERENCES USERS(id),
    FOREIGN KEY (faculty_id) REFERENCES FACULTIES(id),
    FOREIGN KEY (course_id) REFERENCES COURSES(id)
);

-- Create SUPERVISORS Table
CREATE TABLE SUPERVISORS (
    id VARCHAR(255) PRIMARY KEY,
    faculty_id VARCHAR(255),
    FOREIGN KEY (id) REFERENCES USERS(id),
    FOREIGN KEY (faculty_id) REFERENCES FACULTIES(id)
);

-- Create ADMINS Table
CREATE TABLE ADMINS (
    id VARCHAR(255) PRIMARY KEY,
    level ENUM('r', 'rw', 'rwx') NOT NULL,
    FOREIGN KEY (id) REFERENCES USERS(id)
);

-- Create ANNOUNCEMENTS Table
CREATE TABLE ANNOUNCEMENTS (
    id VARCHAR(255) PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_by VARCHAR(255),
    created_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_by VARCHAR(255),
    updated_date DATETIME,
    deleted_by VARCHAR(255),
    deleted_date DATETIME,
    is_deleted BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (created_by) REFERENCES USERS(id),
    FOREIGN KEY (updated_by) REFERENCES USERS(id),
    FOREIGN KEY (deleted_by) REFERENCES USERS(id)
);

-- Create EVENTS Table
CREATE TABLE EVENTS (
    id VARCHAR(255) PRIMARY KEY,
    host_id VARCHAR(255),
    status VARCHAR(255),
    event_date DATETIME NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    FOREIGN KEY (host_id) REFERENCES ADMINS(id)
);

-- Create APPOINTMENTS Table
CREATE TABLE APPOINTMENTS (
    id INT PRIMARY KEY AUTO_INCREMENT,
    appointment_date DATETIME NOT NULL,
    created_by VARCHAR(255),
    created_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    modified_date DATETIME,
    deleted_date DATETIME,
    FOREIGN KEY (created_by) REFERENCES USERS(id)
);

-- Create PROPOSALS Table
CREATE TABLE PROPOSALS (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    status VARCHAR(255) NOT NULL
);

-- Create MEETINGS Table
CREATE TABLE MEETINGS (
    id INT PRIMARY KEY AUTO_INCREMENT,
    date DATETIME NOT NULL,
    location VARCHAR(255),
    host_id VARCHAR(255),
    FOREIGN KEY (host_id) REFERENCES USERS(id)
);

-- Create PLANNINGS Table
CREATE TABLE PLANNINGS (
    id INT PRIMARY KEY AUTO_INCREMENT,
    phase VARCHAR(255) NOT NULL,
    description TEXT,
    start_date DATETIME,
    end_date DATETIME,
    status VARCHAR(255)
);

-- Create PROJECTS Table
CREATE TABLE PROJECTS (
    id VARCHAR(255) PRIMARY KEY,
    submission_date DATETIME,
    title VARCHAR(255) NOT NULL,
    descriptions TEXT,
    status ENUM('pending', 'approved', 'rejected') NOT NULL,
    assigned_by VARCHAR(255),
    planning_id INT,
    FOREIGN KEY (assigned_by) REFERENCES USERS(id),
    FOREIGN KEY (planning_id) REFERENCES PLANNINGS(id)
);

-- Create PRESENTATIONS Table
CREATE TABLE PRESENTATIONS (
    id INT PRIMARY KEY AUTO_INCREMENT,
    date DATETIME NOT NULL,
    venue VARCHAR(255),
    status ENUM('scheduled', 'completed', 'canceled'),
    presenter_id VARCHAR(255),
    FOREIGN KEY (presenter_id) REFERENCES STUDENTS(id)
);

-- Create GOALS Table
CREATE TABLE GOALS (
    id VARCHAR(255) PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    status VARCHAR(255),
    student_id VARCHAR(255),
    FOREIGN KEY (student_id) REFERENCES STUDENTS(id)
);

-- Create ASSESSMENTS Table
CREATE TABLE ASSESSMENTS (
    id INT PRIMARY KEY AUTO_INCREMENT,
    project_id VARCHAR(255),
    mark INT NOT NULL,
    FOREIGN KEY (project_id) REFERENCES PROJECTS(id)
);

-- Create FEEDBACKS Table
CREATE TABLE FEEDBACKS (
    id VARCHAR(255) PRIMARY KEY,
    sender_id VARCHAR(255),
    type VARCHAR(255),
    subject VARCHAR(255),
    description TEXT,
    priority VARCHAR(255),
    FOREIGN KEY (sender_id) REFERENCES USERS(id)
);

-- Create FORUMS Table
CREATE TABLE FORUMS (
    id VARCHAR(255) PRIMARY KEY,
    started_by VARCHAR(255),
    date_started DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (started_by) REFERENCES USERS(id)
);

-- Create REPLIES Table
CREATE TABLE REPLIES (
    id INT PRIMARY KEY AUTO_INCREMENT,
    forum_id VARCHAR(255),
    content TEXT NOT NULL,
    replied_by VARCHAR(255),
    date_replied DATETIME DEFAULT CURRENT_TIMESTAMP,
    view_count INT DEFAULT 0,
    FOREIGN KEY (forum_id) REFERENCES FORUMS(id),
    FOREIGN KEY (replied_by) REFERENCES USERS(id)
);

-- Create EMAILS Table
CREATE TABLE EMAILS (
    id VARCHAR(255) PRIMARY KEY,
    subject VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    status VARCHAR(255),
    sender_id VARCHAR(255),
    receipient_id VARCHAR(255),
    FOREIGN KEY (sender_id) REFERENCES USERS(id),
    FOREIGN KEY (receipient_id) REFERENCES USERS(id)
);

-- Create ATTACHMENTS Table
CREATE TABLE ATTACHMENTS (
    id VARCHAR(255) PRIMARY KEY,
    feedback_id VARCHAR(255),
    file_path VARCHAR(255) NOT NULL,
    FOREIGN KEY (feedback_id) REFERENCES FEEDBACKS(id)
);

-- Create FAQ Table
CREATE TABLE FAQ (
    id VARCHAR(255) PRIMARY KEY,
    question TEXT NOT NULL,
    answer TEXT NOT NULL,
    added_by VARCHAR(255),
    added_on DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (added_by) REFERENCES ADMINS(id)
);

-- Create MESSAGES Table
CREATE TABLE MESSAGES (
    id VARCHAR(255) PRIMARY KEY,
    sender_id VARCHAR(255),
    receipient_id VARCHAR(255),
    date DATETIME DEFAULT CURRENT_TIMESTAMP,
    content TEXT NOT NULL,
    FOREIGN KEY (sender_id) REFERENCES USERS(id),
    FOREIGN KEY (receipient_id) REFERENCES USERS(id)
);
