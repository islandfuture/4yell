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
