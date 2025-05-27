CREATE
  DATABASE taskforce DEFAULT CHARACTER SET 'utf8' DEFAULT COLLATE 'utf8_general_ci';

USE
  taskforce;
-- ----------------------------
-- Table structure for bookmarks
-- ----------------------------
DROP TABLE IF EXISTS `bookmarks`;
CREATE TABLE `bookmarks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `performer_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bookmarks_users_1` (`user_id`),
  KEY `fk_bookmarks_users_2` (`performer_id`),
  CONSTRAINT `fk_bookmarks_users_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_bookmarks_users_2` FOREIGN KEY (`performer_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;