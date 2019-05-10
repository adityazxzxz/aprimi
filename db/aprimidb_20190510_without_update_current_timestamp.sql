# Host: localhost  (Version 5.5.5-10.1.38-MariaDB)
# Date: 2019-05-10 19:57:13
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "ap_absensi"
#

DROP TABLE IF EXISTS `ap_absensi`;
CREATE TABLE `ap_absensi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agenda_id` int(11) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "ap_absensi"
#

INSERT INTO `ap_absensi` VALUES (1,1,'94534b8',0,NULL,'2019-05-06 21:34:11',NULL),(2,1,'0e84c84',1,1,'2019-05-07 09:57:07','2019-05-07 09:57:45'),(3,1,'b76db8c',0,NULL,'2019-05-07 09:57:59',NULL),(4,1,'3322489',0,NULL,'2019-05-08 00:42:06',NULL);

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
  `updated_at` timestamp NULL DEFAULT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

#
# Data for table "ap_commitment"
#

INSERT INTO `ap_commitment` VALUES (2,1,'Aditya Pratama','AQN',1,'Weekdays after office hour','Note','2019-04-11 10:51:55',NULL),(3,2,'Adtiya Pratama','AQN',0,'Weekdays','No','2019-05-05 15:49:14',NULL),(4,NULL,'Adit','AQN',1,'Weekend',NULL,'2019-05-05 16:28:29',NULL),(5,NULL,'Adit','AQN',1,'Weekend',NULL,'2019-05-05 16:28:29',NULL),(6,NULL,'Adit','AQN',1,'Weekend',NULL,'2019-05-05 16:28:29',NULL),(7,NULL,'Adit','AQN',1,'Weekend',NULL,'2019-05-05 16:28:29',NULL),(8,NULL,'Adit','AQN',1,'Weekend',NULL,'2019-05-05 16:28:29',NULL),(9,NULL,'Adit','AQN',1,'Weekend',NULL,'2019-05-05 16:28:29',NULL),(10,NULL,'Adit','AQN',1,'Weekend',NULL,'2019-05-05 16:28:29',NULL),(11,NULL,'Adit','AQN',1,'Weekend',NULL,'2019-05-05 16:28:29',NULL),(12,NULL,'Adit','AQN',1,'Weekend',NULL,'2019-05-05 16:28:29',NULL),(13,NULL,'Adit','AQN',1,'Weekend',NULL,'2019-05-05 16:28:29',NULL),(14,NULL,'Adit','AQN',1,'Weekend',NULL,'2019-05-05 16:28:29',NULL),(15,NULL,'Adit','AQN',1,'Weekend',NULL,'2019-05-05 16:28:29',NULL),(16,NULL,'Adit','AQN',1,'Weekend',NULL,'2019-05-05 17:02:24',NULL),(17,NULL,'Adit','AQN',1,'Weekend',NULL,'2019-05-05 17:02:24',NULL),(18,NULL,'Adit','AQN',1,'Weekend',NULL,'2019-05-05 17:02:24',NULL),(19,NULL,'Adit','AQN',1,'Weekend',NULL,'2019-05-05 17:02:24',NULL),(20,NULL,'Adit','AQN',1,'Weekend',NULL,'2019-05-05 17:02:24',NULL),(21,NULL,'Adit','AQN',1,'Weekend',NULL,'2019-05-05 17:02:24',NULL),(22,NULL,'Adit','AQN',1,'Weekend',NULL,'2019-05-05 17:02:24',NULL),(23,NULL,'Adit','AQN',1,'Weekend',NULL,'2019-05-05 17:02:24',NULL),(24,NULL,'Adit','AQN',1,'Weekend',NULL,'2019-05-05 17:02:24',NULL),(25,NULL,'Adit','AQN',1,'Weekend',NULL,'2019-05-05 17:02:24',NULL),(26,NULL,'Adit','AQN',1,'Weekend',NULL,'2019-05-05 17:02:24',NULL),(27,NULL,'Adit','AQN',1,'Weekend',NULL,'2019-05-05 17:02:25',NULL);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "ap_users"
#

INSERT INTO `ap_users` VALUES (1,'admin@admin.com','admin','9bd800fabb1c8f373947626c16b33a13','21232f297a57a5a743894a0e4a801fc3','admin',1,'2019-03-28 14:07:43','2019-05-10 04:32:08'),(2,'komite@komite.com','komite','4ce27ca1a8f2669f337f7797a623c07e','ea6068f0e761c6f07f80d58dfde5c00b','komite',1,'2019-04-05 22:05:47','2019-05-06 20:39:55'),(3,'member@member.com','member','9014324e091435463974b0be4c7ca196','aa08769cdcb26674c6706093503ff0a3','member',1,'2019-04-05 22:07:00','2019-04-05 22:07:19');
