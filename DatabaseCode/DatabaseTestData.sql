-- Loads test data into the database to be used as test values
-- Inputs: n/a
-- Outputs: n/a
-- By: Alec Goodrich
-- Date Last Modified: 4/28/2023

INSERT INTO User (username, userPassword, typeOfAccount, courseID)
VALUES ('TestName', 'TestPass', 'Teacher',1);

INSERT INTO course (teacherID) VALUES (1);

INSERT INTO category (categoryName, canHaveSubcategories, courseID) VALUES ('Homepage', 1, 1);
INSERT INTO category (categoryName, canHaveSubcategories, parentID) VALUES ('Test Subpage', 1, 1);

INSERT INTO content (contentType, textEntered, moduleID)
VALUES ('textbox', 'test', 1);


INSERT INTO module (categoryID)
VALUES (1);

INSERT INTO module (categoryID)
VALUES (1);

INSERT INTO content (contentType, textEntered, moduleID)
VALUES ('textbox', 'test2', 2);
