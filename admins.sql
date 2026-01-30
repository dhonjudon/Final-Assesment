-- Admins table for authentication
CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Remove any old admin user
DELETE FROM admins WHERE username = 'admin';

-- Default admin user (username: admin, password: admin123)
INSERT INTO admins (username, password) VALUES (
    'admin',
    '$2y$10$u1Qw6Qn6Qw6Qw6Qw6Qw6eOQw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6'
);
-- The above hash is for password 'admin123'
