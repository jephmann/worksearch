DROP TABLE IF EXISTS `states`;
CREATE TABLE `states` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `date_created` datetime NOT NULL,
    `date_updated` datetime NOT NULL,
    `remarks` varchar(255) COLLATE utf8_unicode_ci,
    `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `abrv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `abrv` (`abrv`),
    UNIQUE KEY `state` (`state`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;
CREATE TRIGGER `states_insert`
    BEFORE INSERT ON `states`
        FOR EACH ROW SET
            NEW.date_created = UTC_TIMESTAMP,
            NEW.date_updated = '0000-00-00 00:00:00';
CREATE TRIGGER `states_update`
    BEFORE UPDATE ON `states`
        FOR EACH ROW SET
            NEW.date_updated = UTC_TIMESTAMP,
            NEW.date_created = OLD.date_created;
INSERT INTO states (abrv, state) VALUES ('AL', 'Alabama');
INSERT INTO states (abrv, state) VALUES ('AK', 'Alaska');
INSERT INTO states (abrv, state) VALUES ('AZ', 'Arizona');
INSERT INTO states (abrv, state) VALUES ('AR', 'Arkansas');
INSERT INTO states (abrv, state) VALUES ('CA', 'California');
INSERT INTO states (abrv, state) VALUES ('CO', 'Colorado');
INSERT INTO states (abrv, state) VALUES ('CT', 'Connecticut');
INSERT INTO states (abrv, state) VALUES ('DE', 'Delaware');
INSERT INTO states (abrv, state) VALUES ('DC', 'District of Columbia');
INSERT INTO states (abrv, state) VALUES ('FL', 'Florida');
INSERT INTO states (abrv, state) VALUES ('GA', 'Georgia');
INSERT INTO states (abrv, state) VALUES ('HI', 'Hawaii');
INSERT INTO states (abrv, state) VALUES ('ID', 'Idaho');
INSERT INTO states (abrv, state) VALUES ('IL', 'Illinois');
INSERT INTO states (abrv, state) VALUES ('IN', 'Indiana');
INSERT INTO states (abrv, state) VALUES ('IA', 'Iowa');
INSERT INTO states (abrv, state) VALUES ('KS', 'Kansas');
INSERT INTO states (abrv, state) VALUES ('KY', 'Kentucky');
INSERT INTO states (abrv, state) VALUES ('LA', 'Louisiana');
INSERT INTO states (abrv, state) VALUES ('ME', 'Maine');
INSERT INTO states (abrv, state) VALUES ('MD', 'Maryland');
INSERT INTO states (abrv, state) VALUES ('MA', 'Massachusetts');
INSERT INTO states (abrv, state) VALUES ('MI', 'Michigan');
INSERT INTO states (abrv, state) VALUES ('MN', 'Minnesota');
INSERT INTO states (abrv, state) VALUES ('MS', 'Mississippi');
INSERT INTO states (abrv, state) VALUES ('MO', 'Missouri');
INSERT INTO states (abrv, state) VALUES ('MT', 'Montana');
INSERT INTO states (abrv, state) VALUES ('NE', 'Nebraska');
INSERT INTO states (abrv, state) VALUES ('NV', 'Nevada');
INSERT INTO states (abrv, state) VALUES ('NH', 'New Hampshire');
INSERT INTO states (abrv, state) VALUES ('NJ', 'New Jersey');
INSERT INTO states (abrv, state) VALUES ('NM', 'New Mexico');
INSERT INTO states (abrv, state) VALUES ('NY', 'New York');
INSERT INTO states (abrv, state) VALUES ('NC', 'North Carolina');
INSERT INTO states (abrv, state) VALUES ('ND', 'North Dakota');
INSERT INTO states (abrv, state) VALUES ('OH', 'Ohio');
INSERT INTO states (abrv, state) VALUES ('OK', 'Oklahoma');
INSERT INTO states (abrv, state) VALUES ('OR', 'Oregon');
INSERT INTO states (abrv, state) VALUES ('PA', 'Pennsylvania');
INSERT INTO states (abrv, state) VALUES ('RI', 'Rhode Island');
INSERT INTO states (abrv, state) VALUES ('SC', 'South Carolina');
INSERT INTO states (abrv, state) VALUES ('SD', 'South Dakota');
INSERT INTO states (abrv, state) VALUES ('TN', 'Tennessee');
INSERT INTO states (abrv, state) VALUES ('TX', 'Texas');
INSERT INTO states (abrv, state) VALUES ('UT', 'Utah');
INSERT INTO states (abrv, state) VALUES ('VT', 'Vermont');
INSERT INTO states (abrv, state) VALUES ('VA', 'Virginia');
INSERT INTO states (abrv, state) VALUES ('WA', 'Washington');
INSERT INTO states (abrv, state) VALUES ('WV', 'West Virginia');
INSERT INTO states (abrv, state) VALUES ('WI', 'Wisconsin');
INSERT INTO states (abrv, state) VALUES ('WY', 'Wyoming');