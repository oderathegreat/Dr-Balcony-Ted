use DrBalcony;
-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    registration_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create orders table
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Insert sample data into users table
INSERT INTO users (username, registration_time) VALUES
('john_doe', '2023-01-10 10:00:00'),
('jane_smith', '2023-01-15 12:00:00'),
('alice_jones', '2023-02-01 08:30:00'),
('bob_brown', '2023-03-10 15:00:00'),
('carol_white', '2023-04-12 09:45:00'),
('dave_black', '2023-05-20 11:20:00'),
('eve_green', '2023-06-01 14:10:00');

-- Insert sample data into orders table
INSERT INTO orders (user_id, order_date) VALUES
(1, '2023-02-15 14:00:00'),
(1, '2023-03-10 16:30:00'),
(2, '2023-03-20 10:00:00'),
(3, '2023-04-01 12:00:00'),
(3, '2023-05-01 12:00:00'),
(3, '2023-05-05 12:00:00'),
(4, '2023-05-15 15:30:00'),
(5, '2023-06-10 09:00:00'),
(5, '2023-06-12 09:00:00'),
(6, '2023-06-20 10:00:00'),
(6, '2023-06-25 10:00:00'),
(6, '2023-06-30 10:00:00'),
(7, '2023-07-01 11:00:00'),
(7, '2023-07-05 11:00:00'),
(7, '2023-07-10 11:00:00');
