DROP TABLE IF EXISTS `contact_methods`;
CREATE TABLE `contact_methods` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `date_created` datetime NOT NULL,
    `date_updated` datetime NOT NULL,
    `remarks` varchar(255) COLLATE utf8_unicode_ci,
    `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;
CREATE TRIGGER `contact_methods_insert`
    BEFORE INSERT ON `contact_methods`
        FOR EACH ROW SET
            NEW.date_created = UTC_TIMESTAMP,
            NEW.date_updated = '0000-00-00 00:00:00';
CREATE TRIGGER `contact_methods_update`
    BEFORE UPDATE ON `contact_methods`
        FOR EACH ROW SET
            NEW.date_updated = UTC_TIMESTAMP,
            NEW.date_created = OLD.date_created;
INSERT INTO contact_methods (name) VALUES ('E-Mail');
INSERT INTO contact_methods (name) VALUES ('In Person');
INSERT INTO contact_methods (name) VALUES ('Phone');
INSERT INTO contact_methods (name) VALUES ('Skype');
