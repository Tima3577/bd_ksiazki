CREATE DATABASE IF NOT EXISTS tima_biblioteka;
USE tima_biblioteka;

CREATE TABLE IF NOT EXISTS autorzy (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS ksiazki (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author_id INT,
    FOREIGN KEY (author_id) REFERENCES autorzy(ID) ON DELETE CASCADE
);

INSERT INTO autorzy (first_name, last_name) VALUES
('George', 'Orwell'),
('J.K.', 'Rowling'),
('J.R.R.', 'Tolkien'),
('Fyodor', 'Dostoevsky'),
('Jane', 'Austen'),
('Mark', 'Twain'),
('Ernest', 'Hemingway'),
('Agatha', 'Christie');

INSERT INTO ksiazki (title, author_id) VALUES
('1984', 1),
('Harry Potter and the Sorcerer''s Stone', 2),
('The Lord of the Rings', 3),
('Crime and Punishment', 4),
('Pride and Prejudice', 5),
('The Adventures of Tom Sawyer', 6),
('The Old Man and the Sea', 7),
('Murder on the Orient Express', 8);
