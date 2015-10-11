DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
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
    `date_birth` datetime,
    `drivers_license` varchar(25) COLLATE utf8_unicode_ci,
    `drivers_state` varchar(2) COLLATE utf8_unicode_ci,
    `email` varchar(255) COLLATE utf8_unicode_ci,
    `fax` varchar(10) COLLATE utf8_unicode_ci,
    `gender` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'O',
    `id_name_suffix` int(11),
    `id_salutation` int(11),
    `id_user` int(11) NOT NULL,
    `name_first` varchar(255) COLLATE utf8_unicode_ci,
    `name_last` varchar(255) COLLATE utf8_unicode_ci,  
    `name_middle` varchar(255) COLLATE utf8_unicode_ci,
    `phone` varchar(10) COLLATE utf8_unicode_ci,  
    `phone_extension` varchar(5) COLLATE utf8_unicode_ci,  
    `phone_mobile` varchar(10) COLLATE utf8_unicode_ci,  
    `skype` varchar(255) COLLATE utf8_unicode_ci,
    `social_security_number` varchar(9) COLLATE utf8_unicode_ci,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;
CREATE TRIGGER `profile_insert`
    BEFORE INSERT ON `profile`
        FOR EACH ROW SET
            NEW.date_created = UTC_TIMESTAMP,
            NEW.date_updated = '0000-00-00 00:00:00';
CREATE TRIGGER `profile_update`
    BEFORE UPDATE ON `profile`
        FOR EACH ROW SET
            NEW.date_updated = UTC_TIMESTAMP,
            NEW.date_created = OLD.date_created;

