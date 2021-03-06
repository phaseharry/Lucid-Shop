USE lucidshop;

-- creating customer accounts
INSERT INTO Customer (cid, email, password, first_name, last_name, `address`, age, gender) 
VALUES (1, 'harrychen@gmail.com', '$2y$10$a5r8bL1O5cI2bhMADDnYSey46SjITiS2QJ2bLVwZqjv88tCO69vU2', 'Harry', 'Chen', '0807 Hermann Underpass 73802', 24, 'male'); -- plaintext password = !abc123ABC

INSERT INTO Customer (cid, email, password, first_name, last_name, `address`, age, gender) 
VALUES (2, 'raymondyu@icloud.com', '$2y$10$E8hQucpVAB64yBG07qGi0esnXLo92x0Atxj3mWjGMiws8kBOJjpym', 'Raymond', 'Yu', '882 Jessica Plains 00163', 21, 'male'); -- plaintext password = Pa$$w0rd

INSERT INTO Customer (cid, email, password, first_name, last_name, `address`, age, gender) 
VALUES (3, 'yumeng@gmail.com', '$2y$10$8ldOfk5ZIKyxiDxec0bps.gzd1v5uzR7SFj.TXUduxGxfrrX/8BLK', 'Yumeng', 'Shao', '405 Gutmann Spur 34057-6397', 21, 'female'); -- plaintext password = !Swordfish1

-- creating authors
INSERT INTO Author (author_id, first_name, last_name) VALUES (1, 'Barack', 'Obama');
INSERT INTO Author (author_id, first_name, last_name) VALUES (2, 'Michelle', 'Obama');
INSERT INTO Author (author_id, first_name, last_name) VALUES (3, 'Theodor', 'Seuss Geisel');
INSERT INTO Author (author_id, first_name, last_name) VALUES (4, 'Joanne', 'Rowling');
INSERT INTO Author (author_id, first_name, last_name) VALUES (5, 'F. Scott', 'Fitzgerald');

-- creating publishers
INSERT INTO Publisher (publisher_id, publisher_name) VALUES (1, 'Crown Publishing Group');
INSERT INTO Publisher (publisher_id, publisher_name) VALUES (2, 'Three Rivers Press');
INSERT INTO Publisher (publisher_id, publisher_name) VALUES (3, 'Broadway Books');
INSERT INTO Publisher (publisher_id, publisher_name) VALUES (4, 'Alfred A. Knopf');
INSERT INTO Publisher (publisher_id, publisher_name) VALUES (5, 'Penguin Random House LLC.');
INSERT INTO Publisher (publisher_id, publisher_name) VALUES (6, 'Scholastic');
INSERT INTO Publisher (publisher_id, publisher_name) VALUES (7, "Charles Scribner's Sons");

-- creating category 
INSERT INTO Category (category_id, category_name, safe_for_work) VALUES (1, 'Nonfiction', TRUE);
INSERT INTO Category (category_id, category_name, safe_for_work) VALUES (2, 'Children', TRUE);
INSERT INTO Category (category_id, category_name, safe_for_work) VALUES (3, 'Teen', TRUE);
INSERT INTO Category (category_id, category_name, safe_for_work) VALUES (4, 'Adult', TRUE);
INSERT INTO Category (category_id, category_name, safe_for_work) VALUES (5, 'Political', TRUE);
INSERT INTO Category (category_id, category_name, safe_for_work) VALUES (6, 'Fantasy', TRUE);

-- creating books
-- Barack Obama
INSERT INTO Book (bid, title, img_url, author_id, publisher_id, unit_price) VALUES (1, 'A Promised Land', 'https://images-na.ssl-images-amazon.com/images/I/41L5qgUW2fL._SY291_BO1,204,203,200_QL40_FMwebp_.jpg',1, 1, 45.00);
INSERT INTO Book (bid, title, img_url, author_id, publisher_id, unit_price) VALUES (2, 'Dreams from My Father: A Story of Race and Inheritance', 'https://images-na.ssl-images-amazon.com/images/I/51TdV+4rjSL._SY344_BO1,204,203,200_.jpg',1, 2, 18.99);
INSERT INTO Book (bid, title, img_url, author_id, publisher_id, unit_price) VALUES (3, 'The Audacity of Hope: Thoughts on Reclaiming the American Dream', 'https://images-na.ssl-images-amazon.com/images/I/51zkB73i0GL._SY291_BO1,204,203,200_QL40_FMwebp_.jpg',1, 3, 17.00);
INSERT INTO Book (bid, title, img_url, author_id, publisher_id, unit_price) VALUES (4, 'Of Thee I Sing', 'https://images-na.ssl-images-amazon.com/images/I/51DEuSxmwSL._SX218_BO1,204,203,200_QL40_FMwebp_.jpg',1, 4, 10.98);
-- Michelle Obama
INSERT INTO Book (bid, title, img_url, author_id, publisher_id, unit_price) VALUES (5, 'Becoming', 'https://images-na.ssl-images-amazon.com/images/I/41dsMrDb-nL._SX328_BO1,204,203,200_.jpg', 2, 1, 18.99);
INSERT INTO Book (bid, title, img_url, author_id, publisher_id, unit_price) VALUES (6, 'American Grown', 'https://images-na.ssl-images-amazon.com/images/I/61kstxYrJSL._SX218_BO1,204,203,200_QL40_FMwebp_.jpg', 2, 1, 30.00);
-- Dr.Seuss
INSERT INTO Book (bid, title, img_url, author_id, publisher_id, unit_price) VALUES (7, 'Green Eggs and Ham', 'https://images-na.ssl-images-amazon.com/images/I/51LO6d10iVL._SY291_BO1,204,203,200_QL40_FMwebp_.jpg', 3, 5, 17.99);
INSERT INTO Book (bid, title, img_url, author_id, publisher_id, unit_price) VALUES (8, 'The Cat and the Hat', 'https://images-na.ssl-images-amazon.com/images/I/51NpGEKBQoL._SY291_BO1,204,203,200_QL40_FMwebp_.jpg', 3, 5, 17.99);
INSERT INTO Book (bid, title, img_url, author_id, publisher_id, unit_price) VALUES (9, 'The Lorax', 'https://images-na.ssl-images-amazon.com/images/I/518OcsKKgOL._SY291_BO1,204,203,200_QL40_FMwebp_.jpg', 3, 5, 17.99);
INSERT INTO Book (bid, title, img_url, author_id, publisher_id, unit_price) VALUES (10, 'Horton Hears a Who!', 'https://images-na.ssl-images-amazon.com/images/I/51Ssd9G9pnL._SY291_BO1,204,203,200_QL40_FMwebp_.jpg', 3, 5, 17.99);
-- J.K Rowling 
INSERT INTO Book (bid, title, img_url, author_id, publisher_id, unit_price) VALUES (11, "Harry Potter and the Sorcerer's Stong", 'https://images-na.ssl-images-amazon.com/images/I/51HSkTKlauL._SX346_BO1,204,203,200_.jpg', 4, 6, 24.99);
INSERT INTO Book (bid, title, img_url, author_id, publisher_id, unit_price) VALUES (12, "Harry Potter and the Chamber of Secrets", 'https://images-na.ssl-images-amazon.com/images/I/51jNORv6nQL._SY291_BO1,204,203,200_QL40_FMwebp_.jpg', 4, 6, 24.99);
INSERT INTO Book (bid, title, img_url, author_id, publisher_id, unit_price) VALUES (13, "Harry Potter and the Prisoner of Azkban", 'https://images-na.ssl-images-amazon.com/images/I/51O4sQ1jsCL._SX218_BO1,204,203,200_QL40_FMwebp_.jpg', 4, 6, 24.99);
INSERT INTO Book (bid, title, img_url, author_id, publisher_id, unit_price) VALUES (14, "Harry Potter and the Goblet of Fire", 'https://images-na.ssl-images-amazon.com/images/I/51OORp1XD1L._SX218_BO1,204,203,200_QL40_FMwebp_.jpg', 4, 6, 24.99);
INSERT INTO Book (bid, title, img_url, author_id, publisher_id, unit_price) VALUES (15, "Harry Potter and the Order of the Phoenix", 'https://images-na.ssl-images-amazon.com/images/I/51b7R-IiOTL._SX338_BO1,204,203,200_.jpg', 4, 6, 24.99);
INSERT INTO Book (bid, title, img_url, author_id, publisher_id, unit_price) VALUES (16, "Harry Potter and the Half-Blood Prince", 'https://images-na.ssl-images-amazon.com/images/I/51KV4CXARLL._SY291_BO1,204,203,200_QL40_FMwebp_.jpg', 4, 6, 24.99);
INSERT INTO Book (bid, title, img_url, author_id, publisher_id, unit_price) VALUES (17, "Harry Potter and the Deathly Hallows", 'https://images-na.ssl-images-amazon.com/images/I/51jyI6lYi1L._SX342_BO1,204,203,200_.jpg', 4, 6, 24.99);
-- F.Scott Fitzgerald
INSERT INTO Book (bid, title, img_url, author_id, publisher_id, unit_price) VALUES (18, "The Great Gatsby", 'https://images-na.ssl-images-amazon.com/images/I/41XMaCHkrgL._SY291_BO1,204,203,200_QL40_FMwebp_.jpg', 5, 7, 24.99);

-- Book_to_Category
-- A Promised Land
INSERT INTO Book_to_Category (bid, category_id) VALUES (1, 1);
INSERT INTO Book_to_Category (bid, category_id) VALUES (1, 4);
INSERT INTO Book_to_Category (bid, category_id) VALUES (1, 5);
-- Dreams from My Father
INSERT INTO Book_to_Category (bid, category_id) VALUES (2, 1);
INSERT INTO Book_to_Category (bid, category_id) VALUES (2, 4);
INSERT INTO Book_to_Category (bid, category_id) VALUES (2, 5);
-- Audacity of Hope
INSERT INTO Book_to_Category (bid, category_id) VALUES (3, 1);
INSERT INTO Book_to_Category (bid, category_id) VALUES (3, 4);
INSERT INTO Book_to_Category (bid, category_id) VALUES (3, 5);
-- Of Thee I Sing
INSERT INTO Book_to_Category (bid, category_id) VALUES (4, 1);
INSERT INTO Book_to_Category (bid, category_id) VALUES (4, 2);
-- Becoming
INSERT INTO Book_to_Category (bid, category_id) VALUES (5, 1);
INSERT INTO Book_to_Category (bid, category_id) VALUES (5, 4);
INSERT INTO Book_to_Category (bid, category_id) VALUES (5, 5);
-- American Grown
INSERT INTO Book_to_Category (bid, category_id) VALUES (6, 1);
INSERT INTO Book_to_Category (bid, category_id) VALUES (6, 4);
INSERT INTO Book_to_Category (bid, category_id) VALUES (6, 5);
-- Green Eggs and Ham
INSERT INTO Book_to_Category (bid, category_id) VALUES (7, 2);
-- The Cat and the Hat
INSERT INTO Book_to_Category (bid, category_id) VALUES (8, 2);
-- The Lorax
INSERT INTO Book_to_Category (bid, category_id) VALUES (9, 2);
-- Horton Hears a Who!
INSERT INTO Book_to_Category (bid, category_id) VALUES (10, 2);
-- Harry Potter and the Sorcerer's Stong
INSERT INTO Book_to_Category (bid, category_id) VALUES (11, 3);
INSERT INTO Book_to_Category (bid, category_id) VALUES (11, 4);
INSERT INTO Book_to_Category (bid, category_id) VALUES (11, 6);
-- Harry Potter and the Chamber of Secrets
INSERT INTO Book_to_Category (bid, category_id) VALUES (12, 3);
INSERT INTO Book_to_Category (bid, category_id) VALUES (12, 4);
INSERT INTO Book_to_Category (bid, category_id) VALUES (12, 6);
-- Harry Potter and the Prisoner of Azkban
INSERT INTO Book_to_Category (bid, category_id) VALUES (13, 3);
INSERT INTO Book_to_Category (bid, category_id) VALUES (13, 4);
INSERT INTO Book_to_Category (bid, category_id) VALUES (13, 6);
-- Harry Potter and the Goblet of Fire
INSERT INTO Book_to_Category (bid, category_id) VALUES (14, 3);
INSERT INTO Book_to_Category (bid, category_id) VALUES (14, 4);
INSERT INTO Book_to_Category (bid, category_id) VALUES (14, 6);
-- Harry Potter and the Order of the Phoenix
INSERT INTO Book_to_Category (bid, category_id) VALUES (15, 3);
INSERT INTO Book_to_Category (bid, category_id) VALUES (15, 4);
INSERT INTO Book_to_Category (bid, category_id) VALUES (15, 6);
-- Harry Potter and the Half-Blood Prince
INSERT INTO Book_to_Category (bid, category_id) VALUES (16, 3);
INSERT INTO Book_to_Category (bid, category_id) VALUES (16, 4);
INSERT INTO Book_to_Category (bid, category_id) VALUES (16, 6);
-- Harry Potter and the Deathly Hallows
INSERT INTO Book_to_Category (bid, category_id) VALUES (17, 3);
INSERT INTO Book_to_Category (bid, category_id) VALUES (17, 4);
INSERT INTO Book_to_Category (bid, category_id) VALUES (17, 6);
-- The Great Gatsby
INSERT INTO Book_to_Category (bid, category_id) VALUES (18, 4);

-- Orders
-- Harry's orders
INSERT INTO `Order` (order_number, cid, order_date, total_cost) VALUES (1, 1, '2021-04-01', 145.95);
INSERT INTO `Order` (order_number, cid, order_date, total_cost) VALUES (2, 1, '2020-12-23', 78.99);
-- Raymond's orders
INSERT INTO `Order` (order_number, cid, order_date, total_cost) VALUES (3, 2, '2019-01-31', 149.93);
INSERT INTO `Order` (order_number, cid, order_date, total_cost) VALUES (4, 2, '2020-02-15', 24.99);
-- Yu Meng's orders
INSERT INTO `Order` (order_number, cid, order_date, total_cost) VALUES (5, 3, '2021-04-01', 74.97);
INSERT INTO `Order` (order_number, cid, order_date, total_cost) VALUES (6, 3, '2020-12-23', 71.97);

-- Book_to_Order
-- order 1
INSERT INTO Book_to_Order (bid, order_number, count_ordered) VALUES(1, 1, 1);
INSERT INTO Book_to_Order (bid, order_number, count_ordered) VALUES(2, 1, 4);
INSERT INTO Book_to_Order (bid, order_number, count_ordered) VALUES(17, 1, 1);
-- order 2
INSERT INTO Book_to_Order (bid, order_number, count_ordered) VALUES(2, 2, 1);
INSERT INTO Book_to_Order (bid, order_number, count_ordered) VALUES(6, 2, 2);
-- order 3
INSERT INTO Book_to_Order (bid, order_number, count_ordered) VALUES(12, 3, 3);
INSERT INTO Book_to_Order (bid, order_number, count_ordered) VALUES(5, 3, 2);
INSERT INTO Book_to_Order (bid, order_number, count_ordered) VALUES(8, 3, 1);
-- order 4
INSERT INTO Book_to_Order (bid, order_number, count_ordered) VALUES(11, 4, 1);
-- order 5
INSERT INTO Book_to_Order (bid, order_number, count_ordered) VALUES(14, 5, 3);
-- order 6
INSERT INTO Book_to_Order (bid, order_number, count_ordered) VALUES(3, 6, 1);
INSERT INTO Book_to_Order (bid, order_number, count_ordered) VALUES(10, 6, 1);
INSERT INTO Book_to_Order (bid, order_number, count_ordered) VALUES(7, 6, 1);
INSERT INTO Book_to_Order (bid, order_number, count_ordered) VALUES(2, 6, 1);
