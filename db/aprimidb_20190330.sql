# Host: localhost  (Version 5.5.5-10.1.22-MariaDB)
# Date: 2019-03-30 14:51:42
# Generator: MySQL-Front 6.0  (Build 1.203)


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

INSERT INTO `ap_users` VALUES (1,'admin@admin.com','admin',NULL,'21232f297a57a5a743894a0e4a801fc3','admin',1,'2019-03-28 14:07:43','2019-03-29 15:45:25');
