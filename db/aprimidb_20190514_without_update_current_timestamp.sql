# Host: localhost  (Version 5.5.5-10.1.38-MariaDB)
# Date: 2019-05-14 12:12:00
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "ap_absensi"
#


#
# Structure for table "ap_agenda"
#

DROP TABLE IF EXISTS `ap_agenda`;
CREATE TABLE `ap_agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(60) DEFAULT NULL,
  `deskripsi` text,
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

#
# Data for table "ap_commitment"
#


#
# Structure for table "ap_config"
#

DROP TABLE IF EXISTS `ap_config`;
CREATE TABLE `ap_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `variable_name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "ap_config"
#

INSERT INTO `ap_config` VALUES (1,'dashboard_analytic','analytic_april2019.jpg'),(4,'dashboard_title','Aprimi.org Web Monitoring');

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
  `no_tlp` int(1) DEFAULT NULL,
  `role` enum('admin','komite','member') DEFAULT NULL,
  `job_title` varchar(50) DEFAULT NULL,
  `jabatan_komite` varchar(50) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '0' COMMENT 'aktif/tidak di komite',
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

#
# Data for table "ap_users"
#

INSERT INTO `ap_users` VALUES (1,'admin@admin.com','Administrator','18f17c1f3f017c76dca08de290f0e60e','21232f297a57a5a743894a0e4a801fc3',123,'admin','Bellato','Jabatan2','Tester',0,1,'2019-03-28 14:07:43','2019-05-14 12:08:51'),(2,'komite@komite.com','komite','92958af004c6af0f63ef8d68994e167a','ea6068f0e761c6f07f80d58dfde5c00b',NULL,'komite',NULL,NULL,NULL,0,1,'2019-04-05 22:05:47','2019-05-12 14:53:58'),(3,'member@member.com','member','9014324e091435463974b0be4c7ca196','aa08769cdcb26674c6706093503ff0a3',NULL,'member',NULL,NULL,NULL,0,1,'2019-04-05 22:07:00','2019-04-05 22:07:19');
