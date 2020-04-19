DROP TABLE IF EXISTS `my_Invoices`;
CREATE TABLE `my_Invoices` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `invoice_status_code` varchar(2) NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_details` text,
  PRIMARY KEY (`invoice_id`),
  KEY `order_id` (`order_id`,`invoice_status_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `my_Invoices` WRITE;
UNLOCK TABLES;

DROP TABLE IF EXISTS `my_Ref_Invoice_Status`;
CREATE TABLE `my_Ref_Invoice_Status` (
  `invoice_status_code` varchar(2) NOT NULL,
  `invoice_status_description` text NOT NULL,
  PRIMARY KEY (`invoice_status_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `my_Ref_Invoice_Status` WRITE;
INSERT INTO `my_Ref_Invoice_Status` VALUES ('IS','Issued'),('PD','Paid');
UNLOCK TABLES;
