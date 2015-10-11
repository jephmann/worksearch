DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `date_created` datetime NOT NULL,
    `date_updated` datetime NOT NULL,
    `remarks` varchar(255) COLLATE utf8_unicode_ci,
    `contact_date` date NOT NULL,
    `id_contact` int(11) NOT NULL,
    `id_contact_method` int(11) NOT NULL,
    `id_prospect` int(11) NOT NULL,
    `id_user` int(11) NOT NULL,
    `results` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `specify` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `week_ending` date NOT NULL,
    `work` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;
CREATE TRIGGER `logs_insert`
    BEFORE INSERT ON `logs`
        FOR EACH ROW SET
            NEW.date_created = UTC_TIMESTAMP,
            NEW.date_updated = '0000-00-00 00:00:00';
CREATE TRIGGER `logs_update`
    BEFORE UPDATE ON `logs`
        FOR EACH ROW SET
            NEW.date_updated = UTC_TIMESTAMP,
            NEW.date_created = OLD.date_created;
