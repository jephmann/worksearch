DROP TABLE IF EXISTS `name_suffixes`;
CREATE TABLE `name_suffixes` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `date_created` datetime NOT NULL,
    `date_updated` datetime NOT NULL,
    `remarks` varchar(255) COLLATE utf8_unicode_ci,
    `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `abrv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `gender` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'O',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;
CREATE TRIGGER `name_suffixes_insert`
    BEFORE INSERT ON `name_suffixes`
        FOR EACH ROW SET
            NEW.date_created = UTC_TIMESTAMP,
            NEW.date_updated = '0000-00-00 00:00:00';
CREATE TRIGGER `name_suffixes_update`
    BEFORE UPDATE ON `name_suffixes`
        FOR EACH ROW SET
            NEW.date_updated = UTC_TIMESTAMP,
            NEW.date_created = OLD.date_created;
INSERT INTO name_suffixes (gender, name, abrv) VALUES ('M', 'Junior', 'Jr.');
INSERT INTO name_suffixes (gender, name, abrv) VALUES ('M', 'Senior', 'Sr.');
INSERT INTO name_suffixes (gender, name, abrv) VALUES ('M', 'I', 'I');
INSERT INTO name_suffixes (gender, name, abrv) VALUES ('M', 'II', 'II');
INSERT INTO name_suffixes (gender, name, abrv) VALUES ('M', 'III', 'III');
INSERT INTO name_suffixes (gender, name, abrv) VALUES ('O', 'Esquire', 'Esq.');
