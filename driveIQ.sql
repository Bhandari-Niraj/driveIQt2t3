CREATE DATABASE driveIQ;
USE driveIQ;

CREATE TABLE broker(
ID INT NOT NULL auto_increment PRIMARY KEY, 
NAME VARCHAR(255) NOT NULL
);

INSERT INTO broker(NAME) VALUES ('Ted'), ('Mark'), ('Aaron'), ('Luke');

CREATE TABLE customer(
ID INT NOT NULL auto_increment PRIMARY KEY,
NAME VARCHAR(255) NOT NULL, 
AMOUNT decimal(15,2),
BROKER_ID INT , 
FOREIGN KEY (BROKER_ID) REFERENCES broker(ID) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO customer(NAME, AMOUNT, BROKER_ID) VALUES('SAM', 3000, 4), 
('JHON', 4000, 2), ('MACK', 5000, 2), ('TEST', 3000, 3), ('JUNE', 2000, 3), ('MIKE', 4000, 1),
('ANNIE', 4000, 2), ('MICHEAL', 2000, 1), ('TOM', 2000, 4), ('JASON', 6000, 4 );

SELECT b.name, count(c.broker_id) as total_customer From customer c JOIN broker b
on b.id = c.broker_id Group by b.name order by total_customer DESC, b.name ASC;
