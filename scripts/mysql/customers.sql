DROP TABLE IF EXISTS `my_Customers`;

CREATE TABLE `my_Customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `salutation` varchar(10) DEFAULT NULL,
  `customer_first_name` varchar(24) NOT NULL,
  `customer_middle_initial` varchar(3) DEFAULT NULL,
  `customer_last_name` varchar(24) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `email_address` varchar(60) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `street_address` text NOT NULL,
  `city` varchar(40) NOT NULL,
  `region` varchar(40) NOT NULL,
  `postal_code` varchar (40) NOT NULL,
  `login_name` varchar(60) NOT NULL,
  `login_password` varchar(255) NOT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `email_address` (`email_address`,`login_name`),
  KEY `phone_number` (`phone_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `my_Customers` WRITE;
