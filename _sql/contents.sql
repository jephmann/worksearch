DROP TABLE IF EXISTS `contents`;
CREATE TABLE `contents` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `date_created` datetime NOT NULL,
    `date_updated` datetime NOT NULL,
    `remarks` varchar(255) COLLATE utf8_unicode_ci,
    `sequence` int(11) NOT NULL,
    `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `definition` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `flag_user` tinyint NOT NULL DEFAULT 0,
    `flag_profile` tinyint NOT NULL DEFAULT 0,
    `flag_maintenance` tinyint NOT NULL DEFAULT 0,
    PRIMARY KEY (`id`),
    UNIQUE KEY `sequence` (`sequence`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;
CREATE TRIGGER `contents_insert`
    BEFORE INSERT ON `contents`
        FOR EACH ROW SET
            NEW.date_created = UTC_TIMESTAMP,
            NEW.date_updated = '0000-00-00 00:00:00';
CREATE TRIGGER `contents_update`
    BEFORE UPDATE ON `contents`
        FOR EACH ROW SET
            NEW.date_updated = UTC_TIMESTAMP,
            NEW.date_created = OLD.date_created;
INSERT INTO
    contents (sequence, name, definition, flag_user, flag_profile, flag_maintenance)
    VALUES (1, 'About', 'About this site', 0, 0, 0);
INSERT INTO
    contents (sequence, name, definition, flag_user, flag_profile, flag_maintenance)
    VALUES (2, 'Profile', 'Maintain your profile', 0, 0, 0);
INSERT INTO
    contents (sequence, name, definition, flag_user, flag_profile, flag_maintenance)
    VALUES (3, 'Prospects', 'Maintain your prospects', 0, 0, 0);
INSERT INTO
    contents (sequence, name, definition, flag_user, flag_profile, flag_maintenance)
    VALUES (4, 'Contacts', 'Maintain individual Contacts within prospective businesses', 0, 0, 0);
INSERT INTO
    contents (sequence, name, definition, flag_user, flag_profile, flag_maintenance)
    VALUES (5, 'Logs', 'Maintain logs of activities with contacts and prospects', 0, 0, 0);
INSERT INTO
    contents (sequence, name, definition, flag_user, flag_profile, flag_maintenance)
    VALUES (6, 'Networking', 'Maintain logs of networking activities and events', 0, 0, 0);
INSERT INTO
    contents (sequence, name, definition, flag_user, flag_profile, flag_maintenance)
    VALUES (7, 'Mail', 'E-mail campaigns', 0, 0, 0);
INSERT INTO
    contents (sequence, name, definition, flag_user, flag_profile, flag_maintenance)
    VALUES (8, 'Documents', 'Resumes, cover-letter text, etc.', 0, 0, 0);
INSERT INTO
    contents (sequence, name, definition, flag_user, flag_profile, flag_maintenance)
    VALUES (9, 'Maintenance', 'Maitain look-up tables, user permissions and stuff.', 0, 0, 0);
