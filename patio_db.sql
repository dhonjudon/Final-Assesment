-- SQL for Patio Management System
CREATE DATABASE IF NOT EXISTS patio_db;
USE patio_db;

CREATE TABLE IF NOT EXISTS menu_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    category VARCHAR(50) NOT NULL,
    price DECIMAL(8,2) NOT NULL,
    description TEXT,
    availability TINYINT(1) NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO menu_items (name, category, price, description, availability) VALUES
('Espresso', 'Coffee', 300, 'Rich and bold espresso shot.', 1),
('Cappuccino', 'Coffee', 400, 'Espresso with steamed milk and foam.', 1),
('Iced Latte', 'Coffee', 450, 'Chilled espresso with milk.', 1),
('Blueberry Muffin', 'Snacks', 200, 'Freshly baked muffin with blueberries.', 1),
('Chocolate Cake', 'Desserts', 350, 'Moist chocolate cake slice.', 1),
('Herbal Tea', 'Beverages', 250, 'Soothing blend of herbs.', 1),
('Avocado Toast', 'Snacks', 500, 'Sourdough with smashed avocado.', 0);
