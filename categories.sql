-- Categories table for menu item categories
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE
);

-- Sample categories
INSERT INTO categories (name) VALUES
('Coffee'),
('Snacks'),
('Desserts'),
('Beverages');
