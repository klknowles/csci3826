DROP TABLE IF EXISTS `my_Products`;
CREATE TABLE `my_Products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category_code` varchar(7) NOT NULL,
  `product_name` tinytext NOT NULL,
  `product_price` double NOT NULL,
  `product_inventory` int(11) DEFAULT NULL,
  `product_description` text NOT NULL,
  `product_image_url` tinytext NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `product_category_code` (`product_category_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `my_Products` WRITE;
INSERT INTO `my_Products` VALUES
  (NULL,'AUTO','Lug Wrench','24.99','76',
   'Lug wrench for changing your bald tires.',
   'images/products/LugWrench.jpg'),
  (NULL,'AUTO','4-Way Lug Wrench','34.99','76',
   '4-way lug wrench for changing your bald tires.',
   'images/products/FourWayLugWrench.jpg'),
  (NULL,'AUTO','Tire Jack','44.99','76',
   'Tire jack for regular lifting of your lemon of a car.',
   'images/products/TireJack.jpg'),
  (NULL,'AUTO','Tire Gauge','54.99','76',
   'Tire gauge for keeping a watchful eye on your awful, leaky tires.',
   'images/products/TireGauge.jpg'),
  (NULL,'GARDEN','Garden Hose','24.99','76',
   'JaCoT-brand hose for watering your already-dead lawn.',
   'images/products/GardenHose.jpg'),
  (NULL,'GARDEN','Garden Shovel','34.99','76',
   'JaCoT-brand garden shovel for all of your boring use cases.',
   'images/products/GardenShovel.jpg'),
  (NULL,'GARDEN','Shovel','44.99','76',
   'JaCoT-brand shovel for digging that hole your already in even deeper.',
   'images/products/Shovel.jpg'),
  (NULL,'GARDEN','Lawnmower','54.99','76',
   'Perfect for running over that hose you just bought.',
   'images/products/Lawnmower.jpg'),
  (NULL,'HOME','Drill','24.99','76',
   'Ideal for drilling holes or even screwing things in.',
   'images/products/Drill.jpg'),
  (NULL,'HOME','Hammer','34.99','76',
   'Thor himself would be jealous of you for owning this hammer.',
   'images/products/Hammer.jpg'),
  (NULL,'HOME','Power Saw','44.99','76',
   'Plug it in and cut things in two. Pretty cool, huh?',
   'images/products/PowerSaw.jpg'),
  (NULL,'HOME','Table Saw','54.99','76',
   'Akin to the power saw but attached to a table.',
   'images/products/TableSaw.jpg'),
  (NULL,'HOME','Toolbox','64.99','76',
   'Randomly-selected tools. No two boxes are the same.',
   'images/products/Toolbox.jpg');
UNLOCK TABLES;

DROP TABLE IF EXISTS `my_Ref_Product_Categories`;
CREATE TABLE `my_Ref_Product_Categories` (
  `product_category_code` varchar(7) NOT NULL,
  `product_category_description` tinytext NOT NULL,
  `department_name` tinytext NOT NULL,
  PRIMARY KEY (`product_category_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `my_Ref_Product_Categories` WRITE;
INSERT INTO `my_Ref_Product_Categories`
       VALUES ('AUTO','Automotive repair and maintenance','Automotive'),
              ('GARDEN','Gardening and lawn care','Gardening'),
              ('HOME','Home improvement and renovation','Home Improvement');
UNLOCK TABLES;

