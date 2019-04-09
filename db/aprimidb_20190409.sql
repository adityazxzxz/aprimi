# Host: localhost  (Version 5.5.5-10.1.38-MariaDB)
# Date: 2019-04-09 23:40:11
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "ap_agenda"
#

DROP TABLE IF EXISTS `ap_agenda`;
CREATE TABLE `ap_agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(60) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `lokasi` varchar(50) DEFAULT NULL,
  `tanggal` datetime DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) DEFAULT '1',
  `user_created` int(11) DEFAULT NULL,
  `user_updated` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "ap_agenda"
#

INSERT INTO `ap_agenda` VALUES (1,'Agenda Minggu Ini',NULL,'Jakarta','2019-04-10 00:00:00',1,1,NULL,'2019-04-05 23:32:08',NULL),(2,'Pesta Kantor',NULL,'Gaharu','2019-04-24 00:00:00',1,1,NULL,'2019-04-05 23:32:26',NULL),(4,'Peringatan 17 Agustus','<p>Membawa baju merah</p><p>menyantikan lagu indonesia raya</p><p>makan sate kambing</p>','Gaharu','2019-04-22 00:00:00',1,1,NULL,'2019-04-09 21:27:21',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "ap_users"
#

INSERT INTO `ap_users` VALUES (1,'admin@admin.com','admin','e8038517d70a18c817a420baf1a31de4','21232f297a57a5a743894a0e4a801fc3','admin',1,'2019-03-28 14:07:43','2019-04-09 21:21:43'),(2,'komite@komite.com','komite','69c71a4839379d426562636a12bf232a','ea6068f0e761c6f07f80d58dfde5c00b','komite',1,'2019-04-05 22:05:47','2019-04-08 00:05:01'),(3,'member@member.com','member','9014324e091435463974b0be4c7ca196','aa08769cdcb26674c6706093503ff0a3','member',1,'2019-04-05 22:07:00','2019-04-05 22:07:19');
