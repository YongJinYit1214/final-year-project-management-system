-- Insert supervisor user

INSERT INTO users (email, password, full_name, role, phone_number, country_code)
VALUES ('sarah.johnson@mmu.edu.my', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Dr. Sarah Johnson', 'supervisor', '1234567890', '+60');

SET @supervisor_id = LAST_INSERT_ID();

INSERT INTO supervisors (supervisor_id, expertise)
VALUES (@supervisor_id, 'Artificial Intelligence, Machine Learning, Data Science');

-- Insert admin user

INSERT INTO users (email, password, full_name, role, phone_number, country_code)
VALUES ('admin@mmu.edu.my', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'System Administrator', 'admin', '0987654321', '+60');

SET @admin_id = LAST_INSERT_ID();

INSERT INTO admins (admin_id)
VALUES (@admin_id);
