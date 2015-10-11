DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `date_created` datetime NOT NULL,
    `date_updated` datetime NOT NULL,
    `remarks` varchar(255) COLLATE utf8_unicode_ci,
    `date_birth` datetime,
    `department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `email` varchar(255) COLLATE utf8_unicode_ci,
    `facebook` varchar(255) COLLATE utf8_unicode_ci,
    `fax` varchar(10) COLLATE utf8_unicode_ci,
    `gender` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'O',
    `googleplus` varchar(255) COLLATE utf8_unicode_ci,
    `id_name_suffix` int(11),
    `id_prospect` int(11),
    `id_salutation` int(11),
    `id_user` int(11) NOT NULL,
    `linkedin` varchar(255) COLLATE utf8_unicode_ci,
    `name_first` varchar(255) COLLATE utf8_unicode_ci,
    `name_last` varchar(255) COLLATE utf8_unicode_ci,  
    `name_middle` varchar(255) COLLATE utf8_unicode_ci,
    `phone` varchar(10) COLLATE utf8_unicode_ci,  
    `phone_extension` varchar(5) COLLATE utf8_unicode_ci,  
    `phone_mobile` varchar(10) COLLATE utf8_unicode_ci,  
    `skype` varchar(255) COLLATE utf8_unicode_ci,
    `title` varchar(255) COLLATE utf8_unicode_ci,  
    `twitter` varchar(255) COLLATE utf8_unicode_ci,
    `website` varchar(255) COLLATE utf8_unicode_ci,    
    PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;
CREATE TRIGGER `contacts_insert`
    BEFORE INSERT ON `contacts`
        FOR EACH ROW SET
            NEW.date_created = UTC_TIMESTAMP,
            NEW.date_updated = '0000-00-00 00:00:00';
CREATE TRIGGER `contacts_update`
    BEFORE UPDATE ON `contacts`
        FOR EACH ROW SET
            NEW.date_updated = UTC_TIMESTAMP,
            NEW.date_created = OLD.date_created;
