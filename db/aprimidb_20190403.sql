# Host: localhost  (Version 5.5.5-10.1.38-MariaDB)
# Date: 2019-04-03 16:01:15
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "ap_commitment"
#

DROP TABLE IF EXISTS `ap_commitment`;
CREATE TABLE `ap_commitment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `company` varchar(60) DEFAULT NULL,
  `confirmed` tinyint(1) DEFAULT NULL,
  `time` varchar(60) DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "ap_commitment"
#

INSERT INTO `ap_commitment` VALUES (1,NULL,'','Tester',0,'yes',NULL,'2019-04-02 21:43:44',NULL),(2,NULL,'Besok aja ya','AQN',0,'Besok',NULL,'2019-04-02 21:51:07',NULL),(3,NULL,'asd1q','',0,'Weekdays after office hour',NULL,'2019-04-03 00:17:19',NULL),(4,1,'','',0,'Weekdays after office hour',NULL,'2019-04-03 00:19:45',NULL);

#
# Structure for table "ap_users"
#

DROP TABLE IF EXISTS `ap_users`;
CREATE TABLE `ap_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(60) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `password` varchar(35) NOT NULL DEFAULT '',
  `role` enum('admin','komite','member') DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "ap_users"
#

INSERT INTO `ap_users` VALUES (1,'admin@admin.com','admin','b9c35231c9a6744e0e6069ba5fcbe8a0','21232f297a57a5a743894a0e4a801fc3','admin',1,'2019-03-28 14:07:43','2019-04-03 14:36:07');
