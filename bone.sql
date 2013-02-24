CREATE TABLE `folder` (
  `folder_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `order` INT(11) UNSIGNED NOT NULL DEFAULT '0',
  `parent_id` INT(11) UNSIGNED NOT NULL DEFAULT '0',
  `thumb` VARCHAR(255) NOT NULL,
  `user_id` INT(11) UNSIGNED,
  PRIMARY KEY (`folder_id`),
  KEY `user_id` (`user_id`),
  KEY `parent_id` (`parent_id`)
)CHAR SET 'utf8' ENGINE InnoDB;

INSERT INTO `folder` VALUES( NULL, 'folder1', 0, 0, 'folder.jpg', 0);
INSERT INTO `folder` VALUES( NULL, 'folder2', 0, 0, 'folder.jpg', 0);
INSERT INTO `folder` VALUES( NULL, 'folder3', 0, 1, 'folder.jpg', 0);
INSERT INTO `folder` VALUES( NULL, 'folder4', 0, 1, 'folder.jpg', 0);
INSERT INTO `folder` VALUES( NULL, 'folder5', 0, 2, 'folder.jpg', 0);
INSERT INTO `folder` VALUES( NULL, 'folder5', 0, 3, 'folder.jpg', 0);
INSERT INTO `folder` VALUES( NULL, 'folder5', 0, 3, 'folder.jpg', 0);