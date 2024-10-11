-- Name: Patrick Hollyer-Viggiani
-- Student Number: 100910706
-- Course: INFT2100

-- Drop movies table
DROP TABLE movies;

-- Create movies table
CREATE TABLE movies (
    movie_num INTEGER PRIMARY KEY,
    title VARCHAR (35) NOT NULL,
    year INTEGER
);

-- Insert records in to the movies table
INSERT INTO movies
    VALUES(1, 'Tomorrow Never Dies', 1997);
INSERT INTO movies (movie_num, title)
    VALUES(2, 'Goldfinger');
	
-- Delete record
DELETE FROM movies
	WHERE movie_num = 2;

-- Selecting 
SELECT * FROM movies;
