-- Creates all of the tables for the database
-- Inputs: n/a
-- Outputs: n/a
-- By: Alec Goodrich & Alex Kitani
-- Date Last Modified: 4/28/2023

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
    userPassword VARCHAR(500) NOT NULL,
    courseID INT,
    typeOfAccount VARCHAR(15) NOT NULL
);

CREATE TABLE JoinRequestTable (
    userID INT PRIMARY KEY,
    courseID INT
);

CREATE TABLE StudentsJoined (
    userID INT,
    courseID INT,
    CONSTRAINT PK_Joined PRIMARY KEY (courseID, userID)
);
