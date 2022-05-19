
/*
sql task 1
*/
SELECT id, suborders_count FROM orders AS ORD WHERE suborders_count != (SELECT COUNT(*) FROM suborders WHERE ORD.id = order_id) /* может не правильно понял задание */

/*
sql task 2
*/
SELECT SUM(price) AS total, COUNT(*) AS orders_count FROM orders as ord WHERE (SELECT COUNT(*) FROM suborders WHERE ORD.id = order_id) >= 2
