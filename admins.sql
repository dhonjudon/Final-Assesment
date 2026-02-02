-- Admins table for authentication
CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Remove any old admin user
DELETE FROM admins WHERE username = 'root_admin';

-- Default admin user (username: root_admin, password: 123456789)
INSERT INTO admins (username, password) VALUES (
    'root_admin',
    '$2y$10$MHHk6aTdDwmYXSc2H4BZRO4DknaelDd.kkYKvvXnC1fnd1AADP7E.'
);
-- The above hash is for password '123456789'
