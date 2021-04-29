CREATE DATABASE lucidshop;
USE lucidshop;

CREATE TABLE Customer (
  cid INTEGER AUTO_INCREMENT PRIMARY KEY,
  email CHAR(100) NOT NULL,
  password CHAR(50) NOT NULL,
  first_name CHAR(50) NOT NULL,
  last_name CHAR(50) NOT NULL,
  `address` CHAR(150) NOT NULL,
  age TINYINT,
  gender ENUM('male', 'female', 'other')
);

CREATE TABLE Author (
  author_id INTEGER AUTO_INCREMENT PRIMARY KEY,
  first_name CHAR(50) NOT NULL,
  last_name CHAR(50) NOT NULL
);

CREATE TABLE Publisher (
  publisher_id INTEGER AUTO_INCREMENT PRIMARY KEY,
  publisher_name CHAR(100) NOT NULL
);

CREATE TABLE Category (
  category_id INTEGER AUTO_INCREMENT PRIMARY KEY,
  category_name CHAR(150) NOT NULL,
  safe_for_work BOOLEAN
);

CREATE TABLE Book (
  bid INTEGER AUTO_INCREMENT PRIMARY KEY,
  title CHAR(150) NOT NULL,
  img_url TEXT,
  author_id INTEGER,
  publisher_id INTEGER,
  unit_price DECIMAL(13, 2),
  FOREIGN KEY (author_id) REFERENCES Author (author_id),
  FOREIGN KEY (publisher_id) REFERENCES Publisher (publisher_id)
);

CREATE TABLE `Order` (
  order_number INTEGER AUTO_INCREMENT PRIMARY KEY,
  cid INTEGER NOT NULL,
  order_date DATE,
  total_cost DECIMAL(13, 2),
  FOREIGN KEY (cid) REFERENCES Customer (cid)
);

CREATE TABLE Cart (
  cart_id INTEGER AUTO_INCREMENT PRIMARY KEY, -- will be used as order_number in relation to Book_to_Order
  cid INTEGER NOT NULL, 
  FOREIGN KEY (cid) REFERENCES Customer (cid)
);

CREATE TABLE Book_to_Cart (
  bid INTEGER NOT NULL,
  cart_id INTEGER NOT NULL,
  units TINYINT,
  PRIMARY KEY (bid, cart_id),
  FOREIGN KEY (bid) REFERENCES Book (bid),
  FOREIGN KEY (cart_id) REFERENCES Cart (cart_id)
);

CREATE TABLE Book_to_Order (
  bid INTEGER NOT NULL,
  order_number INTEGER NOT NULL,
  count_ordered TINYINT,
  PRIMARY KEY (bid, order_number),
  FOREIGN KEY (bid) REFERENCES Book (bid),
  FOREIGN KEY (order_number) REFERENCES `Order` (order_number)
);

CREATE TABLE Book_to_Category (
  bid INTEGER NOT NULL,
  category_id INTEGER NOT NULL,
  PRIMARY KEY (bid, category_id),
  FOREIGN KEY (bid) REFERENCES Book (bid),
  FOREIGN KEY (category_id) REFERENCES Category(category_id)
);
