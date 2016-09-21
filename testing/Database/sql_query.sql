CREATE TABLE student(
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(60) NULL,
    street VARCHAR(50) NOT NULL,
    city VARCHAR(40) NOT NULL,
    state CHAR(2) NOT NULL DEFAULT "PA",
    zip MEDIUMINT UNSIGNED NOT NULL,
    phone VARCHAR(20) NOT NULL,
    birth_date DATE NOT NULL,
    sex ENUM('M', 'F') NOT NULL,
    date_entered TIMESTAMP,
    lunch_cost FLOAT NULL,
    student_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY
);
INSERT INTO student VALUES('Dale', 'Cooper', 'dcooper@aol.com',
    '123 Main St', 'Yakima', 'WA', 98901, '792-223-8901', "1959-2-22",
    'M', NOW(), 3.50, NULL);
INSERT INTO student VALUES('Harry', 'Truman', 'htruman@aol.com',
    '202 South St', 'Vancouver', 'WA', 98660, '792-223-9810', "1946-1-24",
    'M', NOW(), 3.50, NULL);
INSERT INTO student VALUES('Shelly', 'Johnson', 'sjohnson@aol.com',
    '9 Pond Rd', 'Sparks', 'NV', 89431, '792-223-6734', "1970-12-12",
    'F', NOW(), 3.50, NULL);
INSERT INTO student VALUES('Bobby', 'Briggs', 'bbriggs@aol.com',
    '14 12th St', 'San Diego', 'CA', 92101, '792-223-6178', "1967-5-24",
    'M', NOW(), 3.50, NULL);
CREATE TABLE class(
    name VARCHAR(30) NOT NULL,
    class_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY);
INSERT INTO class VALUES
    ('English', NULL), ('Speech', NULL), ('Literature', NULL),
    ('Algebra', NULL), ('Geometry', NULL);
CREATE TABLE test(
    date DATE NOT NULL,
    type ENUM('T', 'Q') NOT NULL,
    class_id INT UNSIGNED NOT NULL,
    test_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY);
ALTER TABLE test ADD maxscore INT NOT NULL AFTER type;
INSERT INTO test VALUES
    ('2014-8-25', 'Q', 15, 1, NULL),
    ('2014-8-27', 'Q', 15, 1, NULL),
    ('2014-8-29', 'T', 30, 1, NULL);
CREATE TABLE score(
    student_id INT UNSIGNED NOT NULL,
    event_id INT UNSIGNED NOT NULL,
    score INT NOT NULL,
    PRIMARY KEY(event_id, student_id));
INSERT INTO score VALUES
    (1, 1, 15),
    (1, 2, 14),
    (1, 3, 28),
    (1, 4, 29),
    (1, 5, 15),
    (1, 6, 27),
    (2, 1, 15),
    (2, 2, 14),
    (2, 3, 26),
    (2, 4, 28),
    (2, 5, 14),
    (2, 6, 26),
    (3, 1, 14),
    (3, 2, 14),
    (3, 3, 26),
    (3, 4, 26),
    (3, 5, 13),
    (3, 6, 26),
    (4, 1, 15),
    (4, 2, 14),
    (4, 3, 27),
    (4, 4, 27),
    (4, 5, 15),
    (4, 6, 27);
RENAME TABLE
    class to classes,
    score to scores,
    student to students,
    test to tests;
