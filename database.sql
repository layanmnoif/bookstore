CREATE DATABASE bookstore_db;
USE bookstore_db;

-- 1. Users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- 2. Books table
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    author VARCHAR(100) NOT NULL,
    price INT NOT NULL,
    description TEXT
);

-- 3. Orders table
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    quantity INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Add 10 simple books
INSERT INTO products (title, author, price, description) VALUES
('HTML and CSS Basics', 'Alex Hale', 30, 'Learn how to make simple webpages.'),
('PHP for Beginners', 'Tom King', 40, 'Easy guide to learn PHP programming.'),
('My First SQL Book', 'Sam Smith', 35, 'Learn how to make databases easily.'),
('Java Programming', 'John Doe', 50, 'Introduction to Java code.'),
('Python Crash Course', 'Eric Matthes', 45, 'A fast way to learn Python.'),
('Web Design Guide', 'Sara Basic', 25, 'Make your website look beautiful.'),
('Computer Networks', 'Andrew T.', 60, 'Learn how the internet works.'),
('Data Structures', 'Robert L.', 55, 'Simple explanation of code data.'),
('Software Engineering', 'Ian S.', 65, 'How to design big software projects.'),
('JavaScript Guide', 'David Flanagan', 38, 'Learn how to make dynamic webpages.');
