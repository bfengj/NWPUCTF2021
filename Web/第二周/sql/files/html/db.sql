CREATE DATABASE IF NOT EXISTS supersqli;

USE supersqli;

CREATE TABLE IF NOT EXISTS `words` (
  `id` int(10) NOT NULL,
  `data` varchar(20) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


INSERT INTO `words` values(1,'hahahah'),(2,'miaomiaomiao'),(114514,'ys');
