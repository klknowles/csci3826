DROP TABLE IF EXISTS `my_Shipment_Items`;
CREATE TABLE `my_Shipment_Items` (
  `shipment_id` int(11) NOT NULL,
  `order_item_id` int(11) NOT NULL,
  PRIMARY KEY (`shipment_id`,`order_item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `my_Shipment_Items` WRITE;
UNLOCK TABLES;

DROP TABLE IF EXISTS `my_Shipments`;
Create TABLE `my_Shipments` (
  `shipment_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `shipment_tracking_number` text NOT NULL,
  `shipment_date` date NOT NULL,
  `other_shipment_details` text,
  PRIMARY KEY (`shipment_id`),
  KEY `order_id` (`order_id`,`invoice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `my_Shipments` WRITE;
UNLOCK TABLES;
