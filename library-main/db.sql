CREATE DATABASE `biblio_zelcs`

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `release_date` date NOT NULL,
  `availability` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE users
ADD isAdmin boolean;

CREATE TABLE borrowed_books (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	name VARCHAR(155) NOT NULL,
	return_date DATETIME NOT NULL,
	book_id INT NOT NULL,
	user_id INT NOT NULL,
	FOREIGN KEY (user_id) REFERENCES users(id)
);