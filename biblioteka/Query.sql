USE blog_zelcs;

DROP TABLE posts;
DROP TABLE categories;

CREATE TABLE posts (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	title VARCHAR(255) NOT NULL
);


INSERT INTO posts
(title)
VALUES
("My First Blog Post"),
("My Second Blog Post");


-- Kategoriju funkcionalitāte

-- 1. Izveido tabulu
CREATE TABLE categories (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	description TEXT,
);

-- 2. Ievieto datus tabulā, lai vēlāk nav fail
INSERT INTO categories
(name)
VALUES
("sport"),
("music"),
("food");

-- 3. Pievieno category_id posts tabulai
ALTER TABLE posts 
ADD category_id INT NOT NULL DEFAULT 1;

-- 4. Izveido ārējo atslēgu
ALTER TABLE posts
ADD FOREIGN KEY (category_id) REFERENCES categories(id);

-- 5. Izmaina nepieciešamos category_id
UPDATE posts
SET category_id = 3
WHERE id = 2;


SELECT * FROM posts;

SELECT * FROM posts
JOIN categories
ON posts.category_id = categories.id;
