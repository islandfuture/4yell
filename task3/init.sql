-- Table structure
CREATE TABLE `data` (
  `id` SERIAL,
  `type` VARCHAR(6) NOT NULL,
  `date` DATE NOT NULL,
  `value` INTEGER UNSIGNED NOT NULL
);

-- Table sample data
INSERT INTO `data` VALUES
  (null, 'photo', '2015-02-02', 1240),
  (null, 'image', '2015-02-02', 5609),
  (null, 'photo', '2015-01-30', 1150),
  (null, 'photo', '2015-02-01', 1190),
  (null, 'review', '2015-02-02', 3600);