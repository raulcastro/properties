CREATE DATABASE db161140_2go;

CREATE USER 'db161140_2go'@'localhost' IDENTIFIED BY 'where2GO';

GRANT ALL PRIVILEGES ON *.* TO 'db161140_2go'@'localhost' WITH GRANT OPTION;

CREATE TABLE `app_info` (
  `title` varchar(512) DEFAULT NULL,
  `site_name` varchar(512) DEFAULT NULL,
  `url` varchar(512) DEFAULT NULL,
  `content` varchar(1024) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `keywords` varchar(512) DEFAULT NULL,
  `creator` varchar(512) DEFAULT NULL,
  `creator_url` varchar(512) DEFAULT NULL,
  `twitter` varchar(256) DEFAULT NULL,
  `facebook` varchar(256) DEFAULT NULL,
  `googleplus` varchar(256) DEFAULT NULL,
  `pinterest` varchar(256) DEFAULT NULL,
  `linkedin` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `lang` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE app_info ADD COLUMN youtube VARCHAR(256) NULL;
ALTER TABLE app_info ADD COLUMN instagram VARCHAR(256) NULL;
ALTER TABLE app_info ADD COLUMN location VARCHAR(256) NULL;

CREATE TABLE `main_gallery` (
  `picture_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `cover` int(1) DEFAULT '0',
  `link` varchar(512) DEFAULT NULL,
  `promos` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`picture_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

UPDATE companies SET promoted = 0;
ALTER TABLE companies ADD COLUMN main_promoted INT(1) DEFAULT 0;
ALTER TABLE companies ADD COLUMN closed INT(1) DEFAULT 0;

#deprecated
ALTER TABLE social DROP COLUMN maps;

--
-- Table structure for table `system_users`
--
CREATE TABLE `users` (
    `user_id`   int(10) NOT NULL AUTO_INCREMENT,
    `user`      varchar(30) NOT NULL,
    `password`  char(40) NOT NULL,
    `type`      int(1) NOT NULL,
    PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `user_detail` (
    `detail_id` int(10) NOT NULL AUTO_INCREMENT,
    `user_id`   int(10) NOT NULL,
    `name`      varchar(255) NOT NULL,
    `email`     varchar(255) DEFAULT NULL,
    `about`     text,
    `avatar`    varchar(50) DEFAULT NULL,
    PRIMARY KEY (`detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `user_type` (
    `type_id`   int(10) NOT NULL AUTO_INCREMENT,
    `type`      varchar(50) NOT NULL,
    PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


INSERT INTO user_type(type) VALUES('administrator');
INSERT INTO users(user, password, type) VALUES('raul@wheretogo.com.mx', SHA1('password'), 1);
INSERT INTO user_detail(user_id, name, email) VALUES(1, 'Frederich Gauss', 'raul@wheretogo.com.mx');

INSERT INTO user_type(type) VALUES('administrator');
INSERT INTO users(user, password, type) VALUES('oliver@wheretogo.com.mx', SHA1('password'), 1);
INSERT INTO user_detail(user_id, name, email) VALUES(2, 'Monkey', 'oliver@wheretogo.com.mx');

#deprecated
ALTER TABLE social DROP COLUMN trip_advisor;
ALTER TABLE social DROP COLUMN tuit;

ALTER TABLE social ADD COLUMN tripadvisor VARCHAR(128);
ALTER TABLE social ADD COLUMN youtube VARCHAR(128);
ALTER TABLE social ADD COLUMN pinterest VARCHAR(128);
ALTER TABLE social ADD COLUMN instagram VARCHAR(128);

ALTER TABLE categories ADD COLUMN title VARCHAR(256);

#working on the events! at least!

ALTER TABLE companies ADD COLUMN belong_company INT(255) DEFAULT NULL;

CREATE TABLE `events` (
    `event_id`      INT(10) NOT NULL AUTO_INCREMENT,
    `date`          DATE NULL,
    `time`          TIME NULL, 
    `video_brand`   VARCHAR(255) NULL,
    PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

# Dropping some not necessary tables

DROP TABLE address;
DROP TABLE categories_templates;
DROP TABLE companies_photos;
DROP TABLE crm_blog;
DROP TABLE crm_blog_replies;
DROP TABLE email_messages;
DROP TABLE emails;
DROP TABLE groups;
DROP TABLE history_files;
DROP TABLE history_replies;
DROP TABLE members;
DROP TABLE names;
DROP TABLE originally_cities;
DROP TABLE originally_resorts;
DROP TABLE phones;
DROP TABLE pictures;
DROP TABLE system_users;
DROP TABLE tasks;
DROP TABLE templates;
DROP TABLE transfers;

148 mamitas
UPDATE companies SET belong_company = 291 WHERE company_id = 148;
INSERT INTO events(event_id, date) VALUES(148, '2013-07-23');

251 mamitas
UPDATE companies SET belong_company = 291 WHERE company_id = 251;
INSERT INTO events(event_id, date) VALUES(251, '2013-12-27');

252 mamitasmamitas
UPDATE companies SET belong_company = 291 WHERE company_id = 252;
INSERT INTO events(event_id, date) VALUES(252, '2013-11-28');

213 mamitas
UPDATE companies SET belong_company = 291 WHERE company_id = 213;
INSERT INTO events(event_id, date) VALUES(213, '2013-01-04');

279 mamitas
UPDATE companies SET belong_company = 291 WHERE company_id = 279;
INSERT INTO events(event_id, date) VALUES(279, '2014-05-16');

242 reina roja
UPDATE companies SET belong_company = 202 WHERE company_id = 242;
INSERT INTO events(event_id, date) VALUES(242, '2013-11-27');

278 xcaret
UPDATE companies SET belong_company = 74 WHERE company_id = 278;
INSERT INTO events(event_id, date) VALUES(278, '2014-05-22');

259 mamitas
UPDATE companies SET belong_company = 291 WHERE company_id = 259;
INSERT INTO events(event_id, date) VALUES(259, '2014-01-03');

225 solidaridad
UPDATE companies SET belong_company = 292 WHERE company_id = 225;
INSERT INTO events(event_id, date) VALUES(225, '2013-06-01');

268 solidaridad
UPDATE companies SET belong_company = 292 WHERE company_id = 268;
INSERT INTO events(event_id, date) VALUES(268, '2014-02-27');

289 solidaridad
UPDATE companies SET belong_company = 292 WHERE company_id = 289;
INSERT INTO events(event_id, date) VALUES(289, '2014-11-12');

266 solidaridad
UPDATE companies SET belong_company = 292 WHERE company_id = 266;
INSERT INTO events(event_id, date) VALUES(266, '2014-03-01');

273 blue parrot
UPDATE companies SET belong_company = 184 WHERE company_id = 273;
INSERT INTO events(event_id, date) VALUES(273, '2013-04-18');

280 canibal royal
UPDATE companies SET belong_company = 187 WHERE company_id = 280;
INSERT INTO events(event_id, date) VALUES(280, '2014-05-15');	

255 mamitas
UPDATE companies SET belong_company = 291 WHERE company_id = 255;
INSERT INTO events(event_id, date) VALUES(255, '2013-12-29');

157 solidaridad
UPDATE companies SET belong_company = 292 WHERE company_id = 157;
INSERT INTO events(event_id, date) VALUES(157, '2011-07-23');

175 solidaridad
UPDATE companies SET belong_company = 292 WHERE company_id = 175;
INSERT INTO events(event_id, date) VALUES(175, '2011-12-14');

253 mamitas
UPDATE companies SET belong_company = 291 WHERE company_id = 253;
INSERT INTO events(event_id, date) VALUES(253, '2014-12-31');

256 tulum
UPDATE companies SET belong_company = 77 WHERE company_id = 256;
INSERT INTO events(event_id, date) VALUES(256, '2013-12-31');

269 mamitas
UPDATE companies SET belong_company = 291 WHERE company_id = 269;
INSERT INTO events(event_id, date) VALUES(269, '2014-02-23');

265 solidaridad
UPDATE companies SET belong_company = 292 WHERE company_id = 265;
INSERT INTO events(event_id, date) VALUES(265, '2014-02-16');

276 solidaridad
UPDATE companies SET belong_company = 292 WHERE company_id = 276;
INSERT INTO events(event_id, date) VALUES(276, '2014-05-17');

193 mandala
UPDATE companies SET belong_company = 293 WHERE company_id = 193;
INSERT INTO events(event_id, date) VALUES(193, '2013-07-04');

194 palladium
UPDATE companies SET belong_company = 294 WHERE company_id = 194;
INSERT INTO events(event_id, date) VALUES(194, '2012-07-12');

194 chanolandia
UPDATE companies SET belong_company = 295 WHERE company_id = 257;
INSERT INTO events(event_id, date) VALUES(257, '2014-01-11');

262 tabu
UPDATE companies SET belong_company = 296 WHERE company_id = 262;
INSERT INTO events(event_id, date) VALUES(262, '2014-01-28');

287 hard rock
UPDATE companies SET belong_company = 297 WHERE company_id = 287;
INSERT INTO events(event_id, date) VALUES(287, '2014-10-12');

277 punta venado bike park
UPDATE companies SET belong_company = 298 WHERE company_id = 277;
INSERT INTO events(event_id, date) VALUES(277, '2014-05-04');

270 altournative
UPDATE companies SET belong_company = 299 WHERE company_id = 270;
INSERT INTO events(event_id, date) VALUES(270, '2014-03-16');

281 deseo
UPDATE companies SET belong_company = 300 WHERE company_id = 281;
INSERT INTO events(event_id, date) VALUES(281, '2014-05-14');

290 senor frogs
UPDATE companies SET belong_company = 301 WHERE company_id = 290;
INSERT INTO events(event_id, date) VALUES(290, '2014-12-05');

275 hard rock
UPDATE companies SET belong_company = 297 WHERE company_id = 275;
INSERT INTO events(event_id, date) VALUES(275, '2014-05-03');

275 coco maya
UPDATE companies SET belong_company = 188 WHERE company_id = 302;
INSERT INTO events(event_id, date) VALUES(302, '2014-11-26');

delete past events from companies_subcategories

DELETE FROM companies_subcategories WHERE subcategory = 80;
DELETE FROM companies_subcategories WHERE subcategory = 81;
DELETE FROM companies_subcategories WHERE subcategory = 79;
DELETE FROM companies_subcategories WHERE subcategory = 77;

UPDATE companies SET category = NULL WHERE category = 22;

DELETE FROM companies_subcategories WHERE subcategory = 34;
DELETE FROM companies_subcategories WHERE subcategory = 32;
DELETE FROM companies_subcategories WHERE subcategory = 64;
DELETE FROM companies_subcategoriesp WHERE subcategory = 37;
DELETE FROM companies_subcategories WHERE subcategory = 33;

UPDATE companies SET category = NULL WHERE category = 11;

Building members

CREATE TABLE `members` (
    `member_id`      INT(10) NOT NULL AUTO_INCREMENT,
    `agent`          INT(1) NOT NULL,
    `member_name`          VARCHAR(255) NULL,
    `company_name`          VARCHAR(255) NULL,
    `company_type`   VARCHAR(255) NULL,
    `position`   VARCHAR(255) NULL,
    `brand`          VARCHAR(255) NULL,
    `address`   VARCHAR(255) NULL,
    `notes`   VARCHAR(512) NULL,
    `date` DATE NULL,
    PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `member_phones` (
    `phone_id`      INT(10) NOT NULL AUTO_INCREMENT,
    `member_id`     INT(10) NOT NULL,
    `phone`         VARCHAR(255) NULL,
    `type`          INT(10) NOT NULL,
    PRIMARY KEY (`phone_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `member_emails` (
    `email_id`      INT(10) NOT NULL AUTO_INCREMENT,
    `member_id`     INT(10) NOT NULL,
    `email`         VARCHAR(255) NULL,
    PRIMARY KEY (`email_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `member_emails` (
    `email_id`      INT(10) NOT NULL AUTO_INCREMENT,
    `member_id`     INT(10) NOT NULL,
    `email`         VARCHAR(255) NULL,
    PRIMARY KEY (`email_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

















































