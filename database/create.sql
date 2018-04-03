CREATE TABLE Users(
    userID INT(11) NOT NULL AUTO_INCREMENT , 
    email VARCHAR(50) NOT NULL , 
    password VARCHAR(50) NOT NULL , 
    firstName VARCHAR(25) NOT NULL , 
    lastName VARCHAR(25) NOT NULL , 
    status INT(1) NOT NULL , 
    PRIMARY KEY (userID)
    );

CREATE TABLE ProfRoom(
    professorID INT(11) NOT NULL,
    roomNumber VARCHAR(10) NOT NULL,
    PRIMARY KEY(professorID),
    FOREIGN KEY(professorID) REFERENCES Users(userID) ON DELETE CASCADE
    );

CREATE TABLE Courses(
    courseID VARCHAR(10) NOT NULL,
    courseName VARCHAR(50) NOT NULL,
    PRIMARY KEY(courseID)
    );

CREATE TABLE Teach(
    professorID INT(11) NOT NULL,
    courseID VARCHAR(10) NOT NULL,
    PRIMARY KEY(professorID,courseID),
    FOREIGN KEY(courseID) REFERENCES Courses(courseID) ON DELETE CASCADE,
    FOREIGN KEY(professorID) REFERENCES Users(userID) ON DELETE CASCADE
    );

CREATE TABLE Availability(
    professorID INT(11) NOT NULL,
    day INT(1) NOT NULL,
    starts TIME,
    ends TIME,
    PRIMARY KEY(professorID, day),
    FOREIGN KEY(professorID) REFERENCES Users(userID) ON DELETE CASCADE 
    );

CREATE TABLE Appointment(
    professorID INT(11) NOT NULL,
    studentID INT(11) NOT NULL,
    date DATE NOT NULL,
    starts TIME NOT NULL,
    ends TIME NOT NULL,
    apptID INT(11) NOT NULL AUTO_INCREMENT,
    purpose TEXT NOT NULL,
    status INT(1) NOT NULL,
    PRIMARY KEY(apptID),
    UNIQUE(professorID, studentID, date , starts, ends),
    FOREIGN KEY(professorID) REFERENCES Users(userID) ON DELETE CASCADE,
    FOREIGN KEY(studentID) REFERENCES Users(userID) ON DELETE CASCADE
);

