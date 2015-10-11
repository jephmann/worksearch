DROP TABLE IF EXISTS `prospects`;
CREATE TABLE `prospects` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `date_created` datetime NOT NULL,
    `date_updated` datetime NOT NULL,
    `remarks` varchar(255) COLLATE utf8_unicode_ci,
    `address_building` varchar(255) COLLATE utf8_unicode_ci,
    `address_city` varchar(255) COLLATE utf8_unicode_ci,
    `address_state` varchar(2) COLLATE utf8_unicode_ci,
    `address_street` varchar(255) COLLATE utf8_unicode_ci,
    `address_unit` varchar(255) COLLATE utf8_unicode_ci,
    `address_zip4` varchar(4) COLLATE utf8_unicode_ci,
    `address_zip5` varchar(5) COLLATE utf8_unicode_ci,
    `branch` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `email` varchar(255) COLLATE utf8_unicode_ci,
    `facebook` varchar(255) COLLATE utf8_unicode_ci,
    `fax` varchar(10) COLLATE utf8_unicode_ci,
    `googleplus` varchar(255) COLLATE utf8_unicode_ci,
    `id_user` int(11) NOT NULL,
    `industry` varchar(255) COLLATE utf8_unicode_ci,
    `linkedin` varchar(255) COLLATE utf8_unicode_ci,
    `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,  
    `phone` varchar(10) COLLATE utf8_unicode_ci,  
    `phone_extension` varchar(5) COLLATE utf8_unicode_ci,
    `recruiter` tinyint NOT NULL DEFAULT 0,  
    `twitter` varchar(255) COLLATE utf8_unicode_ci,
    `website` varchar(255) COLLATE utf8_unicode_ci,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;
CREATE TRIGGER `prospects_insert`
    BEFORE INSERT ON `prospects`
        FOR EACH ROW SET
            NEW.date_created = UTC_TIMESTAMP,
            NEW.date_updated = '0000-00-00 00:00:00';
CREATE TRIGGER `prospects_update`
    BEFORE UPDATE ON `prospects`
        FOR EACH ROW SET
            NEW.date_updated = UTC_TIMESTAMP,
            NEW.date_created = OLD.date_created;
