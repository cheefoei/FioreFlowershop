SET time_zone = "+08:00";

CREATE TABLE customer (
	customer_id 			int NOT NULL AUTO_INCREMENT,
	customer_type 			varchar(10) NOT NULL DEFAULT 'consumer',
    	customer_fname 			varchar(255) NOT NULL,
    	customer_lname 			varchar(255) NOT NULL,
    	customer_email 			varchar(255) NOT NULL,
    	customer_phone_number 		varchar(13) NOT NULL,
    	customer_address 		varchar(255) NOT NULL,
    	customer_monthly_credit_limit 	decimal(10,2) NOT NULL,
    	customer_password 		varchar(255) NOT NULL,
    	PRIMARY KEY(customer_id)
);
INSERT INTO `customer` (`customer_id`, `customer_type`, `customer_fname`, `customer_lname`, `customer_email`, `customer_phone_number`, `customer_address`, `customer_monthly_credit_limit`, `customer_password`) VALUES
(1, 'Corporate', 'Chris', 'Evans', 'chris@email.com', '01113366644', '20, Jalan 14/27b, Desa Setapak, 53300 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur', '1000.00', '81DC9BDB52D04DC20036DBD8313ED055');

CREATE TABLE `user` (
	user_id 			int NOT NULL AUTO_INCREMENT,
	user_type 			varchar(10) NOT NULL DEFAULT 'staff',
    	user_name 			varchar(255) NOT NULL,
    	user_status 			varchar(255) NOT NULL,
    	user_password                   varchar(255) NOT NULL,
    	PRIMARY KEY(user_id)
);
INSERT INTO `user` (`user_type`, `user_name`, `user_status`, `user_password`) VALUES 
('staff', 'Lim Jun Kit', 'dont know', '1234'),
('admin', 'Nimda', 'dont know', '1234');

CREATE TABLE `catalog` (
        `catalog_id`        int(11) NOT NULL AUTO_INCREMENT,
        `name`              varchar(80) NOT NULL,
        `description`       varchar(500) NOT NULL,
        `date_created`      date NOT NULL,
        `date_expired`      date NOT NULL,
    	PRIMARY KEY(catalog_id)
);
INSERT INTO `catalog` (`catalog_id`, `name`, `description`, `date_created`, `date_expired`) VALUES
(200001, 'Fathers day', 'Suitable for all the couples who are celebrating valentines day.', '2018-08-03', '2018-08-23'),
(200002, 'Mothers day', 'For all the lovely mums', '2018-08-01', '2018-08-31'),
(200003, 'Valentine', 'Just buy one', '2018-08-16', '2018-08-15'),
(200004, 'Valentine special', 'asdasdasd', '2018-08-15', '2018-08-23'),
(200005, 'Graduation day', 'sdasdasd', '2018-08-01', '2018-08-02'),
(200006, 'Valentine', 'For all the lovers', '2018-08-01', '2018-08-31');

CREATE TABLE `product` (
        `product_id`            int(11) NOT NULL AUTO_INCREMENT,
        `product_name`          varchar(80) DEFAULT NULL,
        `product_type`          varchar(50) DEFAULT NULL,
        `product_description`   varchar(500) DEFAULT NULL,
        `date_created`          date DEFAULT NULL,
        `date_expired`          date DEFAULT NULL,
        `total_stock`           int(11) DEFAULT NULL,
        `price`                 double DEFAULT NULL,
        `weight`                double DEFAULT NULL,
    	PRIMARY KEY(product_id)
);
INSERT INTO `product` (`product_id`, `product_name`, `product_type`, `product_description`, `date_created`, `date_expired`, `total_stock`, `price`, `weight`) VALUES
(100001, 'Rose', 'fresh_flower', 'Perfectly red in color', '2018-07-03', '2018-07-25', 10, 28.8, 800.5),
(100002, 'Hibiscus', 'bouquet', 'As pretty as your face.', '2018-07-03', '2018-07-24', 10, 89.9, 150.2),
(100003, 'rose', 'seasonal\r\npromotion item', 'Perfect in color for all those couples', '2018-07-02', '2018-07-28', 11, 198.2, 160.4),
(100005, 'Rose Slvar', 'bouquet,', 'pretty flower suitable for all occasions', '2018-08-14', '2018-08-31', 2, 11, 22),
(100006, 'Trinity Box-Red', 'Seasonal Item', 'An elegant box specially handcrafted by our artisan florist. Each rose bud is highlighted with a beautiful crystal gem to symbolise everlasting love. The box is accentuated with a classic ribbon and a drawer which holds 16 pieces of Ferrero Rocher chocolates perfectly.', '2018-08-03', '2018-08-31', 20, 59.9, 22),
(100007, 'Just For You', 'Seasonal Item', 'pretty flower suitable for all occasions', '2018-08-09', '2018-08-23', 20, 59.9, 22),
(100008, 'Rose Slvar', 'Seasonal Item', 'pretty flower suitable for all occasions', '2018-08-09', '2018-08-01', 2, 59.9, 22),
(100009, 'Pink Blush', 'bouquet', 'Beautiful Pink rose', '2018-08-01', '2018-08-31', 20, 59.9, 22),
(100010, 'Red Blush', 'floral_arrangements', 'Red color roses', '2018-08-01', '2018-08-31', 2, 59.9, 22);

CREATE TABLE `catalog_list` (
        `catlist_id`    int(11) NOT NULL AUTO_INCREMENT,
        `catalog_id`    int(11) DEFAULT NULL,
        `product_id`    int(11) DEFAULT NULL,
        FOREIGN KEY (catalog_id) REFERENCES `catalog`(catalog_id),
        FOREIGN KEY (product_id) REFERENCES product(product_id),
    	PRIMARY KEY(catlist_id)
);
INSERT INTO `catalog_list` (`catlist_id`, `catalog_id`, `product_id`) VALUES
(300002, 200001, 100001),
(300003, 200001, 100002),
(300004, 200001, 100003),
(300005, 200001, 100005);

CREATE TABLE floral_order (
  	id	 	int(11) NOT NULL AUTO_INCREMENT,
  	customer_id 	int(11) NOT NULL,
        `date`          datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  	total_amount	double NOT NULL,
  	status		varchar(6) NOT NULL DEFAULT 'unpaid',
  	PRIMARY KEY (id),
  	FOREIGN KEY (customer_id) REFERENCES customer(customer_id)
);
INSERT INTO `floral_order` (`id`, `customer_id`, `date`, `total_amount`, `status`) VALUES
(1, 1, '2018-07-02 00:00:00', 115, '0'),
(2, 1, '2018-07-10 00:00:00', 360, '0'),
(3, 1, '2018-07-15 00:00:00', 90, '0'),
(4, 1, '2018-07-20 00:00:00', 90, '0'),
(5, 1, '2018-07-20 00:00:00', 29, '0'),
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

CREATE TABLE order_list (
	id		int(11) NOT NULL AUTO_INCREMENT,
	order_id 	int(11) NOT NULL,
	product_id 	int(11) NOT NULL,
	quantity 	int(11) NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (order_id) REFERENCES floral_order(id),
	FOREIGN KEY (product_id) REFERENCES product(product_id)
);
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

CREATE TABLE invoice (
	invoice_id		int(11) NOT NULL AUTO_INCREMENT,
	customer_id             int(11) NOT NULL,
        invoice_month    	int(2) NOT NULL,
	invoice_year    	int(4) NOT NULL,
	date_created            datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  	invoice_total_amount	double NOT NULL,
  	invoice_isPaid  	int(1) NOT NULL DEFAULT 0,
	PRIMARY KEY (invoice_id),
  	FOREIGN KEY (customer_id) REFERENCES customer(customer_id)
);

CREATE TABLE invoice_list (
	invoice_list_id		int(11) NOT NULL AUTO_INCREMENT,
	invoice_id		int(11) NOT NULL,
	order_id                int(11) NOT NULL,
	PRIMARY KEY (invoice_list_id),
	FOREIGN KEY (invoice_id) REFERENCES invoice(invoice_id),
	FOREIGN KEY (order_id) REFERENCES floral_order(id)
);

CREATE TABLE `delivery` (
    `orderID`           varchar(10) NOT NULL,
    `StaffID`           varchar(10) DEFAULT NULL,
    `orderDate`         datetime DEFAULT NULL,
    `Payment`           varchar(10) DEFAULT NULL,
    `paymentDate`       varchar(15) DEFAULT NULL,
    `custID`            varchar(10) DEFAULT NULL,
    `custName`          varchar(25) DEFAULT NULL,
    `status`            varchar(10) DEFAULT NULL,
    `deliveredDate`     varchar(15) DEFAULT NULL,
    `deliveryAddress`   varchar(50) NOT NULL,
    `payTime`           varchar(20) DEFAULT NULL,
    PRIMARY KEY (`orderID`)
);
INSERT INTO `delivery` (`orderID`, `StaffID`, `orderDate`, `Payment`, `paymentDate`, `custID`, `custName`, `status`, `deliveredDate`, `deliveryAddress`, `payTime`) VALUES
('10', NULL, '2018-08-02 00:00:00', '28.8', NULL, '1', 'asdasdasd', 'Pending', '2018-08-30', 'Kuala LIm[pr', NULL),
('12', NULL, '2018-08-02 00:00:00', '269.7', NULL, '1', 'asdasdasd', 'Pending', '2018-08-22', 'Kuala LIm[pr', NULL),
('14', NULL, '2018-08-02 00:00:00', '2069.3', NULL, '1', 'asdasdasd', 'Pending', '2018-08-31', 'Kuala LIm[pr', NULL),
('15', NULL, '2018-08-02 00:00:00', '179.8', NULL, '1', 'asdasdasd', 'Pending', '2018-08-28', 'Kuala LIm[pr', NULL),
('16', NULL, '2018-08-02 00:00:00', '179.8', NULL, '1', 'asdasdasd', 'Pending', '2018-08-27', 'Kuala LIm[pr', NULL),
('21', NULL, '2018-08-02 00:00:00', '57.6', NULL, '1', 'asdasdasd', 'Pending', '2018-08-10', 'Kuala LIm[pr', NULL),
('4', NULL, '2018-08-02 00:00:00', '89.9', NULL, '1', 'asdasdasd', 'Pending', '2018-08-04', 'Kuala LIm[pr', NULL),
('5', NULL, '2018-08-02 00:00:00', '28.8', NULL, '1', 'asdasdasd', 'Pending', '2018-08-04', 'Kuala LIm[pr', NULL),
('6', NULL, '2018-08-02 00:00:00', '28.8', NULL, '1', 'asdasdasd', 'Pending', '2018-08-04', 'Kuala LIm[pr', NULL),
('7', NULL, '2018-08-02 00:00:00', '28.8', NULL, '1', 'asdasdasd', 'Pending', '2018-08-11', 'Kuala LIm[pr', NULL),
('O1001', 'S1001', '0000-00-00 00:00:00', '200', '2018-08-02', 'C1001', 'Lim', 'Delivered', '2018-08-02', '', '09:47:00'),
('O1002', 'S1002', '0000-00-00 00:00:00', '500', '2018-08-02', 'C1002', 'JunKit', 'Delivered', '2018-08-02', '', '09:45:28');

CREATE TABLE `self_pickup` (
    `custName`      varchar(25) DEFAULT NULL,
    `custID`        varchar(10) DEFAULT NULL,
    `status`        varchar(10) DEFAULT NULL,
    `paymentDate`   varchar(20) DEFAULT NULL,
    `Payment`       varchar(10) DEFAULT NULL,
    `OrderID`       varchar(10) NOT NULL,
    `staffID`       varchar(10) DEFAULT NULL,
    `pickupDate`    varchar(20) DEFAULT NULL,
    `orderDate`     datetime DEFAULT NULL,
    `payTime`       varchar(20) DEFAULT NULL,
    PRIMARY KEY (`OrderID`)
);
INSERT INTO `self_pickup` (`custName`, `custID`, `status`, `paymentDate`, `Payment`, `OrderID`, `staffID`, `pickupDate`, `orderDate`, `payTime`) VALUES
('', '', '', '1 August 2018', '', '', '', '1 August 2018', NULL, NULL),
('asdasdasd', '1', 'Pending', NULL, '28.8', '11', NULL, '2018-08-31', '2018-08-02 00:00:00', NULL),
('JJ', 'JJ1001', 'Done', '1 August 2018', '44', '122', '212', '1 August 2018', NULL, NULL),
('asdasdasd', '1', 'Pending', NULL, '1709.7', '13', NULL, '2018-08-31', '2018-08-02 00:00:00', NULL),
('asdasdasd', '1', 'Pending', NULL, '269.7', '17', NULL, '2018-09-01', '2018-08-02 00:00:00', NULL),
('asdasdasd', '1', 'Pending', NULL, '179.8', '20', NULL, '2018-08-31', '2018-08-02 00:00:00', NULL),
('asdasdasd', '1', 'Pending', NULL, '89.9', '22', NULL, '2018-08-31', '2018-08-02 00:00:00', NULL),
('asdasdasd', '1', 'Pending', NULL, '179.8', '23', NULL, '2018-07-02', '2018-08-02 00:00:00', NULL),
('asdasdasd', '1', 'Pending', NULL, '28.8', '24', NULL, '2018-08-23', '2018-08-02 00:00:00', NULL),
('asdasdasd', '1', 'Pending', NULL, '359.6', '25', NULL, '2018-08-24', '2018-08-02 00:00:00', NULL),
('asdasdasd', '1', 'Pending', NULL, '237.4', '26', NULL, '2018-08-18', '2018-08-02 00:00:00', NULL),
('asdasdasd', '1', 'Pending', NULL, '89.9', '3', NULL, '2018-08-04', '2018-08-02 00:00:00', NULL),
('asdasdasd', '1', 'Pending', NULL, '89.9', '8', NULL, '2018-08-11', '2018-08-02 00:00:00', NULL),
('asdasdasd', '1', 'Pending', NULL, '89.9', '9', NULL, '2018-08-23', '2018-08-02 00:00:00', NULL),
('aa', 'aa', 'Done', '1 August 2018', 'aa', 'aa', 'aa', '1 August 2018', NULL, NULL),
('Lim Jun Kit', 'C10001', 'Done', '2018-08-01', '50', 'O10001', 'S10001', '2018-08-01', NULL, NULL),
('test', 'test', 'Done', '2018-08-02', '50', 'test', 'test', '2018-08-02', NULL, '09:34:36'),
('vv', 'vv', 'Done', '1 August 2018', 'vv', 'vv', 'vv', '1 August 2018', NULL, NULL);