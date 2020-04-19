DROP TABLE IF EXISTS `my_Order_Items`;
CREATE TABLE `my_Order_Items` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_item_status_code` varchar(2) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_item_quantity` double NOT NULL,
  `order_item_price` double NOT NULL,
  `other_order_item_details` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_item_id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`),
  KEY `order_item_status_code` (`order_item_status_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `my_Order_Items` WRITE;
UNLOCK TABLES;

DROP TABLE IF EXISTS `my_Orders`;
CREATE TABLE `my_Orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `order_status_code` varchar(2) NOT NULL,
  `date_order_placed` date NOT NULL,
  `order_details` text,
  PRIMARY KEY (`order_id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `my_Orders` WRITE;
UNLOCK TABLES;

DROP TABLE IF EXISTS `my_Ref_Order_Item_Status`;
CREATE TABLE `my_Ref_Order_Item_Status` (
  `order_item_status_code` varchar(2) NOT NULL,
  `order_item_status_description` tinytext NOT NULL,
  PRIMARY KEY (`order_item_status_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `my_Ref_Order_Item_Status` WRITE;
INSERT INTO `my_Ref_Order_Item_Status`
  VALUES ('CL','Canceled'),
         ('DL','Delivered'),
         ('PD','Paid'),
         ('IP','In Progress');
UNLOCK TABLES;

DROP TABLE IF EXISTS `my_Ref_Order_Status`;
CREATE TABLE `my_Ref_Order_Status` (
  `order_status_code` varchar(2) NOT NULL,
  `order_status_description` tinytext NOT NULL,
  PRIMARY KEY (`order_status_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `my_Ref_Order_Status` WRITE;
INSERT INTO `my_Ref_Order_Status`
  VALUES ('CL','Canceled'),
         ('DL','Delivered'),
         ('PD','Paid'),
         ('IP','In Progress');
UNLOCK TABLES;
