DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `date_created` datetime NOT NULL,
    `date_updated` datetime NOT NULL,
    `remarks` varchar(255) COLLATE utf8_unicode_ci,
    `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `password` char(64) COLLATE utf8_unicode_ci NOT NULL,
    `salt` char(16) COLLATE utf8_unicode_ci NOT NULL,
    `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `username` (`username`),
    UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;
CREATE TRIGGER `users_insert`
    BEFORE INSERT ON `users`
        FOR EACH ROW SET
            NEW.date_created = UTC_TIMESTAMP,
            NEW.date_updated = '0000-00-00 00:00:00';
CREATE TRIGGER `users_update`
    BEFORE UPDATE ON `users`
        FOR EACH ROW SET
            NEW.date_updated = UTC_TIMESTAMP,
            NEW.date_created = OLD.date_created;