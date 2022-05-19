
/*
sql task 1
*/
SELECT id, suborders_count FROM orders AS ORD WHERE suborders_count != (SELECT COUNT(*) FROM suborders WHERE ORD.id = order_id) /* может не правильно понял задание */

