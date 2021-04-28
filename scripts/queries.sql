-- used for initial fetching of books with their authors
SELECT B.bid, B.title, B.img_url, B.unit_price, CONCAT(A.first_name, ' ', A.last_name) as author_name 
FROM Book B
JOIN Author A ON B.author_id = A.author_id;

-- used to fetch all books written by a specific author
SELECT B.bid, B.title, B.img_url, B.unit_price, CONCAT(A.first_name, ' ', A.last_name) as author_name 
FROM Author A 
JOIN Book B ON B.author_id = A.author_id
WHERE A.first_name = "Barack" AND A.last_name = "Obama";

-- used for fetching a book based on title
SELECT B.bid, B.title, B.img_url, B.unit_price, CONCAT(A.first_name, ' ', A.last_name) as author_name 
FROM Author A 
JOIN Book B ON B.author_id = A.author_id
WHERE B.title = "The Cat and the Hat";

-- used for getting books of a certain category
SELECT B.bid, B.title, B.img_url, B.unit_price, CONCAT(A.first_name, ' ', A.last_name) as author_name 
FROM Category C
JOIN Book_to_Category BtC ON BtC.category_id = C.category_id 
JOIN Book B ON BtC.bid = B.bid
JOIN Author A ON A.author_id = B.author_id
WHERE C.category_name = "Fantasy";

-- used for getting books published by a certain publisher
SELECT B.bid, B.title, B.img_url, B.unit_price, CONCAT(A.first_name, ' ', A.last_name) as author_name 
FROM Publisher P
JOIN Book B ON P.publisher_id = B.publisher_id
JOIN Author A ON A.author_id = B.author_id
WHERE P.publisher_name = "Charles Scribner's Sons";

-- Get all orders regarding a specific customer
SELECT O.order_number, O.order_date, O.total_cost 
FROM `Order` O 
WHERE O.cid = 1;

-- Get all book_to_order that connects an order to a specific book
SELECT B.title AS "book_title", B.img_url, B.unit_price, BTO.count_ordered
FROM book_to_order BTO
JOIN Book B ON BTO.bid = B.bid
WHERE BTO.order_number = 3;
