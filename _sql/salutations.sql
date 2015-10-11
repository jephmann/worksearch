DROP TABLE IF EXISTS `salutations`;
CREATE TABLE `salutations` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `date_created` datetime NOT NULL,
    `date_updated` datetime NOT NULL,
    `remarks` varchar(255) COLLATE utf8_unicode_ci,
    `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `abrv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `gender` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'O',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;
CREATE TRIGGER `salutations_insert`
    BEFORE INSERT ON `salutations`
        FOR EACH ROW SET
            NEW.date_created = UTC_TIMESTAMP,
            NEW.date_updated = '0000-00-00 00:00:00';
CREATE TRIGGER `salutations_update`
    BEFORE UPDATE ON `salutations`
        FOR EACH ROW SET
            NEW.date_updated = UTC_TIMESTAMP,
            NEW.date_created = OLD.date_created;
INSERT INTO salutations (gender, name, abrv) VALUES ('M', 'Mister', 'Mr.');
INSERT INTO salutations (gender, name, abrv) VALUES ('F', 'Mistress', 'Mrs.');
INSERT INTO salutations (gender, name, abrv) VALUES ('F', 'Miss', 'Miss');
INSERT INTO salutations (gender, name, abrv) VALUES ('F', 'Ms', 'Ms');
INSERT INTO salutations (gender, name, abrv) VALUES ('O', 'Doctor', 'Dr.');
INSERT INTO salutations (gender, name, abrv) VALUES ('O', 'Reverend', 'Rev.');
INSERT INTO salutations (gender, name, abrv) VALUES ('M', 'Sir', 'Sir');
INSERT INTO salutations (gender, name, abrv) VALUES ('F', 'Madame', 'Madame');
INSERT INTO salutations (gender, name, abrv) VALUES ('M', 'Lord', 'Lord');
INSERT INTO salutations (gender, name, abrv) VALUES ('F', 'Lady', 'Lady');
