--Class insert
INSERT INTO Class (homepageID, teacherID)
VALUES (homeID, teachID)



--Category insert (1 is yes, 0 is no)
INSERT INTO Category (canHaveSubcategories)
VALUES (bol of can have subcat)

--Category Table insert (no inital category table for current class)
INSERT INTO CategoryTable (categoryID)
VALUES (categoryID)

--Category Table insert (there is inital category table for current class)
INSERT INTO CategoryTable (categoryTableID, categoryID)
VALUES (categoryTableID, categoryID)

--Content insert
INSERT INTO Content (contentType, (textEntered, fileID, or submissionTableID))
VALUES (contentType, (textEntered, fileID, or submissionTableID))



--Module Insert
INSERT INTO Module (contentID)
VALUES (contentID)

--Module Table insert (no inital category table for current category/homepage)
INSERT INTO ModuleTable (moduleID)
VALUES (moduleID)

--Module Table insert (there is inital category table for current category/homepage)
INSERT INTO CategoryTable (moduleTableID, moduleID)
VALUES (moduleTableID, moduleID)



--Submissions Insert
INSERT INTO Submissions (submitterID, submittedFile)
VALUES (submitterID, submittedFile)

--Submission Table insert (no inital category table for current submission module)
INSERT INTO SubmissionTable (submissionID)
VALUES (submissionID)

--Submission Table insert (there is inital category table for current submission module)
INSERT INTO SubmissionTable (submissionTableID, submissionID)
VALUES (submissionTableID, submissionID)