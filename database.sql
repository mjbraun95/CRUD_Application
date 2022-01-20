CREATE DATABASE test;

USE test;

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `stock` int(3) NOT NULL,
  `location` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
);