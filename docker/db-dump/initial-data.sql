-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `ddmedia`;
CREATE TABLE `ddmedia` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `OXSHOPID` int(10) unsigned NOT NULL DEFAULT '1',
  `DDFILENAME` varchar(255) NOT NULL DEFAULT '',
  `DDFILESIZE` int(10) unsigned NOT NULL DEFAULT '0',
  `DDFILETYPE` varchar(50) NOT NULL DEFAULT '',
  `DDTHUMB` varchar(255) NOT NULL DEFAULT '',
  `DDIMAGESIZE` varchar(100) DEFAULT '',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`OXID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `oxacceptedterms`;
CREATE TABLE `oxacceptedterms` (
  `OXUSERID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'User id (oxuser)',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXTERMVERSION` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Terms version',
  `OXACCEPTEDTIME` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Time, when terms were accepted',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXUSERID`,`OXSHOPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shows which users has accepted shop terms';


DROP TABLE IF EXISTS `oxaccessoire2article`;
CREATE TABLE `oxaccessoire2article` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Record id',
  `OXOBJECTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Accessory Article id (oxarticles)',
  `OXARTICLENID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Article id (oxarticles)',
  `OXSORT` int(5) NOT NULL DEFAULT '0' COMMENT 'Sorting',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXOBJECTID` (`OXOBJECTID`),
  KEY `OXARTICLENID` (`OXARTICLENID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shows many-to-many relationship between article and its accessory articles';


DROP TABLE IF EXISTS `oxactions`;
CREATE TABLE `oxactions` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Action id',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXTYPE` tinyint(1) NOT NULL COMMENT 'Action type: 0 or 1 - action, 2 - promotion, 3 - banner',
  `OXTITLE` varchar(128) NOT NULL DEFAULT '' COMMENT 'Title (multilanguage)',
  `OXTITLE_1` varchar(128) NOT NULL DEFAULT '',
  `OXTITLE_2` varchar(128) NOT NULL DEFAULT '',
  `OXTITLE_3` varchar(128) NOT NULL DEFAULT '',
  `OXLONGDESC` text NOT NULL COMMENT 'Long description, used for promotion (multilanguage)',
  `OXLONGDESC_1` text NOT NULL,
  `OXLONGDESC_2` text NOT NULL,
  `OXLONGDESC_3` text NOT NULL,
  `OXACTIVE` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Active',
  `OXACTIVEFROM` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Active from specified date',
  `OXACTIVETO` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Active to specified date',
  `OXPIC` varchar(128) NOT NULL DEFAULT '' COMMENT 'Picture filename, used for banner (multilanguage)',
  `OXPIC_1` varchar(128) NOT NULL DEFAULT '',
  `OXPIC_2` varchar(128) NOT NULL DEFAULT '',
  `OXPIC_3` varchar(128) NOT NULL DEFAULT '',
  `OXLINK` varchar(128) NOT NULL DEFAULT '' COMMENT 'Link, used on banner (multilanguage)',
  `OXLINK_1` varchar(128) NOT NULL DEFAULT '',
  `OXLINK_2` varchar(128) NOT NULL DEFAULT '',
  `OXLINK_3` varchar(128) NOT NULL DEFAULT '',
  `OXSORT` int(5) NOT NULL DEFAULT '0' COMMENT 'Sorting',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXSORT` (`OXSORT`),
  KEY `OXTYPE` (`OXTYPE`,`OXACTIVE`,`OXACTIVETO`,`OXACTIVEFROM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Stores information about actions, promotions and banners';

INSERT INTO `oxactions` (`OXID`, `OXSHOPID`, `OXTYPE`, `OXTITLE`, `OXTITLE_1`, `OXTITLE_2`, `OXTITLE_3`, `OXLONGDESC`, `OXLONGDESC_1`, `OXLONGDESC_2`, `OXLONGDESC_3`, `OXACTIVE`, `OXACTIVEFROM`, `OXACTIVETO`, `OXPIC`, `OXPIC_1`, `OXPIC_2`, `OXPIC_3`, `OXLINK`, `OXLINK_1`, `OXLINK_2`, `OXLINK_3`, `OXSORT`, `OXTIMESTAMP`) VALUES
('oxbargain',	1,	0,	'Angebot der Woche',	'Week\'s Special',	'',	'',	'',	'',	'',	'',	1,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	'',	'',	'',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('oxcatoffer',	1,	0,	'Kategorien-Topangebot',	'Top offer in categories',	'',	'',	'',	'',	'',	'',	1,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	'',	'',	'',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('oxnewest',	1,	0,	'Frisch eingetroffen',	'Just arrived',	'',	'',	'',	'',	'',	'',	1,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	'',	'',	'',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('oxnewsletter',	1,	0,	'Newsletter',	'Newsletter',	'',	'',	'',	'',	'',	'',	1,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	'',	'',	'',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('oxstart',	1,	0,	'Startseite unten',	'Start page bottom',	'',	'',	'',	'',	'',	'',	0,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	'',	'',	'',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('oxtop5',	1,	0,	'Topseller',	'Top seller',	'',	'',	'',	'',	'',	'',	1,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	'',	'',	'',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('oxtopstart',	1,	0,	'Topangebot Startseite',	'Top offer start page',	'',	'',	'',	'',	'',	'',	1,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	'',	'',	'',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45');

DROP TABLE IF EXISTS `oxactions2article`;
CREATE TABLE `oxactions2article` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Record id',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXACTIONID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Action id (oxactions)',
  `OXARTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Article id (oxarticles)',
  `OXSORT` int(11) NOT NULL DEFAULT '0' COMMENT 'Sorting',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXMAINIDX` (`OXSHOPID`,`OXACTIONID`,`OXSORT`),
  KEY `OXARTID` (`OXARTID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shows many-to-many relationship between actions and articles';


DROP TABLE IF EXISTS `oxaddress`;
CREATE TABLE `oxaddress` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Address id',
  `OXUSERID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'User id (oxuser)',
  `OXADDRESSUSERID` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'User id (oxuser)',
  `OXCOMPANY` varchar(255) NOT NULL DEFAULT '' COMMENT 'Company name',
  `OXFNAME` varchar(255) NOT NULL DEFAULT '' COMMENT 'First name',
  `OXLNAME` varchar(255) NOT NULL DEFAULT '' COMMENT 'Last name',
  `OXSTREET` varchar(255) NOT NULL DEFAULT '' COMMENT 'Street',
  `OXSTREETNR` varchar(16) NOT NULL DEFAULT '' COMMENT 'House number',
  `OXADDINFO` varchar(255) NOT NULL DEFAULT '' COMMENT 'Additional info',
  `OXCITY` varchar(255) NOT NULL DEFAULT '' COMMENT 'City',
  `OXCOUNTRY` varchar(255) NOT NULL DEFAULT '' COMMENT 'Country name',
  `OXCOUNTRYID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Country id (oxcountry)',
  `OXSTATEID` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'State id (oxstate)',
  `OXZIP` varchar(50) NOT NULL DEFAULT '' COMMENT 'Zip code',
  `OXFON` varchar(128) NOT NULL DEFAULT '' COMMENT 'Phone number',
  `OXFAX` varchar(128) NOT NULL DEFAULT '' COMMENT 'Fax number',
  `OXSAL` varchar(128) NOT NULL DEFAULT '' COMMENT 'User title prefix (Mr/Mrs)',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXUSERID` (`OXUSERID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Stores user shipping addresses';


DROP TABLE IF EXISTS `oxadminlog`;
CREATE TABLE `oxadminlog` (
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  `OXUSERID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'User id (oxuser)',
  `OXSQL` text NOT NULL COMMENT 'Logged sql',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXSESSID` char(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Session id',
  `OXCLASS` varchar(50) NOT NULL COMMENT 'Logged class name',
  `OXFNC` varchar(30) NOT NULL COMMENT 'Logged function name',
  `OXITMID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Item id',
  `OXPARAM` text NOT NULL COMMENT 'Logged parameters',
  KEY `OXITMID` (`OXITMID`),
  KEY `OXUSERID` (`OXUSERID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Logs admin actions';


DROP TABLE IF EXISTS `oxartextends`;
CREATE TABLE `oxartextends` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Article id (extends oxarticles article with this id)',
  `OXLONGDESC` text NOT NULL COMMENT 'Long description (multilanguage)',
  `OXLONGDESC_1` text NOT NULL,
  `OXLONGDESC_2` text NOT NULL,
  `OXLONGDESC_3` text NOT NULL,
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Additional information for articles';


DROP TABLE IF EXISTS `oxarticles`;
CREATE TABLE `oxarticles` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Article id',
  `OXMAPID` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Integer mapping identifier',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXPARENTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Parent article id',
  `OXACTIVE` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Active',
  `OXHIDDEN` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Hidden',
  `OXACTIVEFROM` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Active from specified date',
  `OXACTIVETO` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Active to specified date',
  `OXARTNUM` varchar(255) NOT NULL DEFAULT '' COMMENT 'Article number',
  `OXEAN` varchar(128) NOT NULL DEFAULT '' COMMENT 'International Article Number (EAN)',
  `OXDISTEAN` varchar(128) NOT NULL DEFAULT '' COMMENT 'Manufacture International Article Number (Man. EAN)',
  `OXMPN` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Manufacture Part Number (MPN)',
  `OXTITLE` varchar(255) NOT NULL DEFAULT '' COMMENT 'Title (multilanguage)',
  `OXSHORTDESC` varchar(255) NOT NULL DEFAULT '' COMMENT 'Short description (multilanguage)',
  `OXPRICE` double NOT NULL DEFAULT '0' COMMENT 'Article Price',
  `OXBLFIXEDPRICE` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'No Promotions (Price Alert) ',
  `OXPRICEA` double NOT NULL DEFAULT '0' COMMENT 'Price A',
  `OXPRICEB` double NOT NULL DEFAULT '0' COMMENT 'Price B',
  `OXPRICEC` double NOT NULL DEFAULT '0' COMMENT 'Price C',
  `OXBPRICE` double NOT NULL DEFAULT '0' COMMENT 'Purchase Price',
  `OXTPRICE` double NOT NULL DEFAULT '0' COMMENT 'Recommended Retail Price (RRP)',
  `OXUNITNAME` varchar(32) NOT NULL DEFAULT '' COMMENT 'Unit name (kg,g,l,cm etc), used in setting price per quantity unit calculation',
  `OXUNITQUANTITY` double NOT NULL DEFAULT '0' COMMENT 'Article quantity, used in setting price per quantity unit calculation',
  `OXEXTURL` varchar(255) NOT NULL DEFAULT '' COMMENT 'External URL to other information about the article',
  `OXURLDESC` varchar(255) NOT NULL DEFAULT '' COMMENT 'Text for external URL (multilanguage)',
  `OXURLIMG` varchar(128) NOT NULL DEFAULT '' COMMENT 'External URL image',
  `OXVAT` float DEFAULT NULL COMMENT 'Value added tax. If specified, used in all calculations instead of global vat',
  `OXTHUMB` varchar(128) NOT NULL DEFAULT '' COMMENT 'Thumbnail filename',
  `OXICON` varchar(128) NOT NULL DEFAULT '' COMMENT 'Icon filename',
  `OXPIC1` varchar(128) NOT NULL DEFAULT '' COMMENT '1# Picture filename',
  `OXPIC2` varchar(128) NOT NULL DEFAULT '' COMMENT '2# Picture filename',
  `OXPIC3` varchar(128) NOT NULL DEFAULT '' COMMENT '3# Picture filename',
  `OXPIC4` varchar(128) NOT NULL DEFAULT '' COMMENT '4# Picture filename',
  `OXPIC5` varchar(128) NOT NULL DEFAULT '' COMMENT '5# Picture filename',
  `OXPIC6` varchar(128) NOT NULL DEFAULT '' COMMENT '6# Picture filename',
  `OXPIC7` varchar(128) NOT NULL DEFAULT '' COMMENT '7# Picture filename',
  `OXPIC8` varchar(128) NOT NULL DEFAULT '' COMMENT '8# Picture filename',
  `OXPIC9` varchar(128) NOT NULL DEFAULT '' COMMENT '9# Picture filename',
  `OXPIC10` varchar(128) NOT NULL DEFAULT '' COMMENT '10# Picture filename',
  `OXPIC11` varchar(128) NOT NULL DEFAULT '' COMMENT '11# Picture filename',
  `OXPIC12` varchar(128) NOT NULL DEFAULT '' COMMENT '12# Picture filename',
  `OXWEIGHT` double NOT NULL DEFAULT '0' COMMENT 'Weight (kg)',
  `OXSTOCK` double NOT NULL DEFAULT '0' COMMENT 'Article quantity in stock',
  `OXSTOCKFLAG` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Delivery Status: 1 - Standard, 2 - If out of Stock, offline, 3 - If out of Stock, not orderable, 4 - External Storehouse',
  `OXSTOCKTEXT` varchar(255) NOT NULL DEFAULT '' COMMENT 'Message, which is shown if the article is in stock (multilanguage)',
  `OXNOSTOCKTEXT` varchar(255) NOT NULL DEFAULT '' COMMENT 'Message, which is shown if the article is off stock (multilanguage)',
  `OXDELIVERY` date NOT NULL DEFAULT '0000-00-00' COMMENT 'Date, when the product will be available again if it is sold out',
  `OXINSERT` date NOT NULL DEFAULT '0000-00-00' COMMENT 'Creation time',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  `OXLENGTH` double NOT NULL DEFAULT '0' COMMENT 'Article dimensions: Length',
  `OXWIDTH` double NOT NULL DEFAULT '0' COMMENT 'Article dimensions: Width',
  `OXHEIGHT` double NOT NULL DEFAULT '0' COMMENT 'Article dimensions: Height',
  `OXFILE` varchar(128) NOT NULL DEFAULT '' COMMENT 'File, shown in article media list',
  `OXSEARCHKEYS` varchar(255) NOT NULL DEFAULT '' COMMENT 'Search terms (multilanguage)',
  `OXTEMPLATE` varchar(128) NOT NULL DEFAULT '' COMMENT 'Alternative template filename (if empty, default is used)',
  `OXQUESTIONEMAIL` varchar(255) NOT NULL DEFAULT '' COMMENT 'E-mail for question',
  `OXISSEARCH` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Should article be shown in search',
  `OXISCONFIGURABLE` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Can article be customized',
  `OXVARNAME` varchar(255) NOT NULL DEFAULT '' COMMENT 'Name of variants selection lists (different lists are separated by | ) (multilanguage)',
  `OXVARSTOCK` int(5) NOT NULL DEFAULT '0' COMMENT 'Sum of active article variants stock quantity',
  `OXVARCOUNT` int(1) NOT NULL DEFAULT '0' COMMENT 'Total number of variants that article has (active and inactive)',
  `OXVARSELECT` varchar(255) NOT NULL DEFAULT '' COMMENT 'Variant article selections (separated by | ) (multilanguage)',
  `OXVARMINPRICE` double NOT NULL DEFAULT '0' COMMENT 'Lowest price in active article variants',
  `OXVARMAXPRICE` double NOT NULL DEFAULT '0' COMMENT 'Highest price in active article variants',
  `OXVARNAME_1` varchar(255) NOT NULL DEFAULT '',
  `OXVARSELECT_1` varchar(255) NOT NULL DEFAULT '',
  `OXVARNAME_2` varchar(255) NOT NULL DEFAULT '',
  `OXVARSELECT_2` varchar(255) NOT NULL DEFAULT '',
  `OXVARNAME_3` varchar(255) NOT NULL DEFAULT '',
  `OXVARSELECT_3` varchar(255) NOT NULL DEFAULT '',
  `OXTITLE_1` varchar(255) NOT NULL DEFAULT '',
  `OXSHORTDESC_1` varchar(255) NOT NULL DEFAULT '',
  `OXURLDESC_1` varchar(255) NOT NULL DEFAULT '',
  `OXSEARCHKEYS_1` varchar(255) NOT NULL DEFAULT '',
  `OXTITLE_2` varchar(255) NOT NULL DEFAULT '',
  `OXSHORTDESC_2` varchar(255) NOT NULL DEFAULT '',
  `OXURLDESC_2` varchar(255) NOT NULL DEFAULT '',
  `OXSEARCHKEYS_2` varchar(255) NOT NULL DEFAULT '',
  `OXTITLE_3` varchar(255) NOT NULL DEFAULT '',
  `OXSHORTDESC_3` varchar(255) NOT NULL DEFAULT '',
  `OXURLDESC_3` varchar(255) NOT NULL DEFAULT '',
  `OXSEARCHKEYS_3` varchar(255) NOT NULL DEFAULT '',
  `OXBUNDLEID` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Bundled article id',
  `OXFOLDER` varchar(32) NOT NULL DEFAULT '' COMMENT 'Folder',
  `OXSUBCLASS` varchar(32) NOT NULL DEFAULT '' COMMENT 'Subclass',
  `OXSTOCKTEXT_1` varchar(255) NOT NULL DEFAULT '',
  `OXSTOCKTEXT_2` varchar(255) NOT NULL DEFAULT '',
  `OXSTOCKTEXT_3` varchar(255) NOT NULL DEFAULT '',
  `OXNOSTOCKTEXT_1` varchar(255) NOT NULL DEFAULT '',
  `OXNOSTOCKTEXT_2` varchar(255) NOT NULL DEFAULT '',
  `OXNOSTOCKTEXT_3` varchar(255) NOT NULL DEFAULT '',
  `OXSORT` int(5) NOT NULL DEFAULT '0' COMMENT 'Sorting',
  `OXSOLDAMOUNT` double NOT NULL DEFAULT '0' COMMENT 'Amount of sold articles including variants (used only for parent articles)',
  `OXNONMATERIAL` int(1) NOT NULL DEFAULT '0' COMMENT 'Intangible article, free shipping is used (variants inherits parent setting)',
  `OXFREESHIPPING` int(1) NOT NULL DEFAULT '0' COMMENT 'Free shipping (variants inherits parent setting)',
  `OXREMINDACTIVE` int(1) NOT NULL DEFAULT '0' COMMENT 'Enables sending of notification email when oxstock field value falls below oxremindamount value',
  `OXREMINDAMOUNT` double NOT NULL DEFAULT '0' COMMENT 'Defines the amount, below which notification email will be sent if oxremindactive is set to 1',
  `OXAMITEMID` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `OXAMTASKID` varchar(16) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `OXVENDORID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Vendor id (oxvendor)',
  `OXMANUFACTURERID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Manufacturer id (oxmanufacturers)',
  `OXSKIPDISCOUNTS` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Skips all negative Discounts (Discounts, Vouchers, Delivery ...)',
  `OXORDERINFO` varchar(255) NOT NULL COMMENT 'Additional info in order confirmation mail',
  `OXPIXIEXPORT` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Field for 3rd party modules export',
  `OXPIXIEXPORTED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Field for 3rd party modules export',
  `OXVPE` int(11) NOT NULL DEFAULT '1' COMMENT 'Packing unit',
  `OXRATING` double NOT NULL DEFAULT '0' COMMENT 'Article rating',
  `OXRATINGCNT` int(11) NOT NULL DEFAULT '0' COMMENT 'Rating votes count',
  `OXMINDELTIME` int(11) NOT NULL DEFAULT '0' COMMENT 'Minimal delivery time (unit is set in oxdeltimeunit)',
  `OXMAXDELTIME` int(11) NOT NULL DEFAULT '0' COMMENT 'Maximum delivery time (unit is set in oxdeltimeunit)',
  `OXDELTIMEUNIT` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Delivery time unit: DAY, WEEK, MONTH',
  `OXUPDATEPRICE` double NOT NULL DEFAULT '0' COMMENT 'If not 0, oxprice will be updated to this value on oxupdatepricetime date',
  `OXUPDATEPRICEA` double NOT NULL DEFAULT '0' COMMENT 'If not 0, oxpricea will be updated to this value on oxupdatepricetime date',
  `OXUPDATEPRICEB` double NOT NULL DEFAULT '0' COMMENT 'If not 0, oxpriceb will be updated to this value on oxupdatepricetime date',
  `OXUPDATEPRICEC` double NOT NULL DEFAULT '0' COMMENT 'If not 0, oxpricec will be updated to this value on oxupdatepricetime date',
  `OXUPDATEPRICETIME` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Date, when oxprice[a,b,c] should be updated to oxupdateprice[a,b,c] values',
  `OXISDOWNLOADABLE` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'Enable download of files for this product',
  `OXSHOWCUSTOMAGREEMENT` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT 'Show custom agreement check in checkout',
  PRIMARY KEY (`OXID`),
  KEY `OXSORT` (`OXSORT`),
  KEY `OXISSEARCH` (`OXISSEARCH`),
  KEY `OXSTOCKFLAG` (`OXSTOCKFLAG`),
  KEY `OXACTIVE` (`OXACTIVE`),
  KEY `OXACTIVEFROM` (`OXACTIVEFROM`),
  KEY `OXACTIVETO` (`OXACTIVETO`),
  KEY `OXVENDORID` (`OXVENDORID`),
  KEY `OXMANUFACTURERID` (`OXMANUFACTURERID`),
  KEY `OXSOLDAMOUNT` (`OXSOLDAMOUNT`),
  KEY `parentsort` (`OXPARENTID`,`OXSORT`),
  KEY `OXUPDATEPRICETIME` (`OXUPDATEPRICETIME`),
  KEY `OXISDOWNLOADABLE` (`OXISDOWNLOADABLE`),
  KEY `OXPRICE` (`OXPRICE`),
  KEY `OXPARENTID` (`OXPARENTID`),
  KEY `OXMAPID` (`OXMAPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Articles information';


DROP TABLE IF EXISTS `oxarticles2shop`;
CREATE TABLE `oxarticles2shop` (
  `OXSHOPID` int(11) NOT NULL COMMENT 'Mapped shop id',
  `OXMAPOBJECTID` bigint(20) NOT NULL COMMENT 'Mapped object id',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  UNIQUE KEY `OXMAPIDX` (`OXSHOPID`,`OXMAPOBJECTID`),
  KEY `OXMAPOBJECTID` (`OXMAPOBJECTID`),
  KEY `OXSHOPID` (`OXSHOPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Mapping table for element subshop assignments';


DROP TABLE IF EXISTS `oxattribute`;
CREATE TABLE `oxattribute` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Attribute id',
  `OXMAPID` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Integer mapping identifier',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXTITLE` varchar(128) NOT NULL DEFAULT '' COMMENT 'Title (multilanguage)',
  `OXTITLE_1` varchar(128) NOT NULL DEFAULT '',
  `OXTITLE_2` varchar(128) NOT NULL DEFAULT '',
  `OXTITLE_3` varchar(128) NOT NULL DEFAULT '',
  `OXPOS` int(11) NOT NULL DEFAULT '9999' COMMENT 'Sorting',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  `OXDISPLAYINBASKET` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Display attribute`s value for articles in checkout',
  PRIMARY KEY (`OXID`),
  KEY `OXSHOPID` (`OXSHOPID`),
  KEY `OXMAPID` (`OXMAPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Article attributes';


DROP TABLE IF EXISTS `oxattribute2shop`;
CREATE TABLE `oxattribute2shop` (
  `OXSHOPID` int(11) NOT NULL COMMENT 'Mapped shop id',
  `OXMAPOBJECTID` int(11) NOT NULL COMMENT 'Mapped object id',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  UNIQUE KEY `OXMAPIDX` (`OXSHOPID`,`OXMAPOBJECTID`),
  KEY `OXMAPOBJECTID` (`OXMAPOBJECTID`),
  KEY `OXSHOPID` (`OXSHOPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Mapping table for element subshop assignments';


DROP TABLE IF EXISTS `oxcache`;
CREATE TABLE `oxcache` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Cache id',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXEXPIRE` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'Expiration time',
  `OXRESETON` char(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Reset id (e.g. View Reset Id)',
  `OXSIZE` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'The length of content to be added',
  `OXHITS` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'Increases when a certain id is retrieved from cache',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXEXPIRE` (`OXEXPIRE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shop cache';


DROP TABLE IF EXISTS `oxcategories`;
CREATE TABLE `oxcategories` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Category id',
  `OXMAPID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Integer mapping identifier',
  `OXPARENTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'oxrootid' COMMENT 'Parent category id',
  `OXLEFT` int(11) NOT NULL DEFAULT '0' COMMENT 'Used for building category tree',
  `OXRIGHT` int(11) NOT NULL DEFAULT '0' COMMENT 'Used for building category tree',
  `OXROOTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Root category id',
  `OXSORT` int(11) NOT NULL DEFAULT '9999' COMMENT 'Sorting',
  `OXACTIVE` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Active (multilanguage)',
  `OXHIDDEN` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Hidden (Can be accessed by direct link, but is not visible in lists and menu)',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXTITLE` varchar(254) NOT NULL DEFAULT '' COMMENT 'Title (multilanguage)',
  `OXDESC` varchar(255) NOT NULL DEFAULT '' COMMENT 'Description (multilanguage)',
  `OXLONGDESC` text NOT NULL COMMENT 'Long description (multilanguage)',
  `OXTHUMB` varchar(128) NOT NULL DEFAULT '' COMMENT 'Thumbnail filename (multilanguage)',
  `OXTHUMB_1` varchar(128) NOT NULL DEFAULT '',
  `OXTHUMB_2` varchar(128) NOT NULL DEFAULT '',
  `OXTHUMB_3` varchar(128) NOT NULL DEFAULT '',
  `OXEXTLINK` varchar(255) NOT NULL DEFAULT '' COMMENT 'External link, that if specified is opened instead of category content',
  `OXTEMPLATE` varchar(128) NOT NULL DEFAULT '' COMMENT 'Alternative template filename (if empty, default is used)',
  `OXDEFSORT` varchar(64) NOT NULL DEFAULT '' COMMENT 'Default field for sorting of articles in this category (most of oxarticles fields)',
  `OXDEFSORTMODE` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Default mode of sorting of articles in this category (0 - asc, 1 - desc)',
  `OXPRICEFROM` double NOT NULL DEFAULT '0' COMMENT 'If specified, all articles, with price higher than specified, will be shown in this category',
  `OXPRICETO` double NOT NULL DEFAULT '0' COMMENT 'If specified, all articles, with price lower than specified, will be shown in this category',
  `OXACTIVE_1` tinyint(1) NOT NULL DEFAULT '0',
  `OXTITLE_1` varchar(255) NOT NULL DEFAULT '',
  `OXDESC_1` varchar(255) NOT NULL DEFAULT '',
  `OXLONGDESC_1` text NOT NULL,
  `OXACTIVE_2` tinyint(1) NOT NULL DEFAULT '0',
  `OXTITLE_2` varchar(255) NOT NULL DEFAULT '',
  `OXDESC_2` varchar(255) NOT NULL DEFAULT '',
  `OXLONGDESC_2` text NOT NULL,
  `OXACTIVE_3` tinyint(1) NOT NULL DEFAULT '0',
  `OXTITLE_3` varchar(255) NOT NULL DEFAULT '',
  `OXDESC_3` varchar(255) NOT NULL DEFAULT '',
  `OXLONGDESC_3` text NOT NULL,
  `OXICON` varchar(128) NOT NULL DEFAULT '' COMMENT 'Icon filename',
  `OXPROMOICON` varchar(128) NOT NULL DEFAULT '' COMMENT 'Promotion icon filename',
  `OXVAT` float DEFAULT NULL COMMENT 'VAT, used for articles in this category (only if oxarticles.oxvat is not set)',
  `OXSKIPDISCOUNTS` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Skip all negative Discounts for articles in this category (Discounts, Vouchers, Delivery ...) ',
  `OXSHOWSUFFIX` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Show SEO Suffix in Category',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXROOTID` (`OXROOTID`),
  KEY `OXPARENTID` (`OXPARENTID`),
  KEY `OXPRICEFROM` (`OXPRICEFROM`),
  KEY `OXPRICETO` (`OXPRICETO`),
  KEY `OXHIDDEN` (`OXHIDDEN`),
  KEY `OXSHOPID` (`OXSHOPID`),
  KEY `OXSORT` (`OXSORT`),
  KEY `OXVAT` (`OXVAT`),
  KEY `OXMAPID` (`OXMAPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Article categories';


DROP TABLE IF EXISTS `oxcategories2shop`;
CREATE TABLE `oxcategories2shop` (
  `OXSHOPID` int(11) NOT NULL COMMENT 'Mapped shop id',
  `OXMAPOBJECTID` int(11) NOT NULL COMMENT 'Mapped object id',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  UNIQUE KEY `OXMAPIDX` (`OXSHOPID`,`OXMAPOBJECTID`),
  KEY `OXMAPOBJECTID` (`OXMAPOBJECTID`),
  KEY `OXSHOPID` (`OXSHOPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Mapping table for element subshop assignments';


DROP TABLE IF EXISTS `oxcategory2attribute`;
CREATE TABLE `oxcategory2attribute` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Record id',
  `OXOBJECTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Category id (oxcategories)',
  `OXATTRID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Attribute id (oxattributes)',
  `OXSORT` int(11) NOT NULL DEFAULT '9999' COMMENT 'Sorting',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Creation time',
  PRIMARY KEY (`OXID`),
  KEY `OXOBJECTID` (`OXOBJECTID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shows many-to-many relationship between categories and attributes';


DROP TABLE IF EXISTS `oxconfig`;
CREATE TABLE `oxconfig` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Config id',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXMODULE` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Module or theme specific config (theme:themename, module:modulename)',
  `OXVARNAME` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Variable name',
  `OXVARTYPE` varchar(16) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Variable type',
  `OXVARVALUE` mediumblob NOT NULL COMMENT 'Variable value',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXVARNAME` (`OXVARNAME`),
  KEY `listall` (`OXSHOPID`,`OXMODULE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shop configuration values';

INSERT INTO `oxconfig` (`OXID`, `OXSHOPID`, `OXMODULE`, `OXVARNAME`, `OXVARTYPE`, `OXVARVALUE`, `OXTIMESTAMP`) VALUES
('00daee6fd42b7c6eefc18b4f3e67ce3e',	1,	'',	'sDefaultLang',	'str',	'Œí',	'2021-09-21 11:58:51'),
('02ae638d8709f3aa5f25c606ca33b284',	1,	'theme:flow',	'aNrofCatArticlesInGrid',	'arr',	'M∫Œ)r·KÚÀ”©§;É≈çyrMs	°ù”ÓaSDåFáê‰¡Û˙%EÛÉh¬¯•#’åëTkíÕˆ',	'2021-09-21 11:58:45'),
('02df5502027e9199056662556380a8d8',	1,	'',	'aModuleTemplates',	'aarr',	'M∫2,wOT4çê6“›‚[‹ªëÕád∫I’ìbå©•˜Œ£ÄX˚ç\ní¨π._¥≥ÎQá(n´˜ıÿÊ¿qCˇ≈É/Èc%jÒÕ{ÆÊGëÛ:!î˝ˆµ#ÖæNLCHÎEWkI@‹+ëÓbŸ*í’˝ùàÉÏä/ΩÀ»ﬂr°ﬁÙ@€TUïà¥sFìsÍ√Œ◊Ù?~˝ì j‹÷AG‚¢i_ÁÔå¡/&;g¸Iü◊>áb:Úù¶“s+É›e≥O{˘-^X&)Ò~‹,@ß”≈v9±3 ©(‹ˆâ:Çπ\"Ñ¿ôjˇ√òåZ‹¢W!.„‰uP‚âí >JD\"ÓÂÖ¬eH†æÈ&Çñƒel9µ~≥	!‘6ı›rÒıày-Ïö! »÷‰:W>¨÷o§Ÿ∏›ˇI◊Öˆ\"C…ÈxºkM∂ªïÆkƒ1\\î’¿~1ùÀ]ˇGHÑÖspCÑòëa &L7Œ»ß%öàMn˙úkùíTi%¨ÀÙ¡√RÊ—Õ‚—ßÈ(©\r∂S—ê\0M:këwËÒÄDlù•∏ÜŒ(W\\S£§ïq7ﬂ÷˜œÕ◊ue@@XÇGÕíîmó;ìaäúû—^œaﬁÖ¡É|ÊïãP	C0LÀΩÿAªnÓ˝\r?68‡	úÇ/Úd%ÃÌG}¯~3o¬ä0^»ñœ.—$< ®ÏÛ\"9€zgr∏«≈ß\0)∏&MÔìK∞ƒéõä=f∫ùÕGçy¯=·˜1“[„îf5@V“,üKßîÌﬂÑÃÒeG⁄˜Õ c7yHåÆ¢|é˝¸	7ƒ —y\nŒÏ¸L†í||„#) ïæÿøX√ZX¿_y8ô@G’ˆˆ∂(–πB©˚§∆g@3OÑﬂÅkó–qÜ“jqÊ¸∆ò`s3XåM‹ëUO£’ém(a§&˜qªõQQ¸4éè¶\\iu1-≈ŒîÇä≥ŸA{…F–îÉ_\"m$ÉáÓ47≠I0kXÔnÈ\"y_ﬂﬂÜ0 ÿG©|»–Ó%^O‰5\\˝¿ßi0˜%,…úô=ÑÉ√[ä\'£§r«é◊ÎÌ&Ú£&lyôT\'«»4É/˙¡$y˜∞Ú¶fÒ€/ú->?ƒıÌ¢F·^≠v‹P®˛…˛®Ô9yq?·≤0B5+ÇÃUTı{Ôˆµ=SÇqoˆÑ»ç◊ñà’∂/«Ç‘À¡q˚TË	r!(≠‰Oﬂëq·\Zo‚ l2ûºõùxƒXëà∞©6@Ò`”ø§o©	c≥ãè“ÑÖb\Zì\rQ:_ZR 3<∏/è@ùÒ@Ùãb2‡ã˜Ëë±Øí¨‚ú833|Sr{bå;œ≠ò—ÓΩeK9ÓRe∏Ä\"f(±ÅU~“ˆ#ó±^œ*áe±‹ªÍÂÕ¸Z¿≥Ã0ñÌ˝,√p3˜¥ÉC;ù7Ÿì√Bﬂù”	+õ¯0±o£ç%l:[X⁄Ó0]-∑à∫*\n§ÀŒö≠ª3¿2É?3,Áç·i?L$b<—ﬂÅ˛·¿Q≈°≈ÔÓ“ÂË‚ú‡/\0-	Ï‡]\'µ |˚£Ï]UA÷ò^ú\'§ØáÍ\r7«!s·{&Í‹ñµ-b’xU:£[–éö‡‡–A“ôÉ.«ioZüU≈ﬂpyﬂ”eÁóujZî3’Xi?‹óZçm¶˜5ÅˆifX=^{çO5HW∏äW<Œ§]Zt(é\'£∫∑[nmWLkÊê«ï=]πRG— „0uŒhÉ¡U÷ßP∏8}n_•∂è∫>\rıÍ’èø\n]V÷C÷4W\'q˛u;≈≥ºïC˜ﬂãQ€‡79üÉ∂ÎCπÛÚ—w-0ı=cìce<0/ïoËçCNñ?ÇdÜa≠˝+Dƒ+Oáå\\kåPƒüÃˆ·î”Øv÷∑\n©≤Ted\"EˇÉS\'èôt\Z„˙ì•õˆéÔbéÓçÔR®µ.õX5‰•Ï^ˇ,mV⁄ŸË/	G∂ı®€ˆhÃKx,¯{´áûÄ–¯ß◊ºÔ⁄\\æyÕÑ÷É˜?é0∫√0 Œ6æ\\6¢ê•±;≥ıö‡r∫ ≈Ò»ﬂÆö˜oÅk±≠ﬁk∆Æ#_Pây\'gú4ÆõÚÇº¡9ä7”«≥œ	‘»n<$◊€Â\Zràä¢é)ìSá„L-Û±n	òﬂchÊ∞ô„˚ÒÖ¡…Ìèe¢‡sÏ7àhIO_]ñ˝ÕÇZ8ÃìÑ˘èÏjÙy„**Oã‹^ï˚~5`¥¯fÇÈ÷á…+ô4˜y]ÃÚ‘émU	•“m>ÿ—œ_Ä˛ßÄ\'í¥¨{ ™=ÒBOÀ»3Úøëê√`]≠ú=V\ZQµ‰õÍ‡Ñ®¡~»†A…Zd≈ôÁ„∞G6èê¶I¥K∑∏◊å,É,èó3Æûπö>ÌìFæ°¢^mÖ]¡—\ZÜ8≠Ëüzv[Ÿm ß˘ˇ˘É#Í^auÂí∑†”k˝«™öà‹x—ıÒjÈ·¢∑#≈eò@Ãà¨∞9ÜﬂMÃ_v˙∏y=ƒyıéØ_å∂Ö!O·Ü≈Î4/∑,≈RÄÖR’ﬂU]Ì0R7Øv»_ó,}ﬂµ4fú‘-K£ó‹~9Œ)IÂÀ»ûìµÛÉŸ®ó*g/Ó6–X¶±ﬂπ∏¬B„∏ÿ·\'ÈÇt¨ÅÆQcsâ!jπ0†GÕ4◊û8\\ı±J/ÿ±NpdÕåë¥¡ﬂ¿‘¯ÁR	åıÆ”lZ’\'\'≥W`Ù‡}À≤[◊Ãñ1\rJN˜ÁGrœ>~åsk“Á¢ò9!ŸmôAr%Y1w¢ƒw{bÁ(Áô›£V6ª ©ºsä’ùNû€òXD\'Ü°⁄Ê}pWpxúáuu‰¸s36p<†®≥Ìõæp¿/pÃÜêÂ]^˜+ˆÂØÂGëÕœ∆ÖÚii¡\\;˚¸2”H¸Ø ‚¨®˝ßúPZü◊À<£D¡∂LÄÌ≈Ù9üYò»Ô^˚˜DZUIƒ>¸≠Evá¯f3áB»!ÔŒ°»ho1ÎÛàˆE‡-¨«cçOÇ«D]	qp\\Ñq+˝`\Z\0Ô=BëBy–OÛ Ô˘‘$ƒmUtˇú›ÇU™º◊6I•æmáQj4v©ôY™eÂÕv[Ù»)Ú:·@¡¯Jl«ªù‘3w´IÜ9+‡ïÃ£isn¥ˆí˝≥=4›\'DcU]U™\"J_\0ñ˜„˜ñ7-=ƒ&G#-fœ˘´8™	á◊i√}tıvà-˙E0ãŸÚÁ–ëé%ycZ”ë«…ÜuG„˝ø‡Ñ≤QÛ{ì§üôø\\Ô`˝Òx¥èZ±i\r®éënƒÉÉˇık\ZW/ﬁuüëõCu≠π|ã\rπò⁄¥0ÿV@:inı¯Ê”\rnŒ‰íå&#\Zí_¨Z·{Ï˜–>”ÏD Ø©»Õk•∑≠WÇ∫√∑wvÔªÙxöü£SF8 Li[üµ`«˘£ÜnAˆDAnú%‚\"MÎÌcdª…‘˘‚m÷d√Ø√ﬂö˛j»¯øW˙(Eæ=dZ–f∑Èß™[wå»Ü√éGº˜\ZÇoû∞ﬂ„£b~∂Y>Èä¢¢osÇr¢%´÷ äOœﬁ<??Ñ‡7F\0_rjæW©',	'2021-09-21 12:05:23'),
('0502c7c2b83b02e57c24cc9492542f7b',	1,	'',	'aModules',	'aarr',	'M∫2lr”Ã ·Y¸“~¥mè⁄ ¸UÇú„BZ;Q…z\'i®∞xt⁄(v∂7Ê&c˜õ°”¸ÅZñn⁄ß-éÔ¿ﬁÍä”:Ã ïπñh\Zb/À$-‰©o·h ‘6˜î¶íN∑r·˜˚˛é}KHÔl uô ‘©B˙®¬UYﬁØıâ∫è»ıÊu◊{^™`ßÚJÒ2N\n%‰NπÚ-öÊr[æ|ˆÑ˘#|\\bw©ìÌ˛∂V%¨s\"b£Ö¡¸¸ªda(%¯/Ñâ^¨UKr÷ßÆ{C6~c§TÜËl©6›…Ãjjd95DwÜ‘{Ì9…®åQ‹≈aÔvtÀçìnUäb8x∏„ŒñPTLùî¶d‹f	Rßéç˜Ç;°æÎFﬁ&°ãˆÀ¶-f≤XA‹ÄïÜm:\nU˝¬ß\'ôbªa∫_ÉPß•ÒNL€)ñ9WY\'$Ñ\nïX†yy	±ûMC‚Mz\nnv!&Üå\"ˆ‘⁄âGj†\'‡CJ¥	∫¿˜^…\\:VëEoëS$”éhMŒLÑΩû˝ùf9€≤N¡ı%YLÜôE`Ë#?]€+Y0›¸†ÒÏ“àI~≠\\\nW÷€8ﬁ·T›f⁄Ûl\\)|ªU/ªò≥hÀ`JLLS¨¯⁄ò$ãs÷æjÈQ7rj⁄	—z⁄|l=ú”9€÷0úR‚%ΩÈ?RﬁÓ1áûk!Zfq\n)“ÿ‹ñµpÛD=,ÇÍZÿ=˘„ Ëe∏~ﬁÈt¨ËÒ±√®T‡Ìﬁ‡˙“^Çı¡˛◊Ûv5*˙Ÿ›⁄º7ﬂ±ÈU}P T*Ñ<ÙËéÇ}Ô¬€ø[˝◊wmmbû®@UÑ∂˚ËÃ∞ˆ–ﬂéU\0y¶°¢ﬂÑ÷Lãhêùºøqÿz≤8‚ıÂ,`éæÑxŒ}éÍ}œ÷)˛CIºµ∏ˆLπ∞-ó™=∞ã!™y‚∞Nì˙/å÷504]Z\"èÙ≈‹<…ÛMhilÉ∑Œiñ †˙ÁØu\0ªõíﬁZáÜaKvÃ\".JÈuùD>˙P#´x%‰≠-\"$ësªt’o¡ âpÌ⁄Ì≈Ømq%V»π∞?sπã¿apîÃ!d(Ê¸iû´DÎê3M\05=_˘rœÓÙ‡›©#sÀ√)ÈË®§$újA@∆á@OI6\0mÅ@\\h}™¢ì©,çS1„‘ì]_öXéî\r#M‚BÄ.5Aj7º˝Rm6l‹23‰*óŸ˜Y†í≈úü_}JN˙Ë¶ö,\r€à¬3˛¡~#U}ÅMÉåk ≠^? \Z|ŒÅ‹ZˆÌjEŸÉ-§)0ÌﬁPñ˙i0g±p«8QÜ„ë‹7«»Ù’z∏ÿı>ÑÔÈ&&…áYÏıΩÅ°)O«£vo-Ñ’≈Õ»Ãgÿ.Dﬂ¨H\rPŒÍ∏W–ÅY•n ‚ª±ß\r»V=QÑYêcƒ¥@=Ê!sû[¶\n4–wÕì1»\r*∞dú‚˝Í´XIè-·∫Â‘÷‹®AÉ˛Á?}Or N¸™#¸ 5qî\\ãºå‡+å˘è	*?ø∞âg—÷91åQH~’XÜÁÈ¿ç\r©Wi∫=EsW£3Ã«R¥«∑ƒrÙ{CÎuiÔC•›´∞ı?3ﬁ‡S/TÛ†ˆJ∏øﬂUEf%!-wÜx∂.%—ƒ∂ƒ—o}¸Ëcëö\Z~ÔaäÄÒæØâ∏•TàNâç·Õ+]õuµu\Z2Í]Ô∑ÄŸ&[ÉEécâ¿\ZΩúı—›DF‰≠0†‘l0xûbÒ’ùÃ7™öç9ŒÑLªK÷ÄŸı.Úrú•\rŸÌ|∂QqÙ˜´ßL≥œÃLOé¶Ë=O:S‚πé˛~œy0k/“ymÕ>|È5µlÈœj_€	¸g\\YÂÀmyﬂ≥∞–n3£]∞:Œ{î¬j/9±ÊQV±Â÷˘[”Ë⁄W~‘5õ†â∂ÏZÅ∂)	ò4¢)WZX\0˚Ì´ì!?‚:«–;»9·“˙SWßÍ|Ùí¨)Ñﬂå!π∫E{ªØ‡àì 8K‹˜¨4\'Ç-X@∫§Ïıµu\r\0ΩÆ°)WUµ{Î¯◊C»O°à',	'2021-09-21 12:05:23'),
('05f644fd8dba06805b80c3b974f53867',	1,	'module:oxscpaypal',	'blPayPalShowProductDetailsButton',	'bool',	'',	'2021-09-21 12:05:23'),
('07674cc155314ce7dd22f015d508e0be',	1,	'',	'aModulePaths',	'aarr',	'M∫2\\yÿ«¡Ï;Ù⁄˘\r‘h˛,SÂw≠˙qÑıê„†N∏‚?2≤ªá^í˜HÉ#©∆ãU¿F]{«‹÷êÎ7í(ÌSÌÁ=®d…7Í)ΩIˆ›n†¢\"w§ÕIQ|Ïu‰B§\\ÊÈ3ïY BV˛ê_cú˘_œO|˜\0ir¸≠ÅF\0¢¢ÿÕΩk9Ωán^P(IZ·d.3†Ì˙ÛÀ£\0vÆõ,‚â∂öVà^•ÍVñÈ¨\"è˜ìåµ<ù∫/Y„÷€Iƒ;6∞07˚™78z»I—ˆûW1$“˜@˜åıêD‚NJ#›Öá_<DuëOıAÉOÈ=â‡„OÉb!¬¸Hqø±VX2.ËÛ¶‡‘Y¨ÑW ±í8î?=F 2µ*æ˙ÇSH_EÙ_C78·U»¿ ∑∫	ÊÙ<d±ƒCó{ùä¿0°®µyÄ^K3˚B È2–ënWÓ˙~^>È£1m0µy€õl]M9äΩS´\Z<‡gÙ´O‰L9—‹I´ÙÍôM®∞ä*âµÛYU¶±:Èt©öJÚßõA4÷TÏ– ˆÊd±¸î2”<∏Ö¥t≠Ïn∂øêÓÉˆÀ–ü!)„xkh,¯ d€Äuæ{·∑\0!◊∞øÉ(,b`tºπ‡‡*f&WT–4GN[ª¥3ŸÙè–òq0a¿èôÇè]ÊtÒ|ª∏;m£°Ë4∞ë›º…Òg~|‰Êd…µ)õó!yuV\ryß4ñØnS⁄yê˙r	 Ô=«ÓŸÚ€?Ùæ∫ßß∏õƒfó¥®˛ÉCM—Ìıyπ,bÄﬁ¯¥¯yá&æÂ\r£SM†‡˙æÊËÙiBsZ“õº9Ø–Y•=ïøs¢Áﬂê%ôµQ›3ˇ≈˘Ç Y«Q\Z\n\0R SFb¥∫‘q^Ï∫EÕ]ÂñV2≠zD¯Nˆ›Û†o™(lI˘î£Æ…¡™≠»T8c+RR‹%5çIàc8∏†¬Jˇñ˜K∏\n≥Ω≥Åe&2œìù2WW’6µ\0.kwôÿ¥8œ›5‰¶7ñá™V=ÒË¬#‹©Ã“3‰U‰n˜∂#„ß§∑ÉÍ’—',	'2021-09-21 12:01:35'),
('08567786d3d6f6b7599738e2b1012692',	1,	'theme:flow',	'bl_showCompareList',	'bool',	'',	'2021-09-21 11:58:45'),
('09a03885f57b7205c1a5b61ad41df83f',	1,	'',	'sOnlineLicenseCheckTime',	'str',	'Gö’◊Ü˚‡',	'2021-09-21 12:02:45'),
('0afdb913e05ef8fe4db86134727f2091',	1,	'theme:flow',	'sDeliveryDaysOnStock',	'str',	'',	'2021-09-21 11:58:45'),
('0bf02822d097f77701a285d9bd188a03',	1,	'module:oxscpaypal',	'oePayPalBannersPaymentPageSelector',	'str',	'ﬂi#N˜Ê‘¡π∫Ò¯•økÌ˘Í–o°úí',	'2021-09-21 12:05:23'),
('0bf20625433b3919eefe3ebb043776d3',	1,	'theme:flow',	'sEmailLogo',	'str',	'î\'H≤≈™@æMªK¥',	'2021-09-21 11:58:45'),
('0ff8d0ddd999b96d1e6556212702f946',	1,	'',	'IMA',	'str',	'˚¡¥\\',	'2021-09-21 12:00:26'),
('10c1fc103610b306f1510a6c0f940c88',	1,	'module:oxscpaypal',	'oePayPalBannersSearchResultsPageSelector',	'str',	'€dN	§#¸8hTúv9-R-K¥¥Ìs®∑ Ü+-',	'2021-09-21 12:05:23'),
('112235cce59c2bb4e10e593374234819',	1,	'module:oxscpaypal',	'oePayPalBannersCategoryPage',	'bool',	'',	'2021-09-21 12:05:23'),
('11296159b7641d31b93423972af6150a',	1,	'',	'iTopNaviCatCount',	'str',	'˚',	'2021-09-21 11:58:45'),
('11fb451afc5e133404213090ccf36d19',	1,	'module:oxscpaypal',	'oePayPalBannersCheckoutPage',	'bool',	'',	'2021-09-21 12:05:23'),
('13c44abc1eb0e08c9.55267104',	1,	'',	'iCacheLifeTime',	'str',	'∞µ]\0',	'2021-09-21 11:58:51'),
('13c44abc1eb0e6841.92235277',	1,	'',	'aCachableClasses',	'arr',	'M∫h(s‡JÛ “®Ë<\0£Ò,|\\ê&ï@—$ÉœÛ¬úﬁ·A!ó≠˘≤A·÷«OË¸ûËôj^¨∏–ü»>WúvZïõ≤√ò≠@«\'û◊Ú¸\'R\n oêﬂX!hª£∑',	'2021-09-21 11:58:51'),
('15342e4cab0ee774acb390583838498a',	1,	'',	'blShowBirthdayFields',	'bool',	'',	'2021-09-21 11:58:45'),
('1545423fe8ce213a043534555223029a',	1,	'',	'aNrofCatArticles',	'arr',	'M∫Œ)r·KÚÀ”©§;É≠è{pOq£ü—Ï“õCãAÄó„∆Ù˝…\'A˜ál∆¸°\'◊âîÊ‹…ï',	'2021-09-21 11:58:45'),
('16262287323bc60c9323661e20637b7b',	1,	'module:oxscpaypal',	'sPayPalWebhookId',	'str',	'',	'2021-09-21 12:05:23'),
('16669bd232fb8ed80161039c987d7d7e',	1,	'theme:flow',	'sDeliveryDaysNotOnStock',	'str',	'·',	'2021-09-21 11:58:45'),
('16bfd75043f6d41a4bcfe6a87ab93165',	1,	'theme:flow',	'sFacebookUrl',	'str',	'\0–·ÆÎ◊x˙I≥‘ù∫ÚÊ¡4ë…⁄Z1',	'2021-09-21 11:58:45'),
('18a12329124850cd8f63cda6e8e7b4ea',	1,	'',	'bl_showWishlist',	'bool',	'',	'2021-09-21 11:58:45'),
('18a23429124850cd8f63cda6e8e7b4ea',	1,	'',	'bl_showVouchers',	'bool',	'',	'2021-09-21 11:58:45'),
('18a34529124850cd8f63cda6e8e7b4ea',	1,	'',	'bl_showGiftWrapping',	'bool',	'',	'2021-09-21 11:58:45'),
('18a9473894d473f6ed28f04e80d929fa',	1,	'',	'bl_showCompareList',	'bool',	'',	'2021-09-21 11:58:45'),
('18acb2f595da54b5f865e54aa5cdb96a',	1,	'',	'bl_showListmania',	'bool',	'',	'2021-09-21 11:58:45'),
('19886959465d3ff20e3ba05048bed2ab',	1,	'theme:flow',	'sFavicon32File',	'str',	'y\0DØWgÊï-R¡5í€’',	'2021-09-21 11:58:45'),
('1bb7c7ecef3097bbd879a8493842c5b1',	1,	'module:oxscpaypal',	'oePayPalBannersColorScheme',	'select',	'U›\Z',	'2021-09-21 12:05:23'),
('1c61b3b63336c5668128a9f3618a8e74',	1,	'theme:flow',	'sBlogUrl',	'str',	'\0–·ÆÎ◊x˙IÀ†ÿ√G˛ÿÉ(8',	'2021-09-21 11:58:45'),
('1c89880a0f5b77346836542ecaf4031f',	1,	'',	'aModuleFiles',	'aarr',	'M∫Î-vç',	'2021-09-21 12:01:35'),
('1d6bac02d81d0b66ed523dd7c1fadb29',	1,	'theme:flow',	'blUseBackground',	'bool',	'',	'2021-09-21 11:58:45'),
('1eada690d18be312ef5e49b8451440e7',	1,	'',	'blShowTSCODMessage',	'bool',	'',	'2021-09-21 11:58:45'),
('1ec42a395d0595ee774109189884847a',	1,	'',	'iNewBasketItemMessage',	'select',	'',	'2021-09-21 11:58:45'),
('1ec42a395d0595ee774109189884879a',	1,	'',	'sCatIconsize',	'str',	'\rÈJ…∂6',	'2021-09-21 11:58:45'),
('1ec42a395d0595ee774109189884898a',	1,	'',	'sDefaultListDisplayType',	'select',	'ÉÕ∑êdÌ',	'2021-09-21 11:58:45'),
('1ec42a395d0595ee774109189884898x',	1,	'',	'sCatPromotionsize',	'str',	'∞o¥A¬Ωî',	'2021-09-21 11:58:45'),
('1ec42a395d0595ee774109189884899a',	1,	'',	'aNrofCatArticlesInGrid',	'arr',	'M∫Œ)r·KÚÀ”©§;É≈çyrMs	°ù”ÓaSDåFáê‰¡Û˙%EÛÉh¬¯•#’åëTkíÕˆ',	'2021-09-21 11:58:45'),
('1ec42a395d0595ee774109189884899x',	1,	'',	'blShowListDisplayType',	'bool',	'',	'2021-09-21 11:58:45'),
('20be6d4e9998af367e4aa5bcdc0bb058',	1,	'theme:flow',	'bl_showWishlist',	'bool',	'',	'2021-09-21 11:58:45'),
('21aab05ff5ffb9d97f3f74fe42a73776',	1,	'theme:flow',	'blSliderShowImageCaption',	'bool',	'',	'2021-09-21 11:58:45'),
('23b77092e72ece5d15356418987ea2a4',	1,	'module:oxscpaypal',	'oePayPalBannersStartPageSelector',	'str',	'€è›Ïf∆\"∑a∑',	'2021-09-21 12:05:23'),
('256d67dce01d89bac3b8029756f2699b',	1,	'module:oxscpaypal',	'oePayPalBannersProductDetailsPageSelector',	'str',	'€∆Ù¿¯6K0˝S∞¢ãDæ',	'2021-09-21 12:05:23'),
('287a21b1230a55e2ef42444cb997c8a7',	1,	'theme:flow',	'sFaviconMSTileColor',	'str',	'€‰âYL§l',	'2021-09-21 11:58:45'),
('2a944b2cc31311e8957700163e4021bf',	1,	'',	'includeProductReviewLinksInEmail',	'bool',	'',	'2021-09-21 11:58:45'),
('2b72d8716ab1c8a67e1f8eae931ce56f',	1,	'',	'bl_rssSearch',	'bool',	'',	'2021-09-21 11:58:45'),
('2b7aa4c6e33301b5855cc538fea4bccd',	1,	'',	'bl_rssTopShop',	'bool',	'',	'2021-09-21 11:58:45'),
('2b7eccdd7027feb7367a6edc668164c5',	1,	'',	'bl_rssCategories',	'bool',	'',	'2021-09-21 11:58:45'),
('2b7f0b7ba625f0fe61993c66f21b13f3',	1,	'',	'bl_rssNewest',	'bool',	'',	'2021-09-21 11:58:45'),
('2b83db578b2d598c155160dd9af44a95',	1,	'theme:flow',	'sIconsize',	'str',	'Äd¢±',	'2021-09-21 11:58:45'),
('2ca4277aa49a5bd27.44511187',	1,	'',	'blStockOnDefaultMessage',	'bool',	'',	'2021-09-21 11:58:45'),
('2ca4277aa49a634f8.76432326',	1,	'',	'blStockOffDefaultMessage',	'bool',	'',	'2021-09-21 11:58:45'),
('2cad5c2f65267c9e6bcbb64e5ed58eab',	1,	'module:oxscpaypal',	'sPayPalSandboxClientSecret',	'str',	'',	'2021-09-21 12:05:23'),
('2d856fd6e3269163319c9c0c5940e806',	1,	'theme:flow',	'blEmailsShowProductPictures',	'bool',	'',	'2021-09-21 11:58:45'),
('2e244d9a2f78077d1.36913924',	1,	'',	'bl_perfLoadSelectListsInAList',	'bool',	'',	'2021-09-21 11:58:51'),
('2e8e4b6beb4dab1c12808d34610eafdc',	1,	'theme:flow',	'sCatPromotionsize',	'str',	'∞o¥A¬Ωî',	'2021-09-21 11:58:45'),
('2f3b2915449c11f301e1f3c6f4d5d624',	1,	'theme:flow',	'sShoppingLanguage',	'str',	'Œí',	'2021-09-21 11:58:45'),
('30f505ebaa207599db014573a276e9ea',	1,	'theme:flow',	'aNrofCatArticles',	'arr',	'M∫Œ)r·KÚÀ”©§;É≠è{pOq£ü—Ï“õCãAÄó„∆Ù˝…\'A˜ál∆¸°\'◊âîÊ‹…ï',	'2021-09-21 11:58:45'),
('329271635e40c6236484a3d1b86cdaa3',	1,	'theme:flow',	'sBackgroundPosHorizontal',	'select',	'lïÁM\ZÄ',	'2021-09-21 11:58:45'),
('32ddeaf2694e06b47b6ff74eafc69b65',	1,	'',	'sParcelService',	'str',	'\0–·Æ3ª$kM∑÷òÉ8EºŒí©öiﬁ˚ı£Î‘7Çc§FQ˙≤<∏GzÒß±ÃBÖ“gVsd8	·}Ωåè ˇè∆',	'2021-09-21 11:58:45'),
('33341949f476b65e8.17282442',	1,	'',	'iAttributesPercent',	'str',	'w¬',	'2021-09-21 11:58:45'),
('359b59593eeee54186fceea68c3e6bd5',	1,	'theme:flow',	'sFavicon128File',	'str',	'y\0DØWgÊ\"/˙çxt’û≥Ω',	'2021-09-21 11:58:45'),
('36d42513de8cab671.54909813',	1,	'',	'bl_perfShowActionCatArticleCnt',	'bool',	'',	'2021-09-21 11:58:45'),
('3a5f66cb0def3f558c90f384a1f490f8',	1,	'module:oxscpaypal',	'oePayPalBannersStartPage',	'bool',	'',	'2021-09-21 12:05:23'),
('3c4f033dfb8fd4fe692715dda19ecd28',	1,	'',	'aCurrencies',	'arr',	'M∫Œ)r·KÚÀ”©§QW\0D\"È(âr≤ÅñﬁΩ∫˛ã$D±_,{¸ænYÇÿt4√±ñ)⁄Õw(wkT◊ ÍŒh¥∞\\mﬁˇ-˘ˇâ¥g±MÙ‹…f≈GzûÆ≠’Ω˙Qï©Fvã¢6÷X7öÊ”qø’:Õôﬁ°˝Í±áy±ëÛ„%äáµãóxıcm‚˙±T¸\nQ¢Ï√§Ü}∞p¯XR!~ù^ö¶',	'2021-09-21 11:58:45'),
('3cac0ace23a117f67cf9eb77ad23d504',	1,	'theme:flow',	'bl_showVouchers',	'bool',	'',	'2021-09-21 11:58:45'),
('3e194309ae632b5a75a3f81362b5d2db',	1,	'module:oxscpaypal',	'sPayPalSetupFeeFailureAction',	'select',	'á≤äœº˚1 ',	'2021-09-21 12:05:23'),
('3e55fc99f0608a98cfaef0d7089764a0',	1,	'theme:flow',	'sThumbnailsize',	'str',	'∞£∫O}ï∑',	'2021-09-21 11:58:45'),
('3edac747cd58e5bacefadb6feaf2f07f',	1,	'',	'blSendTechnicalInformationToOxid',	'bool',	'',	'2021-09-21 11:58:51'),
('4144b1d415d9be015b0b73e7478160a2',	1,	'theme:flow',	'sBackgroundSize',	'select',	'l(\rq',	'2021-09-21 11:58:45'),
('42b45696cf0d9913c7fcc0b26bb98b2c',	1,	'theme:flow',	'blGAAnonymizeIPs',	'bool',	'',	'2021-09-21 11:58:45'),
('42d40333daec7911e529587a0ccdf231',	1,	'theme:flow',	'sPageLanguage',	'str',	'Œí¢Ù',	'2021-09-21 11:58:45'),
('43040112c71dfb0f2.40367454',	1,	'',	'sDefaultImageQuality',	'str',	'wA',	'2021-09-21 11:58:45'),
('4754e7633d3c7d629696566b1f090acc',	1,	'theme:flow',	'sShoppingCountry',	'str',	'ÏZ',	'2021-09-21 11:58:45'),
('47645e1b04f106c0076643b5e9fd2dbd',	1,	'theme:flow',	'bl_showManufacturerSlider',	'bool',	'',	'2021-09-21 11:58:45'),
('47b842ec1ad311ec82d70242ac120004',	1,	'',	'contactFormRequiredFields',	'arr',	'M∫2,w‰N˜Œ÷¨J9[Bœ¬v\n…',	'2021-09-21 11:58:48'),
('47d214681abba5bd79b558fd14a66738',	1,	'theme:flow',	'blFooterShowHelp',	'bool',	'',	'2021-09-21 11:58:45'),
('47e764c468615054561ad6e7226931fc',	1,	'',	'sTagList',	'str',	'\rŸ4kŒßu≥≠',	'2021-09-21 12:00:26'),
('486fdd253ef779f74b92f38277ed2449',	1,	'theme:flow',	'sStartPageListDisplayType',	'select',	'%˘¯',	'2021-09-21 11:58:45'),
('4994145b9e8678993.26056670',	1,	'',	'blShowSorting',	'bool',	'',	'2021-09-21 11:58:45'),
('4994145b9e8736eb6.03785000',	1,	'',	'iTop5Mode',	'str',	'',	'2021-09-21 11:58:45'),
('4994145b9e87481c5.69580772',	1,	'',	'aSortCols',	'arr',	'M∫É/tÁMÙÕ’Øc8Á…zœl≤è’\"Z‚åÛtLÓ∑Ωàn±\n√k®`Cæ∞.',	'2021-09-21 11:58:45'),
('4c08e5642affe98d92efa0d88c5f9f45',	1,	'theme:flow',	'sGoogleShoppingAccountId',	'str',	'',	'2021-09-21 11:58:45'),
('4c7f7975e353c96aceb451d4e876f8fd',	1,	'',	'sOnlineLicenseNextCheckTime',	'str',	'\rŸ4m~xz}0',	'2021-09-21 12:02:45'),
('4ce74be75654d89aebb4d003af00af36',	1,	'theme:flow',	'blFooterShowLinks',	'bool',	'',	'2021-09-21 11:58:45'),
('4f76c809ff3bd883b96b0689a0796609',	1,	'theme:flow',	'sDefaultListDisplayType',	'select',	'ÉÕ∑êdÌ',	'2021-09-21 11:58:45'),
('509b2b4b5455ff1a7d146432d461835a',	1,	'',	'blCheckForUpdates',	'bool',	'y\0˝ı',	'2021-09-21 11:58:51'),
('50f0df57315eac1b64258343e1df524c',	1,	'module:oxscpaypal',	'arrPayPalEnabledOptions_Basket',	'aarr',	'M∫2lr”Ã ™ñ<øSR´PÃ¿Çô›ªü¢b˘¢ªñ≤pÆŸ±u9L^ª{îÙﬁP°Ô⁄)Ôïêﬂàì⁄†¸`b≤èˇ‡\\^œù*^Z/s¨π·≤X@J»KWÄ—iX˝úößÆ›gRı∞Û›£˙˘ıôå@ÓΩäLÌnuØ¿‡<÷¨D]}V˙kÆà\n¨pî)Mj~¬¸ªaäw(1*§\"ÅÍXno\r˛˛©Gøètú£∞±tñ_ïê€Ñ·ÈﬁqÀáxùL≠ïk[≥á˜ıâsÓ„m‚Xcs°ŸSBjKî¥~_',	'2021-09-21 12:05:23'),
('51e44d9a1e3bc2571.58800338',	1,	'',	'blShopStopped',	'bool',	'',	'2021-09-21 11:58:51'),
('558ffc507c3c1d4dd4b37e6fa5c45a31',	1,	'',	'iOlcSuccess',	'str',	'\rŸ4kŒß‚',	'2021-09-21 12:02:45'),
('56e70f0bd32359ca675b3fd208f4536e',	1,	'module:oxscpaypal',	'arrPayPalEnabledOptions_Details',	'aarr',	'M∫2lr”Ã ™ñ<øSR´PÃ¿Çô›ªü¢b˘¢ªñ≤pÆŸ±u9L^ª{îÙﬁP°Ô⁄)Ôïêﬂàì⁄†¸`b≤èˇ‡\\^œù*^Z/s¨π·≤X@ﬂK…JVÅ–hY¸ùõ¶Ø‹fSÙ±Ú‹¢˚¯ÙòçAÔºãMÏotÆ¡·=◊≠E\\|W˚jØâ≠qï(Lk√˝∫`ãv)0+•#ÄÎYonˇˇ®Fæéuù¢±\r∞uó^îë⁄Ö‡Ëﬂp ÜyúM¨îjZ≤ÜˆÙàrÔ‚l„Ybr†ÿRCkJïµ^',	'2021-09-21 12:05:23'),
('5af2cafc072383cc5c87c0bd6ece740f',	1,	'',	'sClusterId',	'str',	'ªGŒb–ôs\\˝ˇ/GI#+g]À–÷©ãÑ“†uÆBÃçu\rZ',	'2021-09-21 12:02:45'),
('5fb544d09b282311c4c43581f541b851',	1,	'theme:flow',	'sFavicon512File',	'str',	'y\0DØWgÊxöÀ⁄¿H’û≥Ω',	'2021-09-21 11:58:45'),
('5fc3af6becbf279eda64416260cc371e',	1,	'theme:flow',	'sBackgroundColor',	'str',	'€èâ†r^√',	'2021-09-21 11:58:45'),
('5i1c49faf83b3fe3d6bdbfa301e2704d',	1,	'',	'iLinkExpirationTime',	'str',	'\rÈ',	'2021-09-21 11:58:45'),
('5i1d215fe1d6f0e1061ba1134e0ee4f2',	1,	'',	'iDownloadExpirationTime',	'str',	'∂‚',	'2021-09-21 11:58:45'),
('603a1a28ff2a421b64c631ffaf97f324',	1,	'',	'sGiCsvFieldEncloser',	'str',	'ï',	'2021-09-21 11:58:45'),
('62642dfaa1d87d064.50653921',	1,	'',	'aDetailImageSizes',	'aarr',	'M∫2js“ÕÀGï3◊ÄKâàs˜Æù¬ûﬂ<Ë˙∂OÜ	„1àÙeÍ1™îÀN⁄Ø2ÁÀP$¥Ä›|±EVó\\?÷ïyÕ,´óOÆjôØÜK¡¨µP«ÁãÇÙaäÎãß˚ÏT	Úw‡¢∏Nf¬Oñ∫?ßfeˆ©)MãÛeø}=\rV˙Ú5]˜ôº(íôMµb∞ıñ}€Ë‘Œ≠ëòç¸Çw%Wï±∫\rîhÛÿ qpÕÁâ÷¡( nQ\0PëÁD§S±#\\@\nqˇFˆÅ«E¥˝¶⁄ Jø1xV\'Çe.´·©?üM”cÚÛ<)qkïæà#sƒÉsãO.º˙/+©o\\±S8ﬁÁ&]¸f˛e&¶{+ƒâaCnçº}ÿßDã¢•#8›jº9ÀÅ\ZM)\\ïÕØ˝ÁÀäZ?›˛˘•Äó>ñ`¶\"◊tΩπ',	'2021-09-21 11:58:45'),
('62642dfaa1d88b1b2.94593071',	1,	'',	'sZoomImageSize',	'str',	'˚B±D;>8',	'2021-09-21 11:58:45'),
('6310aac9c4e28925ff4a38707b19c929',	1,	'theme:flow',	'sShippingDaysOnStock',	'str',	'∞',	'2021-09-21 11:58:45'),
('643f447861d6717b19443269a034cded',	1,	'module:oxscpaypal',	'sPayPalSandboxWebhookId',	'str',	'',	'2021-09-21 12:05:23'),
('67a23d187f8e82d1ff5740b8ad970cba',	1,	'theme:flow',	'sShippingDaysNotOnStock',	'str',	']',	'2021-09-21 11:58:45'),
('6c74c77d5d9007e4f1236c2abc7c0b67',	1,	'module:oxscpaypal',	'oePayPalBannersCartPageSelector',	'str',	'ﬂin/ôÆNÉz,›’',	'2021-09-21 12:05:23'),
('6da42abf915b5f290.70877375',	1,	'',	'sCntOfNewsLoaded',	'str',	'',	'2021-09-21 11:58:45'),
('6de0ee4a3241ffd92e0a3c2b5752829c',	1,	'theme:flow',	'blShowListDisplayType',	'bool',	'',	'2021-09-21 11:58:45'),
('6ec4235c2aa997942.70260123',	1,	'',	'blWarnOnSameArtNums',	'bool',	'',	'2021-09-21 11:58:45'),
('6ec4235c2aaa45d77.87437919',	1,	'',	'sIconsize',	'str',	']	Ædp',	'2021-09-21 11:58:45'),
('6ec4235c2aaa8eec5.99966057',	1,	'',	'sMidlleCustPrice',	'str',	'˚¡',	'2021-09-21 11:58:45'),
('6ec4235c2aaa97585.69723730',	1,	'',	'sLargeCustPrice',	'str',	'ƒ±',	'2021-09-21 11:58:45'),
('6ec4235c5182c3620.11050422',	1,	'',	'iNrofNewcomerArticles',	'str',	'˚',	'2021-09-21 11:58:45'),
('6f8453f77d174e0a0.31854175',	1,	'',	'blOtherCountryOrder',	'bool',	'',	'2021-09-21 11:58:45'),
('7044252b61dcb8ac9.31672388',	1,	'',	'bl_perfLoadPriceForAddList',	'bool',	'',	'2021-09-21 11:58:45'),
('7044252b61dd44324.24181665',	1,	'',	'bl_perfParseLongDescinSmarty',	'bool',	'',	'2021-09-21 11:58:45'),
('7084ae39abd0ac925914126e2321a8b7',	1,	'',	'blAllowSuggestArticle',	'bool',	'',	'2021-09-21 11:58:48'),
('715e8d62f9678ab90640277ef276dc57',	1,	'theme:flow',	'sTwitterUrl',	'str',	'\0–·ÆÎ◊x˙¬∞çÖ0z§Û>ú',	'2021-09-21 11:58:45'),
('7205857e2b5d39e3745c31f2013de8e6',	1,	'theme:flow',	'sGooglePlusUrl',	'str',	'\0–·ÆÎ◊x˙!8k=xŸÛZ∫Œ!W8Ÿ^',	'2021-09-21 11:58:45'),
('7313480cad5e038ad3d5fcc7a7d07b1b',	1,	'',	'aModuleVersions',	'aarr',	'M∫2,wOT4çê6“›‚[‹ªëÕád∫,«jêäŒóÌ[i',	'2021-09-21 12:05:23'),
('74922a76f7c0c074738ef1a0e204c18d',	1,	'theme:flow',	'blFullwidthLayout',	'bool',	'',	'2021-09-21 11:58:45'),
('75fff39c36038f4d393fc6f6fdb659fc',	1,	'',	'moduleSmartyPluginDirectories',	'aarr',	'M∫Ö.uMV6Íõ…-≈¬Dh6ìÍb°ÒñiÁ˚ø’xÑAj›N4\\údôä„8‡y≠_H©nÜ$´ú√^X∞œ^a<√ü\"Å\0÷∑êò3N	∏L∆Ö—i',	'2021-09-21 12:05:23'),
('77c425a29db68f0d9.00182375',	1,	'',	'bl_perfLoadManufacturerTree',	'bool',	'',	'2021-09-21 11:58:45'),
('79c3fbc9897c0d159.27469500',	1,	'',	'blLoadVariants',	'bool',	'',	'2021-09-21 11:58:45'),
('79e417a3726a0a010.44960388',	1,	'',	'sBackTag',	'str',	'',	'2021-09-21 11:58:51'),
('79e417a3916b910c8.31517473',	1,	'',	'bl_perfLoadAktion',	'bool',	'',	'2021-09-21 11:58:45'),
('79e417a4201010a12.85717286',	1,	'',	'bl_perfLoadReviews',	'bool',	'',	'2021-09-21 11:58:45'),
('79e417a420101f3e6.18536996',	1,	'',	'bl_perfLoadCrossselling',	'bool',	'',	'2021-09-21 11:58:45'),
('79e417a4201028c21.24163259',	1,	'',	'bl_perfLoadAccessoires',	'bool',	'',	'2021-09-21 11:58:45'),
('79e417a420103a598.95673089',	1,	'',	'bl_perfLoadCustomerWhoBoughtThis',	'bool',	'',	'2021-09-21 11:58:45'),
('79e417a4201044603.06076651',	1,	'',	'bl_perfLoadSimilar',	'bool',	'',	'2021-09-21 11:58:45'),
('79e417a420104dbd8.25267555',	1,	'',	'bl_perfLoadSelectLists',	'bool',	'',	'2021-09-21 11:58:45'),
('79e417a4201062a60.33852458',	1,	'',	'bl_perfLoadDiscounts',	'bool',	'',	'2021-09-21 11:58:45'),
('79e417a420106baa7.25594072',	1,	'',	'bl_perfLoadDelivery',	'bool',	'',	'2021-09-21 11:58:45'),
('79e417a420107ab46.59697382',	1,	'',	'bl_perfLoadPrice',	'bool',	'',	'2021-09-21 11:58:45'),
('79e417a442934fcb9.11733184',	1,	'',	'bl_perfLoadCatTree',	'bool',	'',	'2021-09-21 11:58:45'),
('79e417a45558d97f6.76133435',	1,	'',	'bl_perfLoadCurrency',	'bool',	'',	'2021-09-21 11:58:45'),
('79e417a45558e7851.36128674',	1,	'',	'bl_perfLoadLanguages',	'bool',	'',	'2021-09-21 11:58:45'),
('79e417a45558f1b86.05956285',	1,	'',	'bl_perfLoadNews',	'bool',	'',	'2021-09-21 11:58:45'),
('79e417a466086f390.29565974',	1,	'',	'bl_perfLoadNewsOnlyStart',	'bool',	'',	'2021-09-21 11:58:45'),
('79e417a4eaad1a593.54850808',	1,	'',	'blStoreIPs',	'bool',	'',	'2021-09-21 11:58:45'),
('7a59f9000f39e5d9549a5d1e29c076a0',	1,	'',	'blUseMultidimensionVariants',	'bool',	'',	'2021-09-21 11:58:45'),
('7a59f9000f39e5d9549a5d1e29c076a2',	1,	'',	'blOrderOptInEmail',	'bool',	'',	'2021-09-21 11:58:45'),
('7a835859182ddb5662ae11a2de762db7',	1,	'theme:flow',	'blUseGAPageTracker',	'bool',	'',	'2021-09-21 11:58:45'),
('7a99bf465ffda98b493c6090c3f2119f',	1,	'theme:flow',	'blShowBirthdayFields',	'bool',	'',	'2021-09-21 11:58:45'),
('7e7e3971926d6b49073f0e8c8cf54c5e',	1,	'theme:flow',	'bl_showGiftWrapping',	'bool',	'',	'2021-09-21 11:58:45'),
('7e9426025ff199d75.57820200',	1,	'',	'sStockWarningLimit',	'str',	'ƒ',	'2021-09-21 11:58:45'),
('817ea47838f0babc281663718108931c',	1,	'module:oxscpaypal',	'sPayPalClientId',	'str',	'',	'2021-09-21 12:05:23'),
('839b5d6e01ff652ff7150e7dad3ccd61',	1,	'theme:flow',	'blFooterShowNewsletterForm',	'bool',	'',	'2021-09-21 11:58:45'),
('83bc182b503a1c1f30809462293048a2',	1,	'theme:flow',	'sGoogleVendorId',	'str',	'',	'2021-09-21 11:58:45'),
('8563fba1965a11df3.12345678',	1,	'',	'blWrappingVatOnTop',	'bool',	'',	'2021-09-21 11:58:45'),
('8563fba1965a11df3.34244997',	1,	'',	'blEnterNetPrice',	'bool',	'',	'2021-09-21 11:58:45'),
('8563fba1965a1cc34.52696792',	1,	'',	'blCalculateDelCostIfNotLoggedIn',	'bool',	'',	'2021-09-21 11:58:45'),
('8563fba1965a1f266.82484369',	1,	'',	'blAllowUnevenAmounts',	'bool',	'',	'2021-09-21 11:58:45'),
('8563fba1965a219c9.51133344',	1,	'',	'blUseStock',	'bool',	'',	'2021-09-21 11:58:45'),
('8563fba1965a23786.00479842',	1,	'',	'blStoreCreditCardInfo',	'bool',	'',	'2021-09-21 11:58:45'),
('8563fba1965a25500.87856483',	1,	'',	'dDefaultVAT',	'num',	'°',	'2021-09-21 11:58:45'),
('8563fba1965a2b330.65668120',	1,	'',	'sMerchantID',	'str',	'',	'2021-09-21 11:58:45'),
('8563fba1965a2d181.97927980',	1,	'',	'sHost',	'str',	'\0–·ÆÎ◊x˙¬Çf5p—fA‹a8]º’’÷ˆ',	'2021-09-21 11:58:45'),
('8563fba1965a2eee6.68137602',	1,	'',	'sPaymentUser',	'str',	'',	'2021-09-21 11:58:45'),
('8563fba1965a30cf7.41846088',	1,	'',	'sPaymentPwd',	'str',	'',	'2021-09-21 11:58:45'),
('8563fba1baec4d3b7.61553539',	1,	'',	'iNrofSimilarArticles',	'str',	']',	'2021-09-21 11:58:45'),
('8563fba1baec4f6d3.38812651',	1,	'',	'iNrofCustomerWhoArticles',	'str',	']',	'2021-09-21 11:58:45'),
('8563fba1baec515d0.57265727',	1,	'',	'iNrofCrossellArticles',	'str',	']',	'2021-09-21 11:58:45'),
('8563fba1baec55dc8.04115259',	1,	'',	'iUseGDVersion',	'str',	'∂',	'2021-09-21 11:58:45'),
('8563fba1baec57c19.08644217',	1,	'',	'sThumbnailsize',	'str',	'ƒ±D«∏8',	'2021-09-21 11:58:45'),
('8563fba1baec599d5.89404456',	1,	'',	'sCatThumbnailsize',	'str',	']C3@rø?',	'2021-09-21 11:58:45'),
('8563fba1baec5b7d3.75515041',	1,	'',	'sCSVSign',	'str',	'Ü',	'2021-09-21 11:58:45'),
('8563fba1baec5d615.45874801',	1,	'',	'iExportNrofLines',	'str',	'∂D∑',	'2021-09-21 11:58:45'),
('8563fba1baec6eaf2.01241384',	1,	'',	'iCntofMails',	'str',	'∂«',	'2021-09-21 11:58:45'),
('8563fba1baec73b00.28734905',	1,	'',	'aOrderfolder',	'aarr',	'M∫Ö.uMV6óã?Å◊ôëûÁ48ﬁ–V^\Z^⁄›|(F⁄DToé¢ê;ıï0hºﬁò8Ñã{1≤wá√∫π˛ÉΩÊx$/6EÀ2ØXÍU¥|µE–>ã◊ÀòK,,–¸Ë∞ü	¢◊ñı”˙ß›∂¥]ET∂ßRuP<◊[',	'2021-09-21 11:58:45'),
('8563fba1c39367724.92308656',	1,	'',	'blCheckTemplates',	'bool',	'',	'2021-09-21 11:58:45'),
('8563fba1c39367724.92308656123111',	1,	'',	'sDownloadsDir',	'str',	'`>Á\rT	Æ„«“A“ë',	'2021-09-21 11:58:45'),
('8563fba1c39370d88.58444180',	1,	'',	'blLogChangesInAdmin',	'bool',	'',	'2021-09-21 11:58:45'),
('8563fba1c393750a0.46170041',	1,	'',	'sUtilModule',	'str',	'',	'2021-09-21 11:58:45'),
('8563fba1c3937ee60.91079898',	1,	'',	'iMallMode',	'str',	'',	'2021-09-21 11:58:45'),
('8563fba1c39381962.39392958',	1,	'',	'aCacheViews',	'arr',	'M∫Ö.uÊLıÃ‘ÆH;¨¢¬˘g«wÇLº⁄r˘JÍC\ZuÁªëMÄ6Ú\\ıΩ^Ÿ¸Ø=1\n¥',	'2021-09-21 11:58:45'),
('8563fba1c39386cf4.18302736',	1,	'',	'aSkipTags',	'arr',	'M∫Ö…u‘`◊íw3ÈRTºÆ6⁄Nlﬂ\nõÉœÉYâJºÊ_!≠~É\'N∞ÏÚ¸\n=ÕÂ2[+∞ÅCªCÏ,Üå)‘ç«æßÛ´ÒonΩkó≈ªSÚ?YVèÈ⁄E,˙≤d∏™∫ûóéâ/∆ÕÔG∑Ùï‰á}ÕÒ,„]}ô{ÄM`∫	Ç†b“◊~Ú\\‡h©IH≥‘å/l]a,-ÕnäÚ\r‘5ı‰§àD1V‡í‰mÈΩÍQôë]ÂW\"ø¿˜……E.v@‚˝ß◊ÛoÒ![\"ÍK5iÀGv=Ë\n-œìò•Ã›	?˙Wå<P[©Öÿ9T;4\nDˇn«–îãwîºπìcm÷¨|1_g\Z\\õsDÔæ tsôRë„-GO\nÜ–}d=Úë\nˆ#ó¥€˚\'¬º$ÖIçˆΩ™‹nc†˚µñ˚P˜‹¢on®¸6ÛÍ\'MÁcu∂‹Ç≥íJäänßAË2[(\nçåå3…–D˙ÁP≠F∏\rÃ˝ä‡»GÚB6ÏƒÛ\"\0˜1ãQËƒ\'*Fıù{fæ2ÃÄQâÆTnrÅt-kL¿¬ª*¶8ê\0‡ûÆüŸYÉL‚ÊL…ïRË‰á—)?mGÖ\0P˝≠~b€rxœ4ñôº`fJY?aöL∫“û∑¶ï≠WàÊm3íV0ÿê![¬¿1P0Ãi«wÅçÿﬂÛd”hïK±ró¬ _ËøAàhg˝X',	'2021-09-21 11:58:45'),
('8563fba1c3938ebe7.95075058',	1,	'',	'aLogSkipTags',	'arr',	'M∫Î-vç',	'2021-09-21 11:58:45'),
('872292767956df8e2eac3b3525215be3',	1,	'',	'aSerials',	'arr',	'M∫2,w‰N˜Œ÷¨ß∏UF o”Èz£=ÕËµ≈dUŸ∞8|XÜuÕªâ°”=æìèõ',	'2021-09-21 12:00:26'),
('8848ae18893aa90eada817e96d5da9ae',	1,	'theme:flow',	'sGATrackingId',	'str',	'',	'2021-09-21 11:58:45'),
('89e42b02704ce5589.91950338',	1,	'',	'iNewestArticlesMode',	'str',	'',	'2021-09-21 11:58:45'),
('8aa16888517fd188628e1ae939936676',	1,	'theme:flow',	'blUseGAEcommerceTracking',	'bool',	'',	'2021-09-21 11:58:45'),
('8b622e0589949d5f5f224e4a976d301a',	1,	'theme:flow',	'sBackgroundPosVertical',	'select',	'ì?',	'2021-09-21 11:58:45'),
('8b831f739c5d16cf4571b14a76006568',	1,	'',	'aSEOReservedWords',	'arr',	'M∫B*q‚HÒ»–™L?ÕÈÓ≈jÃ|âG∑—ﬂÛ-∂◊¶Y9èµ·™YôœﬁE\Z≤%˚§◊+;©¬:K\n€u1Kz-Èzﬁ‰-Å|H‘b@1?ùÒ≠cˆì∑ƒz†1Ìà	<ÎÖß]ÁiÌ‰ıx#•levo∑',	'2021-09-21 11:58:45'),
('8eee710e5603c7c68b0237080e3ac67f',	1,	'',	'iTimeToUpdatePrices',	'num',	'\rŸ4m~N`',	'2021-09-21 12:02:43'),
('9135a582a6971656110b9a98ca5be6d2',	1,	'',	'blShippingCountryVat',	'bool',	'',	'2021-09-21 11:58:45'),
('91fe3c642729da3facac2339ae4a1b89',	1,	'module:oxscpaypal',	'sPayPalClientSecret',	'str',	'',	'2021-09-21 12:05:23'),
('92b971e0c843a8b90728ab48fd457da6',	1,	'theme:flow',	'sFavicon64File',	'str',	'y\0DØWgÊ2eQe~í€’',	'2021-09-21 11:58:45'),
('99065ff58e9d2c1b2e362e54c0bb54f3',	1,	'',	'blNewArtByInsert',	'bool',	'',	'2021-09-21 11:58:45'),
('99f67f0296327b4cf0981a4b512265f3',	1,	'theme:flow',	'iNewBasketItemMessage',	'select',	'∂',	'2021-09-21 11:58:45'),
('9a342c4dbb9302cc7935dedd450132fa',	1,	'theme:flow',	'aDetailImageSizes',	'aarr',	'M∫2js“ÕÀGï3◊ÄKâàs˜Æù¬û4ùÓ¸∂mÖ\n‡2ã˜fÈ2©ó»MŸ¨1‰#Ú!∑°›|±EVó\\?÷ïyÕ,´óOÆÅ8©ÄK„Ø∂Sƒ‰àÅ˜bâËà§¯ÔW\nÒt„°PÏc«L∑∫?ßfeˆ©)MãÛeø}=\rV˙Ú5]8∫.íªN∂a\0≥ˆï~ÿÎ◊\0ÕÆíõéˇÅt&ø7¥π,îhÛÿ qpÕÁâ÷¡( nQ\0PëÂ	¢Sì _C	r¸EıÇƒF∑˛•Ÿ#Iº2êÙ\"£e.´·©?üM”cÚÛ<)qkïU)%sÊÄpàL-\0ø˘,(™l_≤P;›‰%µ¨˘c˝D&¶{+ƒâaCnçº}ÿßDã¢•#”µ€lº»ÇN*_ñŒ¨˛‰»âY<ﬁ˝˙¶Éî÷4e£!—◊tΩπ',	'2021-09-21 11:58:45'),
('9a8426df9d36443e7.48701626',	1,	'',	'blSearchUseAND',	'bool',	'',	'2021-09-21 11:58:45'),
('9c8b35b7171fb1e190684f6f38dfbb5a',	1,	'module:oxscpaypal',	'blPayPalAutoBillOutstanding',	'bool',	'',	'2021-09-21 12:05:23'),
('9cb5d611b487c2df6aed36326bd9b9ae',	1,	'module:oxscpaypal',	'oePayPalBannersShowAll',	'bool',	'',	'2021-09-21 12:05:23'),
('9cd11c628678bc143a4162f2f65f89bf',	1,	'',	'aModuleExtensions',	'aarr',	'M∫2,wOT4çê6“›‚[‹ªëÕád∫I’\"∆äØÎ∏Fj?Ÿ≈‹ÁÜ6\'∞Ê@ΩÂªÈNå‚PR†¿≤‘3î´>7zXä≤UGTbÛ#øM«ØUî9:	ºõL)[«È…ˇÊí<¬x¯ˆì¡–nZ?zO~¥1∆w¢MÚtDé‰$õπ»%—:úµªs\0É6SanπÏ”ÿ?Ï8ÏÅnlK~]Z\\Z	Û.dŒaeöAÉd6É◊›WÏfÃW§ß%ÉäœS1ˆ9	Î˙¡∆ê„08◊VjÓ˙ÂﬂCï=6ê„ÇoΩc≈K|G\\·º%√:bQmÿo‡dQI⁄:v™=˛◊l\r\réîÎaÃƒgJx\rZËC2!gs∞Ø8•E}à!z]÷Ie·ò¨§®/-`ùy\'ı»¢JC“@K-î|Ur∏ùä*N31e\r,[®zÊ¶xnéIkQxÖh¿		é”Ç≥O†ˇ7r≤¸[Xì∑èŸ#õôFi˛i˛˙Ò «jπgE¥c&πAO%‘ @‘wË\r~ÅãUø£D?mÂOzZ‹∫pÔwìå08çÖ=ıüßDdQiù›å\Zd “ËüXˆ/CØ]\'üuzU}Fêôÿy÷€x!Á0«^ôOæbÖàÀ«àKù˙´zQ*PÂXD¶/	\Z·<1\Z[®\\•&òZôüG˛Ü<kºÎ≤∏ËD√ÏÄGÒêÔXàÿvèT;˜±O‚óœ™qïûÙŒVî,ø∆ï—%À–rÕ\'Ïˆ§ππ…˙ ll´ÙåÆù◊GúkñÜ‹∂ŒR◊˘tnÏrÅv4Ã:n{X\nNH]r#§˚ô9˙o‚;æf·√ãùGA∑p∞L¬ﬁõÑ/∞.˙{hß3éê2Uhñ◊B§•öøI  òüKÚ,ô{»î¯ªö=x≈˘#∂£ü5xıß§¢ÇL\"Vç≥\\µ´P„%z∂∆U¯R¢ñh≤5ei≈™∫}ù\n≠—´R< #åÅ¢OyÂ÷†È!‡µ¥\'í«3øìπÕÊi£…œynä@ê(Êı.√`ˇ˝Ïûô@Ù©hÛ/≤Àîª(`Q˙HÆÙEƒÃΩx∆‰5ôóègZ¶àT¢\ZÂF©ü˜ÜAX^CEÄ>v-#jìÎØh¯¢«ı‘:`Â€ìÃZñùó\0	ZvˆB’ê',	'2021-09-21 12:05:23'),
('9ebe32cd9d943b868a0d21fafe7a0e31',	1,	'theme:flow',	'blBackgroundAttachment',	'bool',	'',	'2021-09-21 11:58:45'),
('9eeaf8b289b2ae63c9219197b376107a',	1,	'theme:flow',	'blShowFinalStep',	'bool',	'',	'2021-09-21 11:58:45'),
('9f57004e69c0e374bd5a3fdc4cca8086',	1,	'theme:flow',	'sCatIconsize',	'str',	'\rÈJ…∂6',	'2021-09-21 11:58:45'),
('a104164f96fa51c41.58873414',	1,	'',	'aSearchCols',	'arr',	'M∫Œ)r·KÚÀ”©e>·	œ|…j¥â”$ˆ\\‰äBpÙHÍÙÒU©´\\s˛NöZ¥ë%\nì^ ó.f∆º(@`ûZóÃ˘ÿtÕÑ&àÔJQZﬁÎÆ3ân',	'2021-09-21 11:58:45'),
('a1544b76735df7bd7.33980003',	1,	'',	'blEnableIntangibleProdAgreement',	'bool',	'',	'2021-09-21 11:58:45'),
('a1544b76735e2d8e8.37455553',	1,	'',	'blShowVATForDelivery',	'bool',	'',	'2021-09-21 11:58:51'),
('a1544b76735e421e0.22942938',	1,	'',	'blShowVATForPayCharge',	'bool',	'',	'2021-09-21 11:58:51'),
('a1544b76735e48c05.33803554',	1,	'',	'blExclNonMaterialFromDelivery',	'bool',	'',	'2021-09-21 11:58:51'),
('a1544b76735e557a6.57474874',	1,	'',	'blAutoSearchOnCat',	'bool',	'',	'2021-09-21 11:58:51'),
('a1544b76735e63209.62380160',	1,	'',	'blShowVATForWrapping',	'bool',	'',	'2021-09-21 11:58:51'),
('a1544b76735edac06.77267220',	1,	'',	'sLocalDateFormat',	'str',	'qpÆ',	'2021-09-21 11:58:51'),
('a1544b76735ede2e3.94589565',	1,	'',	'sLocalTimeFormat',	'str',	'qpÆ',	'2021-09-21 11:58:51'),
('a2255ef44132a579d990a5e871753a59',	1,	'theme:flow',	'sBackgroundPath',	'str',	'gõÂXGè¨«Tb™\"À˛Ë\\{¸AvP',	'2021-09-21 11:58:45'),
('a283459c5f22fbf36a0c5c1dd9289bc0',	1,	'theme:flow',	'blUseGoogleTS',	'bool',	'',	'2021-09-21 11:58:45'),
('a5271565ed32f8d3498a7692d4a27f00',	1,	'theme:flow',	'sGoogleMapsAddr',	'str',	'⁄7à´±˘Qs–ıioùZj¶\'Ø«/æÅ\rc˜Ì∆ºÈ˙ÆÅÜ^√∂¯e‡ ',	'2021-09-21 11:58:45'),
('a7a425c02819f7253.64374401',	1,	'',	'blAutoIcons',	'bool',	'',	'2021-09-21 11:58:45'),
('a85c5875093e039df77091b68cafe490',	1,	'theme:flow',	'sYouTubeUrl',	'str',	'\0–·ÆÎ◊x˙I≥‘\ràıØ¯\0 V9ÿ_',	'2021-09-21 11:58:45'),
('a99427345bf85a602.27736147',	1,	'',	'blDontShowEmptyCategories',	'bool',	'',	'2021-09-21 11:58:45'),
('a99427345bf8fcff2.83464949',	1,	'',	'bl_perfUseSelectlistPrice',	'bool',	'',	'2021-09-21 11:58:45'),
('a99427345bf9a27a1.04791092',	1,	'',	'bl_perfCalcVatOnlyForBasketOrder',	'bool',	'',	'2021-09-21 11:58:45'),
('aa779d74eacb81360f27ba1faca0c8d3',	1,	'',	'aDisabledModules',	'arr',	'M∫2´v◊c‘ët0ÍWxn˜ﬂ¸Áå\"‹Ü\"l∂ß£9≤	4J9§‹êÉk„œs¸!hî|+m}HãóÀ/…‘\'&ùxæ-.¨~ƒ≥ï&Ôu¢YiìíïÓ~ö=`	90{t!rb√˘}ZƒÕ‘”˘üî∂©Áƒe.˚ÇÆmTÙrÏˆ£¨&UÈﬂT9ô‹˛∆≤<ıN/Hm.√V*‹¢∆\'(’è\'iÇ $™,œÈ[mÑKKY∂§!m«≤ZÌ∏·Â⁄j8+ß	)°¬p©[Ã≠Q|·KP¯Ô⁄—EØk\ZbÙ)Á 18Á«»ÁªˇÅ˚pïG‚ˆ™ï!bEà\n+,ﬂ?sØÈe[Lmép‰ÃÓ4lÌñzWæƒÔ·\ZŸı√õk√Àã˝FA©í	-MQ’¢˙M5gfüÿ≈ΩJpJ&3P–ùõπí’JxÀ™`|˘œ¨=^¡wäQa≥2πF\\ÖL&èÌ1h“ø˜V˙Q≤-„PiJﬁ	|±æhXÒ›üçˆ\ZÅÌ\rnWeÅH≥c◊nay¥3~	\n§B›ƒµqY®êç≥1˚\\`◊©æ,à?ñ¸Â8<gH€3{û¡,3woµp6ﬂ†ZËß_e',	'2021-09-21 12:05:23'),
('ab382c4d9cd9cc448092d38e5f1930e1',	1,	'module:oxscpaypal',	'blPayPalSandboxMode',	'bool',	'',	'2021-09-21 12:05:23'),
('b0b4d221756b49c8d60a904c0b91b877',	1,	'',	'blCheckSysReq',	'bool',	'',	'2021-09-21 11:58:45'),
('b0b4d221756c80afdad8904c0b91b877',	1,	'',	'iRssItemsCount',	'str',	'∂«',	'2021-09-21 11:58:45'),
('b28f4d00a8557f20a65e853a17a4e945',	1,	'theme:flow',	'sLogoFile',	'str',	'î\'H≤xÌë‰L≤∑',	'2021-09-21 11:58:45'),
('b29180270d4e15a5efc6681ee2a22119',	1,	'theme:flow',	'sBackgroundRepeat',	'select',	'è%ê/Xj2‹',	'2021-09-21 11:58:45'),
('b2b400dd011bf6273.08965005',	1,	'',	'blVariantsSelection',	'bool',	'',	'2021-09-21 11:58:45'),
('b42573c6d0627597fdb7c6f3bfeca7f2',	1,	'theme:flow',	'sLogoWidth',	'str',	'∂«≤',	'2021-09-21 11:58:45'),
('b61df7ee844f44bb4b55acafbaa5ccf8',	1,	'theme:flow',	'blFooterShowNews',	'bool',	'',	'2021-09-21 11:58:45'),
('b76a020b0d4e1decd30803915bfb5c64',	1,	'theme:flow',	'sFaviconFile',	'str',	'y\0DØWgÙ◊‹b',	'2021-09-21 11:58:45'),
('b7f9bb15adb82da4d61abd94e44ee1ff',	1,	'theme:flow',	'sLogoHeight',	'str',	'∞ò',	'2021-09-21 11:58:45'),
('bba077be04e0978d8159490b4938a4fb',	1,	'',	'aLanguageParams',	'aarr',	'M∫É/tLWÜ£qŸﬂ3wèï%Ù∂ÔºÇﬁ|<Z„9l™oä˚hdØ®3¥5ó —˚èõâp»È	ç™·æF7˙§\n*‰Zä›*√⁄UÜ8`X¨˜Ë¡í∂hô[µ3⁄…[ÁØ}4;:úõçÆØMcXï4gsGmf}„1˛@—áe\r∏éÆrt‡ÜŸ‹J¯ã‘_≤g@!',	'2021-09-21 11:58:51'),
('bd320d322fa2f638086787c512329eec',	1,	'',	'dPointsForRegistration',	'str',	'ƒ',	'2021-09-21 11:58:45'),
('bd3e73e699331eb92c557113bac02fc4',	1,	'',	'dPointsForInvitation',	'str',	'ƒ',	'2021-09-21 11:58:45'),
('bdaa7b45ab076a91d013d67bc30fca0f',	1,	'',	'aModuleEvents',	'aarr',	'M∫2,wOT4çê6“›‚[‹ªëÕád∫I’ìÖå08’·±U·k±Éÿ‘vÀ®h-πÊ¥Ôù£,ô†ÍI^mi\nFx4y¬B’/1®ò‡ñ¯Û∂≠≈´Ÿ©ÄB8àq@lmˇ3E·¢:uÂAÂßîΩùjÛ˝/ÈˇÂlTA®‚»LÆ2QälıÈ≤‡\"@ÅæzÌàNê[åºnr•Œö;∞\r4Ail ÿU¸>T¨\"À©˘°£è¬¸ê}ñ.O≠ÄlqOO™\\á',	'2021-09-21 12:05:23'),
('befdc289999c90cc1a376712108e3c0e',	1,	'theme:flow',	'sFavicon48File',	'str',	'y\0DØWgÊﬁ_á	í€’',	'2021-09-21 11:58:45'),
('bf041bd98dacd9021.61732877',	1,	'',	'aInterfaceProfiles',	'aarr',	'M∫Œ)rJQ∂Ø}	™¡0BÈ<[~ÌöÖÖ¡„’á9™û©%#S ©P`÷\rW˚∞\'∫ÿé˝™íéº÷™œXM1›n’Á∏3Òõ8“ÇÚÑI)U»,Í4áûßXé∆ÃﬁV¨Ì‰ï',	'2021-09-21 11:58:45'),
('c20424bf2f8e71271.42955545',	1,	'',	'bl_perfLoadTreeForSearch',	'bool',	'',	'2021-09-21 11:58:45'),
('c59ab45192382283a7f7872f65e10317',	1,	'',	'aModuleControllers',	'aarr',	'M∫2,wOT4çê6“›‚[‹ªëÕád∫I’\"çç®§ˆ~óàPÛ‡â/4RûÏÎ=PO^˘T¨”6o	ƒßòs\Z–úOôRã¯»Ô¡ëQ:Ü\'Kà∞^PçxÄ“8KCƒ¶ƒüæW^‰Êy≈¥ä®:/y7¢9∫EÃGeõêÚg£Ø›sÙ3Ü∂m€oÿ∏…·{ª–bõ/ŸäfÄÅ±<HY»™Y0Ozµ4∏2 Ei§©}QEU~¿î·\ZC°èˇΩM0\Z\nXfoÍ§Çˆ9OÉQ¸ù ∞˝,âûË;†{b	Rf∑D1˙ò&Wï¡=°®)ø3÷ÌìU—ˆKUﬂ{Í©QXïÎœ˛¡ø‘πéœSK\"˘¿!«¶âyüœÅîTì°‚¡1¿èΩ+∏VBY8»°”·Ú´ª\Z Iß™YT83tﬁi=¥ßƒ(±(L–ßD˛åà®UãB√ÄIg5–ÉI6áÆ¿!tê€V[AÓ9ùxd˜≈çoîˇ–KÑ‰M”y†NHﬁŸ}¢ΩÄÌdº¯BDù(∞=≠ﬂãu§¸PÕHÄq@„ˇØé≠ù-*ó≠PaÿJ»2ô≈∞û√˙÷¯`∏Å#Wã~ƒ*÷j˚áï–†Í˛Ó∞h{Ü¿~x‚`XƒÏû ¿ﬂeîa-˝ÔLéÌ˜Gíét#R*r8Ù·ΩUﬁ%dóc ö˘ñÔ>%«\0ΩÌÊ¢m≥Rï¶ìïÒ“OŸv7u*”E\0\rÿO}@—eè|.§,/∫ˇÜzú(∆‚\\^ﬁ°·-\\7˜Œ3≈‰ÃQÔ’«m≤ÜéÎÀˆvH\" ;≥¯\"zMGnVH•ﬂóÔäµ‚ËCœa¬Ë[}%≠.—9e@Èl≤˛¶:ﬁ–úåØ∞D£J\"\\;FRÌ≠BÃµHÅˆì&ùê\\≈û\'°\n’EØûdlsâ∆i¥iY\\ËÂ…(<7=Áõm€\\nÕ∫\'BFa/o§¡Eyîm˙ö©ºs«¥¯lro\\D&/Q&ÅMyπ†ù°>úy˝Í’\nÈ_òÙrqâŒ≈Aµ]N´˛˚_Êƒ5¶¡◊ÖˆKeòÌs’—i≤Ê™öz2≈k<ÿÁZ{%2MLº»j£	Ÿ.ºj¢X^µ√™å©u·\'„ƒ∏\'#!∑…¨ö±B8á@F≥\\ºe^ˇño2DRûàŒ^ÓÄDG6 ñpoVÈvl¯Î“©¿G≠*à∫5”ptO±>˜∂Q©¸BO]»GêÌxJ•„¯M	Ô™eÙ(¿1G˜ó\rimWJ±ïTËË±Ñ,N‰)˘ßä{øÛ¸ò\'Åµ¿ÛÄwLGÚÊGëè˘ºﬂÛ◊5™©/ßÅoª(<€£.:ªÄ…n÷˚°hôÁ0_¬ßèbZ9wìÓ\r&\"mûÜïç	Iﬂ3%“Ç‚:•ÆöâjbnŸ264Ä‰ÜÙ˘t§dI%7ö Ä1n∫zÒJ9\\Eòa$¢õ=_±é•>æÕ ßÌÔL+¸pŸnpêoq¡}Ç`·ËË©›”3Yª±™q™`∏blAπXI%Ù ÿ8ÿ0∏mx”ôÈÀ\0A€†‡¯∫/áa¨ƒƒœüU.V√MI><+ZWÆ>§_~0t%w) Ω]üΩÛNK-{ø,~\"({àõ4Õﬁf	a†ô\'\"vIÍ˝§Bw·ﬁSb4◊\rúQÜf‰fcÈØÎ=ÊØ…ç!woƒÅ`ﬁ\']Yâ†…DF<@-ÂWt:A*@À\0≥æfÅ?Td¨»É~k;zk^˜\'G˙úﬂõŸéœ”U˚C(”qVÄwO∞o¥$\0Î≠í¥2w[‘fº=–•©∏≤k—n*@Ω{ëΩ0Îû˛ñÚ|‡¨>9Th\nãa◊~&°xíJ}I(¬åÇ—˘®ç¶«f*&9≈D.[3ªQs\0DFybﬁè“º√+PªÅ\n*8Ñ©¥+7¯ÎU≠“W‡≤SíZ¥€PEn0€_—˚w%N@Iº´’∏mAˆπ?£h’üÑıq?∞ß±eJ@¯Å[\nœ#Al\"U˙Ÿ1~˘ŸH±‡dh_π\'|{˙UDÍ?oQ!µ¸ôaÛ®¨§Lu&fâh*∫Ë-çÄ»h\'Y¢ãüpCìñ$l:¨.f∫Lk]uAÎÔ–}®ë–\\∏öe',	'2021-09-21 12:05:23'),
('c5f7c9c1809d5af84cd4c6069a932e54',	1,	'',	'aServersData_37df3a115cf9fc04416b4654004caca3',	'arr',	'M∫h(sKPÅ§vì∆8|·å<´[Æ‘µeä~79AÊi9W&L(Omˇûä’—M«™b”átÎ®∑®-ıåœO\räá‹È˜JùGìè∫m≥h-€≈e8á¨·˘.K≈Œzçp∏ÜçC“®úÇ˙«$2Ö∂^∫M ¿ªâ§xö+ ªØŒƒ^¸’^;∑ª¯b˚9\'íùNzF\nÍYúDﬂj∏VÍs«',	'2021-09-21 12:02:45'),
('c67c11a7a059a8681f708e7bff43619f',	1,	'theme:flow',	'bl_showListmania',	'bool',	'',	'2021-09-21 11:58:45'),
('c686215cb21dccb727af86bbe9ddf892',	1,	'module:oxscpaypal',	'sPayPalPaymentFailureThreshold',	'str',	'',	'2021-09-21 12:05:23'),
('c9a9a87c43f2a87050a1b202da9d2611',	1,	'',	'IMD',	'str',	'∞∆',	'2021-09-21 12:00:26'),
('ce143201f7e03e110.09792514',	1,	'',	'aMustFillFields',	'arr',	'M∫2\'u‘`◊íw3ÈÂ˚kÚÔhäº»KÆÚ@_πÓ¿Û¶;í|E®3ÜFT?Ê®mJü@\'#^\Z?Örø‡„ÒÔÓ.¸…«Y◊}íp…˛Ò«Õıº\Z)ú7ïπnÖ–2≈_Ûd⁄Á£~≈6,˝˚`‚ﬁ\">Å`…à\"k˙*∫Âıÿb˚\n~5≤ŒØÜ à´4∑õYéaƒ6“h,ÛD.Oüπ6±Õ¿ÖÌ\rΩ§πñ¢•s¿™G”˚s´‘;M2»{˘ôN_ÜAá.ÚS]]=ÛY +%“f@ãætﬁé.Ù¥ƒËáØƒÿâ⁄8∆;Ò¡<W•»”ˆj·U‰√Ïm¬yi;ñÂ∞@ YÀ0\'√J0ùììsi∫}!˙éÒπ«û¡pˇ°¢ªÙtau¿‡KúˇhÆO(uó5π±´∆Oéî\rB>‘Ïn([%Üìtÿ\'\'˙ÊÛ>Ù›q≈-ÊøûF7vÑ`©˛bW¢˜^É˝!æ~è∑ÅÁ–‚Áü—ü0Iâm⁄)ca®ó≠Ãü€f«ñÇÇ⁄vÎ∑oÔ	',	'2021-09-21 11:58:45'),
('d144175015dcd2a39.15131643',	1,	'',	'aHomeCountry',	'arr',	'M∫2,w‰N˜Œ÷¨°ÛW\0<≠#x˛ÄAóú’è◊Ï®ÑY‘Àú„∑*(’',	'2021-09-21 11:58:45'),
('d2d221466d25dc3182f92f1e9cdac288',	1,	'',	'IMS',	'str',	'ƒ',	'2021-09-21 12:00:26'),
('d3d1eb8918e48df4f149a79c9edf773c',	1,	'module:oxscpaypal',	'oePayPalBannersCategoryPageSelector',	'str',	'ﬂu}¨^éÏÙP?ôÂ',	'2021-09-21 12:05:23'),
('d50fdf70e560bd6414f0d9c1dbfaa83f',	1,	'module:oxscpaypal',	'arrPayPalEnabledOptions_Checkout',	'aarr',	'M∫2lr”Ã ™ñ<øSR´PÃ¿Çô›ªü¢b˘¢ªñ≤pÆŸ±u‡M_∫zïıﬂQ†Ó€(ÓMêﬂàì⁄†¸`b≤èˇ9~]_Œú+_[.	r≠∏‡≥YAK…JVÅ–hY¸ùõ¶v›gRı∞Û›£˙˘ıôå@ÓΩäLÌnuv¡·=◊≠E\\|W˚jØâtpî)Mj~¬¸ªaäw(Ë+•#ÄÎYonˇˇ®Fæéuù¢±\r∞uó^îë⁄Ö‡Ëﬂp ÜyúM¨îjZ≤Ü/ıâsÓ„m‚Xcs°ŸSBjKî¥~_',	'2021-09-21 12:05:23'),
('d85bbdaa4771f5e8c759dc717e33f216',	1,	'module:oxscpaypal',	'blPayPalShowBasketButton',	'bool',	'',	'2021-09-21 12:05:23'),
('d8d44bbdea56b3ed0.58768595',	1,	'',	'blMallCustomPrice',	'bool',	'',	'2021-09-21 11:58:51'),
('e1142ca231becd5c4.00590616',	1,	'',	'blConfirmAGB',	'bool',	'',	'2021-09-21 11:58:45'),
('e17240c6177b54a3fadcd42fc6735312',	1,	'module:oxscpaypal',	'sPayPalSandboxClientId',	'str',	'',	'2021-09-21 12:05:23'),
('e2f220830be47ee41df7a9d4542a0128',	1,	'theme:flow',	'blFooterShowNewsletter',	'bool',	'',	'2021-09-21 11:58:45'),
('e668180263ba31bc1e01faac0f4a7cc5',	1,	'module:oxscpaypal',	'blPayPalNeverUseCredit',	'bool',	'',	'2021-09-21 12:05:23'),
('e7744be1b5fb6ac06.91704848',	1,	'',	'blVariantParentBuyable',	'bool',	'',	'2021-09-21 11:58:51'),
('e7744be1b5fb6e4a9.96876633',	1,	'',	'blShowVariantReviews',	'bool',	'',	'2021-09-21 11:58:51'),
('e7744be1b5fb6e4a9.96876634',	1,	'',	'blVariantInheritAmountPrice',	'bool',	'',	'2021-09-21 11:58:51'),
('e7744be1b5fb8aef2.33450414',	1,	'',	'blGBModerate',	'bool',	'',	'2021-09-21 11:58:51'),
('e7744be1b5fb93c94.74487583',	1,	'',	'blUseLDAP',	'bool',	'',	'2021-09-21 11:58:51'),
('e7744be1b5fb9ece3.82840270',	1,	'',	'iAdminLogTime',	'str',	'√',	'2021-09-21 11:58:51'),
('e7744be1b5fbacf84.23562842',	1,	'',	'iSessionTimeoutAdmin',	'str',	'',	'2021-09-21 11:58:51'),
('e7744be1b5fbb4cf1.34834569',	1,	'',	'iServerTimeShift',	'str',	'',	'2021-09-21 11:58:51'),
('e7b813e355942fd26d85be6526d9793d',	1,	'theme:flow',	'sManufacturerIconsize',	'str',	'ƒ±D«∏8',	'2021-09-21 11:58:45'),
('e8e41bda6fa7631d8.13775806',	1,	'',	'iSessionTimeout',	'str',	'√',	'2021-09-21 11:58:45'),
('e924478126bb80968.65249125',	1,	'',	'blMallPriceAdditionPercent',	'bool',	'',	'2021-09-21 11:58:51'),
('e9244781359d1dd18.54146261',	1,	'',	'iMallPriceAddition',	'str',	'ﬁ',	'2021-09-21 11:58:51'),
('f5b88a9f2b4a6de5d4b114489f1d7356',	1,	'module:oxscpaypal',	'oePayPalBannersProductDetailsPage',	'bool',	'',	'2021-09-21 12:05:23'),
('f5be55c9e801c43b72b891b919b3f7c6',	1,	'module:oxscpaypal',	'oePayPalBannersSearchResultsPage',	'bool',	'',	'2021-09-21 12:05:23'),
('f838ff14c973de33f8ee1574c8ae28e3',	1,	'theme:flow',	'sZoomImageSize',	'str',	'\n3@”ræ',	'2021-09-21 11:58:45'),
('faf1fc8c7cff4ddcb08b17cc1d2c451d',	1,	'theme:flow',	'sFavicon16File',	'str',	'y\0DØWgÊ\"éTpêí€’',	'2021-09-21 11:58:45'),
('fde4559837789b3c7.26965372',	1,	'',	'aCMSfolder',	'aarr',	'M∫Ö.uMV6F\Zî’\0˙ÖÈw¥„bÔ∆âg§Y≤ê¶ÙΩ÷‚	‚\"wŒÕOl@R∑ãÌö\ré,q/¶U®\røE¿ƒSw¬=ù◊—\'gÕx¿X,Òé-hû1(¡@å*{lÓŸ·” îπ–¸rˆ’Ïaé—sœä7hùsñ',	'2021-09-21 11:58:51'),
('fecfcd8dbd01a491a94557448425acc8',	1,	'',	'blShowTSInternationalFeesMessage',	'bool',	'',	'2021-09-21 11:58:45'),
('ff6ddf21d9cbb35f8bf5318c67a2ec97',	1,	'theme:flow',	'sCatThumbnailsize',	'str',	'ï\\‘Ω¶',	'2021-09-21 11:58:45'),
('l8g3e140a4bc7993d7d715df951dfe25',	1,	'',	'iMaxDownloadsCountUnregistered',	'str',	'',	'2021-09-21 11:58:45'),
('l8g957be9e7b13412960c7670f71ba31',	1,	'',	'sAdditionalServVATCalcMethod',	'str',	'U @ˇ\r\nrıπÚ',	'2021-09-21 11:58:45'),
('l8g957be9e7b13412960c7670f71ba3b',	1,	'',	'iMaxDownloadsCount',	'str',	'ﬁ',	'2021-09-21 11:58:45'),
('mhjf24905a5b49c8d60aa31087b97971',	1,	'',	'blEnableSeoCache',	'bool',	'',	'2021-09-21 11:58:45'),
('mhjf24905a5b49c8d60aa31087b9797f',	1,	'',	'blShowRememberMe',	'bool',	'',	'2021-09-21 11:58:45'),
('mla50c74dd79703312ffb8cfd82c3741',	1,	'',	'aLanguageURLs',	'arr',	'M∫É/tÁMÙÕ’Ø ?‚Æ©Ø∏',	'2021-09-21 11:58:45'),
('mlabefd7ebdb5946e8f3f7e7a953b323',	1,	'',	'aLanguageSSLURLs',	'arr',	'M∫É/tÁMÙÕ’Ø ?‚Æ©Ø∏',	'2021-09-21 11:58:45'),
('mlae44cdad808d9b994c58540db39e7a',	1,	'',	'aLanguages',	'aarr',	'M∫É/tLWÜ£qŸﬂ3wÍá‚w=∫ˆÖI>îöëïî$4[bèd\n\ríÍ`GÏÇRÈí',	'2021-09-21 11:58:45'),
('omc4555952125c3c2.98253113',	1,	'',	'blDisableNavBars',	'bool',	'',	'2021-09-21 11:58:51'),
('rgk2a8c9cf8c9d23b3a7c8e9c090baf1',	1,	'',	'sTheme',	'str',	'yŸÀ',	'2021-09-21 11:58:45');

DROP TABLE IF EXISTS `oxconfigdisplay`;
CREATE TABLE `oxconfigdisplay` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Config id (extends oxconfig record with this id)',
  `OXCFGMODULE` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Module or theme specific config (theme:themename, module:modulename)',
  `OXCFGVARNAME` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Variable name',
  `OXGROUPING` varchar(255) NOT NULL DEFAULT '' COMMENT 'Grouping (groups config fields to array with specified value as key)',
  `OXVARCONSTRAINT` varchar(255) NOT NULL DEFAULT '' COMMENT 'Serialized constraints',
  `OXPOS` int(11) NOT NULL DEFAULT '0' COMMENT 'Sorting',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `list` (`OXCFGMODULE`,`OXCFGVARNAME`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Additional configuraion fields';

INSERT INTO `oxconfigdisplay` (`OXID`, `OXCFGMODULE`, `OXCFGVARNAME`, `OXGROUPING`, `OXVARCONSTRAINT`, `OXPOS`, `OXTIMESTAMP`) VALUES
('042f8ae08d29463046f30a6c92682da4',	'theme:flow',	'aNrofCatArticlesInGrid',	'display',	'',	24,	'2021-09-21 11:58:45'),
('042f8ae08d29463046f30a6c92682da5',	'theme:flow',	'bl_showManufacturerSlider',	'display',	'',	25,	'2021-09-21 11:58:45'),
('09362d856a2cf6b860ddea2616790e4e',	'theme:flow',	'sCatIconsize',	'images',	'',	7,	'2021-09-21 11:58:45'),
('0cb126e10d47c6521d792a3068d90f06',	'theme:flow',	'sFaviconFile',	'favicons',	'',	1,	'2021-09-21 11:58:45'),
('0cc56c5f5be8f4183d44f6e678456841',	'theme:flow',	'sGoogleMapsAddr',	'contact',	'',	0,	'2021-09-21 11:58:45'),
('0cd598f56d0a74e8c4e4d75a961960f4',	'theme:flow',	'blFooterShowNewsletter',	'footer',	'',	4,	'2021-09-21 11:58:45'),
('0d1563b50e9d90fceff9b18ad95b5598',	'theme:flow',	'sBackgroundPosHorizontal',	'background',	'left|right|center',	5,	'2021-09-21 11:58:45'),
('0db73f8d5dcf8276c482dacd5daf66eb',	'theme:flow',	'bl_showCompareList',	'features',	'',	6,	'2021-09-21 11:58:45'),
('11c59dff7bd1bbffda1f3a2acf8875f2',	'theme:flow',	'sBackgroundRepeat',	'background',	'no-repeat|repeat-x|repeat-y|repeat',	4,	'2021-09-21 11:58:45'),
('140b9eb2c37bac0b5d691e5761519d48',	'module:oxscpaypal',	'oePayPalBannersCheckoutPage',	'',	'',	1,	'2021-09-21 12:05:23'),
('141c0f684db511d3d6097c099f3c750b',	'module:oxscpaypal',	'oePayPalBannersSearchResultsPage',	'',	'',	1,	'2021-09-21 12:05:23'),
('14e1c130168c35e44e058718f08b89eb',	'theme:flow',	'sTwitterUrl',	'footer',	'',	0,	'2021-09-21 11:58:45'),
('1c7e564dbce9e258e2080b75b6efac55',	'theme:flow',	'sBackgroundPath',	'background',	'',	3,	'2021-09-21 11:58:45'),
('1cddb8f9d6dcfc647d3f8e8e66d28ee5',	'theme:flow',	'sFacebookUrl',	'footer',	'',	0,	'2021-09-21 11:58:45'),
('1cfe50763f3c707d58b540d9314bd795',	'theme:flow',	'blShowListDisplayType',	'display',	'',	20,	'2021-09-21 11:58:45'),
('1f7ed56af44c407cf2fb6063ed360b6e',	'theme:flow',	'sLogoWidth',	'logo',	'',	0,	'2021-09-21 11:58:45'),
('1f9b97e606be26eaa3990cecb144dc4a',	'theme:flow',	'sShoppingCountry',	'googlets',	'',	6,	'2021-09-21 11:58:45'),
('223fccfb136d6337f943fa263c1bf2d5',	'theme:flow',	'sShippingDaysOnStock',	'googlets',	'',	8,	'2021-09-21 11:58:45'),
('2455da52334ca7456949f58d37f07aad',	'module:oxscpaypal',	'sPayPalWebhookId',	'',	'',	1,	'2021-09-21 12:05:23'),
('28957fd6bdd2a50d0accff892408fca8',	'module:oxscpaypal',	'sPayPalSandboxClientSecret',	'',	'',	1,	'2021-09-21 12:05:23'),
('2cc9f3ea370184978ac815596a156400',	'theme:flow',	'sEmailLogo',	'logo',	'',	3,	'2021-09-21 11:58:45'),
('3f801f3816bb1d9b7088a12b9f337da5',	'theme:flow',	'aDetailImageSizes',	'images',	'',	5,	'2021-09-21 11:58:45'),
('403ecea6b4b7aa9b742b11a0433c0be0',	'theme:flow',	'sGATrackingId',	'googleanalytics',	'',	0,	'2021-09-21 11:58:45'),
('42edfa1d5d279cb471ac88fbb2571b1d',	'theme:flow',	'iNewBasketItemMessage',	'display',	'0|1|2|3',	17,	'2021-09-21 11:58:45'),
('474b196f644a906313dfdbc65288fd89',	'theme:flow',	'bl_showListmania',	'features',	'',	7,	'2021-09-21 11:58:45'),
('47843eae6e1ab6518652fb003891a867',	'theme:flow',	'sDeliveryDaysNotOnStock',	'googlets',	'',	11,	'2021-09-21 11:58:45'),
('4815822efa13a3ca9ef3a891543bcb6d',	'module:oxscpaypal',	'sPayPalPaymentFailureThreshold',	'',	'',	1,	'2021-09-21 12:05:23'),
('49a830ba732459497c046fe2f05285f2',	'module:oxscpaypal',	'blPayPalNeverUseCredit',	'',	'',	1,	'2021-09-21 12:05:23'),
('4c500ae122fd28a5e19bea014a95006b',	'theme:flow',	'sGoogleShoppingAccountId',	'googlets',	'',	4,	'2021-09-21 11:58:45'),
('4cb2db0fb45de2d1a86c19b22222c22a',	'theme:flow',	'sDefaultListDisplayType',	'display',	'infogrid|line|grid',	21,	'2021-09-21 11:58:45'),
('4cb9f1fcbef84e96f77150b5516194ed',	'theme:flow',	'blUseGAPageTracker',	'googleanalytics',	'',	0,	'2021-09-21 11:58:45'),
('51e09817c2edba9d92d694bc6b986595',	'theme:flow',	'sManufacturerIconsize',	'images',	'',	6,	'2021-09-21 11:58:45'),
('5468524f725c809e5c604afd9f763814',	'theme:flow',	'blUseGAEcommerceTracking',	'googleanalytics',	'',	0,	'2021-09-21 11:58:45'),
('59128ae70e846d3aeb4faf08a8e0cc9e',	'theme:flow',	'sPageLanguage',	'googlets',	'',	5,	'2021-09-21 11:58:45'),
('59925a9c6fba1426db91812d971b8a1f',	'theme:flow',	'sYouTubeUrl',	'footer',	'',	0,	'2021-09-21 11:58:45'),
('5a7d0bdbac873fb4d09e8dd66aea378e',	'module:oxscpaypal',	'oePayPalBannersShowAll',	'',	'',	1,	'2021-09-21 12:05:23'),
('5e49cc06e3e5c35f6f5ec74612c264ea',	'theme:flow',	'bl_showWishlist',	'features',	'',	8,	'2021-09-21 11:58:45'),
('697b4dcf0e224f0d24667191818188ab',	'theme:flow',	'sCatPromotionsize',	'images',	'',	8,	'2021-09-21 11:58:45'),
('71dd758df96c43a6df32ce1358b85440',	'module:oxscpaypal',	'arrPayPalEnabledOptions_Checkout',	'',	'',	1,	'2021-09-21 12:05:23'),
('72484c39caa4952023960368c9436eb1',	'theme:flow',	'sFavicon32File',	'favicons',	'',	3,	'2021-09-21 11:58:45'),
('74db9cb4342c56a1bbd26be7c1684d3e',	'module:oxscpaypal',	'oePayPalBannersSearchResultsPageSelector',	'',	'',	1,	'2021-09-21 12:05:23'),
('7987a82e50d0f46112334b2b14be7db7',	'module:oxscpaypal',	'sPayPalSandboxWebhookId',	'',	'',	1,	'2021-09-21 12:05:23'),
('7ae9b19d317dc73374f4f366bcd79849',	'theme:flow',	'blUseBackground',	'background',	'',	1,	'2021-09-21 11:58:45'),
('7b7f24babda3f6f9966bab24664ac1d9',	'theme:flow',	'blUseGoogleTS',	'googlets',	'',	1,	'2021-09-21 11:58:45'),
('842c098286d1d1ebcc7b68a25b858512',	'theme:flow',	'bl_showGiftWrapping',	'features',	'',	10,	'2021-09-21 11:58:45'),
('8838d89730016811eab0e0e5d71c52d1',	'theme:flow',	'blFooterShowNewsletterForm',	'footer',	'',	5,	'2021-09-21 11:58:45'),
('8b3f2c69cc65bc263a2af3ed1a91b598',	'theme:flow',	'sStartPageListDisplayType',	'display',	'infogrid|line|grid',	22,	'2021-09-21 11:58:45'),
('8b95ef2399380c38bd4193e99093074c',	'module:oxscpaypal',	'arrPayPalEnabledOptions_Basket',	'',	'',	1,	'2021-09-21 12:05:23'),
('8c0be10b2b3d252593cdae3c83a04cef',	'module:oxscpaypal',	'oePayPalBannersStartPageSelector',	'',	'',	1,	'2021-09-21 12:05:23'),
('907338f1ac83bf8749edf9721fac0977',	'module:oxscpaypal',	'arrPayPalEnabledOptions_Details',	'',	'',	1,	'2021-09-21 12:05:23'),
('91ebc7cacfcb006cdf06b3afab3e68a5',	'theme:flow',	'sBackgroundPosVertical',	'background',	'top|bottom|center',	6,	'2021-09-21 11:58:45'),
('932a3159cea3ef7877b47524fa4f6b07',	'module:oxscpaypal',	'blPayPalAutoBillOutstanding',	'',	'',	1,	'2021-09-21 12:05:23'),
('93de3805c1e330ff33a568550e2414d9',	'theme:flow',	'blFullwidthLayout',	'display',	'',	10,	'2021-09-21 11:58:45'),
('9599dbc6486a7a239131100a7c142d23',	'theme:flow',	'bl_showVouchers',	'features',	'',	9,	'2021-09-21 11:58:45'),
('9760bfcd17f5dbd30e261c045711d3ed',	'theme:flow',	'blSliderShowImageCaption',	'images',	'',	9,	'2021-09-21 11:58:45'),
('9773d51dfc85d626516ce527d3729fbe',	'module:oxscpaypal',	'oePayPalBannersColorScheme',	'',	'blue|black|white|white-no-border',	1,	'2021-09-21 12:05:23'),
('994aff028981fc19681f0db08a80f7f5',	'theme:flow',	'blFooterShowHelp',	'footer',	'',	1,	'2021-09-21 11:58:45'),
('9cfc9f8b749d97f7957a3149c2d7b9a0',	'theme:flow',	'sFavicon64File',	'favicons',	'',	5,	'2021-09-21 11:58:45'),
('9d88b7a5c91cffcbbed5460a9a0ee9c9',	'module:oxscpaypal',	'oePayPalBannersStartPage',	'',	'',	1,	'2021-09-21 12:05:23'),
('9f2da8e5403dd68e59e16002e963f074',	'theme:flow',	'sFaviconMSTileColor',	'favicons',	'',	8,	'2021-09-21 11:58:45'),
('a07b8605d73c4bb7d87da3d44267605e',	'module:oxscpaypal',	'oePayPalBannersPaymentPageSelector',	'',	'',	1,	'2021-09-21 12:05:23'),
('a2504cf9ca9671f6c774f0d45ad29466',	'theme:flow',	'sZoomImageSize',	'images',	'',	4,	'2021-09-21 11:58:45'),
('a58604fa12c801587ff2765451605fde',	'theme:flow',	'sBackgroundColor',	'background',	'',	2,	'2021-09-21 11:58:45'),
('a9984735e07c8c8ada727f7255e4a1a2',	'theme:flow',	'blGAAnonymizeIPs',	'googleanalytics',	'',	0,	'2021-09-21 11:58:45'),
('b59788d620c54d4bc3b4b6c5dfb1b532',	'module:oxscpaypal',	'blPayPalShowProductDetailsButton',	'',	'',	1,	'2021-09-21 12:05:23'),
('b7a3f9dfe88cb4d7351772c31105ce39',	'module:oxscpaypal',	'oePayPalBannersCategoryPage',	'',	'',	1,	'2021-09-21 12:05:23'),
('b9aeb7409052836e6fa4925507389a84',	'theme:flow',	'sBackgroundSize',	'background',	'cover|contain|normal',	7,	'2021-09-21 11:58:45'),
('baf6cb6cc46c90434297cfa28a2465df',	'theme:flow',	'sIconsize',	'images',	'',	1,	'2021-09-21 11:58:45'),
('bf0fa8a27731fed993b7b8069229ae76',	'theme:flow',	'blShowFinalStep',	'display',	'',	16,	'2021-09-21 11:58:45'),
('c1b7aa6fc09d4d1f1c907583e956a1e3',	'module:oxscpaypal',	'sPayPalSetupFeeFailureAction',	'',	'CONTINUE|CANCEL',	1,	'2021-09-21 12:05:23'),
('c4e7b52682fd2620bbe233b84a3306e1',	'module:oxscpaypal',	'blPayPalShowBasketButton',	'',	'',	1,	'2021-09-21 12:05:23'),
('c6e2a0faf1dd9c8edcab602bc3eb1979',	'theme:flow',	'blBackgroundAttachment',	'background',	'',	8,	'2021-09-21 11:58:45'),
('c85b0c087412d5509d24dcea15ac407d',	'theme:flow',	'sFavicon128File',	'favicons',	'',	6,	'2021-09-21 11:58:45'),
('c93289d885ca7b141b438319f81a3df3',	'theme:flow',	'sFavicon48File',	'favicons',	'',	4,	'2021-09-21 11:58:45'),
('c9994c2f600261e8d0a6ae3a5960f2c9',	'module:oxscpaypal',	'oePayPalBannersCartPageSelector',	'',	'',	1,	'2021-09-21 12:05:23'),
('c9e2fa62943ae6406ab5f9a3786d51cd',	'theme:flow',	'sLogoHeight',	'logo',	'',	0,	'2021-09-21 11:58:45'),
('c9ef60e5f343d3cdf0747f33cb942624',	'theme:flow',	'blEmailsShowProductPictures',	'emails',	'',	1,	'2021-09-21 11:58:45'),
('cbd529d340ef6b63d93765bf488b28a2',	'module:oxscpaypal',	'oePayPalBannersProductDetailsPageSelector',	'',	'',	1,	'2021-09-21 12:05:23'),
('d11bdba26efdf81a6168b1730ac6b31e',	'theme:flow',	'aNrofCatArticles',	'display',	'',	23,	'2021-09-21 11:58:45'),
('d1c29cb8ac480fa9009e0fbc10261721',	'theme:flow',	'sCatThumbnailsize',	'images',	'',	3,	'2021-09-21 11:58:45'),
('d32fef4b817367ddd93712a5b6f4880a',	'theme:flow',	'sGoogleVendorId',	'googlets',	'',	2,	'2021-09-21 11:58:45'),
('e004bf676429020f6cd5e3781c24bbd4',	'theme:flow',	'sShoppingLanguage',	'googlets',	'',	7,	'2021-09-21 11:58:45'),
('e0fb9345d9a85a86e62d485bfc354432',	'theme:flow',	'blFooterShowNews',	'footer',	'',	6,	'2021-09-21 11:58:45'),
('e4d52bea45d7958415bed457567e55d5',	'theme:flow',	'sFavicon16File',	'favicons',	'',	2,	'2021-09-21 11:58:45'),
('e676ec37632a4e1b1d30cc839c06614f',	'theme:flow',	'blFooterShowLinks',	'footer',	'',	2,	'2021-09-21 11:58:45'),
('e8e773778b8fe80ef49f89a22584ed07',	'theme:flow',	'sLogoFile',	'logo',	'',	0,	'2021-09-21 11:58:45'),
('e8f4bbdcdedcf7bc1cf3b435cb95bae5',	'module:oxscpaypal',	'sPayPalSandboxClientId',	'',	'',	1,	'2021-09-21 12:05:23'),
('e98b808184b7e5a1eb64c719b9c8b055',	'module:oxscpaypal',	'blPayPalSandboxMode',	'',	'',	1,	'2021-09-21 12:05:23'),
('ef1b6d2c8494cad773006e2db613df77',	'module:oxscpaypal',	'oePayPalBannersProductDetailsPage',	'',	'',	1,	'2021-09-21 12:05:23'),
('f0295f3826d540606f06c97a1c3f526f',	'theme:flow',	'sFavicon512File',	'favicons',	'',	7,	'2021-09-21 11:58:45'),
('f3d46784c4d2a7b3b40050d2d7031ee8',	'theme:flow',	'blShowBirthdayFields',	'display',	'',	14,	'2021-09-21 11:58:45'),
('f47de955b128f96bf58e949cec431408',	'theme:flow',	'sDeliveryDaysOnStock',	'googlets',	'',	10,	'2021-09-21 11:58:45'),
('f790332afda44f74b211dfe6ea5c08de',	'theme:flow',	'sThumbnailsize',	'images',	'',	2,	'2021-09-21 11:58:45'),
('f790377ecb7915a7544b7b013a19507f',	'theme:flow',	'sBlogUrl',	'footer',	'',	0,	'2021-09-21 11:58:45'),
('f92bce52a70ae1a00ed7e0d62b13dec7',	'module:oxscpaypal',	'sPayPalClientId',	'',	'',	1,	'2021-09-21 12:05:23'),
('fc1ba136326a9473ac249859b0419671',	'theme:flow',	'sGooglePlusUrl',	'footer',	'',	0,	'2021-09-21 11:58:45'),
('fc2d4177ca6e5594987f5d0cd5701760',	'theme:flow',	'sShippingDaysNotOnStock',	'googlets',	'',	9,	'2021-09-21 11:58:45'),
('fd472878d7e2b198a4bef0e384034842',	'module:oxscpaypal',	'oePayPalBannersCategoryPageSelector',	'',	'',	1,	'2021-09-21 12:05:23'),
('fd84871894245c48baa0253f44b2742c',	'module:oxscpaypal',	'sPayPalClientSecret',	'',	'',	1,	'2021-09-21 12:05:23');

DROP TABLE IF EXISTS `oxcontents`;
CREATE TABLE `oxcontents` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Content id',
  `OXLOADID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Id, specified by admin and can be used instead of oxid',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXSNIPPET` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Snippet (can be included to other oxcontents records)',
  `OXTYPE` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Type: 0 - Snippet, 1 - Upper Menu, 2 - Category, 3 - Manual',
  `OXACTIVE` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Active (multilanguage)',
  `OXACTIVE_1` tinyint(1) NOT NULL DEFAULT '0',
  `OXPOSITION` varchar(32) NOT NULL DEFAULT '' COMMENT 'Position',
  `OXTITLE` varchar(255) NOT NULL DEFAULT '' COMMENT 'Title (multilanguage)',
  `OXCONTENT` text NOT NULL COMMENT 'Content (multilanguage)',
  `OXTITLE_1` varchar(255) NOT NULL DEFAULT '',
  `OXCONTENT_1` text NOT NULL,
  `OXACTIVE_2` tinyint(1) NOT NULL DEFAULT '0',
  `OXTITLE_2` varchar(255) NOT NULL DEFAULT '',
  `OXCONTENT_2` text NOT NULL,
  `OXACTIVE_3` tinyint(1) NOT NULL DEFAULT '0',
  `OXTITLE_3` varchar(255) NOT NULL DEFAULT '',
  `OXCONTENT_3` text NOT NULL,
  `OXCATID` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Category id (oxcategories), used only when type = 2',
  `OXFOLDER` varchar(32) NOT NULL DEFAULT '' COMMENT 'Content Folder (available options at oxconfig.OXVARNAME = aCMSfolder)',
  `OXTERMVERSION` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Term and Conditions version (used only when OXLOADID = oxagb)',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  UNIQUE KEY `OXLOADID` (`OXLOADID`,`OXSHOPID`),
  KEY `cat_search` (`OXTYPE`,`OXSHOPID`,`OXSNIPPET`,`OXCATID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Content pages (Snippets, Menu, Categories, Manual)';

INSERT INTO `oxcontents` (`OXID`, `OXLOADID`, `OXSHOPID`, `OXSNIPPET`, `OXTYPE`, `OXACTIVE`, `OXACTIVE_1`, `OXPOSITION`, `OXTITLE`, `OXCONTENT`, `OXTITLE_1`, `OXCONTENT_1`, `OXACTIVE_2`, `OXTITLE_2`, `OXCONTENT_2`, `OXACTIVE_3`, `OXTITLE_3`, `OXCONTENT_3`, `OXCATID`, `OXFOLDER`, `OXTERMVERSION`, `OXTIMESTAMP`) VALUES
('1074279e67a85f5b1.96907412',	'oxorderinfo',	1,	1,	0,	1,	1,	'',	'Wie bestellen?',	'<div>Beispieltext:</div>\r\n<div>¬†</div>\r\n<div>[{ $oxcmp_shop->oxshops__oxname->value }], Ihr Online-Shop f√ºr ... <br />\r\n<br />\r\nBei uns haben Sie die Wahl aus mehr als ... Artikeln von bester Qualit√§t und namhaften Herstellern. Schauen Sie sich um, st√∂bern Sie in unseren Angeboten! <br />\r\n[{ $oxcmp_shop->oxshops__oxname->value }] steht Ihnen im Internet rund um die Uhr und 7 Tage die Woche offen.<br />\r\n<br />\r\nWenn Sie eine Bestellung aufgeben m√∂chten, k√∂nnen Sie das:\r\n<ul>\r\n<li class=\"font11\">direkt im Internet √ºber unseren Shop </li>\r\n<li class=\"font11\">per Fax unter¬†[{ $oxcmp_shop->oxshops__oxtelefax->value }] </li>\r\n<li class=\"font11\">per Telefon unter [{ $oxcmp_shop->oxshops__oxtelefon->value }] </li>\r\n<li class=\"font11\">oder per E-Mail unter <a href=\"mailto:[{ $oxcmp_shop->oxshops__oxowneremail->value }]?subject=Bestellung\"><strong>[{ $oxcmp_shop->oxshops__oxowneremail->value }]</strong></a> </li></ul>Telefonisch sind wir f√ºr Sie <br />\r\nMontag bis Freitag von 10 bis 18 Uhr erreichbar. <br />\r\nWenn Sie auf der Suche nach einem Artikel sind, der zum Sortiment von [{ $oxcmp_shop->oxshops__oxname->value }] passen k√∂nnte, ihn aber nirgends finden, lassen Sie es uns wissen. Gern bem√ºhen wir uns um eine L√∂sung f√ºr Sie. <br />\r\n<br />\r\nSchreiben Sie an <a href=\"mailto:[{ $oxcmp_shop->oxshops__oxowneremail->value }]?subject=Produktidee\"><strong>[{ $oxcmp_shop->oxshops__oxowneremail->value }]</strong></a>.</div>',	'How to order?',	'<h1>Text Example</h1>\r\n<h2>[{ $oxcmp_shop->oxshops__oxname->value }], your online store for ...</h2>\r\n<p>With us, you can choose from more than ... products of high quality and reputable manufacturers. Take a look around and browse through our offers!<br />\r\nOn the internet [{ $oxcmp_shop->oxshops__oxname->value }] is open 24/7.</p>\r\n<p>If you want to place an order you can purchase</p>\r\n<ul>\r\n<li class=\"font11\">via our online store</li>\r\n<li class=\"font11\">via fax [{ $oxcmp_shop->oxshops__oxtelefax->value }] </li>\r\n<li class=\"font11\">via telephone [{ $oxcmp_shop->oxshops__oxtelefon->value }] </li>\r\n<li class=\"font11\">or via e-mail <a href=\"mailto:[{ $oxcmp_shop->oxshops__oxowneremail->value }]?subject=Order\"><strong>[{ $oxcmp_shop->oxshops__oxowneremail->value }]</strong></a></li></ul>\r\n<p>By telephone, we are available<br />\r\nMonday to Friday 10 AM thru 6 PM. </p>\r\n<p>If you are looking for an item that did not match the range of [{ $oxcmp_shop->oxshops__oxname->value }], let\'s us know. We are happy to find a solution for you.</p>\r\n<p>Write to <a href=\"mailto:[{ $oxcmp_shop->oxshops__oxowneremail->value }]?subject=Product idea\"><strong>[{ $oxcmp_shop->oxshops__oxowneremail->value }]</strong></a></p>',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_USERINFO',	'',	'2021-09-21 11:58:45'),
('1544167b4666ccdc1.28484600',	'oxblocked',	1,	1,	0,	1,	1,	'',	'Benutzer geblockt',	'<div><span style=\"color: #ff0000;\"><strong>Der Zugang wurde Ihnen verweigert!</strong></span></div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>',	'user blocked',	'<div>\r\n   <span style=\"color: #ff0000;\"><strong>Permission denied!</strong></span>\r\n</div>',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_USERINFO',	'',	'2021-09-21 11:58:45'),
('1ea45574543b21636.29288751',	'oxrightofwithdrawal',	1,	1,	0,	1,	1,	'',	'Widerrufsrecht',	'<div>F√ºgen Sie hier Ihre Widerrufsbelehrung ein.</div><div><a title=\"\" href=\"[{$oViewConf->getBaseDir()}]out/pictures/ddmedia/create_your_withdrawal_pdf_here_de.pdf\"><strong>Muster f√ºr das Widerrufsformular</strong></a></div>',	'Right of Withdrawal',	'<div>Insert here the Right of Withdrawal policy.</div><div><strong><a title=\"\" href=\"[{$oViewConf->getBaseDir()}]out/pictures/ddmedia/create_your_withdrawal_pdf_here_en.pdf\">Model form for withdrawal</a></strong></div>',	1,	'',	'',	0,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_USERINFO',	'',	'2021-09-21 11:58:45'),
('220404cee0caf470e227c1c9f1ec4ae2',	'oxrighttocancellegend',	1,	1,	0,	1,	1,	'',	'AGB und Widerrufsrecht',	'[{oxifcontent ident=\"oxagb\" object=\"oCont\"}]\r\n    Ich habe die <a id=\"test_OrderOpenAGBBottom\" rel=\"nofollow\" href=\"[{ $oCont->getLink() }]\" onclick=\"window.open(\'[{ $oCont->getLink()|oxaddparams:\"plain=1\"}]\', \'agb_popup\', \'resizable=yes,status=no,scrollbars=yes,menubar=no,width=620,height=400\');return false;\" class=\"fontunderline\">AGB</a> gelesen und erkl√§re mich mit ihnen einverstanden.&nbsp;\r\n[{/oxifcontent}]\r\n[{oxifcontent ident=\"oxrightofwithdrawal\" object=\"oCont\"}]\r\n    Ich wurde √ºber mein <a id=\"test_OrderOpenWithdrawalBottom\" rel=\"nofollow\" href=\"[{ $oCont->getLink() }]\" onclick=\"window.open(\'[{ $oCont->getLink()|oxaddparams:\"plain=1\"}]\', \'rightofwithdrawal_popup\', \'resizable=yes,status=no,scrollbars=yes,menubar=no,width=620,height=400\');return false;\">[{ $oCont->oxcontents__oxtitle->value }]</a> informiert.\r\n[{/oxifcontent}]',	'Terms and Conditions and Right to Withdrawal',	'[{oxifcontent ident=\"oxagb\" object=\"oCont\"}] I agree to the <a id=\"test_OrderOpenAGBBottom\" rel=\"nofollow\" href=\"[{ $oCont->getLink() }]\" onclick=\"window.open(\'[{ $oCont->getLink()|oxaddparams:\"plain=1\"}]\', \'agb_popup\', \'resizable=yes,status=no,scrollbars=yes,menubar=no,width=620,height=400\');return false;\" class=\"fontunderline\">Terms and Conditions</a>.&nbsp;\r\n[{/oxifcontent}]\r\n[{oxifcontent ident=\"oxrightofwithdrawal\" object=\"oCont\"}]\r\n    I have been informed about my <a id=\"test_OrderOpenWithdrawalBottom\" rel=\"nofollow\" href=\"[{ $oCont->getLink() }]\" onclick=\"window.open(\'[{ $oCont->getLink()|oxaddparams:\"plain=1\"}]\', \'rightofwithdrawal_popup\', \'resizable=yes,status=no,scrollbars=yes,menubar=no,width=620,height=400\');return false;\">[{ $oCont->oxcontents__oxtitle->value }]</a>.\r\n[{/oxifcontent}]',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_USERINFO',	'',	'2021-09-21 11:58:45'),
('220404cee0caf470e227c1c9f1ec4ae3',	'oxrighttocancellegend2',	1,	1,	0,	1,	1,	'',	'AGB und Widerrufsrecht',	'[{oxifcontent ident=\"oxagb\" object=\"oCont\"}]\r\n    Es gelten unsere <a rel=\"nofollow\" href=\"[{ $oCont->getLink() }]\" onclick=\"window.open(\'[{ $oCont->getLink()|oxaddparams:\"plain=1\"}]\', \'agb_popup\', \'resizable=yes,status=no,scrollbars=yes,menubar=no,width=620,height=400\');return false;\" class=\"fontunderline\">Allgemeinen Gesch√§ftsbedingungen</a>.&nbsp;\r\n[{/oxifcontent}]\r\n[{oxifcontent ident=\"oxrightofwithdrawal\" object=\"oCont\"}]\r\n    Hier finden Sie <a id=\"test_OrderOpenWithdrawalBottom\" rel=\"nofollow\" href=\"[{ $oCont->getLink() }]\" onclick=\"window.open(\'[{ $oCont->getLink()|oxaddparams:\"plain=1\"}]\', \'rightofwithdrawal_popup\', \'resizable=yes,status=no,scrollbars=yes,menubar=no,width=620,height=400\');return false;\">Einzelheiten zum Widerrufsrecht</a>.\r\n[{/oxifcontent}]',	'Terms and Conditions and Right to Withdrawal',	'[{oxifcontent ident=\"oxagb\" object=\"oCont\"}] Our general <a rel=\"nofollow\" href=\"[{ $oCont->getLink() }]\" onclick=\"window.open(\'[{ $oCont->getLink()|oxaddparams:\"plain=1\"}]\', \'agb_popup\', \'resizable=yes,status=no,scrollbars=yes,menubar=no,width=620,height=400\');return false;\" class=\"fontunderline\">terms and conditions</a> apply.&nbsp;\r\n[{/oxifcontent}]\r\n[{oxifcontent ident=\"oxrightofwithdrawal\" object=\"oCont\"}]\r\n    Read details about  <a id=\"test_OrderOpenWithdrawalBottom\" rel=\"nofollow\" href=\"[{ $oCont->getLink() }]\" onclick=\"window.open(\'[{ $oCont->getLink()|oxaddparams:\"plain=1\"}]\', \'rightofwithdrawal_popup\', \'resizable=yes,status=no,scrollbars=yes,menubar=no,width=620,height=400\');return false;\">right of withdrawal</a>.\r\n[{/oxifcontent}]',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_USERINFO',	'',	'2021-09-21 11:58:45'),
('220404cee0caf470e227c1c9f1ec4aL3',	'oxdownloadableproductsagreement',	1,	1,	0,	1,	1,	'',	'F√ºr digitale Inhalte',	'Ja, ich m√∂chte sofort Zugang zu dem digitalen Inhalt und wei√ü, dass mein Widerrufsrecht mit dem Zugang erlischt.',	'For the supply of digital content',	'I want immediate access to the digital content and I acknowledge that thereby I lose my right to cancel once the service has begun.',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_USERINFO',	'',	'2021-09-21 11:58:45'),
('220404cee0caf470e227c1c9f1ec4aL4',	'oxserviceproductsagreement',	1,	1,	0,	1,	1,	'',	'F√ºr Dienstleistungen',	'Ja, bitte beginnen Sie sofort mit der Dienstleistung. Mein Widerrufsrecht erlischt mit vollst√§ndiger Ausf√ºhrung.',	'For service contracts',	'I agree to the starting of the service and I acknowledge that I lose my right to cancel once the service has been fully performed.',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_USERINFO',	'',	'2021-09-21 11:58:45'),
('29142e76dd32dd477.41262508',	'oxforgotpwd',	1,	1,	0,	1,	1,	'',	'Passwort vergessen',	'Sollten Sie innerhalb der n√§chsten Minuten KEINE E-Mail mit Ihren Zugangsdaten erhalten, so √ºberpr√ºfen Sie bitte: Haben Sie sich in unserem Shop bereits registriert? Wenn nicht, so tun Sie dies bitte einmalig im Rahmen des Bestellprozesses. Sie k√∂nnen dann selbst ein Passwort festlegen. Sobald Sie registriert sind, k√∂nnen Sie sich in Zukunft mit Ihrer E-Mail-Adresse und Ihrem Passwort einloggen.\r\n<ul>\r\n<li class=\"font11\">Wenn Sie sich sicher sind, dass Sie sich in unserem Shop bereits registriert haben, dann √ºberpr√ºfen Sie bitte, ob Sie sich bei der Eingabe Ihrer E-Mail-Adresse evtl. vertippt haben.</li></ul>\r\n<p>Sollten Sie trotz korrekter E-Mail-Adresse und bereits bestehender Registrierung weiterhin Probleme mit dem Login haben und auch keine \"Passwort vergessen\"-E-Mail erhalten, so wenden Sie sich bitte per E-Mail an: <a href=\"mailto:[{ $oxcmp_shop->oxshops__oxinfoemail->value }]?subject=Passwort\"><strong>[{ $oxcmp_shop->oxshops__oxinfoemail->value }]</strong></a></p>',	'Forgot password',	'<p>If you don\'t get an e-mail with your access data, please make sure that you have already registered with us. As soon as you are registered, you can login with your e-mail address and your password.</p>\r\n<ul>\r\n<li>\r\nIf you are sure you are already registered, please check the e-mail address you entered as user name.</li></ul>\r\n<p>\r\nIn case you still have problems logging in, please turn to us by e-mail: <a href=\"mailto:[{ $oxcmp_shop->oxshops__oxinfoemail->value }]?subject=Password\"><strong>[{ $oxcmp_shop->oxshops__oxinfoemail->value }]</strong></a></p>',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_EMAILS',	'',	'2021-09-21 11:58:45'),
('2eb46767947d21851.22681675',	'oximpressum',	1,	1,	0,	1,	1,	'',	'Impressum',	'<p>F√ºgen Sie hier Ihre Anbieterkennzeichnung ein.</p>',	'About Us',	'<p>Add provider identification here.</p>',	1,	'',	'',	0,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_USERINFO',	'',	'2021-09-21 11:58:45'),
('2eb4676806a3d2e87.06076523',	'oxagb',	1,	1,	0,	1,	1,	'',	'AGB',	'<div><strong>AGB</strong></div>\r\n<div><strong>&nbsp;</strong></div>\r\n<div>F√ºgen Sie hier Ihre allgemeinen Gesch√§ftsbedingungen ein:</div>\r\n<div>&nbsp;</div>\r\n<div><span style=\"font-weight: bold\">Strukturvorschlag:</span><br>\r\n<br>\r\n<ol>\r\n<li>Geltungsbereich </li>\r\n<li>Vertragspartner </li>\r\n<li>Angebot und Vertragsschluss </li>\r\n<li>Widerrufsrecht, Widerrufsbelehrung, Widerrufsfolgen </li>\r\n<li>Preise und Versandkosten </li>\r\n<li>Lieferung </li>\r\n<li>Zahlung </li>\r\n<li>Eigentumsvorbehalt </li>\r\n<li>Gew√§hrleistung </li>\r\n<li>Weitere Informationen</li></ol></div>',	'Terms and Conditions',	'Insert your terms and conditions here.',	1,	'',	'',	0,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_USERINFO',	'1',	'2021-09-21 11:58:45'),
('3194668fde854d711.73798992',	'oxemailfooterplain',	1,	1,	0,	1,	1,	'',	'E-Mail Fu√ütext Plain',	'-- Bitte f√ºgen Sie hier Ihre vollst√§ndige Anbieterkennzeichnung ein.',	'E-mail footer plain',	'-- Please insert your imprint here.',	1,	'',	'',	0,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_EMAILS',	'',	'2021-09-21 11:58:45'),
('42e4667ffcf844be0.22563656',	'oxemailfooter',	1,	1,	0,	1,	1,	'',	'E-Mail Fu√ütext',	'<p align=\"left\">--</p>\r\n<p>Bitte f√ºgen Sie hier Ihre vollst√§ndige Anbieterkennzeichnung ein.</p>',	'E-mail footer',	'<p align=\"left\">--</p>\r\n<p>Please insert your imprint here</p>',	1,	'',	'',	0,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_EMAILS',	'',	'2021-09-21 11:58:45'),
('460273f2ae78b9c40c536a1c331317ee',	'oxregisterplainaltemail',	1,	1,	0,	1,	1,	'',	'Alternative E-Mail zur Registrierung PLAIN',	'Hallo [{ $user->oxuser__oxsal->value|oxmultilangsal }] [{ $user->oxuser__oxfname->getRawValue() }] [{ $user->oxuser__oxlname->getRawValue() }],\r\n\r\ndanke f√ºr die Registrierung im [{ $shop->oxshops__oxname->getRawValue() }]!\r\nVon jetzt an k√∂nnen Sie sich mit Ihrer E-Mail-Adresse [{ $user->oxuser__oxusername->value }].\r\n\r\nFolgen Sie diesem Link, um die Registrierung zu best√§tigen:\r\n[{ $oViewConf->getBaseDir() }]index.php?cl=register&fnc=confirmRegistration&uid=[{ $user->getUpdateId() }]&amp;lang=[{ $oViewConf->getActLanguageId() }]&shp=[{ $shop->oxshops__oxid->value }]\r\n\r\nSie k√∂nnen diesen Link in den n√§chsten [{ $user->getUpdateLinkTerm()/3600 }] Stunden verwenden.</p>\r\n\r\n\r\nIhr Team vom [{ $shop->oxshops__oxname->getRawValue() }]',	'Alternative Registration Email PLAIN',	'Hello, [{ $user->oxuser__oxsal->value|oxmultilangsal }] [{ $user->oxuser__oxfname->getRawValue() }] [{ $user->oxuser__oxlname->getRawValue() }],\r\n\r\nthanks for your registration at [{ $shop->oxshops__oxname->getRawValue() }]!\r\nFrom now on, you can log in with your email address [{ $user->oxuser__oxusername->value }].\r\n\r\nFollow this link to confirm your registration:\r\n[{ $oViewConf->getBaseDir() }]index.php?cl=register&fnc=confirmRegistration&uid=[{ $user->getUpdateId() }]&amp;lang=[{ $oViewConf->getActLanguageId() }]&shp=[{ $shop->oxshops__oxid->value }]\r\n\r\nYou can use this link within the next [{ $user->getUpdateLinkTerm()/3600 }] hours.<br />\r\n\r\n\r\nYour [{ $shop->oxshops__oxname->getRawValue() }] team',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_EMAILS',	'',	'2021-09-21 11:58:45'),
('460f3d25a752eeca8f8dbd66d04277c1',	'oxregisteraltemail',	1,	1,	0,	1,	1,	'',	'Alternative E-Mail zur Registrierung HTML',	'Hallo [{ $user->oxuser__oxsal->value|oxmultilangsal }] [{ $user->oxuser__oxfname->value }] [{ $user->oxuser__oxlname->value }], <br />\r\n<br />\r\n<p>\r\ndanke f√ºr die Registrierung im [{ $shop->oxshops__oxname->value }]!</p>\r\nVon jetzt an k√∂nnen Sie sich mit Ihrer E-Mail-Adresse <strong>[{ $user->oxuser__oxusername->value }]</strong>.<br />\r\n<br />\r\nFolgen Sie diesem Link, um die Registrierung zu best√§tigen:<br />\r\n<br /><a href=\"[{ $oViewConf->getBaseDir() }]index.php?cl=register&fnc=confirmRegistration&uid=[{ $user->getUpdateId() }]&amp;lang=[{ $oViewConf->getActLanguageId() }]&shp=[{ $shop->oxshops__oxid->value }]\">[{ $oViewConf->getBaseDir() }]index.php?cl=register&fnc=confirmRegistration&uid=[{ $user->getUpdateId()}]&amp;lang=[{ $oViewConf->getActLanguageId() }]&shp=[{ $shop->oxshops__oxid->value }]</a><br />\r\n<br />\r\nSie k√∂nnen diesen Link in den n√§chsten [{ $user->getUpdateLinkTerm()/3600 }] Stunden verwenden.<br />\r\n<br /><br />\r\nIhr Team vom [{ $shop->oxshops__oxname->value }]',	'Alternative Registration Email HTML',	'Hello, [{ $user->oxuser__oxsal->value|oxmultilangsal }] [{ $user->oxuser__oxfname->value }] [{ $user->oxuser__oxlname->value }], <br />\r\n<br />\r\nthanks for your registration at [{ $shop->oxshops__oxname->value }]!<br />\r\nFrom now on, you can log in with your email address <strong>[{ $user->oxuser__oxusername->value }]</strong>.<br />\r\n<br />\r\nFollow this link to confirm your registration:<br />\r\n<br /><a href=\"[{ $oViewConf->getBaseDir() }]index.php?cl=register&fnc=confirmRegistration&uid=[{ $user->getUpdateId() }]&amp;lang=[{ $oViewConf->getActLanguageId() }]&shp=[{ $shop->oxshops__oxid->value }]\">[{ $oViewConf->getBaseDir() }]index.php?cl=register&fnc=confirmRegistration&uid=[{ $user->getUpdateId()}]&amp;lang=[{ $oViewConf->getActLanguageId() }]&shp=[{ $shop->oxshops__oxid->value }]</a><br />\r\n<br />\r\nYou can use this link within the next [{ $user->getUpdateLinkTerm()/3600 }] hours.<br />\r\n<br />\r\n<br />\r\nYour [{ $shop->oxshops__oxname->value }] team',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_EMAILS',	'',	'2021-09-21 11:58:45'),
('4a63033aa27409f15484340011e74e55',	'oxcookiesexplanation',	1,	1,	0,	1,	1,	'',	'Cookies Explanation',	'Sie haben sich entschieden, keine Cookies von unserem Online-Shop zu akzeptieren. Die Cookies wurden gel√∂scht. Sie k√∂nnen in den Einstellungen Ihres Browsers die Verwendung von Cookies deaktivieren und den Online-Shop mit einigen funktionellen Einschr√§nkungen nutzen. Sie k√∂nnen auch zur√ºck zum Shop gehen, ohne die Einstellungen zu √§ndern, und den vollen Funktionsumfang des Online-Shops genie√üen.<br />\r\n<br />Informationen zu Cookies auf Wikipedia: <a href=\"http://de.wikipedia.org/wiki/HTTP-Cookie\"><strong>http://de.wikipedia.org/wiki/HTTP-Cookie</strong></a>',	'Cookies Explanation',	'You have decided to not accept cookies from our online shop. The cookies have been removed. You can deactivate the usage of cookies in the settings of your browser and visit the online shop with some functional limitations. You can also return to the shop without changing the browser settings and enjoy the full functionality.<br />\r\n<br />Information about cookies at Wikipedia: <a href=\"http://en.wikipedia.org/wiki/HTTP_cookie\"><strong>http://en.wikipedia.org/wiki/HTTP_cookie</strong></a>',	0,	'',	'',	0,	'',	'',	'30e44ab83fdee7564.23264141',	'',	'',	'2021-09-21 11:58:45'),
('67c5bcf75ee346bd9566bce6c8',	'oxcredits',	1,	0,	3,	0,	1,	'',	'Credits',	'',	'Credits',	'<h3>What is OXID eShop?</h3>\r\n<p>OXID eShop is a proven and flexible shopping cart software. Thousands of online businesses worldwide use its extensive functionality to create optimal e-commerce solutions. With its modular, state-of-the-art and standards-based architecture, customization is very easy. OXID eShop is being developed by <a href=\"http://www.oxid-esales.com\">OXID eSales AG</a>, the trusted Open Source e-commerce company.</p>\r\n<h3>OXID eShop Community Edition</h3>\r\n<p>The Community Edition of OXID eShop is distributed under the terms and conditions of the GNU General Public License version 3 (GPLv3). Briefly summarized, the GPL gives you the right to use, modify and share this copy of OXID eShop. If you choose to share OXID eShop, you may only share it under the terms and conditions of the GPL. If you share a modified version of OXID eShop, these modifications must also be placed under the GPL. Read the complete <a href=\"http://www.gnu.org/licenses/gpl.txt\">legal terms and conditions of the GPL</a> or see <a href=\"http://www.oxid-esales.com/en/products/community-edition/gpl-v3-faq\">OXID\'s GPLv3 FAQ</a>.</p>\r\n<h3>OXID eShop Professional and Enterprise Edition</h3>\r\n<p>These OXID eShop editions are distributed under OXID Commercial Licenses. For more information, please <a href=\"http://www.oxid-esales.com/en/company/about-oxid-esales/contact\">contact OXID eSales</a>.</p>\r\n<h3>Third-party Software</h3>\r\n<p>This product includes certain free/open source software. A <a href=\"http://www.oxid-esales.com/en/company/about-oxid-esales/third-party-licenses\">complete list of third-party software included in OXID eShop</a> is publicly available.</p>\r\n<h3>Copyright Notice</h3>\r\n<p>Copyright ¬© 2003-2013 <a href=\"http://www.oxid-esales.com\">OXID eSales AG</a>, with portions copyright by other parties.</p>\r\n\r\n\r\n<!-- added by Marco //-->\r\n\r\n\r\n<h3>List of Contributions</h3>\r\n<ul>\r\n   <li><b>Downloadable Products</b>\r\n   <br>Some business models are based on downloadable virtual products like software, PDF or MP3 files instead of the classic shipment of products purchased in an online store. Please find more information on <a href=\"https://oxidforge.org/en/downloadable-products.html\" target=\"_blank\">OXIDforge</a>.\r\n   <br>contributed by <a href=\"http://www.marmalade.de\" target=\"_blank\">marmalade.de</a>\r\n   </li>\r\n\r\n\r\n   <li><b>Rich Snippets: RDFa + GoodRelations</b>\r\n   <br>We are convinced that the RDFa + GoodRelations vocabulary will be the future of rich snippets, especially for e-commerce. Please find more information on <a href=\"\" target=\"_blank\">OXIDforge</a>.\r\n   <br>contributed by Daniel Bingel and Prof. Dr. Hepp <a href=\"http://www.heppnetz.de/projects/goodrelations/\" target=\"_blank\">(GoodRelations)</a>.\r\n   </li>\r\n\r\n\r\n <li><b>GitHub contributions</b><br>\r\n Since May 2013 we switched our infrastructure in order to receive pull requests on <a href=\"https://github.com/OXID-eSales/oxideshop_ce/\" target=\"_blank\">GitHub</a>. Please see the <a href=\"https://www.ohloh.net/p/oxideshop/contributors/summary\" target=\"_blank\">list of contributors</a> for more information on who gratefully helped us to make OXID eShop even better.\r\n</li>  \r\n\r\n\r\n</ul>',	1,	'',	'',	0,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_USERINFO',	'',	'2021-09-21 11:58:45'),
('84a42e66105998a86.14045828',	'oxuserorderemailend',	1,	1,	0,	1,	1,	'',	'Ihre Bestellung Abschluss',	'<div align=\"left\">F√ºgen Sie hier Ihre Widerrufsbelehrung ein.</div>',	'your order terms',	'<p>Right to Withdrawal can be inserted here.</p>',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_EMAILS',	'',	'2021-09-21 11:58:45'),
('84a42e66123887821.29772527',	'oxuserorderemailendplain',	1,	1,	0,	1,	1,	'',	'Ihre Bestellung Abschluss Plain',	'F√ºgen Sie hier Ihre Widerrufsbelehrung ein.',	'your order terms plain',	'<p>Right to Withdrawal can be inserted here.</p>',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_EMAILS',	'',	'2021-09-21 11:58:45'),
('8709e45f31a86909e9f999222e80b1d0',	'oxstdfooter',	1,	1,	0,	1,	1,	'',	'Standard Footer',	'<div>OXID Online Shop - Alles rund um das Thema Wassersport, Sportbekleidung und Mode </div>',	'standard footer',	'<div>OXID Online Shop - All about watersports, sportswear and fashion </div>',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'',	'',	'2021-09-21 11:58:45'),
('ad542e49541c1add',	'oxupdatepassinfoemail',	1,	1,	0,	1,	1,	'',	'Ihr Passwort im eShop',	'Hallo [{ $user->oxuser__oxsal->value|oxmultilangsal }] [{ $user->oxuser__oxfname->value }] [{ $user->oxuser__oxlname->value }],\r\n<br /><br />\r\n√∂ffnen Sie den folgenden Link, um ein neues Passwort f√ºr [{ $shop->oxshops__oxname->value }] einzurichten:\r\n<br /><br />\r\n<a href=\"[{ $oViewConf->getBaseDir() }]index.php?cl=forgotpwd&amp;uid=[{ $user->getUpdateId() }]&amp;lang=[{ $oViewConf->getActLanguageId() }]&amp;shp=[{ $shop->oxshops__oxid->value }]\">[{ $oViewConf->getBaseDir() }]index.php?cl=forgotpwd&amp;uid=[{ $user->getUpdateId()}]&amp;lang=[{ $oViewConf->getActLanguageId() }]&amp;shp=[{ $shop->oxshops__oxid->value }]</a>\r\n<br /><br />\r\nDiesen Link k√∂nnen Sie innerhalb der n√§chsten [{ $user->getUpdateLinkTerm()/3600 }] Stunden aufrufen.\r\n<br /><br />\r\nIhr [{ $shop->oxshops__oxname->value }] Team\r\n<br />',	'password update info',	'Hello [{ $user->oxuser__oxsal->value|oxmultilangsal }] [{ $user->oxuser__oxfname->value }] [{ $user->oxuser__oxlname->value }],<br />\r\n<br />\r\nfollow this link to generate a new password for [{ $shop->oxshops__oxname->value }]:<br />\r\n<br /><a href=\"[{ $oViewConf->getBaseDir() }]index.php?cl=forgotpwd&amp;uid=[{ $user->getUpdateId() }]&amp;lang=[{ $oViewConf->getActLanguageId() }]&amp;shp=[{ $shop->oxshops__oxid->value }]\">[{ $oViewConf->getBaseDir() }]index.php?cl=forgotpwd&amp;uid=[{ $user->getUpdateId()}]&amp;lang=[{ $oViewConf->getActLanguageId() }]&amp;shp=[{ $shop->oxshops__oxid->value }]</a><br />\r\n<br />\r\nYou can use this link within the next [{ $user->getUpdateLinkTerm()/3600 }] hours.<br />\r\n<br />\r\nYour [{ $shop->oxshops__oxname->value }] team<br />',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_EMAILS',	'',	'2021-09-21 11:58:45'),
('ad542e495c392c6e',	'oxupdatepassinfoplainemail',	1,	1,	0,	1,	1,	'',	'Ihr Passwort im eShop Plain',	'Hallo [{ $user->oxuser__oxsal->value|oxmultilangsal }] [{ $user->oxuser__oxfname->getRawValue() }] [{ $user->oxuser__oxlname->getRawValue() }],\r\n\r\n√∂ffnen Sie den folgenden Link, um ein neues Passwort f√ºr [{ $shop->oxshops__oxname->getRawValue() }] einzurichten:\r\n\r\n[{ $oViewConf->getBaseDir() }]index.php?cl=forgotpwd&amp;uid=[{ $user->getUpdateId()}]&amp;lang=[{ $oViewConf->getActLanguageId() }]&amp;shp=[{ $shop->oxshops__oxid->value }]\r\n\r\nDiesen Link k√∂nnen Sie innerhalb der n√§chsten [{ $user->getUpdateLinkTerm()/3600 }] Stunden aufrufen.\r\n\r\nIhr [{ $shop->oxshops__oxname->getRawValue() }] Team',	'password update info plain',	'Hello [{ $user->oxuser__oxsal->value|oxmultilangsal }] [{ $user->oxuser__oxfname->getRawValue() }] [{ $user->oxuser__oxlname->getRawValue() }],\r\n\r\nfollow this link to generate a new password for [{ $shop->oxshops__oxname->getRawValue() }]:\r\n\r\n[{ $oViewConf->getBaseDir() }]index.php?cl=forgotpwd&amp;uid=[{ $user->getUpdateId()}]&amp;lang=[{ $oViewConf->getActLanguageId() }]&amp;shp=[{ $shop->oxshops__oxid->value }]\r\n\r\nYou can use this link within the next [{ $user->getUpdateLinkTerm()/3600 }] hours.\r\n\r\nYour [{ $shop->oxshops__oxname->getRawValue() }] team',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_EMAILS',	'',	'2021-09-21 11:58:45'),
('ad542e49975709a72.52261121',	'oxnewsletteremail',	1,	1,	0,	1,	1,	'',	'Newsletter eShop',	'Hallo, [{ $user->oxuser__oxsal->value|oxmultilangsal }] [{ $user->oxuser__oxfname->value }] [{ $user->oxuser__oxlname->value }],<br>\r\nvielen Dank f√ºr Ihre Anmeldung zu unserem Newsletter.<br>\r\n<br>\r\nUm den Newsletter freizuschalten klicken Sie bitte auf folgenden Link:<br>\r\n<br>\r\n<a href=\"[{$subscribeLink}]\">[{$subscribeLink}]</a><br>\r\n<br>\r\nIhr [{ $shop->oxshops__oxname->value }] Team<br>',	'newsletter confirmation',	'Hello, [{ $user->oxuser__oxsal->value|oxmultilangsal }] [{ $user->oxuser__oxfname->value }] [{ $user->oxuser__oxlname->value }],<br>\r\nthank you for your newsletter subscription.<br>\r\n<br>\r\nFor final registration, please click on this link:<br>\r\n<br>\r\n<a href=\"[{$subscribeLink}]\">[{$subscribeLink}]</a><br>\r\n<br>\r\nYour [{ $shop->oxshops__oxname->value }] Team<br>',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_EMAILS',	'',	'2021-09-21 11:58:45'),
('ad542e4999ec01dd3.07214049',	'oxnewsletterplainemail',	1,	1,	0,	1,	1,	'',	'Newsletter eShop Plain',	'[{ $shop->oxshops__oxname->getRawValue() }] Newsletter Hallo, [{ $user->oxuser__oxsal->value|oxmultilangsal }] [{ $user->oxuser__oxfname->getRawValue() }] [{ $user->oxuser__oxlname->getRawValue() }], vielen Dank f√ºr Ihre Anmeldung zu unserem Newsletter. Um den Newsletter freizuschalten klicken Sie bitte auf folgenden Link: [{$subscribeLink}] Ihr [{ $shop->oxshops__oxname->getRawValue() }] Team',	'newsletter confirmation plain',	'[{ $shop->oxshops__oxname->getRawValue() }] Newsletter \r\n\r\nHello, [{ $user->oxuser__oxsal->value|oxmultilangsal }] [{ $user->oxuser__oxfname->getRawValue() }] [{ $user->oxuser__oxlname->getRawValue() }], \r\n\r\nthank you for your newsletter subscription. For final registration, please click on this link: \r\n[{$subscribeLink}] \r\n\r\nYour [{ $shop->oxshops__oxname->getRawValue() }] Team',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_EMAILS',	'',	'2021-09-21 11:58:45'),
('ad542e49ae50c60f0.64307543',	'oxuserorderemail',	1,	1,	0,	1,	1,	'',	'Ihre Bestellung',	'Vielen Dank f√ºr Ihre Bestellung!<br>\r\n<br>\r\nNachfolgend haben wir zur Kontrolle Ihre Bestellung noch einmal aufgelistet.<br>\r\nBei Fragen sind wir jederzeit f√ºr Sie da: Schreiben Sie einfach an [{ $shop->oxshops__oxorderemail->value }]!<br>\r\n<br>',	'your order',	'Thank you for your order!<br />\r\n<br />\r\nBelow, we have listed your order.<br />\r\nIf you have any questions, don\'t hesitate to drop us an e-mail [{ $shop->oxshops__oxorderemail->value }]!<br />\r\n<br />',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_EMAILS',	'',	'2021-09-21 11:58:45'),
('ad542e49b08c65017.19848749',	'oxuserorderplainemail',	1,	1,	0,	1,	1,	'',	'Ihre Bestellung Plain',	'Vielen Dank f√ºr Ihre Bestellung!\r\n\r\nNachfolgend haben wir zur Kontrolle Ihre Bestellung noch einmal aufgelistet.\r\nBei Fragen sind wir jederzeit f√ºr Sie da: Schreiben Sie einfach an [{ $shop->oxshops__oxorderemail->value }]!',	'your order plain',	'Thank you for your order!\r\n\r\nBelow we have listed your order.\r\nIf you have any questions, don\'t hesitate to drop us an e-mail [{ $shop->oxshops__oxorderemail->value }]!',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_EMAILS',	'',	'2021-09-21 11:58:45'),
('ad542e49bff479009.64538090',	'oxadminorderemail',	1,	1,	0,	1,	1,	'',	'Ihre Bestellung Admin',	'Folgende Artikel wurden soeben unter [{ $shop->oxshops__oxname->value }] bestellt:<br>\r\n<br>',	'your order admin',	'The following products have been ordered in [{ $shop->oxshops__oxname->value }] right now:<br>\r\n<br>',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_EMAILS',	'',	'2021-09-21 11:58:45'),
('ad542e49c19109ad6.04198712',	'oxadminorderplainemail',	1,	1,	0,	1,	1,	'',	'Ihre Bestellung Admin Plain',	'<p>Folgende Artikel wurden soeben unter [{ $shop->oxshops__oxname->getRawValue() }] bestellt:</p>',	'your order admin plain',	'The following products have been ordered in [{ $shop->oxshops__oxname->getRawValue() }] right now:',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_EMAILS',	'',	'2021-09-21 11:58:45'),
('ad542e49c585394e4.36951640',	'oxpricealarmemail',	1,	1,	0,	1,	1,	'',	'Preisalarm',	'Preisalarm im [{ $shop->oxshops__oxname->value }]!<br>\r\n<br>\r\n[{ $email }] bietet f√ºr Artikel [{ $product->oxarticles__oxtitle->value }], Artnum. [{ $product->oxarticles__oxartnum->value }]<br>\r\n<br>\r\nOriginalpreis: [{ $product->getFPrice() }] [{ $currency->name}]<br>\r\nGEBOTEN: [{ $bidprice }] [{ $currency->name}]<br>\r\n<br>\r\n<br>\r\nIhr Shop.<br>',	'price alert',	'Price alert at [{ $shop->oxshops__oxname->value }]!<br>\r\n<br>\r\n[{ $email }] bids for product [{ $product->oxarticles__oxtitle->value }], product # [{ $product->oxarticles__oxartnum->value }]<br>\r\n<br>\r\nOriginal price: [{ $currency->name}][{ $product->getFPrice() }]<br>\r\nBid: [{ $currency->name}][{ $bidprice }]<br>\r\n<br>\r\n<br>\r\nYour store<br>',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_EMAILS',	'',	'2021-09-21 11:58:45'),
('ad542e49c8ec04201.39247735',	'oxregisteremail',	1,	1,	0,	1,	1,	'',	'Vielen Dank f√ºr Ihre Registrierung',	'Hallo, [{ $user->oxuser__oxsal->value|oxmultilangsal }] [{ $user->oxuser__oxfname->value }] [{ $user->oxuser__oxlname->value }], vielen Dank f√ºr Ihre Registrierung bei [{ $shop->oxshops__oxname->value }]!<br>\r\n<br>\r\nSie k√∂nnen sich ab sofort auch mit Ihrer E-Mail-Adresse <strong>[{ $user->oxuser__oxusername->value }]</strong> einloggen.<br>\r\n<br>\r\nIhr [{ $shop->oxshops__oxname->value }] Team<br>',	'thanks for your registration',	'Hello, [{ $user->oxuser__oxsal->value|oxmultilangsal }] [{ $user->oxuser__oxfname->value }] [{ $user->oxuser__oxlname->value }], <br />\r\n<br />\r\n<p>\r\nthank you for your registration at [{ $shop->oxshops__oxname->value }]!</p>\r\nFrom now on, you can log in with your email address <strong>[{ $user->oxuser__oxusername->value }]</strong>.<br />\r\n<br />\r\nYour [{ $shop->oxshops__oxname->value }] team<br />',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_EMAILS',	'',	'2021-09-21 11:58:45'),
('ad542e49ca4750015.09588134',	'oxregisterplainemail',	1,	1,	0,	1,	1,	'',	'Vielen Dank f√ºr Ihre Registrierung Plain',	'<p>[{ $shop->oxshops__oxregistersubject->getRawValue() }] Hallo, [{ $user->oxuser__oxsal->value|oxmultilangsal }] [{ $user->oxuser__oxfname->getRawValue() }] [{ $user->oxuser__oxlname->getRawValue() }], vielen Dank f√ºr Ihre Registrierung bei [{ $shop->oxshops__oxname->getRawValue() }]! Sie k√∂nnen sich ab sofort auch mit Ihrer E-Mail-Adresse ([{ $user->oxuser__oxusername->value }]) einloggen. Ihr [{ $shop->oxshops__oxname->getRawValue() }] Team</p>',	'thanks for your registration plain',	'<p>Hello, [{ $user->oxuser__oxsal->value|oxmultilangsal }] [{ $user->oxuser__oxfname->getRawValue() }] [{ $user->oxuser__oxlname->getRawValue() }],\r\n\r\nthank you for your registration at [{ $shop->oxshops__oxname->getRawValue() }]!\r\nFrom now on, you can log in with your email address [{ $user->oxuser__oxusername->value }].\r\n\r\nYour [{ $shop->oxshops__oxname->getRawValue() }] team</p>',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_EMAILS',	'',	'2021-09-21 11:58:45'),
('ad542e49d6de4a4f4.88594616',	'oxordersendemail',	1,	1,	0,	1,	1,	'',	'Ihre Bestellung wurde versandt',	'Guten Tag, [{ $order->oxorder__oxbillsal->value|oxmultilangsal }] [{ $order->oxorder__oxbillfname->value }] [{ $order->oxorder__oxbilllname->value }],<br>\r\n<br>\r\nunser Vertriebszentrum hat soeben folgende Artikel versandt.<br>\r\n<br>',	'your order has been shipped',	'Hello [{ $order->oxorder__oxbillsal->value|oxmultilangsal }] [{ $order->oxorder__oxbillfname->value }] [{ $order->oxorder__oxbilllname->value }],<br />\r\n<br />\r\n<p>\r\nour distribution center just shipped this product:</p><br />',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_EMAILS',	'',	'2021-09-21 11:58:45'),
('ad542e49d856b5b68.98220446',	'oxordersendplainemail',	1,	1,	0,	1,	1,	'',	'Ihre Bestellung wurde versandt Plain',	'Guten Tag [{ $order->oxorder__oxbillsal->value|oxmultilangsal }] [{ $order->oxorder__oxbillfname->getRawValue() }] [{ $order->oxorder__oxbilllname->getRawValue() }],\r\n\r\nunser Vertriebszentrum hat soeben folgende Artikel versandt.',	'your order has been shipped plain',	'<p>Hello [{ $order->oxorder__oxbillsal->value|oxmultilangsal }] [{ $order->oxorder__oxbillfname->getRawValue() }] [{ $order->oxorder__oxbilllname->getRawValue() }],\r\n\r\nour distribution center just shipped this product:</p>',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_EMAILS',	'',	'2021-09-21 11:58:45'),
('c4241316b2e5c1966.96997011',	'oxhelpalist',	1,	1,	0,	1,	1,	'',	'Hilfe - Die Produktliste',	'<p>Hier k√∂nnen zus√§tzliche Informationen, weiterf√ºhrende Links, Bedienungshinweise etc. f√ºr die Hilfe-Funktion in den <em>Produktlisten</em> eingef√ºgt werden. </p>',	'Help - Product List',	'<p>Here, you can insert additional information, further links, user manual etc. for the &quot;Help&quot;-function on <em>product pages</em>.</p>',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_USERINFO',	'',	'2021-09-21 11:58:45'),
('c4241316b2e5c1966.96997012',	'oxhelpdefault',	1,	1,	0,	1,	1,	'',	'Hilfe - Main',	'<p>Hier k√∂nnen zus√§tzliche Informationen, weiterf√ºhrende Links, Bedienungshinweise etc. f√ºr die Hilfe-Funktion in der <em>Kategorieansicht</em> eingef√ºgt werden. </p>',	'Help - Main',	'<p>Here, you can insert additional information, further links, user manual etc. for the &quot;Help&quot;-function on <em>category pages</em>.</p>',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_USERINFO',	'',	'2021-09-21 11:58:45'),
('c4241316b2e5c1966.96997013',	'oxhelpstart',	1,	1,	0,	1,	1,	'',	'Hilfe - Die Startseite',	'<p>Hier k√∂nnen zus√§tzliche Informationen, weiterf√ºhrende Links, Bedienungshinweise etc. f√ºr die Hilfe-Funktion auf der <em>Startseite</em> eingef√ºgt werden. </p>\r\n<p>&nbsp;</p>',	'Help - Start page',	'<p>Here, you can insert additional information, further links, user manual etc. for the &quot;Help&quot;-function on the <em>start page</em>.</p><br />',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_USERINFO',	'',	'2021-09-21 11:58:45'),
('c4241316c6e7b9503.93160420',	'oxbargain',	1,	1,	0,	1,	1,	'',	'Angebot der Woche',	'<table>[{foreach from=$oView->getBargainArticleList() item=articlebargain_item}] <tbody><tr><td>\r\n<div class=\"product_image_s_container\"><a href=\"[{$articlebargain_item->getLink()}]\"><img border=\"0\" alt=\"[{ $articlebargain_item->oxarticles__oxtitle->value }][{if $articlebargain_item->oxarticles__oxvarselect->value }] [{ $articlebargain_item->oxarticles__oxvarselect->value }][{/if}] [{$oxcmp_shop->oxshops__oxtitlesuffix->value}]\" src=\"[{ $articlebargain_item->getDynImageDir()}]/[{$articlebargain_item->oxarticles__oxicon->value}]\"></a></div> </td><td class=\"boxrightproduct-td\"> <a href=\"[{$articlebargain_item->getLink()}]\" class=\"boxrightproduct-td\"><strong>[{ $articlebargain_item->oxarticles__oxtitle->value|cat:\"\r\n\"|cat:$articlebargain_item->oxarticles__oxvarselect->value|strip_tags|smartwordwrap:15:\"<br>\r\n\":2:1:\"...\" }]</strong></a><br>\r\n [{ if $articlebargain_item->isBuyable() }] <a href=\"[{$articlebargain_item->getToBasketLink()}]&amp;am=1\" class=\"details\" onclick=\"showBasketWnd();\" rel=\"nofollow\"><img border=\"0\" src=\"[{$oViewConf->getImageUrl(\'arrow_details.gif\')}]\" alt=\"\"> Jetzt bestellen! </a> [{/if}] </td></tr>[{/foreach}]\r\n</tbody></table>',	'Week\'s Special',	'<table>[{foreach from=$oView->getBargainArticleList() item=articlebargain_item}] <tbody><tr><td>\r\n<div class=\"product_image_s_container\"><a href=\"[{$articlebargain_item->getLink()}]\"><img border=\"0\" src=\"[{ $articlebargain_item->getDynImageDir()}]/[{$articlebargain_item->oxarticles__oxicon->value}]\" alt=\"[{ $articlebargain_item->oxarticles__oxtitle->value }][{if $articlebargain_item->oxarticles__oxvarselect->value }] [{ $articlebargain_item->oxarticles__oxvarselect->value }][{/if}] [{$oxcmp_shop->oxshops__oxtitlesuffix->value}]\"></a></div> </td><td class=\"boxrightproduct-td\"> <a class=\"boxrightproduct-td\" href=\"[{$articlebargain_item->getLink()}]\"><strong>[{ $articlebargain_item->oxarticles__oxtitle->value|cat:\"\r\n\"|cat:$articlebargain_item->oxarticles__oxvarselect->value|strip_tags|smartwordwrap:15:\"<br>\r\n \":2:1:\"...\" }]</strong></a><br>\r\n [{ if $articlebargain_item->isBuyable()}] <a onclick=\"showBasketWnd();\" class=\"details\" href=\"[{$articlebargain_item->getToBasketLink()}]&amp;am=1\" rel=\"nofollow\"><img border=\"0\" alt=\"\" src=\"[{$oViewConf->getImageUrl(\'arrow_details.gif\')}]\"> Order now! </a> [{/if}] </td></tr>[{/foreach}] </tbody></table>',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_EMAILS',	'',	'2021-09-21 11:58:45'),
('c8d45408c08bbaf79.09887022',	'oxuserordernpemail',	1,	1,	0,	1,	1,	'',	'Ihre Bestellung (Fremdl√§nder)',	'<div>Vielen Dank f√ºr Ihre Bestellung!</div>\r\n<p><strong><span style=\"color: #ff0000\">Hinweis:</span></strong> Derzeit ist uns keine Versandmethode f√ºr dieses Land bekannt. Wir werden versuchen, Versandmethoden zu finden und Sie √ºber das Ergebnis unter Angabe der Versandkosten informieren. </p>Bei Fragen sind wir jederzeit f√ºr Sie da: Schreiben Sie einfach an [{ $shop->oxshops__oxorderemail->value }]! <br />\r\n<br />',	'your order (other country)',	'<p>Thank you for your order!</p>\r\n<p><strong><span style=\"color: #ff0000\">Information:</span></strong> Currently, there is no shipping method defined for your country. We will find a method to deliver the goods you purchased and will inform you as soon as possible.</p>\r\n<p>If you have any requests, don\'t hesitate to contact us! [{ $shop->oxshops__oxorderemail->value }]</p>',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_EMAILS',	'',	'2021-09-21 11:58:45'),
('c8d45408c4998f421.15746968',	'oxadminordernpemail',	1,	1,	0,	1,	1,	'',	'Ihre Bestellung Admin (Fremdl√§nder)',	'<div>\r\n<p> <span style=\"color: #ff0000;\"><strong>Hinweis:</strong></span> Derzeit ist keine Liefermethode f√ºr dieses Land bekannt. Bitte Lieferm√∂glichkeiten suchen und den Besteller unter Angabe der <strong>Lieferkosten</strong> informieren!\r\n&nbsp;</p> </div>\r\n<div>Folgende Artikel wurden soeben unter [{ $shop->oxshops__oxname->value }] bestellt:<br>\r\n<br>\r\n</div>',	'your order admin (other country)',	'<p> <span style=\"color: #ff0000\"><strong>Information:</strong></span> Currently, there is no shipping method defined for this country. Please find a delivery option and inform the customer about the <strong>shipping costs</strong>.</p>\r\n<p>The following products have been ordered on [{ $shop->oxshops__oxname->value }]:<br />\r\n<br /></p>',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_EMAILS',	'',	'2021-09-21 11:58:45'),
('c8d45408c5c39ea22.75925645',	'oxuserordernpplainemail',	1,	1,	0,	1,	1,	'',	'Ihre Bestellung (Fremdl√§nder) Plain',	'Vielen Dank f√ºr Ihre Bestellung!\r\n\r\nHinweis: Derzeit ist uns keine Versandmethode f√ºr dieses Land bekannt. Wir werden versuchen, Versandmethoden zu finden und Sie √ºber das Ergebnis unter Angabe der Versandkosten informieren.\r\n\r\nBei Fragen sind wir jederzeit f√ºr Sie da: Schreiben Sie einfach an [{ $shop->oxshops__oxorderemail->value }]!',	'your order plain (other country)',	'Thank you for your order!\r\nInformation: Currently, there is no shipping method defined for your country. We will find a method to deliver the goods you purchased and will inform you as soon as possible.\r\n\r\nIf you have any requests don\'t hesitate to contact us! [{ $shop->oxshops__oxorderemail->value }]',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_EMAILS',	'',	'2021-09-21 11:58:45'),
('c8d45408c718782f3.21298666',	'oxadminordernpplainemail',	1,	1,	0,	1,	1,	'',	'Ihre Bestellung Admin (Fremdl√§nder) Plain',	'Hinweis: Derzeit ist keine Liefermethode f√ºr dieses Land bekannt. Bitte Lieferm√∂glichkeiten suchen und den Besteller informieren!\r\n\r\nFolgende Artikel wurden soeben unter [{ $shop->oxshops__oxname->getRawValue() }] bestellt:',	'your order admin plain (other country)',	'<p>Information: Currently, there is no shipping method defined for this country. Please find a delivery option and inform the customer about the shipping costs.\r\n\r\nThe following products have been ordered on [{ $shop->oxshops__oxname->getRawValue() }]:</p>',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_EMAILS',	'',	'2021-09-21 11:58:45'),
('ce77743c334edf92b0cab924a7',	'oxstartmetakeywords',	1,	1,	0,	1,	1,	'',	'META Keywords Startseite',	'kite, kites, kiteboarding, kiteboards, wakeboarding, wakeboards, boards, strand, sommer, wassersport, mode, fashion, style, shirts, jeans, accessoires, angebote',	'META keywords start page',	'kite, kites, kiteboarding, kiteboards, wakeboarding, wakeboards, boards, beach, summer, watersports, funsports, fashion, style, shirts, jeans, accessories, special offers',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'',	'',	'2021-09-21 11:58:45'),
('ce79015b6f6f07612270975889',	'oxstartmetadescription',	1,	1,	0,	1,	1,	'',	'META Description Startseite',	'Alles zum Thema Wassersport, Sportbekleidung und Mode. Umfangreiches Produktsortiment mit den neusten Trendprodukten. Blitzschneller Versand.<br />',	'META description start page',	'<p>All about watersports, sportswear and fashion. Extensive product range including several trendy products. Fast shipping.</p>\r\n<p>&nbsp;</p>',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'',	'',	'2021-09-21 11:58:45'),
('d0f7ac8b29909908dc20d854224944fe',	'oxnopaymentmethod',	1,	1,	0,	1,	1,	'',	'No payment method text',	'<p>Derzeit ist keine Versandart f√ºr dieses Land\r\ndefiniert.</p>\r\n<p>Wir werden versuchen, Lieferm√∂glichkeiten zu\r\nfinden und Sie √ºber die Versandkosten informieren.</p>',	'No payment method text',	'<p>Currently we have no shipping method set up\r\nfor this country.</p>\r\n<p>We are aiming to find a possible delivery\r\nmethod and we will inform you as soon as possible via e-mail about the result,\r\nincluding further information about delivery costs.</p>',	0,	'',	'',	0,	'',	'',	'30e44ab83fdee7564.23264141',	'',	'',	'2021-09-21 11:58:45'),
('d74fdc1ed22a0d469bdcc5f003ca6575',	'oxregistrationdescription',	1,	1,	0,	1,	1,	'',	'Registration Description',	'<p>Mit einem pers√∂nlichen Kundenkonto haben Sie folgende Vorteile:<br />\r\n - Verwaltung der Lieferadressen<br />\r\n - Pr√ºfung des Bestellstatus<br />\r\n - Bestellhistorie<br />\r\n - pers√∂nlicher Merkzettel<br />\r\n - pers√∂nliche Wunschliste<br />\r\n - Newsletter-Verwaltung<br />\r\n - Sonder- und Rabattaktionen</p>',	'Registration Description',	'<p>A customer with an account has advantages like:<br />\r\n - Administration of shipping addresses<br />\r\n - Check order status<br />\r\n - Order History<br />\r\n - Personal Wish List<br />\r\n - Personal Gift Registry<br />\r\n - Newsletter subscription<br />\r\n - Special offers and discounts</p>',	0,	'',	'',	0,	'',	'',	'30e44ab83fdee7564.23264141',	'',	'',	'2021-09-21 11:58:45'),
('f41427a07519469f1.34718981',	'oxdeliveryinfo',	1,	1,	0,	1,	1,	'',	'Zahlung und Lieferung',	'<p>F√ºgen Sie hier Ihre Versandinformationen und -kosten ein.</p>',	'Shipping and Charges',	'<p>Add your shipping information and costs here.</p>',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_USERINFO',	'',	'2021-09-21 11:58:45'),
('f41427a099a603773.44301043',	'oxsecurityinfo',	1,	1,	0,	1,	1,	'',	'Datenschutz',	'F√ºgen Sie hier Ihre Datenschutzbestimmungen ein.',	'Privacy Policy',	'Enter your privacy policy here.',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_USERINFO',	'',	'2021-09-21 11:58:45'),
('f41427a10afab8641.52768563',	'oxnewstlerinfo',	1,	1,	0,	1,	1,	'',	'Neuigkeiten bei uns',	'<div>Mit dem [{ $oxcmp_shop->oxshops__oxname->value }]-Newsletter alle paar Wochen. <br>\r\nMit Tipps, Infos, Aktionen ... <br>\r\n<br>\r\nDas Abo kann jederzeit durch Austragen der E-Mail-Adresse beendet werden. <br>\r\nEine <span class=\"newsletter_title\">Weitergabe Ihrer Daten an Dritte lehnen wir ab</span>. <br>\r\n<br>\r\nSie bekommen zur Best√§tigung nach dem Abonnement eine E-Mail - so stellen wir sicher, dass kein Unbefugter Sie in unseren Newsletter eintragen kann (sog. \"Double Opt-In\").<br>\r\n<br>\r\n</div>',	'newsletter info',	'<p>Stay in touch with the periodic [{ $oxcmp_shop->oxshops__oxname->value }]-newsletter every couple of weeks. We gladly inform you about recent tips, promotions and new products.</p>\r\n<p>You can unsubscribe any time from the newsletter.</p>\r\n<p>We strictly refuse <span class=\"newsletter_title\">transferring your data to 3rd parties</span>.</p>\r\n<p>For subscription we use the so called &quot;double opt-in&quot; procedure to guarantee that no unauthorized person will register with your e-mail address.</p>',	1,	'',	'',	1,	'',	'',	'30e44ab83fdee7564.23264141',	'CMSFOLDER_USERINFO',	'',	'2021-09-21 11:58:45');

DROP TABLE IF EXISTS `oxcounters`;
CREATE TABLE `oxcounters` (
  `OXIDENT` char(32) NOT NULL COMMENT 'Counter id',
  `OXCOUNT` int(11) NOT NULL COMMENT 'Counted number',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXIDENT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shop counters';


DROP TABLE IF EXISTS `oxcountry`;
CREATE TABLE `oxcountry` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Country id',
  `OXACTIVE` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Active',
  `OXTITLE` varchar(128) NOT NULL DEFAULT '' COMMENT 'Title (multilanguage)',
  `OXISOALPHA2` char(2) NOT NULL DEFAULT '' COMMENT 'ISO 3166-1 alpha-2',
  `OXISOALPHA3` char(3) NOT NULL DEFAULT '' COMMENT 'ISO 3166-1 alpha-3',
  `OXUNNUM3` char(3) NOT NULL DEFAULT '' COMMENT 'ISO 3166-1 numeric',
  `OXVATINPREFIX` char(2) NOT NULL DEFAULT '' COMMENT 'VAT identification number prefix',
  `OXORDER` int(11) NOT NULL DEFAULT '9999' COMMENT 'Sorting',
  `OXSHORTDESC` varchar(255) NOT NULL DEFAULT '' COMMENT 'Short description (multilanguage)',
  `OXLONGDESC` varchar(255) NOT NULL DEFAULT '' COMMENT 'Long description (multilanguage)',
  `OXTITLE_1` varchar(128) NOT NULL DEFAULT '',
  `OXTITLE_2` varchar(128) NOT NULL DEFAULT '',
  `OXTITLE_3` varchar(128) NOT NULL DEFAULT '',
  `OXSHORTDESC_1` varchar(255) NOT NULL DEFAULT '',
  `OXSHORTDESC_2` varchar(255) NOT NULL DEFAULT '',
  `OXSHORTDESC_3` varchar(255) NOT NULL DEFAULT '',
  `OXLONGDESC_1` varchar(255) NOT NULL,
  `OXLONGDESC_2` varchar(255) NOT NULL,
  `OXLONGDESC_3` varchar(255) NOT NULL,
  `OXVATSTATUS` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Vat status: 0 - Do not bill VAT, 1 - Do not bill VAT only if provided valid VAT ID',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXACTIVE` (`OXACTIVE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Countries list';

INSERT INTO `oxcountry` (`OXID`, `OXACTIVE`, `OXTITLE`, `OXISOALPHA2`, `OXISOALPHA3`, `OXUNNUM3`, `OXVATINPREFIX`, `OXORDER`, `OXSHORTDESC`, `OXLONGDESC`, `OXTITLE_1`, `OXTITLE_2`, `OXTITLE_3`, `OXSHORTDESC_1`, `OXSHORTDESC_2`, `OXSHORTDESC_3`, `OXLONGDESC_1`, `OXLONGDESC_2`, `OXLONGDESC_3`, `OXVATSTATUS`, `OXTIMESTAMP`) VALUES
('2db455824e4a19cc7.14731328',	0,	'Anderes Land',	'',	'',	'',	'',	10000,	'',	'Select this if you can not find your country.',	'Other country',	'',	'',	'',	'',	'',	'Select this if you can not find your country.',	'',	'',	0,	'2021-09-21 11:58:45'),
('56d308a822c18e106.3ba59048',	0,	'Montenegro',	'ME',	'MNE',	'499',	'ME',	9999,	'Rest Europa',	'',	'Montenegro',	'',	'',	'Rest Europe',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('56d308a822c18e106.3ba59099',	0,	'Guernsey',	'GG',	'GGY',	'831',	'GG',	9999,	'Rest Welt',	'',	'Guernsey',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095306451.36998225',	0,	'Afghanistan',	'AF',	'AFG',	'4',	'AF',	9999,	'Rest Welt',	'',	'Afghanistan',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110953265a5.25286134',	0,	'Albanien',	'AL',	'ALB',	'8',	'AL',	9999,	'Rest Europa',	'',	'Albania',	'',	'',	'Rest Europe',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109533b943.50287900',	0,	'Algerien',	'DZ',	'DZA',	'12',	'DZ',	9999,	'Rest Welt',	'',	'Algeria',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109533b943.50287999',	0,	'S√ºdgeorgien und die S√ºdlichen Sandwichinseln',	'GS',	'SGS',	'239',	'GS',	9999,	'Rest Welt',	'',	'South Georgia and The South Sandwich Islands',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109534f8c7.80349931',	0,	'Amerikanisch Samoa',	'AS',	'ASM',	'16',	'AS',	9999,	'Rest Welt',	'',	'American Samoa',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095363464.89657222',	0,	'Andorra',	'AD',	'AND',	'20',	'AD',	9999,	'Europa',	'',	'Andorra',	'',	'',	'Europe',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095377d33.28678901',	0,	'Angola',	'AO',	'AGO',	'24',	'AO',	9999,	'Rest Welt',	'',	'Angola',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095392e41.74397491',	0,	'Anguilla',	'AI',	'AIA',	'660',	'AI',	9999,	'Rest Welt',	'',	'Anguilla',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110953a8d10.29474848',	0,	'Antarktis',	'AQ',	'ATA',	'10',	'AQ',	9999,	'Rest Welt',	'',	'Antarctica',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110953be8f2.56248134',	0,	'Antigua und Barbuda',	'AG',	'ATG',	'28',	'AG',	9999,	'Rest Welt',	'',	'Antigua and Barbuda',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110953d2fb0.54260547',	0,	'Argentinien',	'AR',	'ARG',	'32',	'AR',	9999,	'Rest Welt',	'',	'Argentina',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110953e7993.88180360',	0,	'Armenien',	'AM',	'ARM',	'51',	'AM',	9999,	'Rest Europa',	'',	'Armenia',	'',	'',	'Rest Europe',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110953facc6.31621036',	0,	'Aruba',	'AW',	'ABW',	'533',	'AW',	9999,	'Rest Welt',	'',	'Aruba',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095410f38.37165361',	0,	'Australien',	'AU',	'AUS',	'36',	'AU',	9999,	'Rest Welt',	'',	'Australia',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109543cf47.17877015',	0,	'Aserbaidschan',	'AZ',	'AZE',	'31',	'AZ',	9999,	'Rest Welt',	'',	'Azerbaijan',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095451379.72078871',	0,	'Bahamas',	'BS',	'BHS',	'44',	'BS',	9999,	'Rest Welt',	'',	'Bahamas',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110954662e3.27051654',	0,	'Bahrain',	'BH',	'BHR',	'48',	'BH',	9999,	'Welt',	'',	'Bahrain',	'',	'',	'World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109547ae49.60154431',	0,	'Bangladesch',	'BD',	'BGD',	'50',	'BD',	9999,	'Rest Welt',	'',	'Bangladesh',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095497083.21181725',	0,	'Barbados',	'BB',	'BRB',	'52',	'BB',	9999,	'Rest Welt',	'',	'Barbados',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110954ac5b9.63105203',	0,	'Wei√ürussland',	'BY',	'BLR',	'112',	'BY',	9999,	'Rest Europa',	'',	'Belarus',	'',	'',	'Rest Europe',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110954d3621.45362515',	0,	'Belize',	'BZ',	'BLZ',	'84',	'BZ',	9999,	'Rest Welt',	'',	'Belize',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110954ea065.41455848',	0,	'Benin',	'BJ',	'BEN',	'204',	'BJ',	9999,	'Rest Welt',	'',	'Benin',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110954fee13.50011948',	0,	'Bermuda',	'BM',	'BMU',	'60',	'BM',	9999,	'Rest Welt',	'',	'Bermuda',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095513ca0.75349731',	0,	'Bhutan',	'BT',	'BTN',	'64',	'BT',	9999,	'Rest Welt',	'',	'Bhutan',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109552aee2.91004965',	0,	'Bolivien',	'BO',	'BOL',	'68',	'BO',	9999,	'Rest Welt',	'',	'Bolivia',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109553f902.06960438',	0,	'Bosnien und Herzegowina',	'BA',	'BIH',	'70',	'BA',	9999,	'Rest Europa',	'',	'Bosnia and Herzegovina',	'',	'',	'Rest Europe',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095554834.54199483',	0,	'Botsuana',	'BW',	'BWA',	'72',	'BW',	9999,	'Rest Welt',	'',	'Botswana',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109556dd57.84292282',	0,	'Bouvetinsel',	'BV',	'BVT',	'74',	'BV',	9999,	'Rest Welt',	'',	'Bouvet Island',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095592407.89986143',	0,	'Brasilien',	'BR',	'BRA',	'76',	'BR',	9999,	'Rest Welt',	'',	'Brazil',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110955a7644.68859180',	0,	'Britisches Territorium im Indischen Ozean',	'IO',	'IOT',	'86',	'IO',	9999,	'Rest Welt',	'',	'British Indian Ocean Territory',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110955bde61.63256042',	0,	'Brunei Darussalam',	'BN',	'BRN',	'96',	'BN',	9999,	'Rest Welt',	'',	'Brunei Darussalam',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110955d3260.55487539',	0,	'Bulgarien',	'BG',	'BGR',	'100',	'BG',	9999,	'Rest Europa',	'',	'Bulgaria',	'',	'',	'Rest Europe',	'',	'',	'',	'',	'',	1,	'2021-09-21 11:58:45'),
('8f241f110955ea7c8.36762654',	0,	'Burkina Faso',	'BF',	'BFA',	'854',	'BF',	9999,	'Rest Welt',	'',	'Burkina Faso',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110956004d5.11534182',	0,	'Burundi',	'BI',	'BDI',	'108',	'BI',	9999,	'Rest Welt',	'',	'Burundi',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110956175f9.81682035',	0,	'Kambodscha',	'KH',	'KHM',	'116',	'KH',	9999,	'Rest Welt',	'',	'Cambodia',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095632828.20263574',	0,	'Kamerun',	'CM',	'CMR',	'120',	'CM',	9999,	'Rest Welt',	'',	'Cameroon',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095649d18.02676059',	0,	'Kanada',	'CA',	'CAN',	'124',	'CA',	9999,	'Welt',	'',	'Canada',	'',	'',	'World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109565e671.48876354',	0,	'Kap Verde',	'CV',	'CPV',	'132',	'CV',	9999,	'Rest Welt',	'',	'Cape Verde',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095673248.50405852',	0,	'Kaimaninseln',	'KY',	'CYM',	'136',	'KY',	9999,	'Rest Welt',	'',	'Cayman Islands',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109568a509.03566030',	0,	'Zentralafrikanische Republik',	'CF',	'CAF',	'140',	'CF',	9999,	'Rest Welt',	'',	'Central African Republic',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109569d4c2.42800039',	0,	'Tschad',	'TD',	'TCD',	'148',	'TD',	9999,	'Rest Welt',	'',	'Chad',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110956b3ea7.11168270',	0,	'Chile',	'CL',	'CHL',	'152',	'CL',	9999,	'Rest Welt',	'',	'Chile',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110956c8860.37981845',	0,	'China',	'CN',	'CHN',	'156',	'CN',	9999,	'Rest Welt',	'',	'China',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110956df6b2.52283428',	0,	'Weihnachtsinsel',	'CX',	'CXR',	'162',	'CX',	9999,	'Rest Welt',	'',	'Christmas Island',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110956f54b4.26327849',	0,	'Kokosinseln (Keelinginseln)',	'CC',	'CCK',	'166',	'CC',	9999,	'Rest Welt',	'',	'Cocos (Keeling) Islands',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109570a1e3.69772638',	0,	'Kolumbien',	'CO',	'COL',	'170',	'CO',	9999,	'Rest Welt',	'',	'Colombia',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109571f018.46251535',	0,	'Komoren',	'KM',	'COM',	'174',	'KM',	9999,	'Rest Welt',	'',	'Comoros',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095732184.72771986',	0,	'Kongo',	'CG',	'COG',	'178',	'CG',	9999,	'Rest Welt',	'',	'Congo',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095746a92.94878441',	0,	'Cookinseln',	'CK',	'COK',	'184',	'CK',	9999,	'Rest Welt',	'',	'Cook Islands',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109575d708.20084150',	0,	'Costa Rica',	'CR',	'CRI',	'188',	'CR',	9999,	'Rest Welt',	'',	'Costa Rica',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109575d708.20084199',	0,	'Kongo, Dem. Rep.',	'CD',	'COD',	'180',	'CD',	9999,	'Rest Welt',	'',	'Congo, The Democratic Republic Of The',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095771f76.87904122',	0,	'Cote d≈ΩIvoire',	'CI',	'CIV',	'384',	'CI',	9999,	'Rest Welt',	'',	'Cote d\'Ivoire',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095789a04.65154246',	0,	'Kroatien',	'HR',	'HRV',	'191',	'HR',	9999,	'Rest Europ√§ische Union',	'',	'Croatia',	'',	'',	'Rest of EU',	'',	'',	'',	'',	'',	1,	'2021-09-21 11:58:45'),
('8f241f1109579ef49.91803242',	0,	'Kuba',	'CU',	'CUB',	'192',	'CU',	9999,	'Rest Welt',	'',	'Cuba',	'',	'',	'World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110957b6896.52725150',	0,	'Zypern',	'CY',	'CYP',	'196',	'CY',	9999,	'Rest Europa',	'',	'Cyprus',	'',	'',	'Rest Europe',	'',	'',	'',	'',	'',	1,	'2021-09-21 11:58:45'),
('8f241f110957cb457.97820918',	0,	'Tschechische Republik',	'CZ',	'CZE',	'203',	'CZ',	9999,	'Europa',	'',	'Czech Republic',	'',	'',	'Europe',	'',	'',	'',	'',	'',	1,	'2021-09-21 11:58:45'),
('8f241f110957e6ef8.56458418',	0,	'D√§nemark',	'DK',	'DNK',	'208',	'DK',	9999,	'Europa',	'',	'Denmark',	'',	'',	'Europe',	'',	'',	'',	'',	'',	1,	'2021-09-21 11:58:45'),
('8f241f110957fd356.02918645',	0,	'Dschibuti',	'DJ',	'DJI',	'262',	'DJ',	9999,	'Rest Welt',	'',	'Djibouti',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095811ea5.84717844',	0,	'Dominica',	'DM',	'DMA',	'212',	'DM',	9999,	'Rest Welt',	'',	'Dominica',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095825bf2.61063355',	0,	'Dominikanische Republik',	'DO',	'DOM',	'214',	'DO',	9999,	'Rest Welt',	'',	'Dominican Republic',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095839323.86755169',	0,	'Timor-Leste',	'TL',	'TLS',	'626',	'TL',	9999,	'Rest Welt',	'',	'Timor-Leste',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109584d512.06663789',	0,	'Ecuador',	'EC',	'ECU',	'218',	'EC',	9999,	'Rest Welt',	'',	'Ecuador',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095861fb7.55278256',	0,	'√Ñgypten',	'EG',	'EGY',	'818',	'EG',	9999,	'Welt',	'',	'Egypt',	'',	'',	'World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110958736a9.06061237',	0,	'El Salvador',	'SV',	'SLV',	'222',	'SV',	9999,	'Rest Welt',	'',	'El Salvador',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109588d077.74284490',	0,	'√Ñquatorialguinea',	'GQ',	'GNQ',	'226',	'GQ',	9999,	'Rest Welt',	'',	'Equatorial Guinea',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110958a2216.38324531',	0,	'Eritrea',	'ER',	'ERI',	'232',	'ER',	9999,	'Rest Welt',	'',	'Eritrea',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110958b69e4.93886171',	0,	'Estland',	'EE',	'EST',	'233',	'EE',	9999,	'Rest Europ√§ische Union',	'',	'Estonia',	'',	'',	'Rest of EU',	'',	'',	'',	'',	'',	1,	'2021-09-21 11:58:45'),
('8f241f110958caf67.08982313',	0,	'√Ñthiopien',	'ET',	'ETH',	'210',	'ET',	9999,	'Rest Welt',	'',	'Ethiopia',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110958e2cc3.90770249',	0,	'Falklandinseln (Malwinen)',	'FK',	'FLK',	'238',	'FK',	9999,	'Rest Welt',	'',	'Falkland Islands (Malvinas)',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110958f7ba4.96908065',	0,	'F√§r√∂er',	'FO',	'FRO',	'234',	'FO',	9999,	'Rest Welt',	'',	'Faroe Islands',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109590d226.07938729',	0,	'Fidschi',	'FJ',	'FJI',	'242',	'FJ',	9999,	'Rest Welt',	'',	'Fiji',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109594fcb1.79441780',	0,	'Franz√∂sisch Guiana',	'GF',	'GUF',	'254',	'GF',	9999,	'Rest Welt',	'',	'French Guiana',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110959636f5.71476354',	0,	'Franz√∂sisch-Polynesien',	'PF',	'PYF',	'258',	'PF',	9999,	'Rest Welt',	'',	'French Polynesia',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110959784a3.34264829',	0,	'Franz√∂sische S√ºdgebiete',	'TF',	'ATF',	'260',	'TF',	9999,	'Rest Welt',	'',	'French Southern Territories',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095994cb6.59353392',	0,	'Gabun',	'GA',	'GAB',	'266',	'GA',	9999,	'Rest Welt',	'',	'Gabon',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110959ace77.17379319',	0,	'Gambia',	'GM',	'GMB',	'270',	'GM',	9999,	'Rest Welt',	'',	'Gambia',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110959c2341.01830199',	0,	'Georgien',	'GE',	'GEO',	'268',	'GE',	9999,	'Rest Europa',	'',	'Georgia',	'',	'',	'Rest Europe',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110959e96b3.05752152',	0,	'Ghana',	'GH',	'GHA',	'288',	'GH',	9999,	'Rest Welt',	'',	'Ghana',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110959fdde0.68919405',	0,	'Gibraltar',	'GI',	'GIB',	'292',	'GI',	9999,	'Rest Welt',	'',	'Gibraltar',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095a29f47.04102343',	0,	'Gr√∂nland',	'GL',	'GRL',	'304',	'GL',	9999,	'Europa',	'',	'Greenland',	'',	'',	'Europe',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095a3f195.88886789',	0,	'Grenada',	'GD',	'GRD',	'308',	'GD',	9999,	'Rest Welt',	'',	'Grenada',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095a52578.45413493',	0,	'Guadeloupe',	'GP',	'GLP',	'312',	'GP',	9999,	'Rest Welt',	'',	'Guadeloupe',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095a717b3.68126681',	0,	'Guam',	'GU',	'GUM',	'316',	'GU',	9999,	'Rest Welt',	'',	'Guam',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095a870a5.42235635',	0,	'Guatemala',	'GT',	'GTM',	'320',	'GT',	9999,	'Rest Welt',	'',	'Guatemala',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095a9bf82.19989557',	0,	'Guinea',	'GN',	'GIN',	'324',	'GN',	9999,	'Rest Welt',	'',	'Guinea',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095ab2b56.83049280',	0,	'Guinea-Bissau',	'GW',	'GNB',	'624',	'GW',	9999,	'Rest Welt',	'',	'Guinea-Bissau',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095ac9d30.56640429',	0,	'Guyana',	'GY',	'GUY',	'328',	'GY',	9999,	'Rest Welt',	'',	'Guyana',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095aebb06.34405179',	0,	'Haiti',	'HT',	'HTI',	'332',	'HT',	9999,	'Rest Welt',	'',	'Haiti',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095aff2c3.98054755',	0,	'Heard Insel und McDonald Inseln',	'HM',	'HMD',	'334',	'HM',	9999,	'Rest Welt',	'',	'Heard Island And Mcdonald Islands',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095b13f57.56022305',	0,	'Honduras',	'HN',	'HND',	'340',	'HN',	9999,	'Rest Welt',	'',	'Honduras',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095b29021.49657118',	0,	'Hong Kong',	'HK',	'HKG',	'344',	'HK',	9999,	'Rest Welt',	'',	'Hong Kong',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095b3e016.98213173',	0,	'Ungarn',	'HU',	'HUN',	'348',	'HU',	9999,	'Rest Europa',	'',	'Hungary',	'',	'',	'Rest Europe',	'',	'',	'',	'',	'',	1,	'2021-09-21 11:58:45'),
('8f241f11095b55846.26192602',	0,	'Island',	'IS',	'ISL',	'352',	'IS',	9999,	'Rest Europa',	'',	'Iceland',	'',	'',	'Rest Europe',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095b6bb86.01364904',	0,	'Indien',	'IN',	'IND',	'356',	'IN',	9999,	'Rest Welt',	'',	'India',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095b80526.59927631',	0,	'Indonesien',	'ID',	'IDN',	'360',	'ID',	9999,	'Rest Welt',	'',	'Indonesia',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095b94476.05195832',	0,	'Iran',	'IR',	'IRN',	'364',	'IR',	9999,	'Welt',	'',	'Iran',	'',	'',	'World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095bad5b2.42645724',	0,	'Irak',	'IQ',	'IRQ',	'368',	'IQ',	9999,	'Welt',	'',	'Iraq',	'',	'',	'World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095bd65e1.59459683',	0,	'Israel',	'IL',	'ISR',	'376',	'IL',	9999,	'Rest Europa',	'',	'Israel',	'',	'',	'Rest Europe',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095bfe834.63390185',	0,	'Jamaika',	'JM',	'JAM',	'388',	'JM',	9999,	'Rest Welt',	'',	'Jamaica',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095c11d43.73419747',	0,	'Japan',	'JP',	'JPN',	'392',	'JP',	9999,	'Rest Welt',	'',	'Japan',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095c2b304.75906962',	0,	'Jordanien',	'JO',	'JOR',	'400',	'JO',	9999,	'Rest Welt',	'',	'Jordan',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095c3e2d1.36714463',	0,	'Kasachstan',	'KZ',	'KAZ',	'398',	'KZ',	9999,	'Rest Europa',	'',	'Kazakhstan',	'',	'',	'Rest Europe',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095c5b8e8.66333679',	0,	'Kenia',	'KE',	'KEN',	'404',	'KE',	9999,	'Rest Welt',	'',	'Kenya',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095c6e184.21450618',	0,	'Kiribati',	'KI',	'KIR',	'296',	'KI',	9999,	'Rest Welt',	'',	'Kiribati',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095c87284.37982544',	0,	'Nordkorea',	'KP',	'PRK',	'408',	'KP',	9999,	'Rest Welt',	'',	'North Korea',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095c9de64.01275726',	0,	'S√ºdkorea',	'KR',	'KOR',	'410',	'KR',	9999,	'Rest Welt',	'',	'South Korea',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095cb1546.46652174',	0,	'Kuwait',	'KW',	'KWT',	'414',	'KW',	9999,	'Welt',	'',	'Kuwait',	'',	'',	'World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095cc7ef5.28043767',	0,	'Kirgisistan',	'KG',	'KGZ',	'417',	'KG',	9999,	'Rest Welt',	'',	'Kyrgyzstan',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095cdccd5.96388808',	0,	'Laos',	'LA',	'LAO',	'418',	'LA',	9999,	'Rest Welt',	'',	'Laos',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095cf2ea6.73925511',	0,	'Lettland',	'LV',	'LVA',	'428',	'LV',	9999,	'Rest Europ√§ische Union',	'',	'Latvia',	'',	'',	'Rest of EU',	'',	'',	'',	'',	'',	1,	'2021-09-21 11:58:45'),
('8f241f11095d07d87.58986129',	0,	'Libanon',	'LB',	'LBN',	'422',	'LB',	9999,	'Welt',	'',	'Lebanon',	'',	'',	'World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095d1c9b2.21548132',	0,	'Lesotho',	'LS',	'LSO',	'426',	'LS',	9999,	'Rest Welt',	'',	'Lesotho',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095d2fd28.91858908',	0,	'Liberia',	'LR',	'LBR',	'430',	'LR',	9999,	'Welt',	'',	'Liberia',	'',	'',	'World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095d46188.64679605',	0,	'Libyen',	'LY',	'LBY',	'434',	'LY',	9999,	'Rest Welt',	'',	'Libya',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095d6ffa8.86593236',	0,	'Litauen',	'LT',	'LTU',	'440',	'LT',	9999,	'Rest Europ√§ische Union',	'',	'Lithuania',	'',	'',	'Rest of EU',	'',	'',	'',	'',	'',	1,	'2021-09-21 11:58:45'),
('8f241f11095d9c1b2.13577033',	0,	'Macao',	'MO',	'MAC',	'446',	'MO',	9999,	'Rest Welt',	'',	'Macao',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095db2291.58912887',	0,	'Mazedonien',	'MK',	'MKD',	'807',	'MK',	9999,	'Rest Europa',	'',	'Macedonia',	'',	'',	'Rest Europe',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095dccf17.06266806',	0,	'Madagaskar',	'MG',	'MDG',	'450',	'MG',	9999,	'Rest Welt',	'',	'Madagascar',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095de2119.60795833',	0,	'Malawi',	'MW',	'MWI',	'454',	'MW',	9999,	'Rest Welt',	'',	'Malawi',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095df78a8.44559506',	0,	'Malaysia',	'MY',	'MYS',	'458',	'MY',	9999,	'Rest Welt',	'',	'Malaysia',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095e0c6c9.43746477',	0,	'Malediven',	'MV',	'MDV',	'462',	'MV',	9999,	'Rest Welt',	'',	'Maldives',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095e24006.17141715',	0,	'Mali',	'ML',	'MLI',	'466',	'ML',	9999,	'Rest Welt',	'',	'Mali',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095e36eb3.69050509',	0,	'Malta',	'MT',	'MLT',	'470',	'MT',	9999,	'Rest Welt',	'',	'Malta',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	1,	'2021-09-21 11:58:45'),
('8f241f11095e4e338.26817244',	0,	'Marshallinseln',	'MH',	'MHL',	'584',	'MH',	9999,	'Rest Welt',	'',	'Marshall Islands',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095e631e1.29476484',	0,	'Martinique',	'MQ',	'MTQ',	'474',	'MQ',	9999,	'Rest Welt',	'',	'Martinique',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095e7bff9.09518271',	0,	'Mauretanien',	'MR',	'MRT',	'478',	'MR',	9999,	'Rest Welt',	'',	'Mauritania',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095e90a81.01156393',	0,	'Mauritius',	'MU',	'MUS',	'480',	'MU',	9999,	'Rest Welt',	'',	'Mauritius',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095ea6249.81474246',	0,	'Mayotte',	'YT',	'MYT',	'175',	'YT',	9999,	'Rest Welt',	'',	'Mayotte',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095ebf3a6.86388577',	0,	'Mexiko',	'MX',	'MEX',	'484',	'MX',	9999,	'Rest Welt',	'',	'Mexico',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095ed4902.49276197',	0,	'Mikronesien, F√∂derierte Staaten von',	'FM',	'FSM',	'583',	'FM',	9999,	'Rest Welt',	'',	'Micronesia, Federated States Of',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095ee9923.85175653',	0,	'Moldawien',	'MD',	'MDA',	'498',	'MD',	9999,	'Rest Europa',	'',	'Moldova',	'',	'',	'Rest Europe',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095f00d65.30318330',	0,	'Monaco',	'MC',	'MCO',	'492',	'MC',	9999,	'Europa',	'',	'Monaco',	'',	'',	'Europe',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095f160c9.41059441',	0,	'Mongolei',	'MN',	'MNG',	'496',	'MN',	9999,	'Rest Welt',	'',	'Mongolia',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11095f314f5.05830324',	0,	'Montserrat',	'MS',	'MSR',	'500',	'MS',	9999,	'Rest Welt',	'',	'Montserrat',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11096006828.49285591',	0,	'Marokko',	'MA',	'MAR',	'504',	'MA',	9999,	'Welt',	'',	'Morocco',	'',	'',	'World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109601b419.55269691',	0,	'Mosambik',	'MZ',	'MOZ',	'508',	'MZ',	9999,	'Rest Welt',	'',	'Mozambique',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11096030af5.65449043',	0,	'Myanmar',	'MM',	'MMR',	'104',	'MM',	9999,	'Rest Welt',	'',	'Myanmar',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11096046575.31382060',	0,	'Namibia',	'NA',	'NAM',	'516',	'NA',	9999,	'Rest Welt',	'',	'Namibia',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109605b1f4.20574895',	0,	'Nauru',	'NR',	'NRU',	'520',	'NR',	9999,	'Rest Welt',	'',	'Nauru',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109607a9e7.03486450',	0,	'Nepal',	'NP',	'NPL',	'524',	'NP',	9999,	'Rest Welt',	'',	'Nepal',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110960aeb64.09757010',	0,	'Niederl√§ndische Antillen',	'AN',	'ANT',	'530',	'AN',	9999,	'Rest Welt',	'',	'Netherlands Antilles',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110960c3e97.21901471',	0,	'Neukaledonien',	'NC',	'NCL',	'540',	'NC',	9999,	'Rest Welt',	'',	'New Caledonia',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110960d8e58.96466103',	0,	'Neuseeland',	'NZ',	'NZL',	'554',	'NZ',	9999,	'Rest Welt',	'',	'New Zealand',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110960ec345.71805056',	0,	'Nicaragua',	'NI',	'NIC',	'558',	'NI',	9999,	'Rest Welt',	'',	'Nicaragua',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11096101a79.70513227',	0,	'Niger',	'NE',	'NER',	'562',	'NE',	9999,	'Rest Welt',	'',	'Niger',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11096116744.92008092',	0,	'Nigeria',	'NG',	'NGA',	'566',	'NG',	9999,	'Rest Welt',	'',	'Nigeria',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109612dc68.63806992',	0,	'Niue',	'NU',	'NIU',	'570',	'NU',	9999,	'Rest Welt',	'',	'Niue',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110961442c2.82573898',	0,	'Norfolkinsel',	'NF',	'NFK',	'574',	'NF',	9999,	'Rest Welt',	'',	'Norfolk Island',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11096162678.71164081',	0,	'N√∂rdliche Marianen',	'MP',	'MNP',	'580',	'MP',	9999,	'Rest Welt',	'',	'Northern Mariana Islands',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11096176795.61257067',	0,	'Norwegen',	'NO',	'NOR',	'578',	'NO',	9999,	'Rest Europa',	'',	'Norway',	'',	'',	'Rest Europe',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109618d825.87661926',	0,	'Oman',	'OM',	'OMN',	'512',	'OM',	9999,	'Rest Welt',	'',	'Oman',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110961a2401.59039740',	0,	'Pakistan',	'PK',	'PAK',	'586',	'PK',	9999,	'Rest Welt',	'',	'Pakistan',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110961b7729.14290490',	0,	'Palau',	'PW',	'PLW',	'585',	'PW',	9999,	'Rest Welt',	'',	'Palau',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110961cc384.18166560',	0,	'Panama',	'PA',	'PAN',	'591',	'PA',	9999,	'Rest Welt',	'',	'Panama',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110961e3538.78435307',	0,	'Papua-Neuguinea',	'PG',	'PNG',	'598',	'PG',	9999,	'Rest Welt',	'',	'Papua New Guinea',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110961f9d61.52794273',	0,	'Paraguay',	'PY',	'PRY',	'600',	'PY',	9999,	'Rest Welt',	'',	'Paraguay',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109620b245.16261506',	0,	'Peru',	'PE',	'PER',	'604',	'PE',	9999,	'Rest Welt',	'',	'Peru',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109621faf8.40135556',	0,	'Philippinen',	'PH',	'PHL',	'608',	'PH',	9999,	'Rest Welt',	'',	'Philippines',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11096234d62.44125992',	0,	'Pitcairn',	'PN',	'PCN',	'612',	'PN',	9999,	'Rest Welt',	'',	'Pitcairn',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109624d3f8.50953605',	0,	'Polen',	'PL',	'POL',	'616',	'PL',	9999,	'Europa',	'',	'Poland',	'',	'',	'Europe',	'',	'',	'',	'',	'',	1,	'2021-09-21 11:58:45'),
('8f241f11096279a22.50582479',	0,	'Puerto Rico',	'PR',	'PRI',	'630',	'PR',	9999,	'Rest Welt',	'',	'Puerto Rico',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109628f903.51478291',	0,	'Katar',	'QA',	'QAT',	'634',	'QA',	9999,	'Rest Welt',	'',	'Qatar',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110962a3ec5.65857240',	0,	'R√©union',	'RE',	'REU',	'638',	'RE',	9999,	'Rest Welt',	'',	'R√©union',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110962c3007.60363573',	0,	'Rum√§nien',	'RO',	'ROU',	'642',	'RO',	9999,	'Rest Europa',	'',	'Romania',	'',	'',	'Rest Europe',	'',	'',	'',	'',	'',	1,	'2021-09-21 11:58:45'),
('8f241f110962e40e6.75062153',	0,	'Russische F√∂deration',	'RU',	'RUS',	'643',	'RU',	9999,	'Rest Europa',	'',	'Russian Federation',	'',	'',	'Rest Europe',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110962f8615.93666560',	0,	'Ruanda',	'RW',	'RWA',	'646',	'RW',	9999,	'Rest Welt',	'',	'Rwanda',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110963177a7.49289900',	0,	'St. Kitts und Nevis',	'KN',	'KNA',	'659',	'KN',	9999,	'Rest Welt',	'',	'Saint Kitts and Nevis',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109632fab4.68646740',	0,	'St. Lucia',	'LC',	'LCA',	'662',	'LC',	9999,	'Rest Welt',	'',	'Saint Lucia',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110963443c3.29598809',	0,	'St. Vincent und die Grenadinen',	'VC',	'VCT',	'670',	'VC',	9999,	'Rest Welt',	'',	'Saint Vincent and The Grenadines',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11096359986.06476221',	0,	'Samoa',	'WS',	'WSM',	'882',	'WS',	9999,	'Rest Welt',	'',	'Samoa',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11096375757.44126946',	0,	'San Marino',	'SM',	'SMR',	'674',	'SM',	9999,	'Europa',	'',	'San Marino',	'',	'',	'Europe',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109639b8c4.57484984',	0,	'Sao Tome und Principe',	'ST',	'STP',	'678',	'ST',	9999,	'Rest Welt',	'',	'Sao Tome and Principe',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110963b9b20.41500709',	0,	'Saudi-Arabien',	'SA',	'SAU',	'682',	'SA',	9999,	'Welt',	'',	'Saudi Arabia',	'',	'',	'World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110963d9962.36307144',	0,	'Senegal',	'SN',	'SEN',	'686',	'SN',	9999,	'Rest Welt',	'',	'Senegal',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110963f98d8.68428379',	0,	'Serbien',	'RS',	'SRB',	'688',	'RS',	9999,	'Rest Europa',	'',	'Serbia',	'',	'',	'Rest Europe',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11096418496.77253079',	0,	'Seychellen',	'SC',	'SYC',	'690',	'SC',	9999,	'Rest Welt',	'',	'Seychelles',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11096436968.69551351',	0,	'Sierra Leone',	'SL',	'SLE',	'694',	'SL',	9999,	'Rest Welt',	'',	'Sierra Leone',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11096456a48.79608805',	0,	'Singapur',	'SG',	'SGP',	'702',	'SG',	9999,	'Rest Welt',	'',	'Singapore',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109647a265.29938154',	0,	'Slowakei',	'SK',	'SVK',	'703',	'SK',	9999,	'Europa',	'',	'Slovakia',	'',	'',	'Europe',	'',	'',	'',	'',	'',	1,	'2021-09-21 11:58:45'),
('8f241f11096497149.85116254',	0,	'Slowenien',	'SI',	'SVN',	'705',	'SI',	9999,	'Rest Europa',	'',	'Slovenia',	'',	'',	'Rest Europe',	'',	'',	'',	'',	'',	1,	'2021-09-21 11:58:45'),
('8f241f110964b7bf9.49501835',	0,	'Salomonen',	'SB',	'SLB',	'90',	'SB',	9999,	'Rest Welt',	'',	'Solomon Islands',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110964d5f29.11398308',	0,	'Somalia',	'SO',	'SOM',	'706',	'SO',	9999,	'Rest Welt',	'',	'Somalia',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110964f2623.74976876',	0,	'S√ºdafrika',	'ZA',	'ZAF',	'710',	'ZA',	9999,	'Rest Welt',	'',	'South Africa',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11096531330.03198083',	0,	'Sri Lanka',	'LK',	'LKA',	'144',	'LK',	9999,	'Rest Welt',	'',	'Sri Lanka',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109654dca4.99466434',	0,	'Saint Helena',	'SH',	'SHN',	'654',	'SH',	9999,	'Rest Welt',	'',	'Saint Helena',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109656cde9.10816078',	0,	'Saint Pierre und Miquelon',	'PM',	'SPM',	'666',	'PM',	9999,	'Rest Welt',	'',	'Saint Pierre and Miquelon',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109658cbe5.08293991',	0,	'Sudan',	'SD',	'SDN',	'736',	'SD',	9999,	'Rest Welt',	'',	'Sudan',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110965c7347.75108681',	0,	'Suriname',	'SR',	'SUR',	'740',	'SR',	9999,	'Rest Welt',	'',	'Suriname',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110965eb7b7.26149742',	0,	'Svalbard und Jan Mayen',	'SJ',	'SJM',	'744',	'SJ',	9999,	'Rest Welt',	'',	'Svalbard and Jan Mayen',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109660c113.62780718',	0,	'Swasiland',	'SZ',	'SWZ',	'748',	'SZ',	9999,	'Rest Welt',	'',	'Swaziland',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109666b7f3.81435898',	0,	'Syrien',	'SY',	'SYR',	'760',	'SY',	9999,	'Rest Welt',	'',	'Syria',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11096687ec7.58824735',	0,	'Republik China (Taiwan)',	'TW',	'TWN',	'158',	'TW',	9999,	'Rest Welt',	'',	'Taiwan, Province of China',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110966a54d1.43798997',	0,	'Tadschikistan',	'TJ',	'TJK',	'762',	'TJ',	9999,	'Rest Welt',	'',	'Tajikistan',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110966c3a75.68297960',	0,	'Tansania',	'TZ',	'TZA',	'834',	'TZ',	9999,	'Rest Welt',	'',	'Tanzania',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11096707e08.60512709',	0,	'Thailand',	'TH',	'THA',	'764',	'TH',	9999,	'Rest Welt',	'',	'Thailand',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110967241e1.34925220',	0,	'Togo',	'TG',	'TGO',	'768',	'TG',	9999,	'Rest Welt',	'',	'Togo',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11096742565.72138875',	0,	'Tokelau',	'TK',	'TKL',	'772',	'TK',	9999,	'Rest Welt',	'',	'Tokelau',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11096762b31.03069244',	0,	'Tonga',	'TO',	'TON',	'776',	'TO',	9999,	'Rest Welt',	'',	'Tonga',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109677ed23.84886671',	0,	'Trinidad und Tobago',	'TT',	'TTO',	'780',	'TT',	9999,	'Rest Welt',	'',	'Trinidad and Tobago',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109679d988.46004322',	0,	'Tunesien',	'TN',	'TUN',	'788',	'TN',	9999,	'Welt',	'',	'Tunisia',	'',	'',	'World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110967bba40.88233204',	0,	'T√ºrkei',	'TR',	'TUR',	'792',	'TR',	9999,	'Rest Europa',	'',	'Turkey',	'',	'',	'Rest Europe',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110967d8f65.52699796',	0,	'Turkmenistan',	'TM',	'TKM',	'795',	'TM',	9999,	'Rest Welt',	'',	'Turkmenistan',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110967f73f8.13141492',	0,	'Turks- und Caicosinseln',	'TC',	'TCA',	'796',	'TC',	9999,	'Rest Welt',	'',	'Turks and Caicos Islands',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109680ec30.97426963',	0,	'Tuvalu',	'TV',	'TUV',	'798',	'TV',	9999,	'Rest Welt',	'',	'Tuvalu',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11096823019.47846368',	0,	'Uganda',	'UG',	'UGA',	'800',	'UG',	9999,	'Rest Welt',	'',	'Uganda',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110968391d2.37199812',	0,	'Ukraine',	'UA',	'UKR',	'804',	'UA',	9999,	'Rest Europa',	'',	'Ukraine',	'',	'',	'Rest Europe',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109684bf15.63071279',	0,	'Vereinigte Arabische Emirate',	'AE',	'ARE',	'784',	'AE',	9999,	'Rest Welt',	'',	'United Arab Emirates',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11096877ac0.98748826',	0,	'Vereinigte Staaten von Amerika',	'US',	'USA',	'840',	'US',	9999,	'Welt',	'',	'United States',	'',	'',	'World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:51'),
('8f241f11096894977.41239553',	0,	'United States Minor Outlying Islands',	'UM',	'UMI',	'581',	'UM',	9999,	'Rest Welt',	'',	'United States Minor Outlying Islands',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110968a7cc9.56710143',	0,	'Uruguay',	'UY',	'URY',	'858',	'UY',	9999,	'Rest Welt',	'',	'Uruguay',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110968a7cc9.56710199',	0,	'Saint-Barth√©lemy',	'BL',	'BLM',	'652',	'BL',	9999,	'Rest Welt',	'',	'Saint Barth√©lemy',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110968bec45.44161857',	0,	'Usbekistan',	'UZ',	'UZB',	'860',	'UZ',	9999,	'Rest Welt',	'',	'Uzbekistan',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110968d3f03.13630334',	0,	'Vanuatu',	'VU',	'VUT',	'548',	'VU',	9999,	'Rest Welt',	'',	'Vanuatu',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110968ebc30.63792746',	0,	'Heiliger Stuhl (Vatikanstadt)',	'VA',	'VAT',	'336',	'VA',	9999,	'Europa',	'',	'Holy See (Vatican City State)',	'',	'',	'Europe',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110968ebc30.63792799',	0,	'Pal√§stinische Gebiete',	'PS',	'PSE',	'275',	'PS',	9999,	'Rest Welt',	'',	'Palestinian Territory, Occupied',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11096902d92.14742486',	0,	'Venezuela',	'VE',	'VEN',	'862',	'VE',	9999,	'Rest Welt',	'',	'Venezuela',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11096919d00.92534927',	0,	'Vietnam',	'VN',	'VNM',	'704',	'VN',	9999,	'Rest Welt',	'',	'Vietnam',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109692fc04.15216034',	0,	'Britische Jungferninseln',	'VG',	'VGB',	'92',	'VG',	9999,	'Rest Welt',	'',	'Virgin Islands, British',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11096944468.61956573',	0,	'Amerikanische Jungferninseln',	'VI',	'VIR',	'850',	'VI',	9999,	'Rest Welt',	'',	'Virgin Islands, U.S.',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11096944468.61956599',	0,	'Jersey',	'JE',	'JEY',	'832',	'JE',	9999,	'Rest Welt',	'',	'Jersey',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110969598c8.76966113',	0,	'Wallis und Futuna',	'WF',	'WLF',	'876',	'WF',	9999,	'Rest Welt',	'',	'Wallis and Futuna',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f1109696e4e9.33006292',	0,	'Westsahara',	'EH',	'ESH',	'732',	'EH',	9999,	'Rest Welt',	'',	'Western Sahara',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11096982354.73448958',	0,	'Jemen',	'YE',	'YEM',	'887',	'YE',	9999,	'Rest Welt',	'',	'Yemen',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f11096982354.73448999',	0,	'Isle of Man',	'IM',	'IMN',	'833',	'IM',	9999,	'Rest Welt',	'',	'Isle Of Man',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110969c34a2.42564730',	0,	'Sambia',	'ZM',	'ZMB',	'894',	'ZM',	9999,	'Rest Welt',	'',	'Zambia',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('8f241f110969da699.04185888',	0,	'Simbabwe',	'ZW',	'ZWE',	'716',	'ZW',	9999,	'Rest Welt',	'',	'Zimbabwe',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('a7c40f631fc920687.20179984',	1,	'Deutschland',	'DE',	'DEU',	'276',	'DE',	9999,	'EU1',	'',	'Germany',	'',	'',	'EU1',	'',	'',	'',	'',	'',	1,	'2021-09-21 11:58:51'),
('a7c40f6320aeb2ec2.72885259',	0,	'√ñsterreich',	'AT',	'AUT',	'40',	'AT',	9999,	'EU1',	'',	'Austria',	'',	'',	'EU1',	'',	'',	'',	'',	'',	1,	'2021-09-21 11:58:51'),
('a7c40f6321c6f6109.43859248',	0,	'Schweiz',	'CH',	'CHE',	'756',	'CH',	9999,	'EU1',	'',	'Switzerland',	'',	'',	'EU1',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:51'),
('a7c40f6322d842ae3.83331920',	0,	'Liechtenstein',	'LI',	'LIE',	'438',	'LI',	9999,	'EU1',	'',	'Liechtenstein',	'',	'',	'EU1',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('a7c40f6323c4bfb36.59919433',	0,	'Italien',	'IT',	'ITA',	'380',	'IT',	9999,	'EU1',	'',	'Italy',	'',	'',	'EU1',	'',	'',	'',	'',	'',	1,	'2021-09-21 11:58:45'),
('a7c40f63264309e05.58576680',	0,	'Luxemburg',	'LU',	'LUX',	'442',	'LU',	9999,	'EU1',	'',	'Luxembourg',	'',	'',	'EU1',	'',	'',	'',	'',	'',	1,	'2021-09-21 11:58:45'),
('a7c40f63272a57296.32117580',	0,	'Frankreich',	'FR',	'FRA',	'250',	'FR',	9999,	'EU1',	'',	'France',	'',	'',	'EU1',	'',	'',	'',	'',	'',	1,	'2021-09-21 11:58:45'),
('a7c40f632848c5217.53322339',	0,	'Schweden',	'SE',	'SWE',	'752',	'SE',	9999,	'EU2',	'',	'Sweden',	'',	'',	'EU2',	'',	'',	'',	'',	'',	1,	'2021-09-21 11:58:45'),
('a7c40f63293c19d65.37472814',	0,	'Finnland',	'FI',	'FIN',	'246',	'FI',	9999,	'EU2',	'',	'Finland',	'',	'',	'EU2',	'',	'',	'',	'',	'',	1,	'2021-09-21 11:58:45'),
('a7c40f632a0804ab5.18804076',	0,	'Vereinigtes K√∂nigreich',	'GB',	'GBR',	'826',	'GB',	9999,	'EU2',	'',	'United Kingdom',	'',	'',	'EU2',	'',	'',	'',	'',	'',	1,	'2021-09-21 11:58:51'),
('a7c40f632a0804ab5.18804099',	0,	'√Öland Inseln',	'AX',	'ALA',	'248',	'AX',	9999,	'Rest Welt',	'',	'√Öland Islands',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('a7c40f632be4237c2.48517912',	0,	'Irland',	'IE',	'IRL',	'372',	'IE',	9999,	'EU2',	'',	'Ireland',	'',	'',	'EU2',	'',	'',	'',	'',	'',	1,	'2021-09-21 11:58:45'),
('a7c40f632cdd63c52.64272623',	0,	'Niederlande',	'NL',	'NLD',	'528',	'NL',	9999,	'EU2',	'',	'Netherlands',	'',	'',	'EU2',	'',	'',	'',	'',	'',	1,	'2021-09-21 11:58:45'),
('a7c40f632e04633c9.47194042',	0,	'Belgien',	'BE',	'BEL',	'56',	'BE',	9999,	'Rest Europ√§ische Union',	'',	'Belgium',	'',	'',	'Rest of EU',	'',	'',	'',	'',	'',	1,	'2021-09-21 11:58:45'),
('a7c40f632f65bd8e2.84963272',	0,	'Portugal',	'PT',	'PRT',	'620',	'PT',	9999,	'Rest Europ√§ische Union',	'',	'Portugal',	'',	'',	'Rest of EU',	'',	'',	'',	'',	'',	1,	'2021-09-21 11:58:45'),
('a7c40f632f65bd8e2.84963299',	0,	'Saint-Martin',	'MF',	'MAF',	'663',	'MF',	9999,	'Rest Welt',	'',	'Saint Martin',	'',	'',	'Rest World',	'',	'',	'',	'',	'',	0,	'2021-09-21 11:58:45'),
('a7c40f633038cd578.22975442',	0,	'Spanien',	'ES',	'ESP',	'724',	'ES',	9999,	'Rest Europ√§ische Union',	'',	'Spain',	'',	'',	'Rest of EU',	'',	'',	'',	'',	'',	1,	'2021-09-21 11:58:45'),
('a7c40f633114e8fc6.25257477',	0,	'Griechenland',	'GR',	'GRC',	'300',	'EL',	9999,	'Rest Europ√§ische Union',	'',	'Greece',	'',	'',	'Rest of EU',	'',	'',	'',	'',	'',	1,	'2021-09-21 11:58:45');

DROP TABLE IF EXISTS `oxdel2delset`;
CREATE TABLE `oxdel2delset` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Record id',
  `OXDELID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Shipping cost rule id (oxdelivery)',
  `OXDELSETID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Delivery method id (oxdeliveryset)',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXDELID` (`OXDELID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shows many-to-many relationship between Shipping cost rules (oxdelivery) and delivery methods (oxdeliveryset)';


DROP TABLE IF EXISTS `oxdelivery`;
CREATE TABLE `oxdelivery` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Delivery shipping cost rule id',
  `OXMAPID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Integer mapping identifier',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXACTIVE` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Active',
  `OXACTIVEFROM` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Active from specified date',
  `OXACTIVETO` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Active to specified date',
  `OXTITLE` varchar(255) NOT NULL DEFAULT '' COMMENT 'Title (multilanguage)',
  `OXTITLE_1` varchar(255) NOT NULL DEFAULT '',
  `OXTITLE_2` varchar(255) NOT NULL DEFAULT '',
  `OXTITLE_3` varchar(255) NOT NULL DEFAULT '',
  `OXADDSUMTYPE` enum('%','abs') NOT NULL DEFAULT 'abs' COMMENT 'Price Surcharge/Reduction type (abs|%)',
  `OXADDSUM` double NOT NULL DEFAULT '0' COMMENT 'Price Surcharge/Reduction amount',
  `OXDELTYPE` enum('a','s','w','p') NOT NULL DEFAULT 'a' COMMENT 'Condition type: a - Amount, s - Size, w - Weight, p - Price',
  `OXPARAM` double NOT NULL DEFAULT '0' COMMENT 'Condition param from (e.g. amount from 1)',
  `OXPARAMEND` double NOT NULL DEFAULT '0' COMMENT 'Condition param to (e.g. amount to 10)',
  `OXFIXED` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Calculation Rules: 0 - Once per Cart, 1 - Once for each different product, 2 - For each product',
  `OXSORT` int(11) NOT NULL DEFAULT '9999' COMMENT 'Order of Rules Processing',
  `OXFINALIZE` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Do not run further rules if this rule is valid and is being run',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXSHOPID` (`OXSHOPID`),
  KEY `OXMAPID` (`OXMAPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Delivery shipping cost rules';


DROP TABLE IF EXISTS `oxdelivery2shop`;
CREATE TABLE `oxdelivery2shop` (
  `OXSHOPID` int(11) NOT NULL COMMENT 'Mapped shop id',
  `OXMAPOBJECTID` int(11) NOT NULL COMMENT 'Mapped object id',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  UNIQUE KEY `OXMAPIDX` (`OXSHOPID`,`OXMAPOBJECTID`),
  KEY `OXMAPOBJECTID` (`OXMAPOBJECTID`),
  KEY `OXSHOPID` (`OXSHOPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Mapping table for element subshop assignments';


DROP TABLE IF EXISTS `oxdeliveryset`;
CREATE TABLE `oxdeliveryset` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Delivery method id',
  `OXMAPID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Integer mapping identifier',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXACTIVE` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Active',
  `OXACTIVEFROM` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Active from specified date',
  `OXACTIVETO` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Active to specified date',
  `OXTITLE` char(255) NOT NULL DEFAULT '' COMMENT 'Title (multilanguage)',
  `OXTITLE_1` char(255) NOT NULL DEFAULT '',
  `OXTITLE_2` char(255) NOT NULL DEFAULT '',
  `OXTITLE_3` char(255) NOT NULL DEFAULT '',
  `OXPOS` int(11) NOT NULL DEFAULT '0' COMMENT 'Sorting',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Creation time',
  PRIMARY KEY (`OXID`),
  KEY `OXSHOPID` (`OXSHOPID`),
  KEY `OXMAPID` (`OXMAPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Delivery (shipping) methods';

INSERT INTO `oxdeliveryset` (`OXID`, `OXMAPID`, `OXSHOPID`, `OXACTIVE`, `OXACTIVEFROM`, `OXACTIVETO`, `OXTITLE`, `OXTITLE_1`, `OXTITLE_2`, `OXTITLE_3`, `OXPOS`, `OXTIMESTAMP`) VALUES
('oxidstandard',	901,	1,	1,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	'Standard',	'Standard',	'',	'',	10,	'2021-09-21 11:58:51');

DROP TABLE IF EXISTS `oxdeliveryset2shop`;
CREATE TABLE `oxdeliveryset2shop` (
  `OXSHOPID` int(11) NOT NULL COMMENT 'Mapped shop id',
  `OXMAPOBJECTID` int(11) NOT NULL COMMENT 'Mapped object id',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  UNIQUE KEY `OXMAPIDX` (`OXSHOPID`,`OXMAPOBJECTID`),
  KEY `OXMAPOBJECTID` (`OXMAPOBJECTID`),
  KEY `OXSHOPID` (`OXSHOPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Mapping table for element subshop assignments';

INSERT INTO `oxdeliveryset2shop` (`OXSHOPID`, `OXMAPOBJECTID`, `OXTIMESTAMP`) VALUES
(1,	901,	'2021-09-21 11:58:51');

DROP TABLE IF EXISTS `oxdiscount`;
CREATE TABLE `oxdiscount` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Discount id',
  `OXMAPID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Integer mapping identifier',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXACTIVE` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Active',
  `OXACTIVEFROM` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Active from specified date',
  `OXACTIVETO` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Active to specified date',
  `OXTITLE` varchar(128) NOT NULL DEFAULT '' COMMENT 'Title (multilanguage)',
  `OXTITLE_1` varchar(128) NOT NULL,
  `OXTITLE_2` varchar(128) NOT NULL,
  `OXTITLE_3` varchar(128) NOT NULL,
  `OXAMOUNT` double NOT NULL DEFAULT '0' COMMENT 'Valid from specified amount of articles',
  `OXAMOUNTTO` double NOT NULL DEFAULT '999999' COMMENT 'Valid to specified amount of articles',
  `OXPRICETO` double NOT NULL DEFAULT '999999' COMMENT 'Valid to specified purchase price',
  `OXPRICE` double NOT NULL DEFAULT '0' COMMENT 'Valid from specified purchase price',
  `OXADDSUMTYPE` enum('%','abs','itm') NOT NULL DEFAULT '%' COMMENT 'Discount type (%,abs,itm)',
  `OXADDSUM` double NOT NULL DEFAULT '0' COMMENT 'Magnitude of the discount',
  `OXITMARTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Free article id, that will be added as a discount',
  `OXITMAMOUNT` double NOT NULL DEFAULT '1' COMMENT 'The quantity of free article that will be added to basket with discounted article',
  `OXITMMULTIPLE` int(1) NOT NULL DEFAULT '0' COMMENT 'Should free article amount be multiplied by discounted item quantity in basket',
  `OXSORT` int(5) NOT NULL DEFAULT '0' COMMENT 'Defines the order discounts are applied to basket or product',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  UNIQUE KEY `UNIQ_OXSORT` (`OXSHOPID`,`OXSORT`),
  KEY `OXSHOPID` (`OXSHOPID`),
  KEY `OXACTIVE` (`OXACTIVE`),
  KEY `OXACTIVEFROM` (`OXACTIVEFROM`),
  KEY `OXACTIVETO` (`OXACTIVETO`),
  KEY `OXMAPID` (`OXMAPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Article discounts';


DROP TABLE IF EXISTS `oxdiscount2shop`;
CREATE TABLE `oxdiscount2shop` (
  `OXSHOPID` int(11) NOT NULL COMMENT 'Mapped shop id',
  `OXMAPOBJECTID` int(11) NOT NULL COMMENT 'Mapped object id',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  UNIQUE KEY `OXMAPIDX` (`OXSHOPID`,`OXMAPOBJECTID`),
  KEY `OXMAPOBJECTID` (`OXMAPOBJECTID`),
  KEY `OXSHOPID` (`OXSHOPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Mapping table for element subshop assignments';


DROP TABLE IF EXISTS `oxfield2role`;
CREATE TABLE `oxfield2role` (
  `OXFIELDID` char(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Field id',
  `OXTYPE` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Field type',
  `OXROLEID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Roles id (oxroles)',
  `OXIDX` int(1) NOT NULL COMMENT 'Role permission: 0 - Deny, 1 - Read, 2 - Full',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXFIELDID`,`OXTYPE`,`OXROLEID`),
  KEY `OXIDX` (`OXIDX`),
  KEY `OXROLEID` (`OXROLEID`),
  KEY `OXTYPE` (`OXTYPE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shows many-to-many relationship between fields and roles';


DROP TABLE IF EXISTS `oxfield2shop`;
CREATE TABLE `oxfield2shop` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Record id',
  `OXARTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Article id (oxarticles)',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXPRICE` double NOT NULL COMMENT 'Price',
  `OXPRICEA` double NOT NULL COMMENT 'Price A',
  `OXPRICEB` double NOT NULL COMMENT 'Price B',
  `OXPRICEC` double NOT NULL COMMENT 'Price C',
  `OXUPDATEPRICE` double NOT NULL DEFAULT '0' COMMENT 'If not 0, oxprice will be updated to this value on oxupdatepricetime date',
  `OXUPDATEPRICEA` double NOT NULL DEFAULT '0' COMMENT 'If not 0, oxpricea will be updated to this value on oxupdatepricetime date',
  `OXUPDATEPRICEB` double NOT NULL DEFAULT '0' COMMENT 'If not 0, oxpriceb will be updated to this value on oxupdatepricetime date',
  `OXUPDATEPRICEC` double NOT NULL DEFAULT '0' COMMENT 'If not 0, oxpricec will be updated to this value on oxupdatepricetime date',
  `OXUPDATEPRICETIME` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Date, when oxprice[a,b,c] should be updated to oxupdateprice[a,b,c] values',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXARTID` (`OXARTID`,`OXSHOPID`),
  KEY `OXUPDATEPRICETIME` (`OXUPDATEPRICETIME`),
  KEY `OXPRICE` (`OXPRICE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shows many-to-many relationship between fields and shops (multishops fields)';


DROP TABLE IF EXISTS `oxfiles`;
CREATE TABLE `oxfiles` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'File id',
  `OXARTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Article id (oxarticles)',
  `OXFILENAME` varchar(128) NOT NULL COMMENT 'Filename',
  `OXSTOREHASH` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Hashed filename, used for file directory path creation',
  `OXPURCHASEDONLY` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT 'Download is available only after purchase',
  `OXMAXDOWNLOADS` int(11) NOT NULL DEFAULT '-1' COMMENT 'Maximum count of downloads after order',
  `OXMAXUNREGDOWNLOADS` int(11) NOT NULL DEFAULT '-1' COMMENT 'Maximum count of downloads for not registered users after order',
  `OXLINKEXPTIME` int(11) NOT NULL DEFAULT '-1' COMMENT 'Expiration time of download link in hours',
  `OXDOWNLOADEXPTIME` int(11) NOT NULL DEFAULT '-1' COMMENT 'Expiration time of download link after the first download in hours',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Creation time',
  PRIMARY KEY (`OXID`),
  KEY `OXARTID` (`OXARTID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Files available for users to download';


DROP TABLE IF EXISTS `oxgroups`;
CREATE TABLE `oxgroups` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Group id',
  `OXRRID` bigint(21) unsigned NOT NULL COMMENT 'Group numeric index',
  `OXACTIVE` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Active',
  `OXTITLE` varchar(128) NOT NULL DEFAULT '' COMMENT 'Title (multilanguage)',
  `OXTITLE_1` varchar(128) NOT NULL DEFAULT '',
  `OXTITLE_2` varchar(128) NOT NULL DEFAULT '',
  `OXTITLE_3` varchar(128) NOT NULL DEFAULT '',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXACTIVE` (`OXACTIVE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='User groups';

INSERT INTO `oxgroups` (`OXID`, `OXRRID`, `OXACTIVE`, `OXTITLE`, `OXTITLE_1`, `OXTITLE_2`, `OXTITLE_3`, `OXTIMESTAMP`) VALUES
('oxidadmin',	9,	1,	'Shop-Admin',	'Store Administrator',	'',	'',	'2021-09-21 11:58:51'),
('oxidblacklist',	0,	1,	'Blacklist',	'Blacklist',	'',	'',	'2021-09-21 11:58:45'),
('oxidblocked',	13,	1,	'BLOCKED',	'BLOCKED',	'',	'',	'2021-09-21 11:58:51'),
('oxidcustomer',	14,	1,	'Kunde',	'Customer',	'',	'',	'2021-09-21 11:58:51'),
('oxiddealer',	7,	1,	'H√§ndler',	'Retailer',	'',	'',	'2021-09-21 11:58:51'),
('oxidforeigncustomer',	4,	1,	'Auslandskunde',	'Foreign Customer',	'',	'',	'2021-09-21 11:58:51'),
('oxidgoodcust',	3,	1,	'Grosser Umsatz',	'Huge Turnover',	'',	'',	'2021-09-21 11:58:51'),
('oxidmiddlecust',	2,	1,	'Mittlerer Umsatz',	'Medium Turnover',	'',	'',	'2021-09-21 11:58:51'),
('oxidnewcustomer',	5,	1,	'Inlandskunde',	'Domestic Customer',	'',	'',	'2021-09-21 11:58:51'),
('oxidnewsletter',	8,	1,	'Newsletter-Abonnenten',	'Newsletter Recipients',	'',	'',	'2021-09-21 11:58:51'),
('oxidnotyetordered',	15,	1,	'Noch nicht gekauft',	'Not Yet Purchased',	'',	'',	'2021-09-21 11:58:51'),
('oxidpowershopper',	6,	1,	'Powershopper',	'Powershopper',	'',	'',	'2021-09-21 11:58:51'),
('oxidpricea',	11,	1,	'Preis A',	'Price A',	'',	'',	'2021-09-21 11:58:51'),
('oxidpriceb',	10,	1,	'Preis B',	'Price B',	'',	'',	'2021-09-21 11:58:51'),
('oxidpricec',	12,	1,	'Preis C',	'Price C',	'',	'',	'2021-09-21 11:58:51'),
('oxidsmallcust',	1,	1,	'Geringer Umsatz',	'Less Turnover',	'',	'',	'2021-09-21 11:58:51');

DROP TABLE IF EXISTS `oxinvitations`;
CREATE TABLE `oxinvitations` (
  `OXUSERID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'User id (oxuser), who sent invitation',
  `OXDATE` date NOT NULL COMMENT 'Creation time',
  `OXEMAIL` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Recipient email',
  `OXPENDING` mediumint(9) NOT NULL COMMENT 'Has recipient user registered',
  `OXACCEPTED` mediumint(9) NOT NULL COMMENT 'Is recipient user accepted',
  `OXTYPE` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'Invitation type',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  KEY `OXUSERID` (`OXUSERID`),
  KEY `OXDATE` (`OXDATE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='User sent invitations';


DROP TABLE IF EXISTS `oxlinks`;
CREATE TABLE `oxlinks` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Link id',
  `OXMAPID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Integer mapping identifier',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXACTIVE` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Active',
  `OXURL` varchar(255) NOT NULL DEFAULT '' COMMENT 'Link url',
  `OXURLDESC` text NOT NULL COMMENT 'Description (multilanguage)',
  `OXURLDESC_1` text NOT NULL,
  `OXURLDESC_2` text NOT NULL,
  `OXURLDESC_3` text NOT NULL,
  `OXINSERT` datetime DEFAULT NULL COMMENT 'Creation time (set by user)',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXSHOPID` (`OXSHOPID`),
  KEY `OXINSERT` (`OXINSERT`),
  KEY `OXACTIVE` (`OXACTIVE`),
  KEY `OXMAPID` (`OXMAPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Links';


DROP TABLE IF EXISTS `oxlinks2shop`;
CREATE TABLE `oxlinks2shop` (
  `OXSHOPID` int(11) NOT NULL COMMENT 'Mapped shop id',
  `OXMAPOBJECTID` int(11) NOT NULL COMMENT 'Mapped object id',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  UNIQUE KEY `OXMAPIDX` (`OXSHOPID`,`OXMAPOBJECTID`),
  KEY `OXMAPOBJECTID` (`OXMAPOBJECTID`),
  KEY `OXSHOPID` (`OXSHOPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Mapping table for element subshop assignments';


DROP TABLE IF EXISTS `oxmanufacturers`;
CREATE TABLE `oxmanufacturers` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Manufacturer id',
  `OXMAPID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Integer mapping identifier',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXACTIVE` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Is active',
  `OXICON` varchar(128) NOT NULL DEFAULT '' COMMENT 'Icon filename',
  `OXTITLE` varchar(255) NOT NULL DEFAULT '' COMMENT 'Title (multilanguage)',
  `OXSHORTDESC` varchar(255) NOT NULL DEFAULT '' COMMENT 'Short description (multilanguage)',
  `OXTITLE_1` varchar(255) NOT NULL DEFAULT '',
  `OXSHORTDESC_1` varchar(255) NOT NULL DEFAULT '',
  `OXTITLE_2` varchar(255) NOT NULL DEFAULT '',
  `OXSHORTDESC_2` varchar(255) NOT NULL DEFAULT '',
  `OXTITLE_3` varchar(255) NOT NULL DEFAULT '',
  `OXSHORTDESC_3` varchar(255) NOT NULL DEFAULT '',
  `OXSHOWSUFFIX` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Show SEO Suffix in Category',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXMAPID` (`OXMAPID`),
  KEY `OXSHOPID` (`OXSHOPID`),
  KEY `OXACTIVE` (`OXACTIVE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shop manufacturers';


DROP TABLE IF EXISTS `oxmanufacturers2shop`;
CREATE TABLE `oxmanufacturers2shop` (
  `OXSHOPID` int(11) NOT NULL COMMENT 'Mapped shop id',
  `OXMAPOBJECTID` int(11) NOT NULL COMMENT 'Mapped object id',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  UNIQUE KEY `OXMAPIDX` (`OXSHOPID`,`OXMAPOBJECTID`),
  KEY `OXMAPOBJECTID` (`OXMAPOBJECTID`),
  KEY `OXSHOPID` (`OXSHOPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Mapping table for element subshop assignments';


DROP TABLE IF EXISTS `oxmediaurls`;
CREATE TABLE `oxmediaurls` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Media id',
  `OXOBJECTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Article id (oxarticles)',
  `OXURL` varchar(255) NOT NULL COMMENT 'Media url or filename',
  `OXDESC` varchar(255) NOT NULL COMMENT 'Description (multilanguage)',
  `OXDESC_1` varchar(255) NOT NULL,
  `OXDESC_2` varchar(255) NOT NULL,
  `OXDESC_3` varchar(255) NOT NULL,
  `OXISUPLOADED` int(1) NOT NULL DEFAULT '0' COMMENT 'Is oxurl field used for filename or url',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXOBJECTID` (`OXOBJECTID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Stores objects media';


DROP TABLE IF EXISTS `oxmigrations_ce`;
CREATE TABLE `oxmigrations_ce` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `oxmigrations_ce` (`version`) VALUES
('20170718124421'),
('20171018144650'),
('20180214152228'),
('20180228160418'),
('20180703135728'),
('20180928072235');

DROP TABLE IF EXISTS `oxmigrations_ee`;
CREATE TABLE `oxmigrations_ee` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `oxmigrations_ee` (`version`) VALUES
('20160919103142_pe_to_ee'),
('20171018144650');

DROP TABLE IF EXISTS `oxmigrations_pe`;
CREATE TABLE `oxmigrations_pe` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `oxmigrations_pe` (`version`) VALUES
('20160919103142_ce_to_pe');

DROP TABLE IF EXISTS `oxnews`;
CREATE TABLE `oxnews` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'News id',
  `OXMAPID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Integer mapping identifier',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXACTIVE` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Is active',
  `OXACTIVEFROM` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Active from specified date',
  `OXACTIVETO` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Active to specified date',
  `OXDATE` date NOT NULL DEFAULT '0000-00-00' COMMENT 'Creation date (entered by user)',
  `OXSHORTDESC` varchar(255) NOT NULL DEFAULT '' COMMENT 'Short description (multilanguage)',
  `OXLONGDESC` text NOT NULL COMMENT 'Long description (multilanguage)',
  `OXACTIVE_1` tinyint(1) NOT NULL DEFAULT '0',
  `OXSHORTDESC_1` varchar(255) NOT NULL DEFAULT '',
  `OXLONGDESC_1` text NOT NULL,
  `OXACTIVE_2` tinyint(1) NOT NULL DEFAULT '0',
  `OXSHORTDESC_2` varchar(255) NOT NULL DEFAULT '',
  `OXLONGDESC_2` text NOT NULL,
  `OXACTIVE_3` tinyint(1) NOT NULL DEFAULT '0',
  `OXSHORTDESC_3` varchar(255) NOT NULL DEFAULT '',
  `OXLONGDESC_3` text NOT NULL,
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXSHOPID` (`OXSHOPID`),
  KEY `OXACTIVE` (`OXACTIVE`),
  KEY `OXACTIVEFROM` (`OXACTIVEFROM`),
  KEY `OXACTIVETO` (`OXACTIVETO`),
  KEY `OXMAPID` (`OXMAPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shop news';


DROP TABLE IF EXISTS `oxnews2shop`;
CREATE TABLE `oxnews2shop` (
  `OXSHOPID` int(11) NOT NULL COMMENT 'Mapped shop id',
  `OXMAPOBJECTID` int(11) NOT NULL COMMENT 'Mapped object id',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  UNIQUE KEY `OXMAPIDX` (`OXSHOPID`,`OXMAPOBJECTID`),
  KEY `OXMAPOBJECTID` (`OXMAPOBJECTID`),
  KEY `OXSHOPID` (`OXSHOPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Mapping table for element subshop assignments';


DROP TABLE IF EXISTS `oxnewsletter`;
CREATE TABLE `oxnewsletter` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Newsletter id',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXTITLE` varchar(255) NOT NULL DEFAULT '' COMMENT 'Title',
  `OXTEMPLATE` mediumtext NOT NULL COMMENT 'HTML template',
  `OXPLAINTEMPLATE` mediumtext NOT NULL COMMENT 'Plain template',
  `OXSUBJECT` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Subject',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Templates for sending newsletters';


DROP TABLE IF EXISTS `oxnewssubscribed`;
CREATE TABLE `oxnewssubscribed` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Subscription id',
  `OXUSERID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'User id (oxuser)',
  `OXSAL` varchar(64) NOT NULL DEFAULT '' COMMENT 'User title prefix (Mr/Mrs)',
  `OXFNAME` char(128) NOT NULL DEFAULT '' COMMENT 'First name',
  `OXLNAME` char(128) NOT NULL DEFAULT '' COMMENT 'Last name',
  `OXEMAIL` char(128) NOT NULL DEFAULT '' COMMENT 'Email',
  `OXDBOPTIN` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Subscription status: 0 - not subscribed, 1 - subscribed, 2 - not confirmed',
  `OXEMAILFAILED` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Subscription email sending status',
  `OXSUBSCRIBED` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Subscription date',
  `OXUNSUBSCRIBED` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Unsubscription date',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  PRIMARY KEY (`OXID`),
  KEY `OXUSERID` (`OXUSERID`),
  KEY `OXEMAIL` (`OXEMAIL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='User subscriptions';

INSERT INTO `oxnewssubscribed` (`OXID`, `OXUSERID`, `OXSAL`, `OXFNAME`, `OXLNAME`, `OXEMAIL`, `OXDBOPTIN`, `OXEMAILFAILED`, `OXSUBSCRIBED`, `OXUNSUBSCRIBED`, `OXTIMESTAMP`, `OXSHOPID`) VALUES
('0b742e66fd94c88b8.61001136',	'57eb5806a7d3852a5a27a76f746c3392',	'MR',	'Shop',	'Administrator',	'mario.lorenz@oxid-esales.com',	1,	0,	'2005-07-26 19:16:09',	'0000-00-00 00:00:00',	'2021-09-21 11:58:51',	1);

DROP TABLE IF EXISTS `oxobject2action`;
CREATE TABLE `oxobject2action` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Record id',
  `OXACTIONID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Action id (oxactions)',
  `OXOBJECTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Object id (table set by oxclass)',
  `OXCLASS` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Object table name',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXOBJECTID` (`OXOBJECTID`),
  KEY `OXACTIONID` (`OXACTIONID`,`OXCLASS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shows many-to-many relationship between actions (oxactions) and objects (table set by oxclass)';


DROP TABLE IF EXISTS `oxobject2article`;
CREATE TABLE `oxobject2article` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Record id',
  `OXOBJECTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Cross-selling Article id (oxarticles)',
  `OXARTICLENID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Main Article id (oxarticles)',
  `OXSORT` int(5) NOT NULL DEFAULT '0' COMMENT 'Sorting',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXARTICLENID` (`OXARTICLENID`),
  KEY `OXOBJECTID` (`OXOBJECTID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shows many-to-many relationship between cross-selling articles';


DROP TABLE IF EXISTS `oxobject2attribute`;
CREATE TABLE `oxobject2attribute` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Record id',
  `OXOBJECTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Article id (oxarticles)',
  `OXATTRID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Attribute id (oxattributes)',
  `OXVALUE` varchar(255) NOT NULL DEFAULT '' COMMENT 'Attribute value (multilanguage)',
  `OXPOS` int(11) NOT NULL DEFAULT '9999' COMMENT 'Sorting',
  `OXVALUE_1` varchar(255) NOT NULL DEFAULT '',
  `OXVALUE_2` varchar(255) NOT NULL DEFAULT '',
  `OXVALUE_3` varchar(255) NOT NULL DEFAULT '',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXOBJECTID` (`OXOBJECTID`),
  KEY `mainidx` (`OXATTRID`,`OXOBJECTID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shows many-to-many relationship between articles and attributes';


DROP TABLE IF EXISTS `oxobject2category`;
CREATE TABLE `oxobject2category` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Record id',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXOBJECTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Article id (oxarticles)',
  `OXCATNID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Category id (oxcategory)',
  `OXPOS` int(11) NOT NULL DEFAULT '0' COMMENT 'Sorting',
  `OXTIME` int(11) NOT NULL DEFAULT '0' COMMENT 'Creation time',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  UNIQUE KEY `OXMAINIDXU` (`OXCATNID`,`OXOBJECTID`,`OXSHOPID`),
  KEY `OXOBJECTID` (`OXOBJECTID`),
  KEY `OXPOS` (`OXPOS`),
  KEY `OXTIME` (`OXTIME`),
  KEY `OXMAINIDX` (`OXCATNID`,`OXOBJECTID`),
  KEY `OXSHOPID` (`OXSHOPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shows many-to-many relationship between articles and categories';


DROP TABLE IF EXISTS `oxobject2delivery`;
CREATE TABLE `oxobject2delivery` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Record id',
  `OXDELIVERYID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Delivery id (oxdelivery)',
  `OXOBJECTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Object id (table determined by oxtype)',
  `OXTYPE` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Record type',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXOBJECTID` (`OXOBJECTID`),
  KEY `OXDELIVERYID` (`OXDELIVERYID`,`OXTYPE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shows many-to-many relationship between delivery cost rules and objects (table determined by oxtype)';


DROP TABLE IF EXISTS `oxobject2discount`;
CREATE TABLE `oxobject2discount` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Record id',
  `OXDISCOUNTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Discount id (oxdiscount)',
  `OXOBJECTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Object id (table determined by oxtype)',
  `OXTYPE` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Record type',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `oxdiscidx` (`OXDISCOUNTID`,`OXTYPE`),
  KEY `mainidx` (`OXOBJECTID`,`OXDISCOUNTID`,`OXTYPE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shows many-to-many relationship between discounts and objects (table determined by oxtype)';


DROP TABLE IF EXISTS `oxobject2group`;
CREATE TABLE `oxobject2group` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Record id',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXOBJECTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'User id',
  `OXGROUPSID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Group id',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  UNIQUE KEY `UNIQ_OBJECTGROUP` (`OXGROUPSID`,`OXOBJECTID`,`OXSHOPID`),
  KEY `OXOBJECTID` (`OXOBJECTID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shows many-to-many relationship between users and groups';

INSERT INTO `oxobject2group` (`OXID`, `OXSHOPID`, `OXOBJECTID`, `OXGROUPSID`, `OXTIMESTAMP`) VALUES
('e913fdd8443ed43e1.51222316',	1,	'57eb5806a7d3852a5a27a76f746c3392',	'oxidadmin',	'2021-09-21 11:58:45');

DROP TABLE IF EXISTS `oxobject2list`;
CREATE TABLE `oxobject2list` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Record id',
  `OXOBJECTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Article id (oxarticles)',
  `OXLISTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Listmania id (oxrecommlists)',
  `OXDESC` text NOT NULL COMMENT 'Description',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXOBJECTID` (`OXOBJECTID`),
  KEY `OXLISTID` (`OXLISTID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shows many-to-many relationship between articles and listmania lists';


DROP TABLE IF EXISTS `oxobject2payment`;
CREATE TABLE `oxobject2payment` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Record id',
  `OXPAYMENTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Payment id (oxpayments)',
  `OXOBJECTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Object id (table determined by oxtype)',
  `OXTYPE` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Record type',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXOBJECTID` (`OXOBJECTID`),
  KEY `OXPAYMENTID` (`OXPAYMENTID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shows many-to-many relationship between payments and objects (table determined by oxtype)';

INSERT INTO `oxobject2payment` (`OXID`, `OXPAYMENTID`, `OXOBJECTID`, `OXTYPE`, `OXTIMESTAMP`) VALUES
('e467275509095aece1ae21cbe24f22ce',	'oxidpaypal',	'oxidstandard',	'oxdelset',	'2021-09-21 12:05:24');

DROP TABLE IF EXISTS `oxobject2role`;
CREATE TABLE `oxobject2role` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Record id',
  `OXOBJECTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Object id (e.g. oxgroups, oxuser)',
  `OXROLEID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Role id (oxroles)',
  `OXTYPE` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Type (t.g. oxgroups, oxuser)',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXROLEID` (`OXROLEID`),
  KEY `OXOBJECTID` (`OXOBJECTID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shows many-to-many relationship between roles and objects (table determined by oxtype)';


DROP TABLE IF EXISTS `oxobject2selectlist`;
CREATE TABLE `oxobject2selectlist` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Record id',
  `OXOBJECTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Article id (oxarticles)',
  `OXSELNID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Selection list id (oxselectlist)',
  `OXSORT` int(5) NOT NULL DEFAULT '0' COMMENT 'Sorting',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXOBJECTID` (`OXOBJECTID`),
  KEY `OXSELNID` (`OXSELNID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shows many-to-many relationship between articles and selection lists';


DROP TABLE IF EXISTS `oxobject2seodata`;
CREATE TABLE `oxobject2seodata` (
  `OXOBJECTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Objects id',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXLANG` int(2) NOT NULL DEFAULT '0' COMMENT 'Language id',
  `OXKEYWORDS` text NOT NULL COMMENT 'Keywords',
  `OXDESCRIPTION` text NOT NULL COMMENT 'Description',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXOBJECTID`,`OXSHOPID`,`OXLANG`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Seo entries';


DROP TABLE IF EXISTS `oxobjectrights`;
CREATE TABLE `oxobjectrights` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Record id',
  `OXOBJECTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Object id ()',
  `OXGROUPIDX` bigint(20) unsigned NOT NULL COMMENT 'Group index',
  `OXOFFSET` int(10) unsigned NOT NULL COMMENT 'Group numeric index',
  `OXACTION` int(10) unsigned NOT NULL COMMENT 'Action',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXOBJECTID`,`OXOFFSET`,`OXACTION`),
  KEY `OXOBJECTID` (`OXOBJECTID`),
  KEY `OXOFFSET` (`OXOFFSET`),
  KEY `OXACTION` (`OXACTION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Object rights';


DROP TABLE IF EXISTS `oxorder`;
CREATE TABLE `oxorder` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Order id',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXUSERID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'User id (oxuser)',
  `OXORDERDATE` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Order date',
  `OXORDERNR` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'Order number',
  `OXBILLCOMPANY` varchar(255) NOT NULL DEFAULT '' COMMENT 'Billing info: Company name',
  `OXBILLEMAIL` varchar(255) NOT NULL DEFAULT '' COMMENT 'Billing info: Email',
  `OXBILLFNAME` varchar(255) NOT NULL DEFAULT '' COMMENT 'Billing info: First name',
  `OXBILLLNAME` varchar(255) NOT NULL DEFAULT '' COMMENT 'Billing info: Last name',
  `OXBILLSTREET` varchar(255) NOT NULL DEFAULT '' COMMENT 'Billing info: Street name',
  `OXBILLSTREETNR` varchar(16) NOT NULL DEFAULT '' COMMENT 'Billing info: House number',
  `OXBILLADDINFO` varchar(255) NOT NULL DEFAULT '' COMMENT 'Billing info: Additional info',
  `OXBILLUSTID` varchar(255) NOT NULL DEFAULT '' COMMENT 'Billing info: VAT ID No.',
  `OXBILLUSTIDSTATUS` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'User VAT id status: 1 - valid, 0 - invalid',
  `OXBILLCITY` varchar(255) NOT NULL DEFAULT '' COMMENT 'Billing info: City',
  `OXBILLCOUNTRYID` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Billing info: Country id (oxcountry)',
  `OXBILLSTATEID` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Billing info: US State id (oxstates)',
  `OXBILLZIP` varchar(16) NOT NULL DEFAULT '' COMMENT 'Billing info: Zip code',
  `OXBILLFON` varchar(128) NOT NULL DEFAULT '' COMMENT 'Billing info: Phone number',
  `OXBILLFAX` varchar(128) NOT NULL DEFAULT '' COMMENT 'Billing info: Fax number',
  `OXBILLSAL` varchar(128) NOT NULL DEFAULT '' COMMENT 'Billing info: User title prefix (Mr/Mrs)',
  `OXDELCOMPANY` varchar(255) NOT NULL DEFAULT '' COMMENT 'Shipping info: Company name',
  `OXDELFNAME` varchar(255) NOT NULL DEFAULT '' COMMENT 'Shipping info: First name',
  `OXDELLNAME` varchar(255) NOT NULL DEFAULT '' COMMENT 'Shipping info: Last name',
  `OXDELSTREET` varchar(255) NOT NULL DEFAULT '' COMMENT 'Shipping info: Street name',
  `OXDELSTREETNR` varchar(16) NOT NULL DEFAULT '' COMMENT 'Shipping info: House number',
  `OXDELADDINFO` varchar(255) NOT NULL DEFAULT '' COMMENT 'Shipping info: Additional info',
  `OXDELCITY` varchar(255) NOT NULL DEFAULT '' COMMENT 'Shipping info: City',
  `OXDELCOUNTRYID` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Shipping info: Country id (oxcountry)',
  `OXDELSTATEID` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Shipping info: US State id (oxstates)',
  `OXDELZIP` varchar(16) NOT NULL DEFAULT '' COMMENT 'Shipping info: Zip code',
  `OXDELFON` varchar(128) NOT NULL DEFAULT '' COMMENT 'Shipping info: Phone number',
  `OXDELFAX` varchar(128) NOT NULL DEFAULT '' COMMENT 'Shipping info: Fax number',
  `OXDELSAL` varchar(128) NOT NULL DEFAULT '' COMMENT 'Shipping info: User title prefix (Mr/Mrs)',
  `OXPAYMENTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'User payment id (oxuserpayments)',
  `OXPAYMENTTYPE` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Payment id (oxpayments)',
  `OXTOTALNETSUM` double NOT NULL DEFAULT '0' COMMENT 'Total net sum',
  `OXTOTALBRUTSUM` double NOT NULL DEFAULT '0' COMMENT 'Total brut sum',
  `OXTOTALORDERSUM` double NOT NULL DEFAULT '0' COMMENT 'Total order sum',
  `OXARTVAT1` double NOT NULL DEFAULT '0' COMMENT 'First VAT',
  `OXARTVATPRICE1` double NOT NULL DEFAULT '0' COMMENT 'First calculated VAT price',
  `OXARTVAT2` double NOT NULL DEFAULT '0' COMMENT 'Second VAT',
  `OXARTVATPRICE2` double NOT NULL DEFAULT '0' COMMENT 'Second calculated VAT price',
  `OXDELCOST` double NOT NULL DEFAULT '0' COMMENT 'Delivery price',
  `OXDELVAT` double NOT NULL DEFAULT '0' COMMENT 'Delivery VAT',
  `OXPAYCOST` double NOT NULL DEFAULT '0' COMMENT 'Payment cost',
  `OXPAYVAT` double NOT NULL DEFAULT '0' COMMENT 'Payment VAT',
  `OXWRAPCOST` double NOT NULL DEFAULT '0' COMMENT 'Wrapping cost',
  `OXWRAPVAT` double NOT NULL DEFAULT '0' COMMENT 'Wrapping VAT',
  `OXGIFTCARDCOST` double NOT NULL DEFAULT '0' COMMENT 'Giftcard cost',
  `OXGIFTCARDVAT` double NOT NULL DEFAULT '0' COMMENT 'Giftcard VAT',
  `OXCARDID` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Gift card id (oxwrapping)',
  `OXCARDTEXT` text NOT NULL COMMENT 'Gift card text',
  `OXDISCOUNT` double NOT NULL DEFAULT '0' COMMENT 'Additional discount for order (abs)',
  `OXEXPORT` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Is exported',
  `OXBILLNR` varchar(128) NOT NULL DEFAULT '' COMMENT 'Invoice No.',
  `OXBILLDATE` date NOT NULL DEFAULT '0000-00-00' COMMENT 'Invoice sent date',
  `OXTRACKCODE` varchar(128) NOT NULL DEFAULT '' COMMENT 'Tracking code',
  `OXSENDDATE` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Order shipping date',
  `OXREMARK` text NOT NULL COMMENT 'User remarks',
  `OXVOUCHERDISCOUNT` double NOT NULL DEFAULT '0' COMMENT 'Coupon (voucher) discount price',
  `OXCURRENCY` varchar(32) NOT NULL DEFAULT '' COMMENT 'Currency',
  `OXCURRATE` double NOT NULL DEFAULT '0' COMMENT 'Currency rate',
  `OXFOLDER` varchar(32) NOT NULL DEFAULT '' COMMENT 'Folder: ORDERFOLDER_FINISHED, ORDERFOLDER_NEW, ORDERFOLDER_PROBLEMS',
  `OXTRANSID` varchar(64) NOT NULL DEFAULT '' COMMENT 'Paypal: Transaction id',
  `OXPAYID` varchar(64) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `OXXID` varchar(64) NOT NULL DEFAULT '',
  `OXPAID` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Time, when order was paid',
  `OXSTORNO` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Order cancelled',
  `OXIP` varchar(39) NOT NULL DEFAULT '' COMMENT 'User ip address',
  `OXTRANSSTATUS` varchar(30) NOT NULL DEFAULT '' COMMENT 'Order status: NOT_FINISHED, OK, ERROR',
  `OXLANG` int(2) NOT NULL DEFAULT '0' COMMENT 'Language id',
  `OXINVOICENR` int(11) NOT NULL DEFAULT '0' COMMENT 'Invoice number',
  `OXDELTYPE` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Delivery id (oxdeliveryset)',
  `OXPIXIEXPORT` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Field for 3rd party modules export',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  `OXISNETTOMODE` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'Order created in netto mode',
  PRIMARY KEY (`OXID`),
  KEY `MAINIDX` (`OXSHOPID`,`OXORDERDATE`),
  KEY `OXUSERID` (`OXUSERID`),
  KEY `OXORDERNR` (`OXORDERNR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shop orders information';


DROP TABLE IF EXISTS `oxorderarticles`;
CREATE TABLE `oxorderarticles` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Order article id',
  `OXORDERID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Order id (oxorder)',
  `OXAMOUNT` double NOT NULL DEFAULT '0' COMMENT 'Amount',
  `OXARTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Article id (oxarticles)',
  `OXARTNUM` varchar(255) NOT NULL DEFAULT '' COMMENT 'Article number',
  `OXTITLE` varchar(255) NOT NULL DEFAULT '' COMMENT 'Title',
  `OXSHORTDESC` varchar(255) NOT NULL DEFAULT '' COMMENT 'Short description',
  `OXSELVARIANT` varchar(255) NOT NULL DEFAULT '' COMMENT 'Selected variant',
  `OXNETPRICE` double NOT NULL DEFAULT '0' COMMENT 'Full netto price (oxnprice * oxamount)',
  `OXBRUTPRICE` double NOT NULL DEFAULT '0' COMMENT 'Full brutto price (oxbprice * oxamount)',
  `OXVATPRICE` double NOT NULL DEFAULT '0' COMMENT 'Calculated VAT price',
  `OXVAT` double NOT NULL DEFAULT '0' COMMENT 'VAT',
  `OXPERSPARAM` text NOT NULL COMMENT 'Serialized persistent parameters',
  `OXPRICE` double NOT NULL DEFAULT '0' COMMENT 'Base price',
  `OXBPRICE` double NOT NULL DEFAULT '0' COMMENT 'Brutto price for one item',
  `OXNPRICE` double NOT NULL DEFAULT '0' COMMENT 'Netto price for one item',
  `OXWRAPID` varchar(32) NOT NULL DEFAULT '' COMMENT 'Wrapping id (oxwrapping)',
  `OXEXTURL` varchar(255) NOT NULL DEFAULT '' COMMENT 'External URL to other information about the article',
  `OXURLDESC` varchar(255) NOT NULL DEFAULT '' COMMENT 'Text for external URL',
  `OXURLIMG` varchar(128) NOT NULL DEFAULT '' COMMENT 'External URL image',
  `OXTHUMB` varchar(128) NOT NULL DEFAULT '' COMMENT 'Thumbnail filename',
  `OXPIC1` varchar(128) NOT NULL DEFAULT '' COMMENT '1# Picture filename',
  `OXPIC2` varchar(128) NOT NULL DEFAULT '' COMMENT '2# Picture filename',
  `OXPIC3` varchar(128) NOT NULL DEFAULT '' COMMENT '3# Picture filename',
  `OXPIC4` varchar(128) NOT NULL DEFAULT '' COMMENT '4# Picture filename',
  `OXPIC5` varchar(128) NOT NULL DEFAULT '' COMMENT '5# Picture filename',
  `OXWEIGHT` double NOT NULL DEFAULT '0' COMMENT 'Weight (kg)',
  `OXSTOCK` double NOT NULL DEFAULT '-1' COMMENT 'Articles quantity in stock',
  `OXDELIVERY` date NOT NULL DEFAULT '0000-00-00' COMMENT 'Date, when the product will be available again if it is sold out',
  `OXINSERT` date NOT NULL DEFAULT '0000-00-00' COMMENT 'Creation time',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  `OXLENGTH` double NOT NULL DEFAULT '0' COMMENT 'Article dimensions: Length',
  `OXWIDTH` double NOT NULL DEFAULT '0' COMMENT 'Article dimensions: Width',
  `OXHEIGHT` double NOT NULL DEFAULT '0' COMMENT 'Article dimensions: Height',
  `OXFILE` varchar(128) NOT NULL DEFAULT '' COMMENT 'File, shown in article media list',
  `OXSEARCHKEYS` varchar(255) NOT NULL DEFAULT '' COMMENT 'Search terms',
  `OXTEMPLATE` varchar(128) NOT NULL DEFAULT '' COMMENT 'Alternative template filename (use default, if empty)',
  `OXQUESTIONEMAIL` varchar(255) NOT NULL DEFAULT '' COMMENT 'E-mail for question',
  `OXISSEARCH` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Is article shown in search',
  `OXFOLDER` varchar(32) NOT NULL DEFAULT '' COMMENT 'Folder: ORDERFOLDER_FINISHED, ORDERFOLDER_NEW, ORDERFOLDER_PROBLEMS',
  `OXSUBCLASS` varchar(32) NOT NULL DEFAULT '' COMMENT 'Subclass',
  `OXSTORNO` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Order cancelled',
  `OXORDERSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops), in which order was done',
  `OXERPSTATUS` text NOT NULL COMMENT 'serialized ERP statuses array',
  `OXISBUNDLE` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Bundled article',
  PRIMARY KEY (`OXID`),
  KEY `OXORDERID` (`OXORDERID`),
  KEY `OXARTID` (`OXARTID`),
  KEY `OXARTNUM` (`OXARTNUM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Ordered articles information';


DROP TABLE IF EXISTS `oxorderfiles`;
CREATE TABLE `oxorderfiles` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Order file id',
  `OXORDERID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Order id (oxorder)',
  `OXFILENAME` varchar(128) NOT NULL COMMENT 'Filename',
  `OXFILEID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'File id (oxfiles)',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXORDERARTICLEID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Ordered article id (oxorderarticles)',
  `OXFIRSTDOWNLOAD` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'First time downloaded time',
  `OXLASTDOWNLOAD` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Last time downloaded time',
  `OXDOWNLOADCOUNT` int(10) unsigned NOT NULL COMMENT 'Downloads count',
  `OXMAXDOWNLOADCOUNT` int(10) unsigned NOT NULL COMMENT 'Maximum count of downloads',
  `OXDOWNLOADEXPIRATIONTIME` int(10) unsigned NOT NULL COMMENT 'Download expiration time in hours',
  `OXLINKEXPIRATIONTIME` int(10) unsigned NOT NULL COMMENT 'Link expiration time in hours',
  `OXRESETCOUNT` int(10) unsigned NOT NULL COMMENT 'Count of resets',
  `OXVALIDUNTIL` datetime NOT NULL COMMENT 'Download is valid until time specified',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXORDERID` (`OXORDERID`),
  KEY `OXFILEID` (`OXFILEID`),
  KEY `OXORDERARTICLEID` (`OXORDERARTICLEID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Files, given to users to download after order';


DROP TABLE IF EXISTS `oxpayments`;
CREATE TABLE `oxpayments` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Payment id',
  `OXACTIVE` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Active',
  `OXDESC` varchar(128) NOT NULL DEFAULT '' COMMENT 'Description (multilanguage)',
  `OXADDSUM` double NOT NULL DEFAULT '0' COMMENT 'Price Surcharge/Reduction amount',
  `OXADDSUMTYPE` enum('abs','%') NOT NULL DEFAULT 'abs' COMMENT 'Price Surcharge/Reduction type (abs|%)',
  `OXADDSUMRULES` int(11) NOT NULL DEFAULT '0' COMMENT 'Base of price surcharge/reduction: 1 - Value of all goods in cart, 2 - Discounts, 4 - Vouchers, 8 - Shipping costs, 16 - Gift Wrapping/Greeting Card',
  `OXFROMBONI` int(11) NOT NULL DEFAULT '0' COMMENT 'Minimal Credit Rating ',
  `OXFROMAMOUNT` double NOT NULL DEFAULT '0' COMMENT 'Purchase Price: From',
  `OXTOAMOUNT` double NOT NULL DEFAULT '0' COMMENT 'Purchase Price: To',
  `OXVALDESC` text NOT NULL COMMENT 'Payment additional fields, separated by "field1__@@field2" (multilanguage)',
  `OXCHECKED` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Selected as the default method',
  `OXDESC_1` varchar(128) NOT NULL DEFAULT '',
  `OXVALDESC_1` text NOT NULL,
  `OXDESC_2` varchar(128) NOT NULL DEFAULT '',
  `OXVALDESC_2` text NOT NULL,
  `OXDESC_3` varchar(128) NOT NULL DEFAULT '',
  `OXVALDESC_3` text NOT NULL,
  `OXLONGDESC` text NOT NULL COMMENT 'Long description (multilanguage)',
  `OXLONGDESC_1` text NOT NULL,
  `OXLONGDESC_2` text NOT NULL,
  `OXLONGDESC_3` text NOT NULL,
  `OXSORT` int(5) NOT NULL DEFAULT '0' COMMENT 'Sorting',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXACTIVE` (`OXACTIVE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Payment methods';

INSERT INTO `oxpayments` (`OXID`, `OXACTIVE`, `OXDESC`, `OXADDSUM`, `OXADDSUMTYPE`, `OXADDSUMRULES`, `OXFROMBONI`, `OXFROMAMOUNT`, `OXTOAMOUNT`, `OXVALDESC`, `OXCHECKED`, `OXDESC_1`, `OXVALDESC_1`, `OXDESC_2`, `OXVALDESC_2`, `OXDESC_3`, `OXVALDESC_3`, `OXLONGDESC`, `OXLONGDESC_1`, `OXLONGDESC_2`, `OXLONGDESC_3`, `OXSORT`, `OXTIMESTAMP`) VALUES
('oxempty',	1,	'Empty',	0,	'abs',	0,	0,	0,	0,	'',	0,	'Empty',	'',	'',	'',	'',	'',	'for other countries',	'An example. Maybe for use with other countries',	'',	'',	100,	'2021-09-21 11:58:45'),
('oxidcashondel',	1,	'Nachnahme',	7.5,	'abs',	0,	0,	0,	1000000,	'',	1,	'COD (Cash on Delivery)',	'',	'',	'',	'',	'',	'',	'',	'',	'',	600,	'2021-09-21 11:58:45'),
('oxidcreditcard',	1,	'Kreditkarte',	20.9,	'abs',	0,	500,	0,	1000000,	'kktype__@@kknumber__@@kkmonth__@@kkyear__@@kkname__@@kkpruef__@@',	1,	'Credit Card',	'kktype__@@kknumber__@@kkmonth__@@kkyear__@@kkname__@@kkpruef__@@',	'',	'',	'',	'',	'Die Belastung Ihrer Kreditkarte erfolgt mit dem Abschluss der Bestellung.',	'Your Credit Card will be charged when you submit the order.',	'',	'',	500,	'2021-09-21 11:58:45'),
('oxiddebitnote',	1,	'Bankeinzug/Lastschrift',	0,	'abs',	0,	0,	0,	1000000,	'lsbankname__@@lsblz__@@lsktonr__@@lsktoinhaber__@@',	0,	'Direct Debit',	'lsbankname__@@lsblz__@@lsktonr__@@lsktoinhaber__@@',	'',	'',	'',	'',	'Die Belastung Ihres Kontos erfolgt mit dem Versand der Ware.',	'Your bank account will be charged when the order is shipped.',	'',	'',	400,	'2021-09-21 11:58:45'),
('oxidinvoice',	1,	'Rechnung',	0,	'abs',	0,	800,	0,	1000000,	'',	0,	'Invoice',	'',	'',	'',	'',	'',	'',	'',	'',	'',	200,	'2021-09-21 11:58:45'),
('oxidpayadvance',	1,	'Vorauskasse',	0,	'abs',	0,	0,	0,	1000000,	'',	1,	'Cash in advance',	'',	'',	'',	'',	'',	'',	'',	'',	'',	300,	'2021-09-21 11:58:45'),
('oxidpaypal',	1,	'PayPal',	0,	'abs',	0,	0,	0,	10000,	'',	0,	'PayPal',	'',	'',	'',	'',	'',	'<div>PayPal v2</div>',	'<div>PayPal v2</div>',	'',	'',	0,	'2021-09-21 12:05:24');

DROP TABLE IF EXISTS `oxprice2article`;
CREATE TABLE `oxprice2article` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Record id',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXARTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Article id (oxarticles)',
  `OXADDABS` double NOT NULL DEFAULT '0' COMMENT 'Price, that will be used for specified article if basket amount is between oxamount and oxamountto',
  `OXADDPERC` double NOT NULL DEFAULT '0' COMMENT 'Discount, that will be used for specified article if basket amount is between oxamount and oxamountto',
  `OXAMOUNT` double NOT NULL DEFAULT '0' COMMENT 'Quantity: From',
  `OXAMOUNTTO` double NOT NULL DEFAULT '0' COMMENT 'Quantity: To',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXSHOPID` (`OXSHOPID`),
  KEY `OXARTID` (`OXARTID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Article scale prices';


DROP TABLE IF EXISTS `oxpricealarm`;
CREATE TABLE `oxpricealarm` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Price alarm id',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXUSERID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'User id (oxuser)',
  `OXEMAIL` varchar(128) NOT NULL DEFAULT '' COMMENT 'Recipient email',
  `OXARTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Article id (oxarticles)',
  `OXPRICE` double NOT NULL DEFAULT '0' COMMENT 'Expected (user) price, when notification email should be sent',
  `OXCURRENCY` varchar(32) NOT NULL DEFAULT '' COMMENT 'Currency',
  `OXLANG` int(2) NOT NULL DEFAULT '0' COMMENT 'Language id',
  `OXINSERT` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Creation time',
  `OXSENDED` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Time, when notification was sent',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Price fall alarm requests';


DROP TABLE IF EXISTS `oxps_paypal_order`;
CREATE TABLE `oxps_paypal_order` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Record id',
  `OXSHOPID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Shop id (oxshops)',
  `OXORDERID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'oxorder OXID',
  `OXPAYPALORDERID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'PayPal Order ID',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXORDERID` (`OXORDERID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Primary key';


DROP TABLE IF EXISTS `oxps_paypal_subscription`;
CREATE TABLE `oxps_paypal_subscription` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Record id',
  `OXSHOPID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Shop id (oxshops)',
  `OXUSERID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'User id (oxuser)',
  `OXORDERID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Order id (oxorder)',
  `OXPARENTORDERID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Parent Order id (oxorder)',
  `OXPAYPALSUBPRODID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'OXID (paypal_subscription_product)',
  `PAYPALBILLINGAGREEMENTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'PayPal Billing Agreement ID',
  `PAYPALBILLINGCYCLETYPE` char(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Billing Cycle Type (TRIAL, REGULAR)',
  `PAYPALBILLINGCYCLENR` int(10) unsigned NOT NULL COMMENT 'Billing Cycle Number',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Primary key';


DROP TABLE IF EXISTS `oxps_paypal_subscription_product`;
CREATE TABLE `oxps_paypal_subscription_product` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Record id',
  `OXSHOPID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Shop id (oxshops)',
  `OXARTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'OXID product ID',
  `PAYPALPRODUCTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'PayPal product ID',
  `PAYPALSUBSCRIPTIONPLANID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'PayPal PLan ID',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Primary key';


DROP TABLE IF EXISTS `oxratings`;
CREATE TABLE `oxratings` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Rating id',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXUSERID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'User id (oxuser)',
  `OXTYPE` enum('oxarticle','oxrecommlist') NOT NULL COMMENT 'Rating type (oxarticle, oxrecommlist)',
  `OXOBJECTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Article or Listmania id (oxarticles or oxrecommlists)',
  `OXRATING` int(1) NOT NULL DEFAULT '0' COMMENT 'Rating',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `oxobjectsearch` (`OXTYPE`,`OXOBJECTID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Articles and Listmania ratings';


DROP TABLE IF EXISTS `oxrecommlists`;
CREATE TABLE `oxrecommlists` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Listmania id',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXUSERID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'User id (oxuser)',
  `OXAUTHOR` varchar(255) NOT NULL DEFAULT '' COMMENT 'Author first and last name',
  `OXTITLE` varchar(255) NOT NULL DEFAULT '' COMMENT 'Title',
  `OXDESC` text NOT NULL COMMENT 'Description',
  `OXRATINGCNT` int(11) NOT NULL DEFAULT '0' COMMENT 'Rating votes count',
  `OXRATING` double NOT NULL DEFAULT '0' COMMENT 'Rating',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Listmania';


DROP TABLE IF EXISTS `oxremark`;
CREATE TABLE `oxremark` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Record id',
  `OXPARENTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'User id (oxuser)',
  `OXTYPE` enum('o','r','n','c') NOT NULL DEFAULT 'r' COMMENT 'Record type: o - order, r - remark, n - newsletter, c - registration',
  `OXHEADER` varchar(255) NOT NULL DEFAULT '' COMMENT 'Header (default: Creation time)',
  `OXTEXT` text NOT NULL COMMENT 'Remark text',
  `OXCREATE` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Creation time',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXPARENTID` (`OXPARENTID`),
  KEY `OXTYPE` (`OXTYPE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='User History';


DROP TABLE IF EXISTS `oxreviews`;
CREATE TABLE `oxreviews` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Review id',
  `OXACTIVE` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Active',
  `OXOBJECTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Article or Listmania id (oxarticles or oxrecommlist)',
  `OXTYPE` enum('oxarticle','oxrecommlist') NOT NULL COMMENT 'Review type (oxarticle, oxrecommlist)',
  `OXTEXT` text NOT NULL COMMENT 'Review text',
  `OXUSERID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'User id (oxuser)',
  `OXCREATE` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Creation time',
  `OXLANG` tinyint(3) NOT NULL DEFAULT '0' COMMENT 'Language id',
  `OXRATING` int(1) NOT NULL DEFAULT '0' COMMENT 'Rating',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `oxobjectsearch` (`OXTYPE`,`OXOBJECTID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Articles and Listmania reviews';


DROP TABLE IF EXISTS `oxrolefields`;
CREATE TABLE `oxrolefields` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Field id',
  `OXNAME` varchar(255) NOT NULL COMMENT 'Role name',
  `OXPARAM` varchar(255) NOT NULL COMMENT 'Parameters',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `oxrolefields` (`OXID`, `OXNAME`, `OXPARAM`, `OXTIMESTAMP`) VALUES
('42b44bc9934bdb406.85935627',	'TOBASKET',	'tobasket;basket',	'2021-09-21 11:58:51'),
('42b44bc9941a46fd3.13180499',	'SHOWLONGDESCRIPTION',	'',	'2021-09-21 11:58:51'),
('42b44bc99488c66b1.94059993',	'SHOWARTICLEPRICE',	'',	'2021-09-21 11:58:51'),
('42b44bc9950334951.12393781',	'SHOWSHORTDESCRIPTION',	'',	'2021-09-21 11:58:51');

DROP TABLE IF EXISTS `oxroles`;
CREATE TABLE `oxroles` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Role id',
  `OXTITLE` varchar(255) NOT NULL COMMENT 'Role title',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXACTIVE` int(1) NOT NULL DEFAULT '0' COMMENT 'Active',
  `OXAREA` int(1) NOT NULL COMMENT 'Which area this role belongs: 0 - Admin, 1 - Shop',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXACTIVE` (`OXACTIVE`),
  KEY `OXSHOPID` (`OXSHOPID`),
  KEY `OXAREA` (`OXAREA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shop and Admin Roles';


DROP TABLE IF EXISTS `oxselectlist`;
CREATE TABLE `oxselectlist` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Selection list id',
  `OXMAPID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Integer mapping identifier',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXTITLE` varchar(254) NOT NULL DEFAULT '' COMMENT 'Title (multilanguage)',
  `OXIDENT` varchar(255) NOT NULL DEFAULT '' COMMENT 'Working Title',
  `OXVALDESC` text NOT NULL COMMENT 'List fields, separated by "[field_name]!P![price]__@@[field_name]__@@" (multilanguage)',
  `OXTITLE_1` varchar(255) NOT NULL DEFAULT '',
  `OXVALDESC_1` text NOT NULL,
  `OXTITLE_2` varchar(255) NOT NULL DEFAULT '',
  `OXVALDESC_2` text NOT NULL,
  `OXTITLE_3` varchar(255) NOT NULL DEFAULT '',
  `OXVALDESC_3` text NOT NULL,
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXMAPID` (`OXMAPID`),
  KEY `OXSHOPID` (`OXSHOPID`),
  KEY `OXTITLE` (`OXTITLE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Selection lists';


DROP TABLE IF EXISTS `oxselectlist2shop`;
CREATE TABLE `oxselectlist2shop` (
  `OXSHOPID` int(11) NOT NULL COMMENT 'Mapped shop id',
  `OXMAPOBJECTID` int(11) NOT NULL COMMENT 'Mapped object id',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  UNIQUE KEY `OXMAPIDX` (`OXSHOPID`,`OXMAPOBJECTID`),
  KEY `OXMAPOBJECTID` (`OXMAPOBJECTID`),
  KEY `OXSHOPID` (`OXSHOPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Mapping table for element subshop assignments';


DROP TABLE IF EXISTS `oxseo`;
CREATE TABLE `oxseo` (
  `OXOBJECTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Object id',
  `OXIDENT` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Hashed seo url (md5)',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXLANG` int(2) NOT NULL DEFAULT '0' COMMENT 'Language id',
  `OXSTDURL` varchar(2048) NOT NULL COMMENT 'Primary url, not seo encoded',
  `OXSEOURL` varchar(2048) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL COMMENT 'Old seo url',
  `OXTYPE` enum('static','oxarticle','oxcategory','oxvendor','oxcontent','dynamic','oxmanufacturer') NOT NULL COMMENT 'Record type',
  `OXFIXED` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Fixed',
  `OXEXPIRED` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Expired',
  `OXPARAMS` char(32) NOT NULL DEFAULT '' COMMENT 'Params',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXIDENT`,`OXSHOPID`,`OXLANG`),
  UNIQUE KEY `search` (`OXTYPE`,`OXOBJECTID`,`OXSHOPID`,`OXLANG`,`OXPARAMS`),
  KEY `OXOBJECTID` (`OXLANG`,`OXOBJECTID`,`OXSHOPID`),
  KEY `SEARCHSTD` (`OXSTDURL`(100),`OXSHOPID`),
  KEY `SEARCHSEO` (`OXSEOURL`(100))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Seo urls information';

INSERT INTO `oxseo` (`OXOBJECTID`, `OXIDENT`, `OXSHOPID`, `OXLANG`, `OXSTDURL`, `OXSEOURL`, `OXTYPE`, `OXFIXED`, `OXEXPIRED`, `OXPARAMS`, `OXTIMESTAMP`) VALUES
('c8edd7319fdc59a0f28db056f72b4d17',	'023abc17c853f9bccc201c5afd549a92',	1,	1,	'index.php?cl=account_wishlist',	'en/my-gift-registry/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('e5340b054530ea779fb1802e93c8183e',	'02b4c1e4049b1baffba090c95a7edbf7',	1,	0,	'index.php?cl=invite',	'Laden-Sie-Ihre-Freunde/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('ada21f25e0cbf52157ea31d5bd5e4699',	'0469752d03d80da379a679aaef4c0546',	1,	1,	'index.php?cl=suggest',	'en/recommend/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('f52b25bb4e58480a2df8c06b65b4901c',	'063c82502d9dd528ce2cc40ceb76ade7',	1,	1,	'index.php?cl=compare',	'en/my-product-comparison/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('67c5bcf75ee346bd9566bce6c8',	'0d2f22b49c64eaa138d717ec752e3be3',	1,	0,	'index.php?cl=credits&amp;oxcid=67c5bcf75ee346bd9566bce6c8',	'Credits/',	'oxcontent',	1,	0,	'',	'2021-09-21 11:58:45'),
('8854fb64f8934f8d399eac52cca4136f',	'1368f5e45468ca1e1c7c84f174785c35',	1,	1,	'index.php?cl=account_noticelist',	'en/my-wish-list/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('c8edd7319fdc59a0f28db056f72b4d17',	'1f30ae9b1c78b7dc89d3e5fe9eb0de59',	1,	0,	'index.php?cl=account_wishlist',	'mein-wunschzettel/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('d21804a99d13c9cc50c0c6206547922f',	'295d6617dc22b6d8186667ecd6e3ae87',	1,	0,	'index.php?cl=clearcookies',	'cookies/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('a9d28c6f1eae708a031d930117fc3740',	'3a41965fb36fb45df7f4f9a4377f6364',	1,	1,	'index.php?cl=newsletter',	'en/newsletter/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('5abe5ca9e2a5166fb64f0eb76f45edac',	'3bdd64bd8073d044d8fd60334ed9b725',	1,	1,	'index.php?cl=start',	'en/home/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('9c08d8934d13b2af47383f5a24fedb5c',	'4a70a4cd11d63fdce96fbe4ba8e714e6',	1,	1,	'index.php?cnid=oxmore&amp;cl=alist',	'en/more/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('9c08d8934d13b2af47383f5a24fedb5c',	'4d3d4d70b09b5d2bd992991361374c67',	1,	0,	'index.php?cnid=oxmore&amp;cl=alist',	'mehr/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('21eddcf0e16b9fbdb044f4d9678b55c6',	'510fef34e5d9b86f6a77af949d15950e',	1,	1,	'index.php?cl=account',	'en/my-account/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('9d0f22a4f43ea825f9cd3ebf5a7bde23',	'5668048844927ca2767140c219e04efc',	1,	1,	'index.php?cl=account_user',	'en/my-address/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('3ebbaef4dd461b3c12020f8a076f0212',	'5cc081514a72b0ce3d7eec4fb1e6f1dd',	1,	1,	'index.php?cl=forgotpwd',	'en/forgot-password/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('c4b506be468a1f71f2eb6e7bbceb0c57',	'5d752e9e8302eeb21df24d1aee573234',	1,	0,	'index.php?cl=wishlist',	'wunschzettel/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('70cc13db1bda9cdb8403879a11032e5a',	'5eb126725ba500e6bbf1aecaa876dc48',	1,	1,	'index.php?cl=review',	'en/product-review/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('079db242c1b848e874f3ac299edc9d77',	'637daadf1eaad2b9641333c2b1572883',	1,	0,	'index.php?cl=news',	'news/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('0b1c46ce2b6d34d1a25e1719809f9f8d',	'6b30b01fe01b80894efc0f29610e5215',	1,	0,	'index.php?cl=account_password',	'mein-passwort/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('0b1c46ce2b6d34d1a25e1719809f9f8d',	'6c890ac1255a99f8d1eb46f1193843d6',	1,	1,	'index.php?cl=account_password',	'en/my-password/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('e2af574a8e963c354d4555159e54a516',	'7685924d3f3fb7e9bda421c57f665af4',	1,	1,	'index.php?cl=contact',	'en/contact/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('ada21f25e0cbf52157ea31d5bd5e4699',	'82dd672d68d8f6c943f98ccdaecda691',	1,	0,	'index.php?cl=suggest',	'empfehlen/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('21eddcf0e16b9fbdb044f4d9678b55c6',	'89c5e6bf1b5441599c4815281debe8df',	1,	0,	'index.php?cl=account',	'mein-konto/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('fc0914f85af554513b2bfc8f09368244',	'8afe769d3de8b5db0a872b23f959dd36',	1,	1,	'index.php?cl=download',	'en/download/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('67a55f21d85ee47a3431b8292758a7a1',	'8e7ebaebb0a810576453082e1f8f2fa3',	1,	1,	'index.php?cl=account_recommlist',	'en/my-listmania-list/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('f41fdc9d234527d959c9d4c412c8cca7',	'9372b6be2d98021fb93302a6a34bfc8c',	1,	1,	'index.php?cl=recommlist',	'en/Recommendation-Lists/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('7ec4cddc7e3fe3bcf0410569355ff84e',	'9508bb0d70121d49e4d4554c5b1af81d',	1,	0,	'index.php?cl=links',	'links/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('bb8c75b6c8a3932f504250014529b78b',	'9ff5c21cbc84dbfe815013236e132baf',	1,	1,	'index.php?cl=account_order',	'en/order-history/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('67c5bcf75ee346bd9566bce6c8',	'a150a7b6945213daa7f138e1a042cbb4',	1,	1,	'index.php?cl=credits&amp;oxcid=67c5bcf75ee346bd9566bce6c8',	'en/Credits/',	'oxcontent',	1,	0,	'',	'2021-09-21 11:58:45'),
('2b3cb8ed3e86f31772f1ac6ac83315db',	'a1b330b85c6f51fd9b50b1eb19707d84',	1,	1,	'index.php?cl=register',	'en/open-account/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('8854fb64f8934f8d399eac52cca4136f',	'a24b03f1a3f73c325a7647e6039e2359',	1,	0,	'index.php?cl=account_noticelist',	'mein-merkzettel/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('f41fdc9d234527d959c9d4c412c8cca7',	'a4e5995182ade3cf039800c0ec2d512d',	1,	0,	'index.php?cl=recommlist',	'Empfehlungslisten/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('e5340b054530ea779fb1802e93c8183e',	'a6b775aec57d06b46a958efbafdc7875',	1,	1,	'index.php?cl=invite',	'en/Invite-your-friends/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('9d0f22a4f43ea825f9cd3ebf5a7bde23',	'a7d5ab5a4e87693998c5aec066dda6e6',	1,	0,	'index.php?cl=account_user',	'meine-adressen/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('3ebbaef4dd461b3c12020f8a076f0212',	'a9afb500184c584fb5ab2ad9b4162e96',	1,	0,	'index.php?cl=forgotpwd',	'passwort-vergessen/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('2b3cb8ed3e86f31772f1ac6ac83315db',	'acddcfef9c25bcae3b96eb00669541ff',	1,	0,	'index.php?cl=register',	'konto-eroeffnen/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('c4b506be468a1f71f2eb6e7bbceb0c57',	'b93b703d313e89662773cffaab750f1d',	1,	1,	'index.php?cl=wishlist',	'en/gift-registry/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('67a55f21d85ee47a3431b8292758a7a1',	'baa3b653a618696b06c70a6dda95ebde',	1,	0,	'index.php?cl=account_recommlist',	'meine-lieblingslisten/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('fc0914f85af554513b2bfc8f09368244',	'c552cb8718cde5cb792e181f78f5fde1',	1,	0,	'index.php?cl=download',	'download/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('882acc7454f973844d4917515181dcba',	'c74bbaf961498de897ba7eb98fea8274',	1,	1,	'index.php?cl=account_downloads',	'en/my-downloads/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('70cc13db1bda9cdb8403879a11032e5a',	'cc28156a4f728c1b33e7e02fd846628e',	1,	0,	'index.php?cl=review',	'bewertungen/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('5abe5ca9e2a5166fb64f0eb76f45edac',	'ccca27059506a916fb64d673a5dd676b',	1,	0,	'index.php?cl=start',	'startseite/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('d21804a99d13c9cc50c0c6206547922f',	'd50c753d406338d92f52fe55de1e98dd',	1,	1,	'index.php?cl=clearcookies',	'en/cookies/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('f52b25bb4e58480a2df8c06b65b4901c',	'e0dd29a75947539da6b1924d31c9849f',	1,	0,	'index.php?cl=compare',	'mein-produktvergleich/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('079db242c1b848e874f3ac299edc9d77',	'e5a8de0e49e91c5728eadfcb233bdbd1',	1,	1,	'index.php?cl=news',	'en/news/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('a9d28c6f1eae708a031d930117fc3740',	'e604233c5a2804d21ec0252a445e93d3',	1,	0,	'index.php?cl=newsletter',	'newsletter/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('8be5f76ba0ed85f4c2fd9e57cd137a05',	'e6331d115f5323610c639ef2f0369f8a',	1,	0,	'index.php?cl=basket',	'warenkorb/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('bb8c75b6c8a3932f504250014529b78b',	'eb692d07ec8608d943db0a3bca29c4ce',	1,	0,	'index.php?cl=account_order',	'bestellhistorie/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('8be5f76ba0ed85f4c2fd9e57cd137a05',	'ecaf0240f9f46bbee5ffc6dd73d0b7f0',	1,	1,	'index.php?cl=basket',	'en/cart/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('882acc7454f973844d4917515181dcba',	'f1c7ccb53fc8d6f239b39d2fc2b76829',	1,	0,	'index.php?cl=account_downloads',	'de/my-downloads/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('7ec4cddc7e3fe3bcf0410569355ff84e',	'f80ace8f87e1d7f446ab1fa58f275f4c',	1,	1,	'index.php?cl=links',	'en/links/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('943173edecf6d6870a0f357b8ac84d32',	'f8335c84c1daa5b13657124f45c0e08b',	1,	0,	'index.php?cl=alist&amp;cnid=943173edecf6d6870a0f357b8ac84d32',	'Wakeboarding/',	'oxcategory',	0,	0,	'',	'2021-09-21 11:58:45'),
('e2af574a8e963c354d4555159e54a516',	'f9d1a02ab749dc360c4e21f21de1beaf',	1,	0,	'index.php?cl=contact',	'kontakt/',	'static',	0,	0,	'',	'2021-09-21 11:58:45'),
('0f4270b89fbef1481958381410a0dbca',	'fad614c0f4922228623ae0696b55481f',	1,	1,	'index.php?cl=alist&amp;cnid=0f4270b89fbef1481958381410a0dbca',	'en/Wakeboarding/Wakeboards/',	'oxcategory',	1,	0,	'',	'2021-09-21 11:58:45');

DROP TABLE IF EXISTS `oxseohistory`;
CREATE TABLE `oxseohistory` (
  `OXOBJECTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Object id',
  `OXIDENT` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Hashed url (md5)',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXLANG` int(2) NOT NULL DEFAULT '0' COMMENT 'Language id',
  `OXHITS` bigint(20) NOT NULL DEFAULT '0' COMMENT 'Hits',
  `OXINSERT` timestamp NULL DEFAULT NULL COMMENT 'Creation time',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXIDENT`,`OXSHOPID`,`OXLANG`),
  KEY `search` (`OXOBJECTID`,`OXSHOPID`,`OXLANG`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Seo urls history. If url does not exists in oxseo, then checks here and redirects';


DROP TABLE IF EXISTS `oxseologs`;
CREATE TABLE `oxseologs` (
  `OXSTDURL` text NOT NULL COMMENT 'Primary url, not seo encoded',
  `OXIDENT` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Hashed seo url',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXLANG` int(11) NOT NULL COMMENT 'Language id',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXIDENT`,`OXSHOPID`,`OXLANG`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Seo logging. Logs bad requests';


DROP TABLE IF EXISTS `oxshops`;
CREATE TABLE `oxshops` (
  `OXID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id',
  `OXPARENTID` int(11) NOT NULL DEFAULT '0' COMMENT 'Parent id',
  `OXACTIVE` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Active',
  `OXISINHERITED` int(11) NOT NULL DEFAULT '0' COMMENT 'Shop inherits all inheritable items (products, discounts etc) from it`s parent shop',
  `OXISMULTISHOP` int(11) NOT NULL DEFAULT '0' COMMENT 'Shop is multishop (loads all products from all shops)',
  `OXISSUPERSHOP` int(11) NOT NULL DEFAULT '0' COMMENT 'Shop is supershop (you can assign products to any shop)',
  `OXPRODUCTIVE` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Productive Mode (if 0, debug info displayed)',
  `OXDEFCURRENCY` varchar(32) NOT NULL DEFAULT '' COMMENT 'Default currency',
  `OXDEFLANGUAGE` int(11) NOT NULL DEFAULT '0' COMMENT 'Default language id',
  `OXNAME` varchar(255) NOT NULL DEFAULT '' COMMENT 'Shop name',
  `OXTITLEPREFIX` varchar(255) NOT NULL DEFAULT '' COMMENT 'Seo title prefix (multilanguage)',
  `OXTITLEPREFIX_1` varchar(255) NOT NULL DEFAULT '',
  `OXTITLEPREFIX_2` varchar(255) NOT NULL DEFAULT '',
  `OXTITLEPREFIX_3` varchar(255) NOT NULL DEFAULT '',
  `OXTITLESUFFIX` varchar(255) NOT NULL DEFAULT '' COMMENT 'Seo title suffix (multilanguage)',
  `OXTITLESUFFIX_1` varchar(255) NOT NULL DEFAULT '',
  `OXTITLESUFFIX_2` varchar(255) NOT NULL DEFAULT '',
  `OXTITLESUFFIX_3` varchar(255) NOT NULL DEFAULT '',
  `OXSTARTTITLE` varchar(255) NOT NULL DEFAULT '' COMMENT 'Start page title (multilanguage)',
  `OXSTARTTITLE_1` varchar(255) NOT NULL DEFAULT '',
  `OXSTARTTITLE_2` varchar(255) NOT NULL DEFAULT '',
  `OXSTARTTITLE_3` varchar(255) NOT NULL DEFAULT '',
  `OXINFOEMAIL` varchar(255) NOT NULL DEFAULT '' COMMENT 'Informational email address',
  `OXORDEREMAIL` varchar(255) NOT NULL DEFAULT '' COMMENT 'Order email address',
  `OXOWNEREMAIL` varchar(255) NOT NULL DEFAULT '' COMMENT 'Owner email address',
  `OXORDERSUBJECT` varchar(255) NOT NULL DEFAULT '' COMMENT 'Order email subject (multilanguage)',
  `OXREGISTERSUBJECT` varchar(255) NOT NULL DEFAULT '' COMMENT 'Registration email subject (multilanguage)',
  `OXFORGOTPWDSUBJECT` varchar(255) NOT NULL DEFAULT '' COMMENT 'Forgot password email subject (multilanguage)',
  `OXSENDEDNOWSUBJECT` varchar(255) NOT NULL DEFAULT '' COMMENT 'Order sent email subject (multilanguage)',
  `OXORDERSUBJECT_1` varchar(255) NOT NULL DEFAULT '',
  `OXREGISTERSUBJECT_1` varchar(255) NOT NULL DEFAULT '',
  `OXFORGOTPWDSUBJECT_1` varchar(255) NOT NULL DEFAULT '',
  `OXSENDEDNOWSUBJECT_1` varchar(255) NOT NULL DEFAULT '',
  `OXORDERSUBJECT_2` varchar(255) NOT NULL DEFAULT '',
  `OXREGISTERSUBJECT_2` varchar(255) NOT NULL DEFAULT '',
  `OXFORGOTPWDSUBJECT_2` varchar(255) NOT NULL DEFAULT '',
  `OXSENDEDNOWSUBJECT_2` varchar(255) NOT NULL DEFAULT '',
  `OXORDERSUBJECT_3` varchar(255) NOT NULL DEFAULT '',
  `OXREGISTERSUBJECT_3` varchar(255) NOT NULL DEFAULT '',
  `OXFORGOTPWDSUBJECT_3` varchar(255) NOT NULL DEFAULT '',
  `OXSENDEDNOWSUBJECT_3` varchar(255) NOT NULL DEFAULT '',
  `OXSMTP` varchar(255) NOT NULL DEFAULT '' COMMENT 'SMTP server',
  `OXSMTPUSER` varchar(128) NOT NULL DEFAULT '' COMMENT 'SMTP user',
  `OXSMTPPWD` varchar(128) NOT NULL DEFAULT '' COMMENT 'SMTP password',
  `OXCOMPANY` varchar(128) NOT NULL DEFAULT '' COMMENT 'Your company',
  `OXSTREET` varchar(255) NOT NULL DEFAULT '' COMMENT 'Street',
  `OXZIP` varchar(255) NOT NULL DEFAULT '' COMMENT 'ZIP code',
  `OXCITY` varchar(255) NOT NULL DEFAULT '' COMMENT 'City',
  `OXCOUNTRY` varchar(255) NOT NULL DEFAULT '' COMMENT 'Country',
  `OXBANKNAME` varchar(255) NOT NULL DEFAULT '' COMMENT 'Bank name',
  `OXBANKNUMBER` varchar(255) NOT NULL DEFAULT '' COMMENT 'Account Number',
  `OXBANKCODE` varchar(255) NOT NULL DEFAULT '' COMMENT 'Routing Number',
  `OXVATNUMBER` varchar(255) NOT NULL DEFAULT '' COMMENT 'Sales Tax ID',
  `OXTAXNUMBER` varchar(255) NOT NULL DEFAULT '' COMMENT 'Tax ID',
  `OXBICCODE` varchar(255) NOT NULL DEFAULT '' COMMENT 'Bank BIC',
  `OXIBANNUMBER` varchar(255) NOT NULL DEFAULT '' COMMENT 'Bank IBAN',
  `OXFNAME` varchar(255) NOT NULL DEFAULT '' COMMENT 'First name',
  `OXLNAME` varchar(255) NOT NULL DEFAULT '' COMMENT 'Last name',
  `OXTELEFON` varchar(255) NOT NULL DEFAULT '' COMMENT 'Phone number',
  `OXTELEFAX` varchar(255) NOT NULL DEFAULT '' COMMENT 'Fax number',
  `OXURL` varchar(255) NOT NULL DEFAULT '' COMMENT 'Shop url',
  `OXDEFCAT` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Default category id',
  `OXHRBNR` varchar(64) NOT NULL DEFAULT '' COMMENT 'CBR',
  `OXCOURT` varchar(128) NOT NULL DEFAULT '' COMMENT 'District Court',
  `OXADBUTLERID` varchar(64) NOT NULL DEFAULT '' COMMENT 'Adbutler code (belboon.de) - deprecated',
  `OXAFFILINETID` varchar(64) NOT NULL DEFAULT '' COMMENT 'Affilinet code (webmasterplan.com) - deprecated',
  `OXSUPERCLICKSID` varchar(64) NOT NULL DEFAULT '' COMMENT 'Superclix code (superclix.de) - deprecated',
  `OXAFFILIWELTID` varchar(64) NOT NULL DEFAULT '' COMMENT 'Affiliwelt code (affiliwelt.net) - deprecated',
  `OXAFFILI24ID` varchar(64) NOT NULL DEFAULT '' COMMENT 'Affili24 code (affili24.com) - deprecated',
  `OXEDITION` char(2) NOT NULL COMMENT 'Shop Edition (CE,PE,EE (@deprecated since v6.0.0-RC.2 (2017-08-24))',
  `OXVERSION` char(16) NOT NULL COMMENT 'Shop Version (@deprecated since v6.0.0-RC.2 (2017-08-22))',
  `OXSEOACTIVE` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Seo active (multilanguage)',
  `OXSEOACTIVE_1` tinyint(1) NOT NULL DEFAULT '1',
  `OXSEOACTIVE_2` tinyint(1) NOT NULL DEFAULT '1',
  `OXSEOACTIVE_3` tinyint(1) NOT NULL DEFAULT '1',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  `OXSERIAL` varchar(255) NOT NULL DEFAULT '' COMMENT 'Shop license number',
  PRIMARY KEY (`OXID`),
  KEY `OXACTIVE` (`OXACTIVE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shop config';

INSERT INTO `oxshops` (`OXID`, `OXPARENTID`, `OXACTIVE`, `OXISINHERITED`, `OXISMULTISHOP`, `OXISSUPERSHOP`, `OXPRODUCTIVE`, `OXDEFCURRENCY`, `OXDEFLANGUAGE`, `OXNAME`, `OXTITLEPREFIX`, `OXTITLEPREFIX_1`, `OXTITLEPREFIX_2`, `OXTITLEPREFIX_3`, `OXTITLESUFFIX`, `OXTITLESUFFIX_1`, `OXTITLESUFFIX_2`, `OXTITLESUFFIX_3`, `OXSTARTTITLE`, `OXSTARTTITLE_1`, `OXSTARTTITLE_2`, `OXSTARTTITLE_3`, `OXINFOEMAIL`, `OXORDEREMAIL`, `OXOWNEREMAIL`, `OXORDERSUBJECT`, `OXREGISTERSUBJECT`, `OXFORGOTPWDSUBJECT`, `OXSENDEDNOWSUBJECT`, `OXORDERSUBJECT_1`, `OXREGISTERSUBJECT_1`, `OXFORGOTPWDSUBJECT_1`, `OXSENDEDNOWSUBJECT_1`, `OXORDERSUBJECT_2`, `OXREGISTERSUBJECT_2`, `OXFORGOTPWDSUBJECT_2`, `OXSENDEDNOWSUBJECT_2`, `OXORDERSUBJECT_3`, `OXREGISTERSUBJECT_3`, `OXFORGOTPWDSUBJECT_3`, `OXSENDEDNOWSUBJECT_3`, `OXSMTP`, `OXSMTPUSER`, `OXSMTPPWD`, `OXCOMPANY`, `OXSTREET`, `OXZIP`, `OXCITY`, `OXCOUNTRY`, `OXBANKNAME`, `OXBANKNUMBER`, `OXBANKCODE`, `OXVATNUMBER`, `OXTAXNUMBER`, `OXBICCODE`, `OXIBANNUMBER`, `OXFNAME`, `OXLNAME`, `OXTELEFON`, `OXTELEFAX`, `OXURL`, `OXDEFCAT`, `OXHRBNR`, `OXCOURT`, `OXADBUTLERID`, `OXAFFILINETID`, `OXSUPERCLICKSID`, `OXAFFILIWELTID`, `OXAFFILI24ID`, `OXEDITION`, `OXVERSION`, `OXSEOACTIVE`, `OXSEOACTIVE_1`, `OXSEOACTIVE_2`, `OXSEOACTIVE_3`, `OXTIMESTAMP`, `OXSERIAL`) VALUES
(1,	0,	1,	0,	0,	1,	0,	'',	0,	'OXID eShop 6',	'OXID eShop 6',	'OXID eShop 6',	'',	'',	'online kaufen',	'purchase online',	'',	'',	'Der Onlineshop',	'Online Shop',	'',	'',	'info@myoxideshop.com',	'reply@myoxideshop.com',	'order@myoxideshop.com',	'Ihre Bestellung bei OXID eSales',	'Vielen Dank f√ºr Ihre Registrierung im OXID eShop',	'Ihr Passwort im OXID eShop',	'Ihre OXID eSales Bestellung wurde versandt',	'Your order at OXID eShop',	'Thank you for your registration at OXID eShop',	'Your OXID eShop password',	'Your OXID eSales Order has been shipped',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'Your Company Name',	'2425 Maple Street',	'9041',	'Any City, CA',	'United States',	'Bank of America',	'1234567890',	'900 1234567',	'',	'',	'',	'',	'John',	'Doe',	'217-8918712',	'217-8918713',	'www.myoxideshop.com',	'',	'',	'',	'',	'',	'',	'',	'',	'EE',	'6.0.0',	1,	1,	0,	0,	'2021-09-21 12:00:26',	'EF7FV-B9TA8-3R3SD-MZNU4-7NWM3-AN7AU');

DROP TABLE IF EXISTS `oxstates`;
CREATE TABLE `oxstates` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'State id',
  `OXCOUNTRYID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Country id (oxcountry)',
  `OXTITLE` char(128) NOT NULL DEFAULT '' COMMENT 'Title (multilanguage)',
  `OXISOALPHA2` char(2) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'SEO short name',
  `OXTITLE_1` char(128) NOT NULL DEFAULT '',
  `OXTITLE_2` char(128) NOT NULL DEFAULT '',
  `OXTITLE_3` char(128) NOT NULL DEFAULT '',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`,`OXCOUNTRYID`),
  KEY `OXCOUNTRYID` (`OXCOUNTRYID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='US States list';

INSERT INTO `oxstates` (`OXID`, `OXCOUNTRYID`, `OXTITLE`, `OXISOALPHA2`, `OXTITLE_1`, `OXTITLE_2`, `OXTITLE_3`, `OXTIMESTAMP`) VALUES
('AA',	'8f241f11096877ac0.98748826',	'Armed Forces Americas',	'AA',	'Armed Forces Americas',	'',	'',	'2021-09-21 11:58:45'),
('AB',	'8f241f11095649d18.02676059',	'Alberta',	'AB',	'Alberta',	'',	'',	'2021-09-21 11:58:45'),
('AE',	'8f241f11096877ac0.98748826',	'Armed Forces',	'AE',	'Armed Forces',	'',	'',	'2021-09-21 11:58:45'),
('AK',	'8f241f11096877ac0.98748826',	'Alaska',	'AK',	'Alaska',	'',	'',	'2021-09-21 11:58:45'),
('AL',	'8f241f11096877ac0.98748826',	'Alabama',	'AL',	'Alabama',	'',	'',	'2021-09-21 11:58:45'),
('AP',	'8f241f11096877ac0.98748826',	'Armed Forces Pacific',	'AP',	'Armed Forces Pacific',	'',	'',	'2021-09-21 11:58:45'),
('AR',	'8f241f11096877ac0.98748826',	'Arkansas',	'AR',	'Arkansas',	'',	'',	'2021-09-21 11:58:45'),
('AS',	'8f241f11096877ac0.98748826',	'Amerikanisch-Samoa',	'AS',	'American Samoa',	'',	'',	'2021-09-21 11:58:45'),
('AZ',	'8f241f11096877ac0.98748826',	'Arizona',	'AZ',	'Arizona',	'',	'',	'2021-09-21 11:58:45'),
('BC',	'8f241f11095649d18.02676059',	'Britisch-Kolumbien',	'BC',	'British Columbia',	'',	'',	'2021-09-21 11:58:45'),
('CA',	'8f241f11096877ac0.98748826',	'Kalifornien',	'CA',	'California',	'',	'',	'2021-09-21 11:58:45'),
('CO',	'8f241f11096877ac0.98748826',	'Colorado',	'CO',	'Colorado',	'',	'',	'2021-09-21 11:58:45'),
('CT',	'8f241f11096877ac0.98748826',	'Connecticut',	'CT',	'Connecticut',	'',	'',	'2021-09-21 11:58:45'),
('DC',	'8f241f11096877ac0.98748826',	'District of Columbia',	'DC',	'District of Columbia',	'',	'',	'2021-09-21 11:58:45'),
('DE',	'8f241f11096877ac0.98748826',	'Delaware',	'DE',	'Delaware',	'',	'',	'2021-09-21 11:58:45'),
('FL',	'8f241f11096877ac0.98748826',	'Florida',	'FL',	'Florida',	'',	'',	'2021-09-21 11:58:45'),
('FM',	'8f241f11096877ac0.98748826',	'F√∂derierten Staaten von Mikronesien',	'FM',	'Federated States of Micronesia',	'',	'',	'2021-09-21 11:58:45'),
('GA',	'8f241f11096877ac0.98748826',	'Georgia',	'GA',	'Georgia',	'',	'',	'2021-09-21 11:58:45'),
('GU',	'8f241f11096877ac0.98748826',	'Guam',	'GU',	'Guam',	'',	'',	'2021-09-21 11:58:45'),
('HI',	'8f241f11096877ac0.98748826',	'Hawaii',	'HI',	'Hawaii',	'',	'',	'2021-09-21 11:58:45'),
('IA',	'8f241f11096877ac0.98748826',	'Iowa',	'IA',	'Iowa',	'',	'',	'2021-09-21 11:58:45'),
('ID',	'8f241f11096877ac0.98748826',	'Idaho',	'ID',	'Idaho',	'',	'',	'2021-09-21 11:58:45'),
('IL',	'8f241f11096877ac0.98748826',	'Illinois',	'IL',	'Illinois',	'',	'',	'2021-09-21 11:58:45'),
('IN',	'8f241f11096877ac0.98748826',	'Indiana',	'IN',	'Indiana',	'',	'',	'2021-09-21 11:58:45'),
('KS',	'8f241f11096877ac0.98748826',	'Kansas',	'KS',	'Kansas',	'',	'',	'2021-09-21 11:58:45'),
('KY',	'8f241f11096877ac0.98748826',	'Kentucky',	'KY',	'Kentucky',	'',	'',	'2021-09-21 11:58:45'),
('LA',	'8f241f11096877ac0.98748826',	'Louisiana',	'LA',	'Louisiana',	'',	'',	'2021-09-21 11:58:45'),
('MA',	'8f241f11096877ac0.98748826',	'Massachusetts',	'MA',	'Massachusetts',	'',	'',	'2021-09-21 11:58:45'),
('MB',	'8f241f11095649d18.02676059',	'Manitoba',	'MB',	'Manitoba',	'',	'',	'2021-09-21 11:58:45'),
('MD',	'8f241f11096877ac0.98748826',	'Maryland',	'MD',	'Maryland',	'',	'',	'2021-09-21 11:58:45'),
('ME',	'8f241f11096877ac0.98748826',	'Maine',	'ME',	'Maine',	'',	'',	'2021-09-21 11:58:45'),
('MH',	'8f241f11096877ac0.98748826',	'Marshallinseln',	'MH',	'Marshall Islands',	'',	'',	'2021-09-21 11:58:45'),
('MI',	'8f241f11096877ac0.98748826',	'Michigan',	'MI',	'Michigan',	'',	'',	'2021-09-21 11:58:45'),
('MN',	'8f241f11096877ac0.98748826',	'Minnesota',	'MN',	'Minnesota',	'',	'',	'2021-09-21 11:58:45'),
('MO',	'8f241f11096877ac0.98748826',	'Missouri',	'MO',	'Missouri',	'',	'',	'2021-09-21 11:58:45'),
('MP',	'8f241f11096877ac0.98748826',	'N√∂rdlichen Marianen',	'MP',	'Northern Mariana Islands',	'',	'',	'2021-09-21 11:58:45'),
('MS',	'8f241f11096877ac0.98748826',	'Mississippi',	'MS',	'Mississippi',	'',	'',	'2021-09-21 11:58:45'),
('MT',	'8f241f11096877ac0.98748826',	'Montana',	'MT',	'Montana',	'',	'',	'2021-09-21 11:58:45'),
('NB',	'8f241f11095649d18.02676059',	'Neubraunschweig',	'NB',	'New Brunswick',	'',	'',	'2021-09-21 11:58:45'),
('NC',	'8f241f11096877ac0.98748826',	'North Carolina',	'NC',	'North Carolina',	'',	'',	'2021-09-21 11:58:45'),
('ND',	'8f241f11096877ac0.98748826',	'North Dakota',	'ND',	'North Dakota',	'',	'',	'2021-09-21 11:58:45'),
('NE',	'8f241f11096877ac0.98748826',	'Nebraska',	'NE',	'Nebraska',	'',	'',	'2021-09-21 11:58:45'),
('NF',	'8f241f11095649d18.02676059',	'Neufundland und Labrador',	'NF',	'Newfoundland and Labrador',	'',	'',	'2021-09-21 11:58:45'),
('NH',	'8f241f11096877ac0.98748826',	'New Hampshire',	'NH',	'New Hampshire',	'',	'',	'2021-09-21 11:58:45'),
('NJ',	'8f241f11096877ac0.98748826',	'New Jersey',	'NJ',	'New Jersey',	'',	'',	'2021-09-21 11:58:45'),
('NM',	'8f241f11096877ac0.98748826',	'Neumexiko',	'NM',	'New Mexico',	'',	'',	'2021-09-21 11:58:45'),
('NS',	'8f241f11095649d18.02676059',	'Nova Scotia',	'NS',	'Nova Scotia',	'',	'',	'2021-09-21 11:58:45'),
('NT',	'8f241f11095649d18.02676059',	'Nordwest-Territorien',	'NT',	'Northwest Territories',	'',	'',	'2021-09-21 11:58:45'),
('NU',	'8f241f11095649d18.02676059',	'Nunavut',	'NU',	'Nunavut',	'',	'',	'2021-09-21 11:58:45'),
('NV',	'8f241f11096877ac0.98748826',	'Nevada',	'NV',	'Nevada',	'',	'',	'2021-09-21 11:58:45'),
('NY',	'8f241f11096877ac0.98748826',	'New York',	'NY',	'New York',	'',	'',	'2021-09-21 11:58:45'),
('OH',	'8f241f11096877ac0.98748826',	'Ohio',	'OH',	'Ohio',	'',	'',	'2021-09-21 11:58:45'),
('OK',	'8f241f11096877ac0.98748826',	'Oklahoma',	'OK',	'Oklahoma',	'',	'',	'2021-09-21 11:58:45'),
('ON',	'8f241f11095649d18.02676059',	'Ontario',	'ON',	'Ontario',	'',	'',	'2021-09-21 11:58:45'),
('OR',	'8f241f11096877ac0.98748826',	'Oregon',	'OR',	'Oregon',	'',	'',	'2021-09-21 11:58:45'),
('PA',	'8f241f11096877ac0.98748826',	'Pennsylvania',	'PA',	'Pennsylvania',	'',	'',	'2021-09-21 11:58:45'),
('PE',	'8f241f11095649d18.02676059',	'Prince Edward Island',	'PE',	'Prince Edward Island',	'',	'',	'2021-09-21 11:58:45'),
('PR',	'8f241f11096877ac0.98748826',	'Puerto Rico',	'PR',	'Puerto Rico',	'',	'',	'2021-09-21 11:58:45'),
('PW',	'8f241f11096877ac0.98748826',	'Palau',	'PW',	'Palau',	'',	'',	'2021-09-21 11:58:45'),
('QC',	'8f241f11095649d18.02676059',	'Quebec',	'QC',	'Quebec',	'',	'',	'2021-09-21 11:58:45'),
('RI',	'8f241f11096877ac0.98748826',	'Rhode Island',	'RI',	'Rhode Island',	'',	'',	'2021-09-21 11:58:45'),
('SC',	'8f241f11096877ac0.98748826',	'S√ºdkarolina',	'SC',	'South Carolina',	'',	'',	'2021-09-21 11:58:45'),
('SD',	'8f241f11096877ac0.98748826',	'S√ºddakota',	'SD',	'South Dakota',	'',	'',	'2021-09-21 11:58:45'),
('SK',	'8f241f11095649d18.02676059',	'Saskatchewan',	'SK',	'Saskatchewan',	'',	'',	'2021-09-21 11:58:45'),
('TN',	'8f241f11096877ac0.98748826',	'Tennessee',	'TN',	'Tennessee',	'',	'',	'2021-09-21 11:58:45'),
('TX',	'8f241f11096877ac0.98748826',	'Texas',	'TX',	'Texas',	'',	'',	'2021-09-21 11:58:45'),
('UT',	'8f241f11096877ac0.98748826',	'Utah',	'UT',	'Utah',	'',	'',	'2021-09-21 11:58:45'),
('VA',	'8f241f11096877ac0.98748826',	'Virginia',	'VA',	'Virginia',	'',	'',	'2021-09-21 11:58:45'),
('VI',	'8f241f11096877ac0.98748826',	'Jungferninseln',	'VI',	'Virgin Islands',	'',	'',	'2021-09-21 11:58:45'),
('VT',	'8f241f11096877ac0.98748826',	'Vermont',	'VT',	'Vermont',	'',	'',	'2021-09-21 11:58:45'),
('WA',	'8f241f11096877ac0.98748826',	'Washington',	'WA',	'Washington',	'',	'',	'2021-09-21 11:58:45'),
('WI',	'8f241f11096877ac0.98748826',	'Wisconsin',	'WI',	'Wisconsin',	'',	'',	'2021-09-21 11:58:45'),
('WV',	'8f241f11096877ac0.98748826',	'West Virginia',	'WV',	'West Virginia',	'',	'',	'2021-09-21 11:58:45'),
('WY',	'8f241f11096877ac0.98748826',	'Wyoming',	'WY',	'Wyoming',	'',	'',	'2021-09-21 11:58:45'),
('YK',	'8f241f11095649d18.02676059',	'Yukon',	'YK',	'Yukon',	'',	'',	'2021-09-21 11:58:45');

DROP TABLE IF EXISTS `oxtplblocks`;
CREATE TABLE `oxtplblocks` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Block id',
  `OXACTIVE` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Is active',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXTHEME` char(128) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Shop theme id',
  `OXTEMPLATE` char(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Template filename (with rel. path), where block is located',
  `OXBLOCKNAME` char(128) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Block name',
  `OXPOS` int(11) NOT NULL COMMENT 'Sorting',
  `OXFILE` char(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Module template filename, where block replacement is located',
  `OXMODULE` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Module, which uses this template',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `oxtheme` (`OXTHEME`),
  KEY `search` (`OXACTIVE`,`OXSHOPID`,`OXTEMPLATE`,`OXPOS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Module template blocks';

INSERT INTO `oxtplblocks` (`OXID`, `OXACTIVE`, `OXSHOPID`, `OXTHEME`, `OXTEMPLATE`, `OXBLOCKNAME`, `OXPOS`, `OXFILE`, `OXMODULE`, `OXTIMESTAMP`) VALUES
('1eb8d0f93a2489618675af74f495dc53',	1,	1,	'',	'article_list.tpl',	'admin_article_list_colgroup',	1,	'views/blocks/admin/article_list_colgroup_extended.tpl',	'oxscpaypal',	'2021-09-21 12:05:23'),
('1fc3d3243df7cc8b72e52aba408bfcbb',	1,	1,	'',	'page/checkout/basket.tpl',	'basket_btn_next_bottom',	5,	'/views/blocks/shared/page/checkout/basket_btn_next_bottom.tpl',	'oxscpaypal',	'2021-09-21 12:05:23'),
('200b54493049f5acd02d8e43f347eb5d',	1,	1,	'',	'page/shop/start.tpl',	'start_welcome_text',	1,	'/views/blocks/shared/page/shop/start.tpl',	'oxscpaypal',	'2021-09-21 12:05:23'),
('2550a053ca0d7c5a7aee597ed30d210a',	1,	1,	'',	'headitem.tpl',	'admin_headitem_incjs',	1,	'views/blocks/admin/admin_headitem_incjs.tpl',	'oxscpaypal',	'2021-09-21 12:05:23'),
('25fe4d25e6e8c4fbba825c2c7f0e7610',	1,	1,	'',	'page/details/inc/productmain.tpl',	'details_productmain_tobasket',	5,	'/views/blocks/shared/page/details/inc/details_productmain_tobasket.tpl',	'oxscpaypal',	'2021-09-21 12:05:23'),
('2fbd3f93c69d1765735d2f48f14d044c',	1,	1,	'flow',	'page/checkout/payment.tpl',	'change_payment',	5,	'/views/blocks/flow/page/checkout/change_payment.tpl',	'oxscpaypal',	'2021-09-21 12:05:23'),
('39ab448b4e153dc9df04ece9212168ea',	1,	1,	'',	'layout/base.tpl',	'base_style',	1,	'views/blocks/shared/layout/base_style.tpl',	'oxscpaypal',	'2021-09-21 12:05:23'),
('3a5f9eb721a0e09003a253e69cc3a79e',	1,	1,	'',	'page/checkout/basket.tpl',	'checkout_basket_emptyshippingcart',	1,	'/views/blocks/shared/page/checkout/basket_installment_banner_before.tpl',	'oxscpaypal',	'2021-09-21 12:05:23'),
('410fb27cbf8f97b5db5de49d460ec369',	1,	1,	'',	'page/search/search.tpl',	'search_header',	1,	'/views/blocks/shared/page/search/search.tpl',	'oxscpaypal',	'2021-09-21 12:05:23'),
('511612ba306ae9da42a6320a8b2449fc',	1,	1,	'',	'widget/product/listitem_infogrid.tpl',	'widget_product_listitem_infogrid_price',	1,	'views/blocks/shared/widget/product/widget_product_listitem_infogrid_price.tpl',	'oxscpaypal',	'2021-09-21 12:05:23'),
('522be794097f811b8c47dabd37d22f81',	1,	1,	'',	'article_list.tpl',	'admin_article_list_sorting',	1,	'views/blocks/admin/article_list_sorting_extended.tpl',	'oxscpaypal',	'2021-09-21 12:05:23'),
('583beda65069f0055e2d6eefc0745bd4',	1,	1,	'',	'page/details/inc/productmain.tpl',	'details_productmain_price_value',	5,	'/views/blocks/shared/page/details/inc/details_productmain_price_value.tpl',	'oxscpaypal',	'2021-09-21 12:05:23'),
('6c6a5c8cf93a0cf62d08c1268b91098e',	1,	1,	'flow',	'page/checkout/inc/steps.tpl',	'checkout_steps_main',	5,	'/views/blocks/shared/page/checkout/inc/checkout_steps_main.tpl',	'oxscpaypal',	'2021-09-21 12:05:23'),
('783bdbc682b03be9c9ae06fd8c476013',	1,	1,	'flow',	'page/details/inc/productmain.tpl',	'details_productmain_price_value',	1,	'/views/blocks/flow/page/details/inc/productmain.tpl',	'oxscpaypal',	'2021-09-21 12:05:23'),
('7e24b19bb05aa2b19cfb795e9ac5bc4b',	1,	1,	'',	'article_list.tpl',	'admin_article_list_item',	1,	'views/blocks/admin/article_list_extended.tpl',	'oxscpaypal',	'2021-09-21 12:05:23'),
('80cfc1eadb8b79dd9a6107bba091939b',	1,	1,	'',	'widget/product/listitem_grid.tpl',	'widget_product_listitem_grid_price',	1,	'views/blocks/shared/widget/product/widget_product_listitem_grid_price.tpl',	'oxscpaypal',	'2021-09-21 12:05:23'),
('9a448af6f4900cb69df62aeb72250128',	1,	1,	'',	'page/checkout/payment.tpl',	'select_payment',	5,	'/views/blocks/shared/page/checkout/select_payment.tpl',	'oxscpaypal',	'2021-09-21 12:05:23'),
('9f8d5b0c5ad96f4cacf9e513e5d723b9',	1,	1,	'',	'page/list/list.tpl',	'page_list_listhead',	1,	'/views/blocks/shared/page/list/list.tpl',	'oxscpaypal',	'2021-09-21 12:05:23'),
('a092432c67e07409de1ad4d24d11f768',	1,	1,	'wave',	'page/checkout/payment.tpl',	'change_payment',	5,	'/views/blocks/wave/page/checkout/change_payment.tpl',	'oxscpaypal',	'2021-09-21 12:05:23'),
('c875e330a05fbddb8fa324b788e10cdd',	1,	1,	'',	'widget/product/listitem_line.tpl',	'widget_product_listitem_line_price',	1,	'views/blocks/shared/widget/product/widget_product_listitem_line_price.tpl',	'oxscpaypal',	'2021-09-21 12:05:23'),
('ca9bfa86b4af70a59e7289606279ab31',	1,	1,	'',	'layout/base.tpl',	'base_js',	1,	'views/blocks/shared/layout/base_js.tpl',	'oxscpaypal',	'2021-09-21 12:05:23'),
('d0dafa183fb38b814196d38c8cd88d00',	1,	1,	'',	'page/checkout/basket.tpl',	'checkout_basket_next_step_top',	1,	'/views/blocks/shared/page/checkout/basket_installment_banner_after.tpl',	'oxscpaypal',	'2021-09-21 12:05:23'),
('d687386199dd561665618064c632659a',	1,	1,	'',	'headitem.tpl',	'admin_headitem_inccss',	1,	'views/blocks/admin/admin_headitem_inccss.tpl',	'oxscpaypal',	'2021-09-21 12:05:23'),
('dba6b25e5ce4281cc50d9a51c870de8a',	1,	1,	'',	'page/checkout/payment.tpl',	'checkout_payment_main',	1,	'/views/blocks/shared/page/checkout/basket_installment_banner_before.tpl',	'oxscpaypal',	'2021-09-21 12:05:23'),
('dca9e15124b9df3333107ba0f7be2878',	1,	1,	'wave',	'page/details/inc/productmain.tpl',	'details_productmain_price_value',	1,	'/views/blocks/wave/page/details/inc/productmain.tpl',	'oxscpaypal',	'2021-09-21 12:05:23'),
('f105e767adbe2deddbc65d002e31855b',	1,	1,	'wave',	'page/checkout/inc/steps.tpl',	'checkout_steps_main',	5,	'/views/blocks/shared/page/checkout/inc/checkout_steps_main.tpl',	'oxscpaypal',	'2021-09-21 12:05:23');

DROP TABLE IF EXISTS `oxuser`;
CREATE TABLE `oxuser` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'User id',
  `OXACTIVE` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Is active',
  `OXRIGHTS` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'User rights: user, malladmin',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXUSERNAME` varchar(255) NOT NULL DEFAULT '' COMMENT 'Username',
  `OXPASSWORD` varchar(128) NOT NULL DEFAULT '' COMMENT 'Hashed password',
  `OXPASSSALT` char(128) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Password salt',
  `OXCUSTNR` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Customer number',
  `OXUSTID` varchar(255) NOT NULL DEFAULT '' COMMENT 'VAT ID No.',
  `OXUSTIDSTATUS` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'User VAT id status: 1 - valid, 0 - invalid',
  `OXCOMPANY` varchar(255) NOT NULL DEFAULT '' COMMENT 'Company',
  `OXFNAME` varchar(255) NOT NULL DEFAULT '' COMMENT 'First name',
  `OXLNAME` varchar(255) NOT NULL DEFAULT '' COMMENT 'Last name',
  `OXSTREET` varchar(255) NOT NULL DEFAULT '' COMMENT 'Street',
  `OXSTREETNR` varchar(16) NOT NULL DEFAULT '' COMMENT 'House number',
  `OXADDINFO` varchar(255) NOT NULL DEFAULT '' COMMENT 'Additional info',
  `OXCITY` varchar(255) NOT NULL DEFAULT '' COMMENT 'City',
  `OXCOUNTRYID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Country id (oxcountry)',
  `OXSTATEID` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'State id (oxstates)',
  `OXZIP` varchar(16) NOT NULL DEFAULT '' COMMENT 'ZIP code',
  `OXFON` varchar(128) NOT NULL DEFAULT '' COMMENT 'Phone number',
  `OXFAX` varchar(128) NOT NULL DEFAULT '' COMMENT 'Fax number',
  `OXSAL` varchar(128) NOT NULL DEFAULT '' COMMENT 'User title (Mr/Mrs)',
  `OXBONI` int(11) NOT NULL DEFAULT '0' COMMENT 'Credit points',
  `OXCREATE` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Creation time',
  `OXREGISTER` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Registration time',
  `OXPRIVFON` varchar(64) NOT NULL DEFAULT '' COMMENT 'Personal phone number',
  `OXMOBFON` varchar(64) NOT NULL DEFAULT '' COMMENT 'Mobile phone number',
  `OXBIRTHDATE` date NOT NULL DEFAULT '0000-00-00' COMMENT 'Birthday date',
  `OXURL` varchar(255) NOT NULL DEFAULT '' COMMENT 'Url',
  `OXLDAPKEY` varchar(128) NOT NULL DEFAULT '' COMMENT 'LDAP user key',
  `OXWRONGLOGINS` int(11) NOT NULL DEFAULT '0' COMMENT 'Wrong logins count',
  `OXUPDATEKEY` varchar(32) NOT NULL DEFAULT '' COMMENT 'Update key',
  `OXUPDATEEXP` int(11) NOT NULL DEFAULT '0' COMMENT 'Update key expiration time',
  `OXPOINTS` double NOT NULL DEFAULT '0' COMMENT 'User points (for registration, invitation, etc)',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  UNIQUE KEY `OXUSERNAME` (`OXUSERNAME`,`OXSHOPID`),
  KEY `OXPASSWORD` (`OXPASSWORD`),
  KEY `OXCUSTNR` (`OXCUSTNR`),
  KEY `OXACTIVE` (`OXACTIVE`),
  KEY `OXLNAME` (`OXLNAME`),
  KEY `OXUPDATEEXP` (`OXUPDATEEXP`),
  KEY `OXSHOPID` (`OXSHOPID`,`OXUSERNAME`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shop administrators and users';

INSERT INTO `oxuser` (`OXID`, `OXACTIVE`, `OXRIGHTS`, `OXSHOPID`, `OXUSERNAME`, `OXPASSWORD`, `OXPASSSALT`, `OXCUSTNR`, `OXUSTID`, `OXUSTIDSTATUS`, `OXCOMPANY`, `OXFNAME`, `OXLNAME`, `OXSTREET`, `OXSTREETNR`, `OXADDINFO`, `OXCITY`, `OXCOUNTRYID`, `OXSTATEID`, `OXZIP`, `OXFON`, `OXFAX`, `OXSAL`, `OXBONI`, `OXCREATE`, `OXREGISTER`, `OXPRIVFON`, `OXMOBFON`, `OXBIRTHDATE`, `OXURL`, `OXLDAPKEY`, `OXWRONGLOGINS`, `OXUPDATEKEY`, `OXUPDATEEXP`, `OXPOINTS`, `OXTIMESTAMP`) VALUES
('57eb5806a7d3852a5a27a76f746c3392',	1,	'malladmin',	1,	'mario.lorenz@oxid-esales.com',	'867ebe09f98cb1302311b2e1fead9589a12be73f9c929fd3e390fdda71386f7b9eed8390da3ddd9a13649b62d4f2820d21cae2ef8cd057fd421c69943893e662',	'c4fe516073e032924639830e6bbcddd9',	1,	'',	0,	'Your Company Name',	'John',	'Doe',	'Maple Street',	'2425',	'',	'Any City',	'a7c40f631fc920687.20179984',	'',	'9041',	'217-8918712',	'217-8918713',	'MR',	1000,	'2003-01-01 00:00:00',	'2003-01-01 00:00:00',	'',	'',	'0000-00-00',	'',	'',	0,	'',	0,	0,	'2021-09-21 11:58:51');

DROP TABLE IF EXISTS `oxuserbasketitems`;
CREATE TABLE `oxuserbasketitems` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Item id',
  `OXBASKETID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Basket id (oxuserbaskets)',
  `OXARTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Article id (oxarticles)',
  `OXAMOUNT` char(32) NOT NULL DEFAULT '' COMMENT 'Amount',
  `OXSELLIST` varchar(255) NOT NULL DEFAULT '' COMMENT 'Selection list',
  `OXPERSPARAM` text NOT NULL COMMENT 'Serialized persistent parameters',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXBASKETID` (`OXBASKETID`),
  KEY `OXARTID` (`OXARTID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='User basket items';


DROP TABLE IF EXISTS `oxuserbaskets`;
CREATE TABLE `oxuserbaskets` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Basket id',
  `OXUSERID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'User id (oxuser)',
  `OXTITLE` varchar(255) NOT NULL DEFAULT '' COMMENT 'Basket title',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  `OXPUBLIC` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Is public',
  `OXUPDATE` int(11) NOT NULL DEFAULT '0' COMMENT 'Update timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXUPDATE` (`OXUPDATE`),
  KEY `OXTITLE` (`OXTITLE`),
  KEY `OXUSERID` (`OXUSERID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Active User baskets';


DROP TABLE IF EXISTS `oxuserpayments`;
CREATE TABLE `oxuserpayments` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Payment id',
  `OXUSERID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'User id (oxusers)',
  `OXPAYMENTSID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Payment id (oxpayments)',
  `OXVALUE` blob NOT NULL COMMENT 'DYN payment values array as string',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXUSERID` (`OXUSERID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='User payments';


DROP TABLE IF EXISTS `oxvendor`;
CREATE TABLE `oxvendor` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Vendor id',
  `OXMAPID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Integer mapping identifier',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXACTIVE` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Active',
  `OXICON` varchar(128) NOT NULL DEFAULT '' COMMENT 'Icon filename',
  `OXTITLE` varchar(255) NOT NULL DEFAULT '' COMMENT 'Title (multilanguage)',
  `OXSHORTDESC` varchar(255) NOT NULL DEFAULT '' COMMENT 'Short description (multilanguage)',
  `OXTITLE_1` varchar(255) NOT NULL DEFAULT '',
  `OXSHORTDESC_1` varchar(255) NOT NULL DEFAULT '',
  `OXTITLE_2` varchar(255) NOT NULL DEFAULT '',
  `OXSHORTDESC_2` varchar(255) NOT NULL DEFAULT '',
  `OXTITLE_3` varchar(255) NOT NULL DEFAULT '',
  `OXSHORTDESC_3` varchar(255) NOT NULL DEFAULT '',
  `OXSHOWSUFFIX` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Show SEO Suffix in Category',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXACTIVE` (`OXACTIVE`),
  KEY `OXMAPID` (`OXMAPID`),
  KEY `OXSHOPID` (`OXSHOPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Distributors list';


DROP TABLE IF EXISTS `oxvendor2shop`;
CREATE TABLE `oxvendor2shop` (
  `OXSHOPID` int(11) NOT NULL COMMENT 'Mapped shop id',
  `OXMAPOBJECTID` int(11) NOT NULL COMMENT 'Mapped object id',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  UNIQUE KEY `OXMAPIDX` (`OXSHOPID`,`OXMAPOBJECTID`),
  KEY `OXMAPOBJECTID` (`OXMAPOBJECTID`),
  KEY `OXSHOPID` (`OXSHOPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Mapping table for element subshop assignments';


DROP TABLE IF EXISTS `oxvouchers`;
CREATE TABLE `oxvouchers` (
  `OXDATEUSED` date DEFAULT NULL COMMENT 'Date, when coupon was used (set on order complete)',
  `OXORDERID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Order id (oxorder)',
  `OXUSERID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'User id (oxuser)',
  `OXRESERVED` int(11) NOT NULL DEFAULT '0' COMMENT 'Time, when coupon is added to basket',
  `OXVOUCHERNR` varchar(255) NOT NULL DEFAULT '' COMMENT 'Coupon number',
  `OXVOUCHERSERIEID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Coupon Series id (oxvoucherseries)',
  `OXDISCOUNT` float(9,2) DEFAULT NULL COMMENT 'Discounted amount (if discount was used)',
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Coupon id',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXVOUCHERSERIEID` (`OXVOUCHERSERIEID`),
  KEY `OXORDERID` (`OXORDERID`),
  KEY `OXUSERID` (`OXUSERID`),
  KEY `OXVOUCHERNR` (`OXVOUCHERNR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Generated coupons';


DROP TABLE IF EXISTS `oxvoucherseries`;
CREATE TABLE `oxvoucherseries` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'Series id',
  `OXMAPID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Integer mapping identifier',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXSERIENR` varchar(255) NOT NULL DEFAULT '' COMMENT 'Series name',
  `OXSERIEDESCRIPTION` varchar(255) NOT NULL DEFAULT '' COMMENT 'Description',
  `OXDISCOUNT` float(9,2) NOT NULL DEFAULT '0.00' COMMENT 'Discount amount',
  `OXDISCOUNTTYPE` enum('percent','absolute') NOT NULL DEFAULT 'absolute' COMMENT 'Discount type (percent, absolute)',
  `OXBEGINDATE` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Valid from',
  `OXENDDATE` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Valid to',
  `OXALLOWSAMESERIES` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Coupons of this series can be used with single order',
  `OXALLOWOTHERSERIES` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Coupons of different series can be used with single order',
  `OXALLOWUSEANOTHER` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Coupons of this series can be used in multiple orders',
  `OXMINIMUMVALUE` float(9,2) NOT NULL DEFAULT '0.00' COMMENT 'Minimum Order Sum ',
  `OXCALCULATEONCE` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Calculate only once (valid only for product or category vouchers)',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXSERIENR` (`OXSERIENR`),
  KEY `OXSHOPID` (`OXSHOPID`),
  KEY `OXMAPID` (`OXMAPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Coupon series';


DROP TABLE IF EXISTS `oxvoucherseries2shop`;
CREATE TABLE `oxvoucherseries2shop` (
  `OXSHOPID` int(11) NOT NULL COMMENT 'Mapped shop id',
  `OXMAPOBJECTID` int(11) NOT NULL COMMENT 'Mapped object id',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  UNIQUE KEY `OXMAPIDX` (`OXSHOPID`,`OXMAPOBJECTID`),
  KEY `OXMAPOBJECTID` (`OXMAPOBJECTID`),
  KEY `OXSHOPID` (`OXSHOPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Mapping table for element subshop assignments';


DROP TABLE IF EXISTS `oxwrapping`;
CREATE TABLE `oxwrapping` (
  `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Wrapping id',
  `OXMAPID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Integer mapping identifier',
  `OXSHOPID` int(11) NOT NULL DEFAULT '1' COMMENT 'Shop id (oxshops)',
  `OXACTIVE` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Active (multilanguage)',
  `OXACTIVE_1` tinyint(1) NOT NULL DEFAULT '1',
  `OXACTIVE_2` tinyint(1) NOT NULL DEFAULT '1',
  `OXACTIVE_3` tinyint(1) NOT NULL DEFAULT '1',
  `OXTYPE` varchar(4) NOT NULL DEFAULT 'WRAP' COMMENT 'Wrapping type: WRAP,CARD',
  `OXNAME` varchar(128) NOT NULL DEFAULT '' COMMENT 'Name (multilanguage)',
  `OXNAME_1` varchar(128) NOT NULL DEFAULT '',
  `OXNAME_2` varchar(128) NOT NULL DEFAULT '',
  `OXNAME_3` varchar(128) NOT NULL DEFAULT '',
  `OXPIC` varchar(128) NOT NULL DEFAULT '' COMMENT 'Image filename',
  `OXPRICE` double NOT NULL DEFAULT '0' COMMENT 'Price',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  PRIMARY KEY (`OXID`),
  KEY `OXMAPID` (`OXMAPID`),
  KEY `OXSHOPID` (`OXSHOPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Wrappings';


DROP TABLE IF EXISTS `oxwrapping2shop`;
CREATE TABLE `oxwrapping2shop` (
  `OXSHOPID` int(11) NOT NULL COMMENT 'Mapped shop id',
  `OXMAPOBJECTID` int(11) NOT NULL COMMENT 'Mapped object id',
  `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Timestamp',
  UNIQUE KEY `OXMAPIDX` (`OXSHOPID`,`OXMAPOBJECTID`),
  KEY `OXMAPOBJECTID` (`OXMAPOBJECTID`),
  KEY `OXSHOPID` (`OXSHOPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Mapping table for element subshop assignments';


-- 2021-09-21 12:08:41
