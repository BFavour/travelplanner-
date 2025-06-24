CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  phone VARCHAR(20),
  address VARCHAR(255),
  password VARCHAR(255)
);

CREATE TABLE reviews (
  id INT AUTO_INCREMENT PRIMARY KEY,
  hotel VARCHAR(100),
  review TEXT
);

CREATE TABLE wishlist (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  hotel_name VARCHAR(100),
  FOREIGN KEY (user_id) REFERENCES users(id)
);