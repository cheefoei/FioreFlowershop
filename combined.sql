SET time_zone = "+08:00"

CREATE TABLE customer (
	customer_id 			int NOT NULL AUTO_INCREMENT,
	customer_type 			varchar(10) NOT NULL DEFAULT 'consumer',
    	customer_name 			varchar(255) NOT NULL,
    	customer_email 			varchar(255) NOT NULL,
    	customer_phone_number 		varchar(13) NOT NULL,
    	customer_address 		varchar(255) NOT NULL,
    	customer_monthly_credit_limit 	decimal(10,2) DEFAULT 0,
    	PRIMARY KEY(customer_id)
)

CREATE TABLE floral_order (
  	id	 	int(11) NOT NULL AUTO_INCREMENT,
  	customer_id 	int(11) NOT NULL,
  	date		datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  	total_amount	double NOT NULL,
  	status		varchar(6) NOT NULL DEFAULT 'unpaid',
  	PRIMARY KEY (id),
  	FOREIGN KEY (customer_id) REFERENCES customer(customer_id)
)

CREATE TABLE order_list (
	id		int(11) NOT NULL AUTO_INCREMENT,
	order_id 	int(11) NOT NULL,
	product_id 	int(11) NOT NULL,
	quantity 	int(11) NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (order_id) REFERENCES floral_order(id)
)

INSERT INTO `customer` (`customer_id`, `customer_type`, `customer_name`, `customer_email`, `customer_phone_number`, `customer_address`, `customer_monthly_credit_limit`) VALUES 
(NULL, 'consumer', 'Chris Evans', 'chris@email.com', '012-5483987', '7, Jalan Malinja 2, Taman Bunga Raya, 53000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur', '0.00');

INSERT INTO `floral_order` (`id`, `customer_id`, `date`, `total_amount`, `status`) VALUES
(1, 1, '2018-08-02 00:00:00', 115, '0'),
(2, 1, '2018-08-02 00:00:00', 360, '0'),
(3, 1, '2018-08-02 00:00:00', 90, '0'),
(4, 1, '2018-08-02 00:00:00', 90, '0'),
(5, 1, '2018-08-02 00:00:00', 29, '0'),
(6, 1, '2018-08-02 00:00:00', 29, '0'),
(7, 1, '2018-08-02 00:00:00', 29, '0'),
(8, 1, '2018-08-02 00:00:00', 90, '0'),
(9, 1, '2018-08-02 00:00:00', 90, '0'),
(10, 1, '2018-08-02 00:00:00', 29, '0'),
(11, 1, '2018-08-02 00:00:00', 29, '0'),
(12, 1, '2018-08-02 00:00:00', 270, '0'),
(13, 1, '2018-08-02 00:00:00', 1710, '0'),
(14, 1, '2018-08-02 00:00:00', 2069, '0'),
(15, 1, '2018-08-02 00:00:00', 180, '0'),
(16, 1, '2018-08-02 00:00:00', 180, '0'),
(17, 1, '2018-08-02 00:00:00', 270, '0'),
(18, 1, '2018-08-02 00:00:00', 180, '0'),
(19, 1, '2018-08-02 00:00:00', 180, '0'),
(20, 1, '2018-08-02 00:00:00', 180, '0'),
(21, 1, '2018-08-02 21:18:25', 57.6, ''),
(22, 1, '2018-08-02 21:19:49', 89.9, ''),
(23, 1, '2018-08-02 21:21:47', 179.8, ''),
(24, 1, '2018-08-02 21:27:15', 28.8, ''),
(25, 1, '2018-08-02 21:33:58', 359.6, 'unpaid'),
(26, 1, '2018-08-03 01:32:59', 237.4, 'unpaid');

INSERT INTO `order_list` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 1, 100001, 4),
(2, 2, 100002, 4),
(3, 3, 100002, 1),
(4, 4, 100002, 1),
(5, 5, 100001, 1),
(6, 6, 100001, 1),
(7, 7, 100001, 1),
(8, 8, 100002, 1),
(9, 9, 100002, 1),
(10, 10, 100001, 1),
(11, 11, 100001, 1),
(12, 12, 100002, 3),
(13, 13, 100002, 3),
(14, 13, 100001, 50),
(15, 14, 100002, 7),
(16, 14, 100001, 50),
(17, 15, 100002, 2),
(18, 16, 100002, 2),
(19, 17, 100002, 3),
(20, 18, 100002, 2),
(21, 19, 100002, 2),
(22, 20, 100002, 2),
(23, 21, 100001, 2),
(24, 22, 100002, 1),
(25, 23, 100002, 2),
(26, 24, 100001, 1),
(27, 25, 100002, 4),
(28, 26, 100001, 2),
(29, 26, 100002, 2);