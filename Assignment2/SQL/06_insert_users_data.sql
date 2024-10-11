/*
Patrick Hollyer-Viggiani
06_insert_users_data.sql
11 October, 2024
INFT2100
*/
-- Adding the encryption extension
CREATE EXTENSION IF NOT EXISTS pgcrypto;

-- Inserting all 50 users into the table
INSERT INTO users (first_name, last_name, email, birth_date, last_access, password)
VALUES 
('Alice', 'Anderson', 'alice.anderson@dcmail.ca', '2000-02-14', '2024-10-01 14:45:30', crypt('password1', gen_salt('bf'))),
('Bob', 'Brown', 'bob.brown@dcmail.ca', '1999-08-23', '2024-10-02 10:35:20', crypt('password2', gen_salt('bf'))),
('Charlie', 'Clark', 'charlie.clark@dcmail.ca', '2001-03-15', '2024-10-03 09:28:10', crypt('password3', gen_salt('bf'))),
('Diana', 'Davis', 'diana.davis@dcmail.ca', '1998-11-09', '2024-10-04 08:12:50', crypt('password4', gen_salt('bf'))),
('Eve', 'Evans', 'eve.evans@dcmail.ca', '2002-07-04', '2024-10-05 16:22:30', crypt('password5', gen_salt('bf'))),
('Frank', 'Ford', 'frank.ford@dcmail.ca', '2000-05-21', '2024-10-01 11:45:00', crypt('password6', gen_salt('bf'))),
('Grace', 'Green', 'grace.green@dcmail.ca', '2000-09-18', '2024-10-02 14:55:45', crypt('password7', gen_salt('bf'))),
('Henry', 'Hughes', 'henry.hughes@dcmail.ca', '1999-12-11', '2024-10-03 15:12:05', crypt('password8', gen_salt('bf'))),
('Isabella', 'Iverson', 'isabella.iverson@dcmail.ca', '2001-01-29', '2024-10-04 10:11:12', crypt('password9', gen_salt('bf'))),
('Jack', 'Johnson', 'jack.johnson@dcmail.ca', '2002-03-09', '2024-10-05 09:33:25', crypt('password10', gen_salt('bf'))),
('Karen', 'Kane', 'karen.kane@dcmail.ca', '2000-10-05', '2024-10-06 08:20:15', crypt('password11', gen_salt('bf'))),
('Leo', 'Lewis', 'leo.lewis@dcmail.ca', '1999-04-17', '2024-10-07 07:45:00', crypt('password12', gen_salt('bf'))),
('Mia', 'Moore', 'mia.moore@dcmail.ca', '2001-11-26', '2024-10-01 16:05:45', crypt('password13', gen_salt('bf'))),
('Nathan', 'Nelson', 'nathan.nelson@dcmail.ca', '2000-06-14', '2024-10-02 14:30:20', crypt('password14', gen_salt('bf'))),
('Olivia', 'Owens', 'olivia.owens@dcmail.ca', '2001-08-07', '2024-10-03 15:55:30', crypt('password15', gen_salt('bf'))),
('Paul', 'Parker', 'paul.parker@dcmail.ca', '1998-05-11', '2024-10-04 13:10:50', crypt('password16', gen_salt('bf'))),
('Quinn', 'Quincy', 'quinn.quincy@dcmail.ca', '2002-10-21', '2024-10-05 10:45:00', crypt('password17', gen_salt('bf'))),
('Rachel', 'Russell', 'rachel.russell@dcmail.ca', '1999-07-12', '2024-10-06 12:15:30', crypt('password18', gen_salt('bf'))),
('Sam', 'Stevens', 'sam.stevens@dcmail.ca', '2000-03-29', '2024-10-07 11:20:10', crypt('password19', gen_salt('bf'))),
('Tina', 'Thomas', 'tina.thomas@dcmail.ca', '2001-05-23', '2024-10-08 13:12:45', crypt('password20', gen_salt('bf'))),
('Uma', 'Underwood', 'uma.underwood@dcmail.ca', '2002-09-30', '2024-10-09 09:05:15', crypt('password21', gen_salt('bf'))),
('Victor', 'Vargas', 'victor.vargas@dcmail.ca', '1999-01-11', '2024-10-10 08:55:50', crypt('password22', gen_salt('bf'))),
('Wendy', 'Williams', 'wendy.williams@dcmail.ca', '2000-12-22', '2024-10-11 10:50:30', crypt('password23', gen_salt('bf'))),
('Xander', 'Xavier', 'xander.xavier@dcmail.ca', '2001-10-01', '2024-10-12 14:35:20', crypt('password24', gen_salt('bf'))),
('Yara', 'Young', 'yara.young@dcmail.ca', '2002-04-18', '2024-10-13 15:40:25', crypt('password25', gen_salt('bf'))),
('Zane', 'Zimmer', 'zane.zimmer@dcmail.ca', '2000-08-27', '2024-10-14 13:55:50', crypt('password26', gen_salt('bf'))),
('Alex', 'Avery', 'alex.avery@dcmail.ca', '2001-02-10', '2024-10-15 11:45:15', crypt('password27', gen_salt('bf'))),
('Bella', 'Brooks', 'bella.brooks@dcmail.ca', '1999-03-19', '2024-10-16 12:33:00', crypt('password28', gen_salt('bf'))),
('Caleb', 'Carter', 'caleb.carter@dcmail.ca', '2002-05-30', '2024-10-17 09:20:45', crypt('password29', gen_salt('bf'))),
('Danielle', 'Dorsey', 'danielle.dorsey@dcmail.ca', '1998-12-15', '2024-10-18 10:15:55', crypt('password30', gen_salt('bf'))),
('Ethan', 'Edwards', 'ethan.edwards@dcmail.ca', '2000-11-05', '2024-10-19 16:05:30', crypt('password31', gen_salt('bf'))),
('Fiona', 'Fletcher', 'fiona.fletcher@dcmail.ca', '2001-01-08', '2024-10-20 14:12:50', crypt('password32', gen_salt('bf'))),
('Gavin', 'Gordon', 'gavin.gordon@dcmail.ca', '1999-06-19', '2024-10-21 08:45:25', crypt('password33', gen_salt('bf'))),
('Holly', 'Harrison', 'holly.harrison@dcmail.ca', '2000-09-03', '2024-10-22 09:33:10', crypt('password34', gen_salt('bf'))),
('Ian', 'Ingram', 'ian.ingram@dcmail.ca', '2002-12-19', '2024-10-23 12:25:35', crypt('password35', gen_salt('bf'))),
('Julia', 'Jones', 'julia.jones@dcmail.ca', '1998-07-09', '2024-10-24 13:12:50', crypt('password36', gen_salt('bf'))),
('Kevin', 'Keller', 'kevin.keller@dcmail.ca', '2001-05-17', '2024-10-25 11:50:40', crypt('password37', gen_salt('bf'))),
('Lily', 'Long', 'lily.long@dcmail.ca', '1999-02-22', '2024-10-26 10:25:55', crypt('password38', gen_salt('bf'))),
('Michael', 'Morris', 'michael.morris@dcmail.ca', '2000-08-12', '2024-10-27 14:15:30', crypt('password39', gen_salt('bf'))),
('Nina', 'Nash', 'nina.nash@dcmail.ca', '2002-11-16', '2024-10-28 12:05:45', crypt('password40', gen_salt('bf'))),
('Oscar', 'Olsen', 'oscar.olsen@dcmail.ca', '2001-06-05', '2024-10-29 15:10:35', crypt('password41', gen_salt('bf'))),
('Penny', 'Peterson', 'penny.peterson@dcmail.ca', '2000-04-13', '2024-10-30 11:20:15', crypt('password42', gen_salt('bf'))),
('Quincy', 'Quinn', 'quincy.quinn@dcmail.ca', '1999-09-08', '2024-10-31 14:55:50', crypt('password43', gen_salt('bf'))),
('Riley', 'Reed', 'riley.reed@dcmail.ca', '2002-03-25', '2024-11-01 09:12:10', crypt('password44', gen_salt('bf'))),
('Sophia', 'Scott', 'sophia.scott@dcmail.ca', '2001-07-13', '2024-11-02 10:55:00', crypt('password45', gen_salt('bf'))),
('Tyler', 'Tate', 'tyler.tate@dcmail.ca', '2000-02-19', '2024-11-03 11:15:30', crypt('password46', gen_salt('bf'))),
('Ursula', 'Underwood', 'ursula.underwood@dcmail.ca', '1999-10-22', '2024-11-04 08:50:45', crypt('password47', gen_salt('bf'))),
('Vince', 'Vargas', 'vince.vargas@dcmail.ca', '2001-11-03', '2024-11-05 12:45:00', crypt('password48', gen_salt('bf'))),
('Willa', 'Watson', 'willa.watson@dcmail.ca', '2002-08-28', '2024-11-06 13:20:30', crypt('password49', gen_salt('bf'))),
('Xena', 'Xander', 'xena.xander@dcmail.ca', '2000-06-22', '2024-11-07 16:15:55', crypt('password50', gen_salt('bf')));


SELECT * FROM users;