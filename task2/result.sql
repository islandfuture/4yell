-- Вариант 1
CREATE TABLE `Authors1` (
  `id` SERIAL,
  `sLastName` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sName` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sSecondName` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
);

CREATE TABLE `Books1` (
  `id` SERIAL,
  `sName` VARCHAR(512) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
);


CREATE TABLE `BooksAuthors1` (
  `id` SERIAL,
  `idBook` BIGINT UNSIGNED NOT NULL,
  `idAuthor` BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY  (`id`)
);

ALTER TABLE `BooksAuthors1` ADD CONSTRAINT `fk_BooksAuthors1_id_Book1` FOREIGN KEY (`idBook`)
    REFERENCES `Books1` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT;

ALTER TABLE `BooksAuthors1` ADD CONSTRAINT `fk_BooksAuthors1_id_Authors1` FOREIGN KEY (`idAuthor`)
    REFERENCES `Authors1` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT;

-- ------------
-- Вариант 2
-- Храним idшники в полях idsBooks, idsAuthors - через запятую, а поиск осуществляем через SOLR, при загрузку данных в него, указываем, что это мультиполя
CREATE TABLE `Authors2` (
  `id` SERIAL,
  `sLastName` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sName` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sSecondName` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `idsBooks` VARCHAR(256) CHARACTER SET ascii COLLATE ascii_bin NOT NULL DEFAULT '',
  PRIMARY KEY  (`id`)
);

CREATE TABLE `Books2` (
  `id` SERIAL,
  `sName` VARCHAR(512) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `idsAuthors` VARCHAR(128) CHARACTER SET ascii COLLATE ascii_bin NOT NULL DEFAULT '',
  `cacheAuthors` VARCHAR(512) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY  (`id`)
);

