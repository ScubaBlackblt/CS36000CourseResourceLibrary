DROP TABLE Module;


DROP TABLE Content;



DROP TABLE Submissions;

DROP TABLE Category;

DROP TABLE Course;

DROP TABLE user;

DROP TABLE joinrequesttable;

DROP TABLE studentsjoined;

CREATE TABLE Module (
    moduleID int AUTO_INCREMENT PRIMARY KEY,
    categoryID int
);

CREATE TABLE Content (
    contentID int AUTO_INCREMENT PRIMARY KEY,
    moduleID int,
    contentType varchar(25),
    textEntered varchar(500)
);








CREATE TABLE Submissions (
    submissionID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    contentID int,
    submitterID int NOT NULL,
    submittedFile varchar(500) NOT NULL
);





CREATE TABLE Category (
    categoryID int AUTO_INCREMENT PRIMARY KEY,
    categoryName varchar(50),
    canHaveSubcategories BIT(1),
    parentID int,
    courseID int
);


CREATE TABLE Course (
    courseID int AUTO_INCREMENT PRIMARY KEY,
    teacherID int
);


CREATE TABLE User (
    userID INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(20) NOT NULL,
    userPassword VARCHAR(15) NOT NULL,
    courseID INT,
    typeOfAccount VARCHAR(15) NOT NULL
);

CREATE TABLE JoinRequestTable (
    userID INT PRIMARY KEY,
    classID INT
);

CREATE TABLE StudentsJoined (
    userID INT,
    classID INT,
    CONSTRAINT PK_Joined PRIMARY KEY (classID, userID)
);