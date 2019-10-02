CREATE TABLE people (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    lastname varchar(255),
    firstname varchar(255),
	email varchar(30),
    role varchar(30),
    username varchar(30) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL 
);

CREATE TABLE admins (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    roll varchar(20) NOT NULL,
    lastname varchar(255),
    firstname varchar(255),
    username varchar(30) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE sponsors (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(255),
    type varchar(50),
    email varchar(50),
    amount int 
);


CREATE TABLE schedule (
    id int NOT NULL AUTO_INCREMENT,
    lastname varchar(255),
    firstname varchar(255),
    email varchar(30),
    role varchar(30) 
);

CREATE TABLE credentials(
    username varchar(20),
    password varchar(255)
);

CREATE TABLE attendees(
    username varchar(20) PRIMARY KEY
);
insert into people (lastname, firstname, email, role, username, password)
values ("Hingane", "Shreeshail", "shreessh@iitk.ac.in", "organizer", "shreessh", "$2y$10$vUC1ai7uSGztgTwRIatBE.TLSyldOnejknIBc8DsgRA3UKlMgFQSm") ;

insert into admins (roll, lastname, firstname, username, password)
values ("160294", "Hingane", "Shreeshail", "shreessh", "$2y$10$vUC1ai7uSGztgTwRIatBE.TLSyldOnejknIBc8DsgRA3UKlMgFQSm") ;

