/*
 Navicat Premium Data Transfer

 Source Server         : mysqlconn
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : 18bdb

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 03/08/2021 01:38:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_order_status
-- ----------------------------
DROP TABLE IF EXISTS `tbl_order_status`;
CREATE TABLE `tbl_order_status` (
  `order_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_status_name` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`order_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_order_status
-- ----------------------------
BEGIN;
INSERT INTO `tbl_order_status` VALUES (1, 'Success', 1);
INSERT INTO `tbl_order_status` VALUES (2, 'Refund', 1);
COMMIT;

-- ----------------------------
-- Table structure for tblbrand
-- ----------------------------
DROP TABLE IF EXISTS `tblbrand`;
CREATE TABLE `tblbrand` (
  `brandid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `brandname` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`brandid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblbrand
-- ----------------------------
BEGIN;
INSERT INTO `tblbrand` VALUES (1, 'TYT', 'unnamed1.jpg', 1);
INSERT INTO `tblbrand` VALUES (2, 'Motorolla', 'Motorola-logo.jpg', 1);
INSERT INTO `tblbrand` VALUES (3, 'Baofeng', 'Best-BaoFeng-Two-Way-Radios.jpg', 1);
COMMIT;

-- ----------------------------
-- Table structure for tblcart
-- ----------------------------
DROP TABLE IF EXISTS `tblcart`;
CREATE TABLE `tblcart` (
  `cart_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `productid` int(11) unsigned NOT NULL,
  `customerid` int(11) unsigned NOT NULL,
  `qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `productid` (`productid`,`customerid`),
  KEY `customerid` (`customerid`),
  CONSTRAINT `tblcart_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `tblproduct` (`productid`),
  CONSTRAINT `tblcart_ibfk_2` FOREIGN KEY (`customerid`) REFERENCES `tblcustomer` (`customerid`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblcart
-- ----------------------------
BEGIN;
INSERT INTO `tblcart` VALUES (21, 16, 1, 19);
INSERT INTO `tblcart` VALUES (22, 9, 1, 1);
COMMIT;

-- ----------------------------
-- Table structure for tblcategory
-- ----------------------------
DROP TABLE IF EXISTS `tblcategory`;
CREATE TABLE `tblcategory` (
  `categoryid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(50) NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblcategory
-- ----------------------------
BEGIN;
INSERT INTO `tblcategory` VALUES (2, 'ICOM Accessories', 1);
INSERT INTO `tblcategory` VALUES (3, 'ICOM ANTENNA', 1);
INSERT INTO `tblcategory` VALUES (4, 'MOTOROLA', 1);
INSERT INTO `tblcategory` VALUES (5, 'Motorola-UHF', 1);
COMMIT;

-- ----------------------------
-- Table structure for tblcustomer
-- ----------------------------
DROP TABLE IF EXISTS `tblcustomer`;
CREATE TABLE `tblcustomer` (
  `customerid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone_number` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `images` varchar(100) DEFAULT NULL,
  `register_date` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`customerid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblcustomer
-- ----------------------------
BEGIN;
INSERT INTO `tblcustomer` VALUES (1, 'Pha', 'Rot', 'pharot', 'Phnom Penh', '0969824898', 'pharot@gmail.com', '$2y$10$c.5GXq.VlI2.S3/6eZONfufHWbj5fFOWGdzuzi6Zr/Ba42rZM7c4C', '2021-01-27 12.00.30.jpg', NULL, 1);
INSERT INTO `tblcustomer` VALUES (5, 'Bo', 'Pha', 'bopha', 'Sangkat Chorm Chao, Khan Por Sen Chey, Phnom Penh Cambodia', '098123321', 'bopha@gmail.com', '$2y$10$mc84Jc20dKLnv0/Pwa0w9OJ9rAnrGhSoU70eghLG/ZKlzf0wy.tTS', 'team-3.jpg', '2021-03-04', 1);
INSERT INTO `tblcustomer` VALUES (9, 'Vi', 'Sal', 'visal', 'Sangkat Wat Phnom PP', '0191919111', 'visal@gmail.com', '$2y$10$4N.q.cfvCQauDihTlxrfLuPCy2INNftecLmZe1gS77o6EHrJrqIFm', NULL, NULL, 1);
COMMIT;

-- ----------------------------
-- Table structure for tblinvoice
-- ----------------------------
DROP TABLE IF EXISTS `tblinvoice`;
CREATE TABLE `tblinvoice` (
  `invoiceid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `orderid` int(11) unsigned NOT NULL,
  `userid` int(11) unsigned NOT NULL,
  PRIMARY KEY (`invoiceid`),
  KEY `orderid` (`orderid`,`userid`),
  KEY `userid` (`userid`),
  CONSTRAINT `tblinvoice_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `tblorder` (`orderid`),
  CONSTRAINT `tblinvoice_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `tbluser` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblinvoice
-- ----------------------------
BEGIN;
INSERT INTO `tblinvoice` VALUES (1, '2021-07-12', 7, 21);
INSERT INTO `tblinvoice` VALUES (2, '2021-07-12', 9, 21);
INSERT INTO `tblinvoice` VALUES (3, '2021-07-14', 11, 21);
INSERT INTO `tblinvoice` VALUES (4, '2021-07-14', 1, 21);
INSERT INTO `tblinvoice` VALUES (5, '2021-07-17', 4, 21);
INSERT INTO `tblinvoice` VALUES (6, '2021-07-18', 10, 21);
INSERT INTO `tblinvoice` VALUES (7, '2021-07-24', 13, 21);
INSERT INTO `tblinvoice` VALUES (8, '2021-07-30', 15, 21);
COMMIT;

-- ----------------------------
-- Table structure for tblinvoice_detail
-- ----------------------------
DROP TABLE IF EXISTS `tblinvoice_detail`;
CREATE TABLE `tblinvoice_detail` (
  `invoice_detail_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `invoiceid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`invoice_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblinvoice_detail
-- ----------------------------
BEGIN;
INSERT INTO `tblinvoice_detail` VALUES (1, 1, 1, 1);
INSERT INTO `tblinvoice_detail` VALUES (2, 1, 11, 1);
INSERT INTO `tblinvoice_detail` VALUES (3, 2, 5, 2);
INSERT INTO `tblinvoice_detail` VALUES (4, 3, 7, 2);
INSERT INTO `tblinvoice_detail` VALUES (5, 3, 6, 1);
INSERT INTO `tblinvoice_detail` VALUES (6, 3, 5, 1);
INSERT INTO `tblinvoice_detail` VALUES (7, 4, 1, 1);
INSERT INTO `tblinvoice_detail` VALUES (8, 5, 6, 3);
INSERT INTO `tblinvoice_detail` VALUES (9, 5, 9, 3);
INSERT INTO `tblinvoice_detail` VALUES (10, 6, 10, 1);
INSERT INTO `tblinvoice_detail` VALUES (11, 6, 9, 1);
INSERT INTO `tblinvoice_detail` VALUES (12, 6, 1, 1);
INSERT INTO `tblinvoice_detail` VALUES (13, 6, 5, 1);
INSERT INTO `tblinvoice_detail` VALUES (14, 7, 1, 3);
INSERT INTO `tblinvoice_detail` VALUES (15, 8, 16, 1);
INSERT INTO `tblinvoice_detail` VALUES (16, 8, 1, 1);
INSERT INTO `tblinvoice_detail` VALUES (17, 8, 2, 1);
COMMIT;

-- ----------------------------
-- Table structure for tblorder
-- ----------------------------
DROP TABLE IF EXISTS `tblorder`;
CREATE TABLE `tblorder` (
  `orderid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_date` date DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `payment_transaction_image` varchar(50) DEFAULT NULL,
  `customerid` int(11) unsigned NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`orderid`) USING BTREE,
  KEY `customerid` (`customerid`),
  CONSTRAINT `tblorder_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `tblcustomer` (`customerid`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblorder
-- ----------------------------
BEGIN;
INSERT INTO `tblorder` VALUES (1, '2021-04-06', 'Cash on delivery', '', 1, 4);
INSERT INTO `tblorder` VALUES (2, '2021-04-06', 'Cash on delivery', '', 1, 4);
INSERT INTO `tblorder` VALUES (3, '2021-05-06', 'Cash on delivery', '', 1, 4);
INSERT INTO `tblorder` VALUES (4, '2021-05-06', 'Cash on delivery', '', 1, 2);
INSERT INTO `tblorder` VALUES (5, '2021-05-06', 'Cash on delivery', '', 5, 4);
INSERT INTO `tblorder` VALUES (6, '2021-06-06', 'Cash on delivery', '', 5, 3);
INSERT INTO `tblorder` VALUES (7, '2021-06-06', 'Cash on delivery', '', 5, 4);
INSERT INTO `tblorder` VALUES (8, '2021-06-13', 'Cash on delivery', '', 9, 1);
INSERT INTO `tblorder` VALUES (9, '2021-06-13', 'Cash on delivery', '', 9, 1);
INSERT INTO `tblorder` VALUES (10, '2021-07-07', 'Cash on delivery', '', 1, 2);
INSERT INTO `tblorder` VALUES (11, '2021-07-10', 'Cash on delivery', '', 1, 1);
INSERT INTO `tblorder` VALUES (12, '2021-07-21', 'ABA Transaction', '2021-06-25 09.39.34.jpg', 1, 2);
INSERT INTO `tblorder` VALUES (13, '2021-07-24', 'Cash on delivery', '', 1, 2);
INSERT INTO `tblorder` VALUES (14, '2021-07-28', 'ABA Transaction', '', 1, 1);
INSERT INTO `tblorder` VALUES (15, '2021-07-30', 'Cash on delivery', '', 1, 2);
INSERT INTO `tblorder` VALUES (16, '2021-07-30', 'ABA Transaction', '', 1, 1);
INSERT INTO `tblorder` VALUES (17, '2021-07-30', 'ABA Transaction', '2021-06-25 09.39.34.jpg', 1, 1);
INSERT INTO `tblorder` VALUES (18, '2021-07-30', 'Cash on delivery', '', 1, 1);
INSERT INTO `tblorder` VALUES (22, '2021-07-30', 'ACLEDA Transaction', '123.jpeg', 1, 1);
INSERT INTO `tblorder` VALUES (23, '2021-07-30', 'ACLEDA Transaction', '123.jpeg', 1, 1);
COMMIT;

-- ----------------------------
-- Table structure for tblorder_detail
-- ----------------------------
DROP TABLE IF EXISTS `tblorder_detail`;
CREATE TABLE `tblorder_detail` (
  `order_detailid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `orderid` int(11) unsigned NOT NULL,
  `productid` int(11) unsigned NOT NULL,
  `qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_detailid`),
  KEY `orderid` (`orderid`),
  KEY `productid` (`productid`),
  CONSTRAINT `tblorder_detail_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `tblorder` (`orderid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tblorder_detail_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `tblproduct` (`productid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblorder_detail
-- ----------------------------
BEGIN;
INSERT INTO `tblorder_detail` VALUES (1, 1, 1, 1);
INSERT INTO `tblorder_detail` VALUES (2, 2, 15, 5);
INSERT INTO `tblorder_detail` VALUES (3, 3, 6, 1);
INSERT INTO `tblorder_detail` VALUES (4, 4, 6, 3);
INSERT INTO `tblorder_detail` VALUES (5, 4, 9, 3);
INSERT INTO `tblorder_detail` VALUES (6, 5, 6, 4);
INSERT INTO `tblorder_detail` VALUES (7, 5, 9, 3);
INSERT INTO `tblorder_detail` VALUES (8, 5, 1, 1);
INSERT INTO `tblorder_detail` VALUES (9, 5, 15, 1);
INSERT INTO `tblorder_detail` VALUES (10, 6, 1, 1);
INSERT INTO `tblorder_detail` VALUES (11, 7, 1, 1);
INSERT INTO `tblorder_detail` VALUES (12, 7, 11, 1);
INSERT INTO `tblorder_detail` VALUES (13, 8, 1, 3);
INSERT INTO `tblorder_detail` VALUES (14, 9, 5, 2);
INSERT INTO `tblorder_detail` VALUES (15, 10, 10, 1);
INSERT INTO `tblorder_detail` VALUES (16, 10, 9, 1);
INSERT INTO `tblorder_detail` VALUES (17, 10, 1, 1);
INSERT INTO `tblorder_detail` VALUES (18, 10, 5, 1);
INSERT INTO `tblorder_detail` VALUES (19, 11, 7, 2);
INSERT INTO `tblorder_detail` VALUES (20, 11, 6, 1);
INSERT INTO `tblorder_detail` VALUES (21, 11, 5, 1);
INSERT INTO `tblorder_detail` VALUES (22, 12, 1, 3);
INSERT INTO `tblorder_detail` VALUES (23, 13, 1, 3);
INSERT INTO `tblorder_detail` VALUES (24, 14, 1, 2);
INSERT INTO `tblorder_detail` VALUES (25, 14, 11, 2);
INSERT INTO `tblorder_detail` VALUES (26, 14, 2, 2);
INSERT INTO `tblorder_detail` VALUES (27, 15, 16, 1);
INSERT INTO `tblorder_detail` VALUES (28, 15, 1, 1);
INSERT INTO `tblorder_detail` VALUES (29, 15, 2, 1);
INSERT INTO `tblorder_detail` VALUES (35, 16, 9, 1);
INSERT INTO `tblorder_detail` VALUES (37, 17, 5, 1);
INSERT INTO `tblorder_detail` VALUES (39, 18, 1, 3);
INSERT INTO `tblorder_detail` VALUES (43, 22, 7, 3);
INSERT INTO `tblorder_detail` VALUES (44, 23, 2, 6);
INSERT INTO `tblorder_detail` VALUES (45, 23, 8, 6);
COMMIT;

-- ----------------------------
-- Table structure for tblproduct
-- ----------------------------
DROP TABLE IF EXISTS `tblproduct`;
CREATE TABLE `tblproduct` (
  `productid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `productname` varchar(50) DEFAULT NULL,
  `description` text,
  `supplierid` int(11) unsigned NOT NULL,
  `categoryid` int(11) unsigned NOT NULL,
  `brandid` int(11) unsigned NOT NULL,
  `images` varchar(100) DEFAULT NULL,
  `cost` decimal(6,2) DEFAULT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `userid` int(11) unsigned NOT NULL,
  `date_add` date DEFAULT NULL,
  `date_view` date DEFAULT NULL,
  `counter` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`productid`),
  KEY `supplierid` (`supplierid`,`categoryid`,`brandid`,`userid`),
  KEY `userid` (`userid`),
  KEY `categoryid` (`categoryid`),
  KEY `brandid` (`brandid`),
  CONSTRAINT `tblproduct_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `tbluser` (`userid`),
  CONSTRAINT `tblproduct_ibfk_2` FOREIGN KEY (`categoryid`) REFERENCES `tblcategory` (`categoryid`),
  CONSTRAINT `tblproduct_ibfk_3` FOREIGN KEY (`brandid`) REFERENCES `tblbrand` (`brandid`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblproduct
-- ----------------------------
BEGIN;
INSERT INTO `tblproduct` VALUES (1, 'Black Bean ', '<pre>\r\n<strong>INGREDIENTS</strong></pre>\r\n\r\n<ul>\r\n	<li>1 16 oz can black beans rinsed and drained</li>\r\n	<li>1/2 green bell pepper</li>\r\n	<li>1/2 small onion</li>\r\n	<li>2 cloves garlic peeled</li>\r\n	<li>2/3 cup whole wheat bread crumbs</li>\r\n	<li>1 Tbsp chili powder</li>\r\n	<li>1 tsp cumin</li>\r\n	<li>Salt &amp; Pepper to taste</li>\r\n</ul>\r\n\r\n<pre>\r\n<strong>INSTRUCTIONS</strong></pre>\r\n\r\n<ol>\r\n	<li>\r\n	<p>Place rinsed and drained black beans in a bowl. If needed, blot them with a paper towel to remove any extra moisture. Place in a large bowl and mash well with a fork.</p>\r\n	</li>\r\n	<li>\r\n	<p>Place the bell pepper, onion and garlic in a food processor and process until finely minced. Transfer mixture to a fine mesh strainer to remove the&nbsp;excess water. (Remove as much moisture as you can--if it&#39;s too wet, the burger wont hold together as well.)</p>\r\n	</li>\r\n	<li>\r\n	<p>Add the strained vegetable mixture to the bowl with the black beans. &nbsp;Add the&nbsp;chili powder, cumin and salt and pepper and stir to combine. Add beaten egg and mix. Stir&nbsp;in bread crumbs.&nbsp; Form mixture into 4 patties.</p>\r\n	</li>\r\n</ol>\r\n', 0, 3, 3, 'Motorola-CP3388.jpg', 13.00, 25.00, 1, 21, NULL, '2021-07-30', 13, 1);
INSERT INTO `tblproduct` VALUES (2, 'អាយកូម WLN C1', '<p>☑️ Model: WLN C1</p>\r\n\r\n<p>☑️ កំលាំងផ្សាយ 5W</p>\r\n\r\n<p>☑️ ប្រេកង់ UHF (400-470MHz)</p>\r\n\r\n<p>☑️&nbsp;សំលេង​លឺច្បាស់</p>\r\n', 0, 4, 2, 'Model-WLN-C1-3-Color-Promote-1170x1058.jpg', 8.00, 10.00, 27, 21, NULL, '2021-07-30', 5, 1);
INSERT INTO `tblproduct` VALUES (5, 'អាយកូម Motorola', '', 0, 5, 2, 'Model-A9-151.jpg', 12.00, 15.00, 10, 21, NULL, '2021-07-30', 2, 1);
INSERT INTO `tblproduct` VALUES (6, 'YJT  W318', '<p>ហាង 18B Telecom មានលក់អាយកូមគ្រប់ប្រភេទ និងជួសជុលវិទ្យុទាក់ទង គ្រប់ប្រភេទ</p>\r\n\r\n<p>&nbsp;</p>\r\n', 0, 5, 1, 'HTB10aKoRxjaK1RjSZFAq6zdLFXat.jpeg', 40.00, 45.00, 9, 21, NULL, '2021-07-30', 4, 1);
INSERT INTO `tblproduct` VALUES (7, 'អាយកូម ', '<p>ហាង 18B Telecom មានលក់អាយកូមគ្រប់ប្រភេទ និងជួសជុលវិទ្យុទាក់ទង គ្រប់ប្រភេទ</p>\r\n\r\n<p>&nbsp;</p>\r\n', 0, 5, 2, 'Model-TC-7000.jpg', 15.00, 18.00, 16, 21, NULL, '2021-07-30', 1, 1);
INSERT INTO `tblproduct` VALUES (8, 'Oven Crisp', '<h3>INGREDIENTS</h3>\r\n\r\n<ul>\r\n	<li>tablespoon unsalted butter, melted</li>\r\n	<li>1/4 teaspoon cayenne pepper</li>\r\n	<li>1/4 teaspoon freshly ground black pepper</li>\r\n	<li>1/4 teaspoon kosher salt</li>\r\n	<li>1/4 cup hot pepper sauce (such as Frank&#39;s)</li>\r\n	<li>1/4 cup honey</li>\r\n	<li>2 tablespoons soy sauce</li>\r\n	<li>3 large garlic cloves, crushed</li>\r\n	<li>1 2x1&quot; piece of ginger, peeled, sliced</li>\r\n	<li>5 pounds chicken wings, tips removed, drumettes and flats separated</li>\r\n	<li>2 tablespoons vegetable oil</li>\r\n	<li>1 tablespoon kosher salt</li>\r\n	<li>1/2 teaspoon freshly ground black pepper</li>\r\n</ul>\r\n\r\n<h3>INSTRUCTIONS</h3>\r\n\r\n<p><strong>For buffalo sauce:</strong></p>\r\n\r\n<p>Mix first 4 ingredients in a medium bowl; let stand for 5 minutes. Whisk in hot sauce; keep warm.</p>\r\n\r\n<p>DO AHEAD:&nbsp;<em>Can be made 1 week ahead. Let cool completely; cover and chill. Rewarm before using.</em></p>\r\n\r\n<p><strong>For ginger-soy glaze:</strong></p>\r\n\r\n<p>Bring all ingredients and 1/4 cup water to a boil in a small saucepan, stirring to dissolve honey. Reduce heat to low; simmer, stirring occasionally, until reduced to 1/4 cup, 7&ndash;8 minutes. Strain into a medium bowl. Let sit for 15 minutes to thicken slightly.</p>\r\n', 0, 4, 2, 'Model-C70A​2.jpg', 10.00, 13.00, 18, 21, NULL, '2021-07-31', 1, 1);
INSERT INTO `tblproduct` VALUES (9, 'Chickpeas Falafel ', '<h3>INGREDIENTS</h3>\r\n\r\n<ul>\r\n	<li>1 15-ounce (425 g) can chickpeas, rinsed, drained and patted dry</li>\r\n	<li>1/3 cup (15 g) chopped fresh parsley (or sub cilantro)</li>\r\n	<li>4 cloves garlic, minced</li>\r\n	<li>2 shallots, minced (~ 3/4 cup, 65 g | or sub white onion)</li>\r\n	<li>2 Tbsp (17 g) raw sesame seeds (or sub finely chopped nuts, such as pecans)</li>\r\n	<li>1 1/2 tsp cumin, plus more to taste</li>\r\n	<li>1/4 tsp each sea salt and black pepper, plus more to taste</li>\r\n	<li>optional: Healthy pinch each cardamom and coriander</li>\r\n</ul>\r\n\r\n<h3>INSTRUCTIONS</h3>\r\n\r\n<ol>\r\n	<li>Add chickpeas, parsley, shallot, garlic, sesame seeds, cumin, salt, pepper (and coriander and cardamom if using) to a food processor or blender and mix/pulse to combine, scraping down sides as needed until thoroughly combined. You&rsquo;re looking for a crumbly dough, not a paste (see photo).</li>\r\n	<li>Add flour 1 Tbsp at a time and pulse/mix to combine until no longer wet and you can mold the dough into a ball without it sticking to your hands - I used 4 Tbsp.</li>\r\n	<li>Taste and adjust seasonings as needed. I added a bit more salt, pepper, and a dash of cardamom and coriander. You want the flavor to be pretty bold, so don&rsquo;t be shy.</li>\r\n	<li>Transfer to a mixing bowl, cover and refrigerate for 1-2 hours to firm up. If you&rsquo;re in a hurry you can skip this step but they will be a little more fragile when cooking.</li>\r\n</ol>\r\n', 0, 2, 3, 'Model-W318.jpg', 10.00, 45.00, 30, 21, NULL, '2021-07-31', 1, 1);
INSERT INTO `tblproduct` VALUES (10, 'StirFry Chicken ', '<h3>INGREDIENTS</h3>\r\n\r\n<ul>\r\n	<li>1 each small green, sweet red and sweet yellow pepper, julienned</li>\r\n	<li>1 medium onion, quartered</li>\r\n	<li>4 tablespoons olive oil, divided</li>\r\n	<li>2 garlic cloves, minced</li>\r\n	<li>3/4 pound boneless skinless chicken breast halves, cubed</li>\r\n	<li>3/4 teaspoon Cajun seasoning</li>\r\n	<li>1/3 cup packed brown sugar</li>\r\n	<li>2 teaspoons cornstarch</li>\r\n	<li>1 tablespoon water</li>\r\n	<li>1 tablespoon lemon juice</li>\r\n	<li>1 tablespoon honey mustard</li>\r\n	<li>1 teaspoon soy sauce</li>\r\n	<li>1 teaspoon Worcestershire sauce</li>\r\n	<li>Hot cooked rice, optional</li>\r\n</ul>\r\n\r\n<h3>INSTRUCTIONS</h3>\r\n\r\n<ul>\r\n	<li>In a large skillet, stir-fry peppers and onion in 2 tablespoons oil until crisp-tender. Add garlic; cook 1 minute longer. Remove and keep warm. In the same skillet, stir-fry chicken and Cajun seasoning in remaining oil until no longer pink.</li>\r\n	<li>In a small bowl, combine the brown sugar, cornstarch, water, lemon juice, mustard, soy sauce and Worcestershire sauce; pour over chicken. Return pepper mixture to the pan; cook and stir for 1 minute. Serve with rice if desired.&nbsp;Yield:&nbsp;3-4 servings.</li>\r\n</ul>\r\n', 0, 2, 1, 'Model-TYT-TC-999-13.jpg', 10.00, 13.00, 23, 21, NULL, '2021-07-01', 1, 1);
INSERT INTO `tblproduct` VALUES (11, 'Broccoli Chickpea ', '<h3>INGREDIENTS</h3>\r\n\r\n<ul>\r\n	<li>2 cups red rice, cooked (2 cups cooked is about 1 cup raw)</li>\r\n	<li>2 cups cooked chickpeas, or one can drained</li>\r\n	<li>2 oranges, peeled and sectioned</li>\r\n	<li>1/4 cup dried cranberries</li>\r\n	<li>1/4 cup almond slivers, toasted</li>\r\n	<li>2 tbsp olive oil</li>\r\n	<li>2 tbsp orange juice</li>\r\n	<li>2 tbsp red wine vinegar</li>\r\n	<li>salt and pepper to taste</li>\r\n	<li>parley to garnish</li>\r\n</ul>\r\n\r\n<h3>INSTRUCTIONS</h3>\r\n\r\n<ol>\r\n	<li>In a large bowl toss the rice, chickpeas, orange sections, cranberries and almonds together.</li>\r\n	<li>In a small bowl or cup, stir together the olive oil, orange juice, vinegar and seasoning.</li>\r\n	<li>Dress the rice salad with the orange juice mixture. Garnish with parsley.</li>\r\n</ol>\r\n', 0, 2, 1, 'UV82-3.jpg', 10.00, 25.00, 16, 21, NULL, '2021-07-28', 1, 1);
INSERT INTO `tblproduct` VALUES (15, 'MT2', '<p>☑️ Model: MT2</p>\r\n\r\n<p>☑️ កំលាំងផ្សាយ 5W</p>\r\n\r\n<p>☑️ ប្រេកង់ UHF (400-470MHz)</p>\r\n\r\n<p>☑️&nbsp;សំលេង​លឺច្បាស់</p>\r\n', 0, 5, 1, 'MT2.jpg', 15.00, 20.00, 20, 21, '2021-02-09', '2021-07-29', 1, 1);
INSERT INTO `tblproduct` VALUES (16, 'GP003', '<p>គុណភាពល្អ​ មិនជ្រាបទឹក</p>\r\n', 1, 2, 1, 'Motorola_GP003-132.jpeg', 10.00, 13.00, 19, 21, '2021-07-26', '2021-07-30', 1, 1);
COMMIT;

-- ----------------------------
-- Table structure for tblproduct_images
-- ----------------------------
DROP TABLE IF EXISTS `tblproduct_images`;
CREATE TABLE `tblproduct_images` (
  `pro_imageid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `images` varchar(100) DEFAULT NULL,
  `productid` int(11) unsigned NOT NULL,
  PRIMARY KEY (`pro_imageid`),
  KEY `productid` (`productid`),
  CONSTRAINT `tblproduct_images_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `tblproduct` (`productid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblproduct_images
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for tblrating
-- ----------------------------
DROP TABLE IF EXISTS `tblrating`;
CREATE TABLE `tblrating` (
  `ratingid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `productid` int(11) unsigned NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `customerid` int(11) unsigned NOT NULL,
  PRIMARY KEY (`ratingid`),
  KEY `productid` (`productid`,`customerid`),
  KEY `customerid` (`customerid`),
  CONSTRAINT `tblrating_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `tblcustomer` (`customerid`),
  CONSTRAINT `tblrating_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `tblproduct` (`productid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblrating
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for tblsale_order
-- ----------------------------
DROP TABLE IF EXISTS `tblsale_order`;
CREATE TABLE `tblsale_order` (
  `sale_orderid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sale_date` date DEFAULT NULL,
  `phone_number` varchar(50) NOT NULL,
  `place` varchar(100) NOT NULL,
  `delivery_type` varchar(50) NOT NULL,
  `userid` int(11) NOT NULL,
  `delivery_fee` double(6,2) NOT NULL,
  `total_cost` double(6,2) NOT NULL,
  `income` double(6,2) NOT NULL,
  `cash_in` varchar(50) DEFAULT NULL,
  `remark` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`sale_orderid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblsale_order
-- ----------------------------
BEGIN;
INSERT INTO `tblsale_order` VALUES (1, '2021-07-28', '01231234', 'Russey Keo', 'Motor', 57, 3.75, 9.75, 4.00, 'Pharot', 'pharot');
INSERT INTO `tblsale_order` VALUES (2, '2021-07-29', '01231234', 'Phnom Penh', 'Motor', 58, 3.75, 53.75, 10.00, 'Pharot', 'pharot');
INSERT INTO `tblsale_order` VALUES (3, '2021-07-29', '01231234', 'Phnom Penh', 'Motor', 58, 3.75, 53.75, 10.00, 'Pharot', 'pharot');
INSERT INTO `tblsale_order` VALUES (4, '2021-07-29', '01231234', 'Toul Kork', 'rot', 58, 3.75, 23.75, 4.00, 'rot', 'rot');
INSERT INTO `tblsale_order` VALUES (5, '2021-07-30', '01231234', 'Chorm Chao', 'Motor', 58, 3.00, 53.00, 4.00, 'Pharot', 'Pharot');
INSERT INTO `tblsale_order` VALUES (6, '2021-07-31', '01231234', 'Phnom Penh', 'វីរះបុនថាំ', 58, 3.75, 53.75, 10.00, 'Pharot', 'pharot');
COMMIT;

-- ----------------------------
-- Table structure for tblsale_orderdetail
-- ----------------------------
DROP TABLE IF EXISTS `tblsale_orderdetail`;
CREATE TABLE `tblsale_orderdetail` (
  `sale_order_detailid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sale_orderid` int(11) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (`sale_order_detailid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblsale_orderdetail
-- ----------------------------
BEGIN;
INSERT INTO `tblsale_orderdetail` VALUES (1, 1, 16, 2, 5.00);
INSERT INTO `tblsale_orderdetail` VALUES (2, 2, 1, 2, 30.00);
INSERT INTO `tblsale_orderdetail` VALUES (3, 3, 1, 2, 30.00);
INSERT INTO `tblsale_orderdetail` VALUES (4, 4, 2, 2, 12.00);
INSERT INTO `tblsale_orderdetail` VALUES (5, 5, 1, 2, 27.00);
INSERT INTO `tblsale_orderdetail` VALUES (6, 6, 1, 2, 30.00);
COMMIT;

-- ----------------------------
-- Table structure for tblslider
-- ----------------------------
DROP TABLE IF EXISTS `tblslider`;
CREATE TABLE `tblslider` (
  `sliderid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`sliderid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblslider
-- ----------------------------
BEGIN;
INSERT INTO `tblslider` VALUES (3, '2021-01-24 17.30.12.jpg', 1);
INSERT INTO `tblslider` VALUES (4, '2021-01-24 17.29.40.jpg', 1);
COMMIT;

-- ----------------------------
-- Table structure for tblsupplier
-- ----------------------------
DROP TABLE IF EXISTS `tblsupplier`;
CREATE TABLE `tblsupplier` (
  `supplierid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `suppliername` varchar(50) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `phone_number` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`supplierid`),
  CONSTRAINT `tblsupplier_ibfk_1` FOREIGN KEY (`supplierid`) REFERENCES `tblproduct` (`productid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblsupplier
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for tbluser
-- ----------------------------
DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE `tbluser` (
  `userid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `username` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `userlevel` int(255) DEFAULT NULL,
  `images` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `register_date` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbluser
-- ----------------------------
BEGIN;
INSERT INTO `tbluser` VALUES (21, 'Pha', 'Rot', 'PhaRot                 ', '0969824898', 'Chrom Chao  Por Sen Chey PP        ', 'Pharot@gmail.com                 ', '$2y$10$pIzXABLFgXEmXo.Tty1l8.uOYB.LkYvCQi4tLgusXw2QHwLPz80fu', NULL, 1, '2021-01-27 12.00.30.jpg', '2021-01-23', 1);
INSERT INTO `tbluser` VALUES (57, 'pha', 'rot', 'pharot', '0191919111', NULL, 'pharot@gmail.com', '0969824898', '1998-08-24', 2, NULL, NULL, 1);
INSERT INTO `tbluser` VALUES (58, 'Bo', 'Pha', 'Bopha', '0191919111', NULL, 'bopha@gmail.com', '$2y$10$Arm0APK.JMyfPxbdTYHou.BpSNzJac3swrbSvz27qVccr2d9f/e22', '1996-01-06', 2, NULL, NULL, 1);
INSERT INTO `tbluser` VALUES (60, 'Da', 'Ra', 'Da-Ra', '0191919111', NULL, 'dara@gmail.com', '$2y$10$Arm0APK.JMyfPxbdTYHou.BpSNzJac3swrbSvz27qVccr2d9f/e22', '1996-06-08', 1, NULL, NULL, 1);
COMMIT;

-- ----------------------------
-- Table structure for tblvisitor
-- ----------------------------
DROP TABLE IF EXISTS `tblvisitor`;
CREATE TABLE `tblvisitor` (
  `visitorid` int(11) NOT NULL AUTO_INCREMENT,
  `visitor_ip` varchar(50) CHARACTER SET latin1 NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`visitorid`)
) ENGINE=MyISAM AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblvisitor
-- ----------------------------
BEGIN;
INSERT INTO `tblvisitor` VALUES (1, '::1', '2021-06-17');
INSERT INTO `tblvisitor` VALUES (2, '192.168.1.1', '2021-06-11');
INSERT INTO `tblvisitor` VALUES (3, '192.168.1.1', '2021-07-11');
INSERT INTO `tblvisitor` VALUES (4, '192.168.1.1', '2021-07-12');
INSERT INTO `tblvisitor` VALUES (5, '192.168.1.1', '2021-07-13');
INSERT INTO `tblvisitor` VALUES (6, '192.168.1.1', '2021-07-14');
INSERT INTO `tblvisitor` VALUES (7, '192.168.1.1', '2021-07-15');
INSERT INTO `tblvisitor` VALUES (8, '192.168.1.1', '2021-07-16');
INSERT INTO `tblvisitor` VALUES (9, '192.168.1.2', '2021-01-24');
INSERT INTO `tblvisitor` VALUES (10, '192.168.1.2', '2021-02-24');
INSERT INTO `tblvisitor` VALUES (11, '192.168.1.2', '2021-03-24');
INSERT INTO `tblvisitor` VALUES (12, '192.168.1.2', '2021-04-24');
INSERT INTO `tblvisitor` VALUES (13, '192.168.1.2', '2021-05-24');
INSERT INTO `tblvisitor` VALUES (14, '192.168.1.2', '2021-06-24');
INSERT INTO `tblvisitor` VALUES (15, '192.168.1.2', '2021-08-24');
INSERT INTO `tblvisitor` VALUES (16, '192.168.1.2', '2021-09-24');
INSERT INTO `tblvisitor` VALUES (17, '192.168.1.2', '2021-10-24');
INSERT INTO `tblvisitor` VALUES (18, '192.168.1.2', '2021-11-24');
INSERT INTO `tblvisitor` VALUES (19, '192.168.1.2', '2021-12-24');
INSERT INTO `tblvisitor` VALUES (20, '192.168.1.2', '2021-12-24');
INSERT INTO `tblvisitor` VALUES (21, '::1', '2021-07-17');
INSERT INTO `tblvisitor` VALUES (22, '::1', '2021-07-18');
INSERT INTO `tblvisitor` VALUES (23, '::1', '2021-07-18');
INSERT INTO `tblvisitor` VALUES (24, '::1', '2021-07-18');
INSERT INTO `tblvisitor` VALUES (25, '127.0.0.1', '2021-07-18');
INSERT INTO `tblvisitor` VALUES (26, '::1', '2021-07-18');
INSERT INTO `tblvisitor` VALUES (27, '::1', '2021-07-21');
INSERT INTO `tblvisitor` VALUES (28, '::1', '2021-07-21');
INSERT INTO `tblvisitor` VALUES (29, '::1', '2021-07-22');
INSERT INTO `tblvisitor` VALUES (30, '::1', '2021-07-24');
INSERT INTO `tblvisitor` VALUES (31, '::1', '2021-07-24');
INSERT INTO `tblvisitor` VALUES (32, '::1', '2021-07-24');
INSERT INTO `tblvisitor` VALUES (33, '::1', '2021-07-24');
INSERT INTO `tblvisitor` VALUES (34, '::1', '2021-07-24');
INSERT INTO `tblvisitor` VALUES (35, '::1', '2021-07-24');
INSERT INTO `tblvisitor` VALUES (36, '::1', '2021-07-24');
INSERT INTO `tblvisitor` VALUES (37, '::1', '2021-07-24');
INSERT INTO `tblvisitor` VALUES (38, '::1', '2021-07-25');
INSERT INTO `tblvisitor` VALUES (39, '::1', '2021-07-26');
INSERT INTO `tblvisitor` VALUES (40, '::1', '2021-07-27');
INSERT INTO `tblvisitor` VALUES (41, '::1', '2021-07-27');
INSERT INTO `tblvisitor` VALUES (42, '::1', '2021-07-27');
INSERT INTO `tblvisitor` VALUES (43, '::1', '2021-07-28');
INSERT INTO `tblvisitor` VALUES (44, '::1', '2021-07-28');
INSERT INTO `tblvisitor` VALUES (45, '::1', '2021-07-28');
INSERT INTO `tblvisitor` VALUES (46, '::1', '2021-07-28');
INSERT INTO `tblvisitor` VALUES (47, '::1', '2021-07-28');
INSERT INTO `tblvisitor` VALUES (48, '::1', '2021-07-28');
INSERT INTO `tblvisitor` VALUES (49, '::1', '2021-07-28');
INSERT INTO `tblvisitor` VALUES (50, '::1', '2021-07-28');
INSERT INTO `tblvisitor` VALUES (51, '::1', '2021-07-28');
INSERT INTO `tblvisitor` VALUES (52, '::1', '2021-07-29');
INSERT INTO `tblvisitor` VALUES (53, '::1', '2021-07-29');
INSERT INTO `tblvisitor` VALUES (54, '::1', '2021-07-29');
INSERT INTO `tblvisitor` VALUES (55, '::1', '2021-07-29');
INSERT INTO `tblvisitor` VALUES (56, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (57, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (58, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (59, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (60, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (61, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (62, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (63, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (64, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (65, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (66, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (67, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (68, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (69, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (70, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (71, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (72, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (73, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (74, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (75, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (76, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (77, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (78, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (79, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (80, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (81, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (82, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (83, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (84, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (85, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (86, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (87, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (88, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (89, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (90, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (91, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (92, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (93, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (94, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (95, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (96, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (97, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (98, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (99, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (100, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (101, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (102, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (103, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (104, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (105, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (106, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (107, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (108, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (109, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (110, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (111, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (112, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (113, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (114, '::1', '2021-07-30');
INSERT INTO `tblvisitor` VALUES (115, '::1', '2021-07-31');
INSERT INTO `tblvisitor` VALUES (116, '::1', '2021-07-31');
INSERT INTO `tblvisitor` VALUES (117, '::1', '2021-07-31');
INSERT INTO `tblvisitor` VALUES (118, '::1', '2021-07-31');
INSERT INTO `tblvisitor` VALUES (119, '::1', '2021-07-31');
INSERT INTO `tblvisitor` VALUES (120, '::1', '2021-07-31');
INSERT INTO `tblvisitor` VALUES (121, '::1', '2021-07-31');
COMMIT;

-- ----------------------------
-- Triggers structure for table tblorder
-- ----------------------------
DROP TRIGGER IF EXISTS `updateQty`;
delimiter ;;
CREATE TRIGGER `updateQty` AFTER UPDATE ON `tblorder` FOR EACH ROW BEGIN
UPDATE tblorder, tblorder_detail as od, tblproduct as p 
SET p.qty = p.qty - od.qty WHERE NEW.orderid = od.orderid and od.productid = p.productid
and OLD.status = 1 and NEW.status = 2;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table tblsale_orderdetail
-- ----------------------------
DROP TRIGGER IF EXISTS `QuantityUpdate`;
delimiter ;;
CREATE TRIGGER `QuantityUpdate` AFTER INSERT ON `tblsale_orderdetail` FOR EACH ROW BEGIN

UPDATE tblproduct  as p
SET p.qty = p.qty - New. qty 
WHERE p.productid = New.productid ;

END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
