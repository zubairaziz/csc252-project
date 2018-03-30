CREATE TABLE User(
    userID INT(11) NOT NULL AUTO_INCREMENT , 
    email VARCHAR(50) NOT NULL , 
    password VARCHAR(50) NOT NULL , 
    firstName VARCHAR(25) NOT NULL , 
    lastName VARCHAR(25) NOT NULL , 
    status INT(1) NOT NULL , 
    PRIMARY KEY (userID)
    );